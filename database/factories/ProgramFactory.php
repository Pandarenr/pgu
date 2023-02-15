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
            'duration' => $this->faker->name(),
            'cost' => $this->faker->numberBetween(1000,5000),
            'education_form_id' => $this->faker->numberBetween(1,2),
            'listener_category_id' => $this->faker->numberBetween(1,2),
            'program_category_id' => $this->faker->numberBetween(1,4),
        ];
    }
}