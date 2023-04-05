<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MasterFactory extends Factory
{

    public function definition()
    {
        $datetime = $this->faker->dateTimeBetween('-1 day', 'now');
        return [
            "name" => $this->faker->company(),
            "administrator" => 0,
            "stripe" => $this->faker->unique()->regexify('[a-z0-9]{8}'),
            'remember_token' => Str::random(10),
            'created_at' => $datetime,
            'updated_at' => $datetime
        ];
    }
}
