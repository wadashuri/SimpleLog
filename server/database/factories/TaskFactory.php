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
        return [
            'project_id' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->randomElement([0, 1, 5, 8, 10]),
            'published_at' => $datetime,
            'closed_at' => now()->format('Y-m-d H:i:s'),
            'created_at' => $datetime,
            'updated_at' => $datetime
        ];
    }
}
