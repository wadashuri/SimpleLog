<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $datetime = $this->faker->dateTimeBetween('-1 day', 'now');
        $date = $datetime->format("Y-m-d H:i");

        $admin_id = $this->faker->optional()->numberBetween(1, 100);
        return [
            'project_id' => $this->faker->numberBetween(1, 100),
            'admin_id' => $admin_id,
            'user_id' => $admin_id ? null : $this->faker->numberBetween(1, 100),
            'status' => $this->faker->randomElement([0, 1, 5, 8, 10]),
            'start' => $this->faker->dateTimeBetween('-1 day', 'now')->format("Y-m-d H:i"),
            'end' => $this->faker->dateTimeBetween($date, 'now')->format("Y-m-d H:i"),
            'created_at' => $datetime,
            'updated_at' => $datetime
        ];
    }
}
