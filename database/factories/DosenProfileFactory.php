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
            'nip' => $this->faker->numerify('##############'),
            'nidn' => $this->faker->numerify('##########'),
            'google_scholar' => $this->faker->url(),
            'scopus_id' => $this->faker->numerify('##########'),
            'sinta_id' => $this->faker->numerify('##########'),
            'orcid_id' => $this->faker->numerify('##########'),
            'research_interests' => $this->faker->paragraphs(2, true),
            'achievements' => $this->faker->paragraphs(3, true),
        ];
    }
}
