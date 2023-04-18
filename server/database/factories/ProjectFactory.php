<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
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
            'customer_id' => $this->faker->numberBetween(1, 100),
            'admin_id' => $this->faker->numberBetween(1, 100),
            'progress' => $this->faker->numberBetween(1, 100),
            'cost' => $this->faker->numberBetween(1000000, 10000000),
            'gross_profit' => $this->faker->numberBetween(1, 1000000),
            'description' => $this->faker->realText(),
            'date' => $datetime,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ];
    }
}
