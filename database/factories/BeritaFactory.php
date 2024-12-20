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
        return [
            'name' => fake()->name(),
            'slug' => fake()->slug(),
            'desc' => fake()->realText(100),
            'status' => fake()->randomElement(['unpublish', 'publish']),
            'event_date' => fake()->date(),
            'publish_date' => fake()->date(),
            'tag_id' => 1,
            'user_id' => 1
        ];
    }
}
