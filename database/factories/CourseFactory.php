<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        $semesters = ['ganjil', 'genap'];
        $credits = [2, 3, 4];

        return [
            'user_id' => User::factory(),
            'name' => $this->faker->words(3, true),
            'code' => strtoupper($this->faker->bothify('??###')),
            'credits' => $this->faker->randomElement($credits),
            'description' => $this->faker->paragraph(),
            'semester' => $this->faker->randomElement($semesters),
        ];
    }
}
