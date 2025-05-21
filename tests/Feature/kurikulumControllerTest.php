<?php

namespace Tests\Feature;

use App\Models\Jadwal;
use App\Models\Matkul;
use App\Models\Modul;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KurikulumControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_matkuls_and_jadwals_to_inertia_component()
    {
        // Arrange
        $user = User::factory()->dosen()->create();
        $matkul = Matkul::factory()
            ->has(Modul::factory()->count(2), 'moduls')
            ->create(['user_id' => $user->id]);

        $jadwal = Jadwal::factory()->create([
            'matkul_id' => $matkul->id,
            'lecture' => $user->id,
        ]);

        // Act
        $response = $this->get(route('akademik.kurikulum'));

        // Assert
        $response->assertStatus(200);
        $response->assertInertia(
            fn($page) =>
            $page->component('Akademik/Kurikulum')
                ->has('matkuls', 1)
                ->has('jadwals', 1)
                ->where('title', __('Kurikulum Program Studi'))
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
                ->where('title', __('Kurikulum Program Studi'))
        );
    }
}
