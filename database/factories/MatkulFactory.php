<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matkul>
 */
class MatkulFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'desc' => fake()->realText(100),
            'credits' => fake()->numberBetween(1, 4),
            'lecture' => fake()->name(),
            'img' => 'logo.png',
            'jadwal_id' => 1,
            'user_id' => 1
        ];
    }
}
