<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Administrator',
                'email' => 'super@admin.com',
                'role' => 'admin',
                'status' => 'aktif',
                'no_hp' => '081234567890',
                'password' => Hash::make('password'),
                'nip' => fake()->numberBetween(1000000000, 9999999999),
                'position' => fake()->jobTitle(),
                'img' => 'logo.png',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'status' => 'aktif',
                'no_hp' => '081234567890',
                'password' => Hash::make('password'),
                'nip' => fake()->numberBetween(1000000000, 9999999999),
                'position' => fake()->jobTitle(),
                'img' => 'logo.png',
                'email_verified_at' => now(),
            ],
        ];
        User::query()->insert($users);
        \App\Models\User::factory(20)->create();
    }
}
