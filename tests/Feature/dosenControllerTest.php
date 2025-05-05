<?php

namespace Tests\Feature;

use App\Http\Middleware\User;
use App\Models\Course;
use App\Models\DosenProfile;
use App\Models\Publication;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class dosenControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_page_displays_koordinator_dosen_and_staff()
    {
        $koordinator = \App\Models\User::factory()->create([
            'role' => 'dosen',
            'position' => 'koordinator'
        ]);
        DosenProfile::factory()->create(['user_id' => $koordinator->id]);

        $dosen = \App\Models\User::factory()->count(2)->create([
            'role' => 'dosen',
            'position' => 'anggota'
        ]);
        $dosen->each(fn($d) => DosenProfile::factory()->create(['user_id' => $d->id]));

        $staff = \App\Models\User::factory()->count(2)->create([
            'role' => 'staff'
        ]);
        $staff->each(fn($s) => DosenProfile::factory()->create(['user_id' => $s->id]));

        $response = $this->get(route('profile.dosen-and-staf'));

        $response->assertInertia(
            fn($page) => $page
                ->component('Profile/DosenAndStaf/DosenAndStaft')
                ->has('koordinator')
                ->has('employee', 2)
                ->has('staff', 2)
        );
    }

    public function test_show_page_displays_dosen_details()
    {
        $dosen = \App\Models\User::factory()->create([
            'role' => 'dosen',
        ]);

        DosenProfile::factory()->create(['user_id' => $dosen->id]);

        Publication::factory()->count(2)->create([
            'user_id' => $dosen->id
        ]);

        Course::factory()->count(2)->create([
            'user_id' => $dosen->id
        ]);

        $response = $this->get(route('profile.dosen-and-staf.detail', $dosen->id));

        $response->assertInertia(
            fn($page) => $page
                ->component('Profile/DosenAndStaf/DosenAndStafDetail')
                ->where('dosen.id', $dosen->id)
                ->has('dosen.dosen_profile')
                ->has('dosen.publications', 2)
                ->has('dosen.courses', 2)
        );
    }
}
