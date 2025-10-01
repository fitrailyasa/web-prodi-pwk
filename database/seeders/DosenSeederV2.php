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
                'name' => 'Dr. Asirin, S.T., M.T.',
                'email' => 'asirin@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'koordinator',
                'expertise' => '-',
                'education' => 'Doktor (S3) Ilmu Perencanaan Pembangunan Wilayah dan Perdesaan, IPB University (2024/On Going)',
                'status' => 'aktif'
            ],
            [
                'name' => 'Prof. Ibnu Syabri, B.Sc., M.Sc., Ph.D',
                'email' => 'ibnu@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'expertise' => 'KK Pengelolaan Pembangunan dan Pengembangan Kebijakan',
                'education' => 'S3 Kochi University Of Technology, KOCHI UNIVERSITY OF - Jepang 2012',
                'status' => 'aktif'
            ],
            [
                'name' => 'Prof. Ir. Harkunti Pertiwi Rahayu, Ph.D.',
                'email' => 'hakunti@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'expertise' => 'KK Pengelolaan Pembangunan dan Pengembangan Kebijakan',
                'education' => 'Kochi University Of Technology, KOCHI UNIVERSITY OF - Jepang 2012',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dr. Eng. IB. Ilham Malik, S.T., M.T.',
                'email' => 'ilham@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'M. Bobby Rahman., S.T., M.Si (Han)., Ph.D.',
                'email' => 'bobby@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dr. Asnani, S.Sos.,M.A.',
                'email' => 'asnani@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dr. M. Zainal Ibad, S.T., M.T.',
                'email' => 'zainal@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dr. Husna Tiara Putri, S.T., M.T.',
                'email' => 'husna@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Shahnaz Nabila Fuady S.T., M.T., Ph.D.',
                'email' => 'shahnaz@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dr. (Cand.) Goldie Melinda Wijayanti, S.T.,M.T.',
                'email' => 'goldie@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Isye Susana Nurhasanah, ST., M.Si (Han), Ph.D (Cand.)',
                'email' => 'isye@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Helmia Adita Fitra, S.T., M.T., Ph.D (Cand.)',
                'email' => 'helmia@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Hafi Munirwan,S.T., M.Sc. Ph.D (Cand.)',
                'email' => 'hafi@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Adnin Musadri Asbi, S.Hut.,M.Sc. Ph.D (Cand.)',
                'email' => 'adnin@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dr. (Cand.) Tetty Harahap, S.T., M.Eng.',
                'email' => 'tetty@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Zulqadri Ansar S.T., M.T., Ph.D (Cand.)',
                'email' => 'zulqadiri@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dwi Bayu Prasetya, S.Si., M. Eng., Ph.D (Cand.)',
                'email' => 'dwi@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dr. (Cand.) Zenia F Saraswati, S.T., M.PWK.',
                'email' => 'zenia@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Adinda Sekar Tanjung, S.T., M.T.',
                'email' => 'adinda@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Baiq Rindang Aprildahani, S.T., M.T.',
                'email' => 'baiq@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Chania Rahmah MR, S.P.W.K., M.Sc.',
                'email' => 'chania@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dian Prasetyaning Sukmawati, S.T., M.T.',
                'email' => 'dian@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Fachri Muhammad Rasyid, S.P.W.K., M.URP.',
                'email' => 'fachri@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Fran Sinatra, S.P., M.T.',
                'email' => 'fran@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Hediyati Anisia Br Sinamo, S.P.W.K., M.P.W.K.',
                'email' => 'hediyati@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Ir. Jamaludin,S.T., M.Sc.',
                'email' => 'jamaludin@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Lestari P. Winata, M.P.W.K.',
                'email' => 'lestari@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Mia Ermawati, S.T., M.T.',
                'email' => 'mia@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Muhammad Abdul Mubdi Bindar, S.T., M.T.',
                'email' => 'muhammadabdul@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Muh. Abdi Danurja Rahman Aziz, S.T., M.R.K.',
                'email' => 'muhabdi@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Nela Agustin Kurnianingsih, S.T., M.T.',
                'email' => 'nela@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Ryansyah Izhar, S.T., M.P.W.K',
                'email' => 'ryansyah@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Valendya Rilansari, S.P.W.K., M.P.W.K.',
                'email' => 'valenda@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Verlina Agustine, S.P.W.K., M.P.W.K.',
                'email' => 'verlina@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
            [
                'name' => 'Yudha Rahman, S.T., M.T.',
                'email' => 'yudha@pwk.itera.ac.id',
                'role' => 'dosen',
                'position' => 'dosen',
                'status' => 'aktif'
            ],
        ];

        $dataStaf = [
            [
                'name' => 'Koko Setiawan, S.Pd',
                'email' => 'koko@pwk.itera.ac.id',
                'role' => 'staff',
                'position' => 'staff',
                'status' => 'aktif'
            ],
            [
                'name' => 'Dela Fitriana, S.P.',
                'email' => 'dela@pwk.itera.ac.id',
                'role' => 'staff',
                'position' => 'staff',
                'status' => 'aktif'
            ],
            [
                'name' => 'Octa Ardiyansyah, S.Kom',
                'email' => 'okta@pwk.itera.ac.id',
                'role' => 'staff',
                'position' => 'staff',
                'status' => 'aktif'
            ],
            [
                'name' => 'Fachri Muhammad Rasyid, S.P.W.K',
                'email' => 'fachrimuhammad@pwk.itera.ac.id',
                'role' => 'staff',
                'position' => 'staff',
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
                'position' => $dosen['position'] ?? null,
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
