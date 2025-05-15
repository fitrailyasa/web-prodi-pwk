<?php

namespace Database\Seeders;

use App\Models\DosenProfile;
use App\Models\Jadwal;
use App\Models\Matkul;
use App\Models\Publikasi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeederV2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $DosenData = [
            [
                'name' => 'Prof. Ibnu Syabri, B.Sc., M.Sc., Ph.D',
                'email' => 'ibnu@email.com',
                'role' => 'dosen',
                'expertise' => 'KK Pengelolaan Pembangunan dan Pengembangan Kebijakan',
                'education' => 'S3 Kochi University Of Technology, KOCHI UNIVERSITY OF - Jepang 2012',
                'status' => 'aktif'
            ],
            [
                'name' => 'Prof. Ir. Harkunti Pertiwi Rahayu, Ph.D.',
                'email' => 'hakunti@email.com',
                'role' => 'dosen',
                'expertise' => 'KK Pengelolaan Pembangunan dan Pengembangan Kebijakan',
                'education' => 'Kochi University Of Technology, KOCHI UNIVERSITY OF - Jepang 2012',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dr. Eng. IB. Ilham Malik, S.T., M.T.',
                'email' => 'ilham@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'M. Bobby Rahman., S.T., M.Si (Han)., Ph.D.',
                'email' => 'bobby@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dr. Asnani, S.Sos.,M.A.',
                'email' => 'asnani@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dr. M. Zainal Ibad, S.T., M.T.',
                'email' => 'zainal@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dr. Husna Tiara Putri, S.T., M.T.',
                'email' => 'husna@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Shahnaz Nabila Fuady S.T., M.T., Ph.D.',
                'email' => 'shahnaz@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dr. (Cand.) Goldie Melinda Wijayanti, S.T.,M.T.',
                'email' => 'goldie@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Isye Susana Nurhasanah, ST., M.Si (Han), Ph.D (Cand.)',
                'email' => 'isye@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Helmia Adita Fitra, S.T., M.T., Ph.D (Cand.)',
                'email' => 'helmia@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Hafi Munirwan,S.T., M.Sc. Ph.D (Cand.)',
                'email' => 'hafi@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Adnin Musadri Asbi, S.Hut.,M.Sc. Ph.D (Cand.)',
                'email' => 'adnin@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dr. (Cand.) Tetty Harahap, S.T., M.Eng.',
                'email' => 'tetty@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Zulqadri Ansar S.T., M.T., Ph.D (Cand.)',
                'email' => 'zulqadiri@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dwi Bayu Prasetya, S.Si., M. Eng., Ph.D (Cand.)',
                'email' => 'dwi@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dr. (Cand.) Zenia F Saraswati, S.T., M.PWK.',
                'email' => 'zenia@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Adinda Sekar Tanjung, S.T., M.T.',
                'email' => 'adinda@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Baiq Rindang Aprildahani, S.T., M.T.',
                'email' => 'baiq@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Chania Rahmah MR, S.P.W.K., M.Sc.',
                'email' => 'chania@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dian Prasetyaning Sukmawati, S.T., M.T.',
                'email' => 'dian@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Fachri Muhammad Rasyid, S.P.W.K., M.URP.',
                'email' => 'fachri@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Fran Sinatra, S.P., M.T.',
                'email' => 'fran@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Hediyati Anisia Br Sinamo, S.P.W.K., M.P.W.K.',
                'email' => 'hediyati@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Ir. Jamaludin,S.T., M.Sc.',
                'email' => 'jamaludin@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Lestari P. Winata, M.P.W.K.',
                'email' => 'lestari@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Mia Ermawati, S.T., M.T.',
                'email' => 'mia@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Muhammad Abdul Mubdi Bindar, S.T., M.T.',
                'email' => 'muhammadabdul@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Muh. Abdi Danurja Rahman Aziz, S.T., M.R.K.',
                'email' => 'muhabdi@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Nela Agustin Kurnianingsih, S.T., M.T.',
                'email' => 'nela@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Ryansyah Izhar, S.T., M.P.W.K',
                'email' => 'ryansyah@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Valendya Rilansari, S.P.W.K., M.P.W.K.',
                'email' => 'valenda@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Verlina Agustine, S.P.W.K., M.P.W.K.',
                'email' => 'verlina@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Yudha Rahman, S.T., M.T.',
                'email' => 'yudha@email.com',
                'role' => 'dosen',
                'status' => 'aktif'
            ],
        ];

        $dataStaf = [
            [
                'name' => 'Koko Setiawan, S.Pd',
                'email' => 'koko@email.com',
                'role' => 'staff',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dela Fitriana, S.P.',
                'email' => 'dela@email.com',
                'role' => 'staff',
                'status' => 'aktif'
            ],
            [
                'name' => 'Octa Ardiyansyah, S.Kom',
                'email' => 'okta@email.com',
                'role' => 'staff',
                'status' => 'aktif'
            ],
            [
                'name' => 'Fachri Muhammad Rasyid, S.P.W.K',
                'email' => 'fachrimuhammad@email.com',
                'role' => 'staff',
                'status' => 'aktif'
            ],
        ];


        foreach ($DosenData as $dosen) {
            $dosens = User::factory()->create([
                'name' => $dosen['name'],
                'email' => $dosen['email'],
                'role' => $dosen['role'],
                'status' => $dosen['status']
            ]);

            DosenProfile::factory()->create([
                'expertise' => $dosen['expertise'] ?? null,
                'education' => $dosen['education'] ?? null,
                'user_id' => $dosens->id,
                'position' => null,
                // 'img' => "null"
                'img' => "https://ui-avatars.com/api/?name=Dosen+$dosens->id&background=random"
            ]);

            // Publikasi::factory(rand(3, 8))->create(['user_id' => $dosen->id]);

            // $matkuls = Matkul::inRandomOrder()->take(rand(2, 4))->get();
            // foreach ($matkuls as $matkul) {
            //     Jadwal::factory()->create([
            //         'matkul_id' => $matkul->id,
            //         'lecture' => $dosen->id,
            //         'class' => chr(65 + rand(0, 2)), // Random class A, B, or C
            //         'room' => rand(101, 105),
            //         'day' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'][rand(0, 4)],
            //         'start_time' => ['08:00', '10:00', '13:00', '15:00'][rand(0, 3)],
            //         'end_time' => ['10:00', '12:00', '15:00', '17:00'][rand(0, 3)],
            //         'user_id' => $dosen->id
            //     ]);
            // }
        }

        foreach ($dataStaf as $staf) {
            $stafs = User::factory()->create([
                'name' => $staf['name'],
                'email' => $staf['email'],
                'role' => $staf['role'],
                'status' => $staf['status']
            ]);

            DosenProfile::factory()->create([
                'user_id' => $stafs->id,
                'position' => 'staff',
                'img' => "https://ui-avatars.com/api/?name=Staff+$stafs->id&background=random"
            ]);
        }
    }
}
