<?php

namespace Tests\Feature;

use App\Http\Middleware\User;
use App\Models\Sejarah;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class sejaranControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_sejarah_page_displays_timeline_events()
    {
        $user = \App\Models\User::factory()->create(['id' => 1]);

        // Buat data sejarah
        Sejarah::insert([
            [
                'year' => '2014',
                'title' => 'Pendirian Program Studi',
                'description' => 'Program Studi PWK ITERA didirikan.',
                'user_id' => $user->id
            ],
            [
                'year' => '2015',
                'title' => 'Penerimaan Mahasiswa Pertama',
                'description' => 'Menerima mahasiswa angkatan pertama.',
                'user_id' => $user->id
            ],
        ]);

        $response = $this->get(route('profile.sejarah'));

        $response->assertInertia(
            fn($page) => $page
                ->component('Profile/Sejarah')
                ->where('title', 'Sejarah')
                ->has('timelineEvents', 2)
                ->where('timelineEvents.0.year', '2014')
                ->where('timelineEvents.1.year', '2015')
        );
    }

    public function test_sejarah_page_with_no_data()
    {
        $response = $this->get(route('profile.sejarah'));

        $response->assertInertia(
            fn($page) => $page
                ->component('Profile/Sejarah')
                ->where('title', 'Sejarah')
                ->where('timelineEvents', [])
        );
    }
}
