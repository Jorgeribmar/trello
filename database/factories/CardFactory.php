<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'card_name' => $this->faker->word(),
            'description' => $this->faker->word(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
