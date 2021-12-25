<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    public function definition()
    {
        return [
            'qty' => $this->faker->numberBetween(1, 10),
            'subtotal' => $this->faker->numberBetween(1000, 20000),
        ];
    }
}
