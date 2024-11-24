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
            'class_year' => fake()->numberBetween(2000, 2022),
            'work' => fake()->jobTitle(), 
            'img' => 'logo-putih.png', 
            'user_id' => 1
        ];
    }
}
