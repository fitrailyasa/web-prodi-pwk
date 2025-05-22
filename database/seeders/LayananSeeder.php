<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Layanan::insert([
            [
                'id' => 1,
                'name' => 'Form Pengajuan KP',
                'file' => 'file.pdf',
                'user_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Form Pengajuan KP',
                'file' => 'file.pdf',
                'user_id' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Form Pengajuan KP',         
                'file' => 'file.pdf',
                'user_id' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Form Pengajuan KP',            
                'file' => 'file.pdf',
                'user_id' => 1,
            ],
            [
                'id' => 5,
                'name' => 'Form Pengajuan KP',
                'file' => 'file.pdf',
                'user_id' => 1,
            ],
            [
                'id' => 6,
                'name' => 'Form Pengajuan KP',
                'file' => 'file.pdf',
                'user_id' => 1,
            ],
            [
                'id' => 7,
                'name' => 'Form Pengajuan KP',
                'file' => 'file.pdf',
                'user_id' => 1,
            ],
            [
                'id' => 8,
                'name' => 'Form Pengajuan KP',
                'file' => 'file.pdf',
                'user_id' => 1,
            ],
            [
                'id' => 9,
                'name' => 'Form Pengajuan KP',
                'file' => 'file.pdf',
                'user_id' => 1,
            ],
            [
                'id' => 10,
                'name' => 'Form Pengajuan KP',
                'file' => 'file.pdf',
                'user_id' => 1,
            ],
        ]);
    }
}
