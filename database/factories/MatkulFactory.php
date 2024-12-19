<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

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
        // Generate a random start time
        $startTime = Carbon::createFromFormat('H:i', fake()->time('H:i'));

        // Add one hour to get the end time
        $endTime = $startTime->copy()->addHour();

        return [
            'name' => fake()->name(),
            'code' => fake()->randomElement(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z']) . fake()->numberBetween(100, 999),
            'credits' => fake()->numberBetween(1, 4),
            'class' => 'R' . fake()->randomElement(['A', 'B', 'C', 'D']),
            'room' => fake()->randomElement(['GK1', 'GK12', 'Labtek 1', 'Labtek 2']) . '-' . fake()->numberBetween(111, 444),
            'lecture' => fake()->numberBetween(3, 22),
            'day' => fake()->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']),
            'start_time' => $startTime->format('H:i'),
            'end_time' => $endTime->format('H:i'),
            'user_id' => 1
        ];
    }
}
