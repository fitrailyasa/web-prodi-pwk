<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Matkul;
use App\Models\DosenProfile;
use App\Models\Publikasi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DosenControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_dosen_index_page_can_be_rendered()
    {
        // Arrange
        User::factory()->dosen('koordinator')->has(DosenProfile::factory())->create();

        User::factory(2)->dosen('dosen')->has(DosenProfile::factory())->create();

        User::factory()->staff()->has(DosenProfile::factory())->create();

        // Act
        $response = $this->get(route('profile.dosen-and-staf'));

        // Assert
        $response->assertStatus(200);
        $response->assertInertia(
            fn($page) => $page
                ->component('Profile/DosenAndStaf/DosenAndStaft')
                ->has('koordinator')
                ->has('employee.0.name')
                ->has('staff.0.name')
        );
    }

    public function test_dosen_detail_page_can_be_rendered()
    {
        // Arrange
        $dosen = User::factory()
            ->dosen('dosen')
            ->has(DosenProfile::factory())
            ->create();

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

        Publikasi::factory()->count(2)->create([
            'user_id' => $dosen->id,
        ]);

        // Act
        $response = $this->get(route('profile.dosen-and-staf.detail', $dosen->id));

        // Assert
        $response->assertStatus(200);
        $response->assertInertia(
            fn($page) => $page
                ->component('Profile/DosenAndStaf/DosenAndStafDetail')
                ->has('dosen.name')
                ->has('dosen.dosenProfile.nidn')
                ->has('dosen.publikasis')
                ->has('dosen.courses.0.jadwals')
        );
    }
}
