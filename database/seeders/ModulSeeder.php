<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Modul::factory(10)->create();

        \App\Models\Modul::insert([
            [
                'id' => 1,
                'name' => 'Modul 1',
                'file' => 'file.pdf',
                'img' => 'logo.png',
                'matkul_id' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Modul 1',
                'file' => 'file.pdf',
                'img' => 'logo.png',
                'matkul_id' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Modul 1',
                'file' => 'file.pdf',
                'img' => 'logo.png',
                'matkul_id' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Modul 1',
                'file' => 'file.pdf',
                'img' => 'logo.png',
                'matkul_id' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 5,
                'name' => 'Modul 1',
                'file' => 'file.pdf',
                'img' => 'logo.png',
                'matkul_id' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 6,
                'name' => 'Modul 1',
                'file' => 'file.pdf',
                'img' => 'logo.png',
                'matkul_id' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 7,
                'name' => 'Modul 1',
                'file' => 'file.pdf',
                'img' => 'logo.png',
                'matkul_id' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 8,
                'name' => 'Modul 1',
                'file' => 'file.pdf',
                'img' => 'logo.png',
                'matkul_id' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 9,
                'name' => 'Modul 1',
                'file' => 'file.pdf',
                'img' => 'logo.png',
                'matkul_id' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 10,
                'name' => 'Modul 1',
                'file' => 'file.pdf',
                'img' => 'logo.png',
                'matkul_id' => 1,
                'user_id' => 1,
            ],
        ]);
    }
}
