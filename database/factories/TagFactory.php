<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tags = [
            'Akademik',
            'Kurikulum',
            'Praktikum',
            'Seminar',
            'Workshop',
            'Kuliah Umum',
            'Beasiswa',
            'Prestasi',
            'Penelitian',
            'Pengabdian',
            'Kerjasama',
            'Alumni',
            'Fasilitas',
            'Laboratorium',
            'Praktik Lapangan',
            'Magang',
            'Skripsi',
            'Tugas Akhir',
            'Konsultasi',
            'Bimbingan'
        ];

        return [
            'name' => fake()->unique()->randomElement($tags),
            'user_id' => 1
        ];
    }
}
