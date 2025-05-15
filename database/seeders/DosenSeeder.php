<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Matkul;
use App\Models\Publikasi;
use App\Models\DosenProfile;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        // Create koordinator
        $koordinator = User::factory()->create([
            'name' => 'Dr. John Doe',
            'email' => 'koordinator@example.com',
            'role' => 'dosen',
            'status' => 'aktif'
        ]);

        // Create dosen profile for koordinator
        DosenProfile::factory()->create([
            'user_id' => $koordinator->id,
            'position' => 'koordinator',
            'education' => 'S3',
            'expertise' => 'Perencanaan Wilayah dan Kota',
            'img' => 'https://ui-avatars.com/api/?name=John+Doe&background=random'
        ]);

        // Create publikasis for koordinator
        Publikasi::factory(5)->create(['user_id' => $koordinator->id]);

        // Create jadwals for koordinator
        $matkuls = Matkul::take(3)->get();
        foreach ($matkuls as $matkul) {
            Jadwal::factory()->create([
                'matkul_id' => $matkul->id,
                'lecture' => $koordinator->id,
                'class' => 'A',
                'room' => '101',
                'day' => 'Senin',
                'start_time' => '08:00',
                'end_time' => '10:00',
                'user_id' => $koordinator->id
            ]);
        }

        // Create regular dosen
        for ($i = 1; $i <= 5; $i++) {
            $dosen = User::factory()->create([
                'name' => "Dr. Dosen $i",
                'email' => "dosen$i@example.com",
                'role' => 'dosen',
                'status' => 'aktif'
            ]);

            // Create dosen profile
            DosenProfile::factory()->create([
                'user_id' => $dosen->id,
                'position' => 'dosen',
                'img' => "https://ui-avatars.com/api/?name=Dosen+$i&background=random"
            ]);

            // Create publikasis
            Publikasi::factory(rand(3, 8))->create(['user_id' => $dosen->id]);

            // Create jadwals for each dosen
            $matkuls = Matkul::inRandomOrder()->take(rand(2, 4))->get();
            foreach ($matkuls as $matkul) {
                Jadwal::factory()->create([
                    'matkul_id' => $matkul->id,
                    'lecture' => $dosen->id,
                    'class' => chr(65 + rand(0, 2)), // Random class A, B, or C
                    'room' => rand(101, 105),
                    'day' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'][rand(0, 4)],
                    'start_time' => ['08:00', '10:00', '13:00', '15:00'][rand(0, 3)],
                    'end_time' => ['10:00', '12:00', '15:00', '17:00'][rand(0, 3)],
                    'user_id' => $dosen->id
                ]);
            }
        }
    }
}
