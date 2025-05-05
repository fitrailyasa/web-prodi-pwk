<?php

namespace Tests\Feature;

use App\Models\Berita;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BeritaControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_published_berita_and_tags_on_index_page()
    {
        // Arrange: buat tag dan berita publish
        $user = \App\Models\User::factory()->create(['id' => 1]);
        $tag = Tag::factory()->create(['user_id' => $user->id]);
        $berita = Berita::factory()->count(3)->create([
            'status' => 'publish',
            'tag_id' => $tag->id,
            'user_id' => $user->id,
        ]);

        // Relasikan tag ke berita
        $tag->berita()->saveMany($berita);

        // Act
        $response = $this->get(route('berita'));

        // Assert
        $response->assertStatus(200);
        $response->assertInertia(
            fn($page) =>
            $page->component('Berita/Index')
                ->has('berita', 3)
                ->has('tags', 1)
        );
    }

    /** @test */
    public function it_shows_detail_berita_and_other_random_berita()
    {
        // Arrange: buat 1 berita yang akan ditampilkan dan beberapa lainnya
        $user = \App\Models\User::factory()->create(['id' => 1]);
        $tag = Tag::factory()->create(['user_id' => $user->id]);
        $beritaUtama = Berita::factory()->create([
            'slug' => 'berita-utama',
            'status' => 'publish',
            'tag_id' => $tag->id,
            'user_id' => $user->id,
        ]);
        $beritaLain = Berita::factory()->count(5)->create([
            'status' => 'publish',
            'tag_id' => $tag->id,
            'user_id' => $user->id,
        ]);

        // Act
        $response = $this->get(route('berita.show', $beritaUtama->slug));

        // Assert
        $response->assertStatus(200);
        $response->assertInertia(
            fn($page) =>
            $page->component('Berita/Show')
                ->where('berita.id', $beritaUtama->id)
                ->has('otherNews', 5)
        );
    }
}
