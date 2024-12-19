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
            'mission' => "<ol><li>test<\/li><li>test<\/li><\/ol>",
            'goals' => "<ol><li>test<\/li><li>test<\/li><\/ol>",
            'total_lecture' => 100,
            'total_student' => 100,
            'total_teaching_staff' => 100,
            'user_id' => 1,
        ]);
    }
}
