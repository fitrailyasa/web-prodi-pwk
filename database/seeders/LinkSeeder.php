<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Link::factory(10)->create();

        \App\Models\Link::insert([
            [
                'id' => 1,
                'name' => 'Siakad',
                'desc' => 'Sistem Informasi Akademik Institut Teknologi Sumatera',
                'link' => 'https://siakad.itera.ac.id/',
                'category' => 'akademik',
                'user_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'E-Learning',
                'desc' => 'E-Learning Institut Teknologi Sumatera',
                'link' => 'https://kuliah.itera.ac.id/',
                'category' => 'akademik',
                'user_id' => 1,
            ],
            [
                'id' => 3,
                'name' => 'KKN',
                'desc' => 'Kuliah Kerja Nyata Institut Teknologi Sumatera',
                'link' => 'https://kkn.itera.ac.id/',
                'category' => 'akademik',
                'user_id' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Jurnal',
                'desc' => 'Jurnal Institut Teknologi Sumatera',
                'link' => 'https://repo.itera.ac.id/',
                'category' => 'akademik',
                'user_id' => 1,
            ],
            [
                'id' => 5,
                'name' => 'Website ITERA',
                'desc' => 'Website Institut Teknologi Sumatera',
                'link' => 'https://itera.ac.id/',
                'category' => 'fasilitas',
                'user_id' => 1,
            ],
            [
                'id' => 6,
                'name' => 'Perpustakaan',
                'desc' => 'Perpustakaan Institut Teknologi Sumatera',
                'link' => 'https://perpustakaan.itera.ac.id/',
                'category' => 'fasilitas',
                'user_id' => 1,
            ],
            [
                'id' => 7,
                'name' => 'Laboratorium',
                'desc' => 'Laboratorium Institut Teknologi Sumatera',
                'link' => 'https://silabor.itera.ac.id/',
                'category' => 'fasilitas',
                'user_id' => 1,
            ],
            [
                'id' => 8,
                'name' => 'Kemahasiswaan',
                'desc' => 'Kemahasiswaan Institut Teknologi Sumatera',
                'link' => 'https://kemahasiswaan.itera.ac.id/',
                'category' => 'fasilitas',
                'user_id' => 1,
            ],
            [
                'id' => 9,
                'name' => 'Helpdesk',
                'desc' => 'Helpdesk Institut Teknologi Sumatera',
                'link' => 'https://helpdesk.itera.ac.id/',
                'category' => 'fasilitas',
                'user_id' => 1,
            ],
            [
                'id' => 10,
                'name' => 'TOEFL',
                'desc' => 'TOEFL Incite Institut Teknologi Sumatera',
                'link' => 'https://incite.itera.ac.id/',
                'category' => 'fasilitas',
                'user_id' => 1,
            ],
        ]);
    }
}
