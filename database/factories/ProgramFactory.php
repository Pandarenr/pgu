<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProgramFactory extends Factory
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
            'education_form' => $this->faker->name(),
            'duration' => $this->faker->name(),
            'listener_category' => $this->faker->name(),
            'program_category_id' => $this->faker->numberBetween(1,4),
            'creator_id' => 1
        ];
    }
}