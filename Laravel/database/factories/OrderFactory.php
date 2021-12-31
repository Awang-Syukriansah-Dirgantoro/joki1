<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition()
    {
        return [
            'total' => $this->faker->numberBetween(1000, 20000),
            'status' => $this->faker->randomElement(['pending', 'success']),
        ];
    }
}
