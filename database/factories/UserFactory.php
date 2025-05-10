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
        $roles = ['admin', 'dosen', 'staff'];
        $positions = ['koordinator', 'sekretaris', 'bendahara', 'staf', null];
        $role = $this->faker->randomElement($roles);
        $position = $role === 'dosen' ? $this->faker->randomElement($positions) : null;

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => $role,
            'position' => $position,
            'img' => $this->faker->imageUrl(400, 400, 'people'),
            'whatsapp' => $this->faker->phoneNumber(),
            'linkedin' => $this->faker->url(),
            'bio' => $this->faker->paragraphs(2, true),
            'education' => $this->faker->paragraphs(3, true),
            'expertise' => $this->faker->words(5, true),
            'status' => 'aktif',
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
                'position' => $this->faker->randomElement(['koordinator', 'sekretaris', 'bendahara', null]),
            ];
        });
    }

    public function staff()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'staff',
                'position' => 'staf',
            ];
        });
    }

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'admin',
                'position' => null,
            ];
        });
    }
}
