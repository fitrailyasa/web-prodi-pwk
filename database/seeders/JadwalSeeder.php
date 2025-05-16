<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jadwal;
use App\Models\Matkul;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all matkul IDs
        $matkulIds = Matkul::pluck('id')->toArray();

        // Generate 3 schedules for each matkul
        foreach ($matkulIds as $matkulId) {
            // Generate 3 different schedules for each matkul
            for ($i = 0; $i < 3; $i++) {
                Jadwal::factory()->create([
                    'matkul_id' => $matkulId,
                ]);
            }
        }
    }
}
