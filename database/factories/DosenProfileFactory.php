<?php

namespace Database\Factories;

use App\Models\DosenProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DosenProfileFactory extends Factory
{
    protected $model = DosenProfile::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'bio' => $this->faker->paragraphs(2, true),
            'nip' => $this->faker->numerify('##############'),
            'nidn' => $this->faker->numerify('##########'),
            'position' => $this->faker->randomElement(['dosen', 'koordinator']),
            'education' => $this->faker->randomElement(['S1', 'S2', 'S3']),
            'expertise' => $this->faker->words(3, true),
            'google_scholar' => $this->faker->url(),
            'scopus_id' => $this->faker->numerify('##########'),
            'sinta_id' => $this->faker->numerify('##########'),
            'research_interests' => $this->faker->paragraphs(2, true),
            'achievements' => $this->faker->paragraphs(3, true),
            'img' => $this->faker->imageUrl(640, 480, 'people'),
            'whatsapp' => $this->faker->phoneNumber(),
            'linkedin' => $this->faker->url(),
            'other' => $this->faker->paragraphs(3, true),
        ];
    }
}
