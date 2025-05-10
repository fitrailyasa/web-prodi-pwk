<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => $this->faker->randomElement(['admin', 'dosen', 'user']),
            'status' => $this->faker->randomElement(['aktif', 'tidak aktif']),
        ];
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function dosen()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'dosen',
                'status' => 'aktif'
            ];
        });
    }

    public function staff()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'staff',
                'status' => 'aktif'
            ];
        });
    }

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'admin',
                'status' => 'aktif'
            ];
        });
    }
}
