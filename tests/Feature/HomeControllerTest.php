<?php

namespace Tests\Feature;

use App\Models\Berita;
use App\Models\Event;
use App\Models\Tag;
use App\Models\Tentang;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_homepage_with_correct_structure()
    {
        // Setup: Data dummy
        $user = \App\Models\User::factory()->create(['id' => 1]);
        $tag = Tag::factory()->create(['name' => 'Infrastruktur', 'slug' => 'infrastruktur', 'user_id' => $user->id]);
        $berita = Berita::factory()->create([
            'status' => 'publish',
            'views' => 100,
            'tag_id' => $tag->id,
        ]);

        $tentang = Tentang::factory()->create([
            'name' => 'Perencanaan Wilayah Kota dan ITERA',
            'description' => 'Deskripsi Singkat',
            'vision' => 'Menjadi terbaik',
            'mission' => ['A', 'B', 'C'],
            'total_teaching_staff' => 10,
            'total_student' => 100,
            'total_lecture' => 5,
            'address' => 'Jl. Terusan Ryacudu, Way Huwi, Kec. Jati Agung, Kabupaten Lampung Selatan, Lampung 35365',
            'phone' => '(0721) 8030188',
            'email' => 'pwk@itera.ac.id',
            'instagram_url' => 'https://instagram.com/pwk_itera',
            'youtube_url' => 'https://youtube.com/@pwk_itera',
            'tiktok_url' => 'https://tiktok.com/@pwk_itera',
            'latitude' => '-5.360070',
            'longitude' => '105.315312',
            'maps_url' => 'https://maps.google.com/?q=-5.360070,105.315312',
            'user_id' => $user->id,
        ]);

        $event = Event::factory()->create([
            'status' => 'publish',
            'event_date' => now(),
            // 'event_date_end' => now()->addDays(2),
        ]);

        // Act
        $response = $this->get(route('home')); // asumsi route('home') -> HomeController@index

        // Assert
        $response->assertStatus(200);
        $response->assertInertia(
            fn($page) => $page
                ->component('Home')
                ->has('popularNews.0.title')
                ->has('statistic.total_tendik')
                ->has('aboutPWK.deskripsi')
                ->has('aboutPWK.visi')
                ->has('aboutPWK.misi')
                ->has('event.0.title')
        );
    }

    /** @test */
    public function it_handles_missing_tentang_data_gracefully()
    {
        // No Tentang record
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertInertia(
            fn($page) => $page
                ->component('Home')
                ->where('aboutPWK.deskripsi', fn($desc) => str_contains($desc, 'Lorem ipsum'))
                ->where('aboutPWK.visi', 'Visi belum tersedia')
                ->where('statistic.total_tendik', 0)
        );
    }
}
