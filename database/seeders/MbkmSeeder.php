<?php

namespace Database\Seeders;

use App\Models\Mbkm;
use Illuminate\Database\Seeder;

class MbkmSeeder extends Seeder
{
    public function run()
    {
        $mbkmPrograms = [
            [
                'title' => 'Pertukaran Pelajar',
                'description' => 'Program pertukaran pelajar memungkinkan mahasiswa untuk belajar di perguruan tinggi lain di dalam atau luar negeri selama satu semester atau satu tahun.',
                'benefits' => [
                    'Meningkatkan wawasan dan pengalaman belajar',
                    'Mengembangkan jaringan internasional',
                    'Meningkatkan kemampuan bahasa asing'
                ],
                'link' => '#',
                'user_id' => 1
            ],
            [
                'title' => 'Magang/Praktik Kerja',
                'description' => 'Program magang atau praktik kerja memberikan kesempatan kepada mahasiswa untuk mendapatkan pengalaman kerja langsung di industri atau instansi pemerintah.',
                'benefits' => [
                    'Mendapatkan pengalaman kerja nyata',
                    'Mengembangkan keterampilan profesional',
                    'Membangun jaringan industri'
                ],
                'link' => '#',
                'user_id' => 1
            ],
            [
                'title' => 'Asistensi Mengajar',
                'description' => 'Program asistensi mengajar memungkinkan mahasiswa untuk membantu proses pembelajaran di sekolah atau perguruan tinggi lain.',
                'benefits' => [
                    'Mengembangkan kemampuan mengajar',
                    'Meningkatkan pemahaman materi',
                    'Mengasah kemampuan komunikasi'
                ],
                'link' => '#',
                'user_id' => 1
            ],
            [
                'title' => 'Penelitian/Riset',
                'description' => 'Program penelitian atau riset memberikan kesempatan kepada mahasiswa untuk terlibat dalam proyek penelitian di perguruan tinggi atau lembaga penelitian.',
                'benefits' => [
                    'Mengembangkan kemampuan penelitian',
                    'Meningkatkan pemahaman metodologi penelitian',
                    'Mengasah kemampuan analisis'
                ],
                'link' => '#',
                'user_id' => 1
            ],
            [
                'title' => 'Proyek Kemanusiaan',
                'description' => 'Program proyek kemanusiaan memungkinkan mahasiswa untuk terlibat dalam kegiatan sosial dan kemanusiaan di masyarakat.',
                'benefits' => [
                    'Mengembangkan kepedulian sosial',
                    'Meningkatkan kemampuan kerja tim',
                    'Mengasah kemampuan problem solving'
                ],
                'link' => '#',
                'user_id' => 1
            ],
            [
                'title' => 'Kegiatan Wirausaha',
                'description' => 'Program kegiatan wirausaha memberikan kesempatan kepada mahasiswa untuk mengembangkan ide bisnis dan memulai usaha.',
                'benefits' => [
                    'Mengembangkan jiwa kewirausahaan',
                    'Meningkatkan kemampuan manajemen bisnis',
                    'Mengasah kemampuan kreativitas'
                ],
                'link' => '#',
                'user_id' => 1
            ]
        ];

        foreach ($mbkmPrograms as $data) {
            Mbkm::create($data);
        }
    }
}
