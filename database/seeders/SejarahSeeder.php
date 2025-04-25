<?php

namespace Database\Seeders;

use App\Models\Sejarah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SejarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timelineEvents = [
            [
                'year' => '2014',
                'title' => 'Pendirian Program Studi',
                'description' => 'Program Studi Perencanaan Wilayah dan Kota (PWK) Institut Teknologi Sumatera (ITERA) didirikan sebagai salah satu program studi di bawah naungan Fakultas Teknik Sipil dan Perencanaan (FTSP) ITERA.',
                'user_id' => 1
            ],
            [
                'year' => '2015',
                'title' => 'Penerimaan Mahasiswa Pertama',
                'description' => 'Program Studi PWK ITERA menerima mahasiswa angkatan pertama dan memulai proses pembelajaran dengan kurikulum yang disesuaikan dengan kebutuhan industri dan perkembangan ilmu pengetahuan.',
                'user_id' => 1
            ],
            [
                'year' => '2018',
                'title' => 'Akreditasi Pertama',
                'description' => 'Program Studi PWK ITERA mendapatkan akreditasi pertama dari Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT) sebagai pengakuan atas kualitas pendidikan yang diselenggarakan.',
                'user_id' => 1
            ],
            [
                'year' => '2020',
                'title' => 'Pengembangan Laboratorium',
                'description' => 'Program Studi PWK ITERA mengembangkan laboratorium untuk mendukung proses pembelajaran dan penelitian di bidang perencanaan wilayah dan kota.',
                'user_id' => 1
            ],
            [
                'year' => '2023',
                'title' => 'Kerjasama dengan Industri',
                'description' => 'Program Studi PWK ITERA menjalin kerjasama dengan berbagai instansi pemerintah dan swasta untuk meningkatkan kualitas pendidikan dan penelitian.',
                'user_id' => 1
            ]
        ];

        foreach ($timelineEvents as $event) {
            Sejarah::create($event);
        }
    }
}
