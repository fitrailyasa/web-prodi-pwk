<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jadwal>
 */
class JadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'matkul_id' => fake()->numberBetween(1, 20),
            'class' => fake()->randomElement(['R' . fake()->randomElement(['A', 'B', 'C', 'D']), 'R']),
            'room' => fake()->randomElement(['GK1', 'GK12', 'Labtek 1', 'Labtek 2']) . '-' . fake()->numberBetween(111, 444),
            'lecture' => fake()->numberBetween(3, 22),
            'day' => fake()->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']),
            'start_time' => fake()->time('H:i'),
            'end_time' => fake()->time('H:i'),
            'user_id' => 1
        ];
    }
}
