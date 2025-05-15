<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titles = [
            'Pembukaan Pendaftaran Beasiswa Semester Genap 2025',
            'Jadwal Ujian Tengah Semester Genap 2025',
            'Pengumuman Hasil Seleksi Beasiswa Prestasi',
            'Workshop Penulisan Karya Ilmiah untuk Mahasiswa',
            'Seminar Nasional Teknologi dan Pembangunan',
            'Praktikum Lapangan di Proyek Infrastruktur Kota',
            'Kunjungan Industri ke Perusahaan Konstruksi',
            'Pelatihan Software Desain Arsitektur',
            'Pengumuman Jadwal Wisuda Periode Maret 2025',
            'Pembukaan Program Magang Industri',
            'Seminar Proposal Tugas Akhir',
            'Workshop Teknologi Konstruksi Modern',
            'Pengumuman Hasil Seleksi Program Kampus Merdeka',
            'Kuliah Umum: Tren Pembangunan Berkelanjutan',
            'Praktikum Laboratorium Material Konstruksi',
            'Pengumuman Jadwal KRS Online Semester Genap',
            'Seminar Internasional Teknologi Konstruksi',
            'Workshop Manajemen Proyek Konstruksi',
            'Pengumuman Hasil Ujian Akhir Semester',
            'Pelatihan Sertifikasi Profesi Konstruksi'
        ];

        return [
            'name' => fake()->unique()->randomElement($titles),
            'slug' => fake()->slug(),
            'desc' => fake()->realText(100),
            'status' => fake()->randomElement(['unpublish', 'publish']),
            'event_date' => fake()->dateTimeBetween('2025-01-01', '2025-12-31')->format('Y-m-d'),
            'publish_date' => fake()->dateTimeBetween('2025-01-01', '2025-12-31')->format('Y-m-d'),
            'img' => 'logo.png',
            'views' => 100,
            'tag_id' => fake()->numberBetween(1, 20),
            'user_id' => 1
        ];
    }
}
