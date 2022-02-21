<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(400),
            'form' => $this->faker->name(),
            'duration' => $this->faker->name(),
            'kategory' => $this->faker->name(),
            'subject_id' => $this->faker->numberBetween(1,4),
            'creator_id' => $this->faker->numberBetween(1,1),
        ];
    }
}