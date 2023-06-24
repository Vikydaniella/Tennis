<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TennisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tournament_name' => $this->faker->name,
            'tournament_point' => $this->faker->randomNumber,
            'number_of_players' => $this->faker->randomNumber,
        ];
    }
}
