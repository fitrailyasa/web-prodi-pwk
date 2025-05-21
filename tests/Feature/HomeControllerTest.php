<?php

namespace Tests\Feature;

use App\Models\Berita;
use App\Models\Event;
use App\Models\Medpart;
use App\Models\Tag;
use App\Models\Tentang;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_homepage_with_correct_structure()
    {
        // Arrange
        $user = User::factory()->create();
        $tag = Tag::factory()->create(['user_id' => $user->id]);

        Berita::factory()->create([
            'status' => 'publish',
            'views' => 100,
            'tag_id' => $tag->id,
            'name' => 'Judul Berita',
            'desc' => 'Deskripsi Berita',
        ]);

        Tentang::factory()->create([
            'user_id' => $user->id,
            'mission' => ['Misi A', 'Misi B'],
            'vision' => 'Visi Hebat',
        ]);

        Event::factory()->create([
            'status' => 'publish',
            'name' => 'Event Pertama',
            'desc' => 'Deskripsi Event',
        ]);

        Medpart::factory()->create([
            'name' => 'Mitra A',
            'link' => 'https://example.com',
            'img' => 'mitra.png',
        ]);

        // Act
        $response = $this->get(route('home'));

        // Assert
        $response->assertStatus(200);
        $response->assertInertia(
            fn($page) => $page
                ->component('Home')
                ->has('popularNews.0.title')
                ->has('popularNews.0.tag')
                ->has('statistic.total_tendik')
                ->has('statistic.total_mahasiswa')
                ->has('statistic.total_dosen')
                ->has('aboutPWK.deskripsi')
                ->has('aboutPWK.visi')
                ->has('aboutPWK.misi.0.title')
                ->has('event.0.title')
                ->has('patner.0.title')
                ->has('patner.0.link')
                ->has('patner.0.image')
        );
    }

    /** @test */
    public function it_handles_missing_tentang_data_gracefully()
    {
        // Tanpa Tentang data
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertInertia(
            fn($page) => $page
                ->component('Home')
                ->where('aboutPWK.deskripsi', fn($desc) => str_contains($desc, 'Lorem ipsum'))
                ->where('aboutPWK.visi', 'Visi belum tersedia')
                ->where('statistic.total_tendik', 0)
                ->where('statistic.total_mahasiswa', 0)
                ->where('statistic.total_dosen', 0)
        );
    }
}
