<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{

    public function definition()
    {
        $datetime = $this->faker->dateTimeBetween('-1 day', 'now');
        return [
            "master_id" => $this->faker->numberBetween(1, 10),
            "name" => $this->faker->company(),
            'remember_token' => Str::random(10),
            'created_at' => $datetime,
            'updated_at' => $datetime
        ];
    }
}
