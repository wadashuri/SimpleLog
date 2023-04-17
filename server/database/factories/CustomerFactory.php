<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $datetime = $this->faker->dateTimeBetween('-1 day', 'now');

        return [
            'admin_id' => $this->faker->numberBetween(1, 100),
            'created_at' => $datetime,
            'updated_at' => $datetime
        ];
    }
}
