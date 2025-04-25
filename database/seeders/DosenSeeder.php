<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\DosenProfile;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    public function run()
    {
        // Buat 1 koordinator
        $koordinator = User::factory()
            ->dosen()
            ->state(['position' => 'koordinator'])
            ->create();

        DosenProfile::factory()->create(['user_id' => $koordinator->id]);
        Publication::factory(5)->create(['user_id' => $koordinator->id]);
        Course::factory(3)->create(['user_id' => $koordinator->id]);

        // Buat 5 dosen biasa
        for ($i = 0; $i < 5; $i++) {
            $dosen = User::factory()
                ->dosen()
                ->state(['position' => $i === 0 ? 'sekretaris' : ($i === 1 ? 'bendahara' : null)])
                ->create();

            DosenProfile::factory()->create(['user_id' => $dosen->id]);
            Publication::factory(rand(3, 8))->create(['user_id' => $dosen->id]);
            Course::factory(rand(2, 4))->create(['user_id' => $dosen->id]);
        }

        // Buat 3 staff
        for ($i = 0; $i < 3; $i++) {
            $staff = User::factory()
                ->staff()
                ->create();

            DosenProfile::factory()->create(['user_id' => $staff->id]);
        }
    }
}
