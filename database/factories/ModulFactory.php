<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Modul>
 */
class ModulFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $moduleTypes = [
            'Modul Teori' => [
                'Pengantar Konsep Dasar',
                'Teori dan Prinsip',
                'Landasan Teori',
                'Konsep Fundamental',
                'Dasar-dasar Teori'
            ],
            'Modul Praktikum' => [
                'Panduan Praktikum',
                'Langkah-langkah Praktikum',
                'Petunjuk Praktikum',
                'Prosedur Praktikum',
                'Metodologi Praktikum'
            ],
            'Modul Tutorial' => [
                'Tutorial Dasar',
                'Panduan Langkah-demi-Langkah',
                'Tutorial Praktis',
                'Panduan Aplikasi',
                'Tutorial Terapan'
            ],
            'Modul Latihan' => [
                'Latihan Soal',
                'Latihan Praktis',
                'Latihan Terapan',
                'Latihan Mandiri',
                'Latihan Kelompok'
            ],
            'Modul Referensi' => [
                'Referensi Tambahan',
                'Bahan Bacaan',
                'Literatur Pendukung',
                'Sumber Referensi',
                'Bahan Ajar Tambahan'
            ]
        ];

        $moduleType = fake()->randomElement(array_keys($moduleTypes));
        $moduleName = fake()->randomElement($moduleTypes[$moduleType]);
        $moduleNumber = fake()->numberBetween(1, 10);

        // Get all dosen IDs
        $dosenIds = User::where('role', 'dosen')->pluck('id')->toArray();

        return [
            'name' => $moduleType . ' ' . $moduleNumber . ': ' . $moduleName,
            'file' => 'modul_' . strtolower(str_replace(' ', '_', $moduleName)) . '.pdf',
            'img' => 'modul_' . fake()->numberBetween(1, 5) . '.jpg',
            'user_id' => fake()->randomElement($dosenIds)
        ];
    }
}
