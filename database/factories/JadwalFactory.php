<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Matkul;
use App\Models\User;

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
        $timeSlots = [
            ['start' => '07:00', 'end' => '08:40'],
            ['start' => '08:50', 'end' => '10:30'],
            ['start' => '10:40', 'end' => '12:20'],
            ['start' => '13:00', 'end' => '14:40'],
            ['start' => '14:50', 'end' => '16:30'],
            ['start' => '16:40', 'end' => '18:20'],
        ];

        $rooms = [
            'GK1' => ['101', '102', '103', '104', '105'],
            'GK2' => ['201', '202', '203', '204', '205'],
            'Labtek 1' => ['101', '102', '103'],
            'Labtek 2' => ['201', '202', '203'],
        ];

        $building = fake()->randomElement(array_keys($rooms));
        $room = $rooms[$building][array_rand($rooms[$building])];
        $timeSlot = fake()->randomElement($timeSlots);

        // Get all matkul IDs from the database
        $matkulIds = Matkul::pluck('id')->toArray();

        // Get all dosen IDs (users with role dosen)
        $dosenIds = User::where('role', 'dosen')->pluck('id')->toArray();

        return [
            'matkul_id' => fake()->randomElement($matkulIds),
            'class' => fake()->randomElement(['RA', 'RB', 'RC', 'RD', 'R']),
            'room' => $building . '-' . $room,
            'lecture' => fake()->randomElement($dosenIds),
            'day' => fake()->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']),
            'start_time' => $timeSlot['start'],
            'end_time' => $timeSlot['end'],
            'user_id' => fake()->randomElement($dosenIds)
        ];
    }
}
