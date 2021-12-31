<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'price' => $this->faker->numberBetween(1000, 20000),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
