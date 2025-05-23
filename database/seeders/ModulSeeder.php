<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Modul;
use App\Models\Matkul;

class ModulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all matkul IDs
        $matkulIds = Matkul::pluck('id')->toArray();

        // Generate 5 modules for each matkul
        foreach ($matkulIds as $matkulId) {
            Modul::factory(5)->create([
                'matkul_id' => $matkulId
            ]);
        }
    }
}
