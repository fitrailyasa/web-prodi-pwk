<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(TentangSeeder::class);
        $this->call(LayananSeeder::class);
        $this->call(AlumniSeeder::class);
        $this->call(StaffSeeder::class);
        $this->call(MatkulSeeder::class);
        $this->call(MedpartSeeder::class);
        $this->call(JadwalSeeder::class);
        $this->call(LinkSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(BeritaSeeder::class);
        $this->call(TagSeeder::class);
    }
}