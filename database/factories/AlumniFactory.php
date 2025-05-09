<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumni>
 */
class AlumniFactory extends Factory
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
            'class_year' => fake()->numberBetween(2016, 2020),
            'graduation_year' => fake()->numberBetween(2024, 2028),
            'work' => fake()->jobTitle(),
            'company' => fake()->company(),
            'img' => null,
            'user_id' => 1
        ];
    }
}
