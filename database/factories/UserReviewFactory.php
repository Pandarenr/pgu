<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text' => $this->faker->text(30),
            'user_id' => 3,
            'moderated' => 1,
            'rating' => $this->faker->numberBetween(1,5)
        ];
    }
}
