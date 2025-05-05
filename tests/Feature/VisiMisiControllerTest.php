<?php

namespace Tests\Feature;

use App\Models\Tentang;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VisiMisiControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_visi_misi_page_displays_data_when_available()
    {
        $user = \App\Models\User::factory()->create(['id' => 1]);
        Tentang::factory()->create([
            'name' => 'Perencanaan Wilayah Kota dan ITERA',
            'description' => 'Deskripsi Singkat',
            'vision' => 'Menjadi yang terbaik',
            'mission' => ['Misi A', 'Misi B'],
            'goals' =>  ['Tujuan kami adalah ...'],
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

        $response = $this->get(route('profile.visi-misi'));

        $response->assertStatus(200);
        $response->assertInertia(
            fn($page) => $page
                ->component('Profile/VisiMisi')
                ->where('title', 'Visi & Misi')
                ->where('visi', 'Menjadi yang terbaik')
                ->where('misi', ['Misi A', 'Misi B'])
                ->where('tujuan', ['Tujuan kami adalah ...'])
        );
    }
    public function test_visi_misi_page_handles_missing_data()
    {
        // Tidak ada Tentang

        $response = $this->get(route('profile.visi-misi'));

        $response->assertStatus(200);
        $response->assertInertia(
            fn($page) => $page
                ->component('Profile/VisiMisi')
                ->where('title', 'Visi & Misi')
                ->where('visi', null)
                ->where('misi', null)
                ->where('tujuan', null)
                ->where('message', 'Data visi misi belum tersedia')
        );
    }
}
