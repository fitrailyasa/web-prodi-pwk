<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TentangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Tentang::factory(10)->create();

        \App\Models\Tentang::create([
            'name' => 'Perencanaan Wilayah Kota dan ITERA',
            'vision' => 'Program Studi Perencanaan Wilayah dan Kota ITERA Sebagai Program Studi Unggulan Di Pulau Sumatera yang Menghasilkan Perencana Wilayah dan Kota Berwawasan Teknologi, Inklusif dan Pembangunan Berkelanjutan',
            'mission' => json_encode([
                'Menyelenggarakan pendidikan tinggi di bidang perencanaan wilayah dan kota yang berkualitas dan berwawasan teknologi',
                'Melaksanakan penelitian di bidang perencanaan wilayah dan kota yang inovatif dan bermanfaat bagi masyarakat',
                'Melaksanakan pengabdian kepada masyarakat di bidang perencanaan wilayah dan kota yang berkelanjutan',
                'Mengembangkan kerjasama dengan berbagai pihak untuk meningkatkan kualitas pendidikan, penelitian, dan pengabdian masyarakat'
            ]),
            'goals' => json_encode([
                'Menghasilkan lulusan yang kompeten di bidang perencanaan wilayah dan kota',
                'Menghasilkan penelitian yang berkontribusi pada pengembangan ilmu pengetahuan dan teknologi',
                'Menghasilkan pengabdian masyarakat yang bermanfaat bagi pembangunan berkelanjutan',
                'Membangun jaringan kerjasama yang kuat dengan berbagai pihak'
            ]),
            'total_lecture' => 20,
            'total_student' => 500,
            'total_teaching_staff' => 10,
            'address' => 'Jl. Terusan Ryacudu, Way Huwi, Kec. Jati Agung, Kabupaten Lampung Selatan, Lampung 35365',
            'phone' => '(0721) 8030188',
            'email' => 'pwk@itera.ac.id',
            'description' => 'Program Studi Perencanaan Wilayah dan Kota (PWK) Institut Teknologi Sumatera (ITERA) merupakan program studi yang mempersiapkan mahasiswa untuk menjadi perencana wilayah dan kota yang profesional dan berwawasan teknologi.',
            'instagram_url' => 'https://instagram.com/pwk_itera',
            'youtube_url' => 'https://youtube.com/@pwk_itera',
            'tiktok_url' => 'https://tiktok.com/@pwk_itera',
            'latitude' => '-5.360070',
            'longitude' => '105.315312',
            'maps_url' => 'https://maps.google.com/?q=-5.360070,105.315312',
            'semester' => 'ganjil',
            'year' => '2024/2025',
            'user_id' => 1,
        ]);
    }
}
