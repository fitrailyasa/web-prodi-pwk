<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $firstname = strtolower(fake()->firstName());
        return [
            'name' => fake()->name() . ' S.P.W.K., M.P.W.K.',
            'email' => $firstname . '@pwk.itera.ac.id',
            'role' => 'dosen',
            'status' => 'aktif',
            'no_hp' => '081234567890',
            'password' => Hash::make('password'),
            'nip' => fake()->numberBetween(1000000000, 9999999999),
            'position' => fake()->randomElement(['Dosen', 'Tenaga Ahli', 'Tendik']),
            'img' => null,
            'email_verified_at' => now(),
        ];
    }
}
