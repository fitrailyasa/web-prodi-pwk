<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Matkul;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DosenControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_dosen_index_page_can_be_rendered()
    {
        $response = $this->get(route('dosen.index'));
        $response->assertStatus(200);
    }

    public function test_dosen_detail_page_can_be_rendered()
    {
        $dosen = User::factory()->create([
            'role' => 'dosen',
            'position' => 'dosen'
        ]);

        $matkul = Matkul::factory()->create();

        Jadwal::factory()->create([
            'matkul_id' => $matkul->id,
            'lecture' => $dosen->id,
            'class' => 'A',
            'room' => '101',
            'day' => 'Senin',
            'start_time' => '08:00',
            'end_time' => '10:00'
        ]);

        $response = $this->get(route('dosen.show', $dosen->id));
        $response->assertStatus(200);
    }
}
