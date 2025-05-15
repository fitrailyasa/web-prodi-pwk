<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titles = [
            'Workshop AutoCAD untuk Mahasiswa Baru',
            'Seminar Teknologi Konstruksi Modern',
            'Pelatihan Manajemen Proyek Konstruksi',
            'Kuliah Umum: Sustainable Construction',
            'Workshop BIM (Building Information Modeling)',
            'Seminar K3 dalam Proyek Konstruksi',
            'Pelatihan Software Desain Struktur',
            'Workshop Estimasi Biaya Konstruksi',
            'Seminar Green Building Technology',
            'Pelatihan Sertifikasi Ahli K3 Konstruksi',
            'Workshop Teknologi Beton Modern',
            'Seminar Smart City Development',
            'Pelatihan Software Quantity Surveying',
            'Workshop Teknologi Precast Concrete',
            'Seminar Digitalisasi Konstruksi',
            'Pelatihan Software Project Management',
            'Workshop Teknologi Perkerasan Jalan',
            'Seminar Teknologi Bangunan Tahan Gempa',
            'Pelatihan Software Desain Interior',
            'Workshop Teknologi Konstruksi Ramah Lingkungan'
        ];

        return [
            'name' => fake()->unique()->randomElement($titles),
            'slug' => fake()->slug(),
            'desc' => fake()->realText(100),
            'status' => fake()->randomElement(['unpublish', 'publish']),
            'event_date' => fake()->dateTimeBetween('2025-01-01', '2025-12-31')->format('Y-m-d'),
            'publish_date' => fake()->dateTimeBetween('2025-01-01', '2025-12-31')->format('Y-m-d'),
            'img' => null,
            'views' => 100,
            'tag_id' => fake()->numberBetween(1, 20),
            'user_id' => 1
        ];
    }
}
