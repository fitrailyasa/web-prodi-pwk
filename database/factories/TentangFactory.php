<?php

namespace Database\Factories;

use App\Models\Tentang;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TentangFactory extends Factory
{
    protected $model = Tentang::class;

    public function definition(): array
    {
        return [
            'name' => 'Perencanaan Wilayah Kota dan ITERA',
            'description' => $this->faker->paragraph,
            'vision' => 'Menjadi terbaik dalam pendidikan PWK',
            'mission' => ['Misi A', 'Misi B', 'Misi C'],
            'total_teaching_staff' => $this->faker->numberBetween(5, 20),
            'total_student' => $this->faker->numberBetween(100, 1000),
            'total_lecture' => $this->faker->numberBetween(5, 20),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'instagram_url' => 'https://instagram.com/pwk_itera',
            'youtube_url' => 'https://youtube.com/@pwk_itera',
            'tiktok_url' => 'https://tiktok.com/@pwk_itera',
            'latitude' => '-5.360070',
            'longitude' => '105.315312',
            'maps_url' => 'https://maps.google.com/?q=-5.360070,105.315312',
            'user_id' => User::factory(), // auto-buat user jika belum ada
        ];
    }
}
