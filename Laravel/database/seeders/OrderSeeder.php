<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\{ Cart, User, Order };

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::factory()->has(
            Cart::factory()->for(
                Product::factory()->forCategory([
                    'name' => bin2hex(random_bytes(10))
                ])
            )
        )->for(User::factory())->create();
    }
}
