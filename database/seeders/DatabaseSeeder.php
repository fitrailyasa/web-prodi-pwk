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
        $this->call(AlumniSeeder::class);
        $this->call(MatkulSeeder::class);
        $this->call(ModulSeeder::class);
        $this->call(MedpartSeeder::class);
        $this->call(LinkSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(BeritaSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(KalenderSeeder::class);
        $this->call(ChatbotSeeder::class);
        $this->call(KelompokKeahlianSeeder::class);
        // $this->call(MbkmSeeder::class);
        $this->call(SejarahSeeder::class);
        $this->call(DosenSeeder::class);
    }
}
