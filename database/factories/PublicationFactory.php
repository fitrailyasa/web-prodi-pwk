<?php

namespace Database\Factories;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublicationFactory extends Factory
{
    protected $model = Publication::class;

    public function definition()
    {
        $types = ['journal', 'conference', 'book', 'patent'];
        $year = $this->faker->numberBetween(2010, 2024);

        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'type' => $this->faker->randomElement($types),
            'publisher' => $this->faker->company(),
            'year' => (string) $year,
            'link' => $this->faker->url(),
            'description' => $this->faker->paragraph(),
        ];
    }
}
