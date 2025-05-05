<?php

namespace Tests\Feature;


use App\Models\Jadwal;
use App\Models\Matkul;
use App\Models\Modul;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class kurikulumControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_matkuls_and_jadwals_to_inertia_component()
    {
        // Arrange: buat data matkul dan modul
        $user = \App\Models\User::factory()->create(['id' => 1]);
        $matkul = Matkul::factory()->has(Modul::factory()->count(2), 'moduls')->create(['user_id' => $user->id]);

        // Buat jdawall dari faktory
        $jadwal = Jadwal::factory()->create([
            'matkul_id' => $matkul->id,
            'lecture' => $user->id,
            'user_id' => $user->id,
        ]);

        // Act
        $response = $this->get(route('akademik.kurikulum'));

        // Assert
        $response->assertStatus(200);
        $response->assertInertia(
            fn($page) =>
            $page->component('Akademik/Kurikulum')
                ->where('title', __('Kurikulum Program Studi'))
                ->has('matkuls', 1)
                ->has('jadwals', 1)
                ->where('semesters', 'ganjil')
                ->where('tahun_ajaran', '2023/2024')
        );
    }

    /** @test */
    public function it_returns_empty_data_when_no_matkuls_or_jadwals_exist()
    {
        $response = $this->get(route('akademik.kurikulum'));

        $response->assertStatus(200);
        $response->assertInertia(
            fn($page) =>
            $page->component('Akademik/Kurikulum')
                ->where('matkuls', [])
                ->where('jadwals', [])
                ->where('semesters', 'ganjil')
                ->where('tahun_ajaran', '2023/2024')
        );
    }
}
