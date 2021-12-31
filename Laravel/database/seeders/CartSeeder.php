<?php

namespace Database\Seeders;

use App\Models\{ Cart, User, Order, Product, Category };
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    public function run()
    {
        $order = Order::factory()->for(User::factory())->create();
        $category = Category::factory()->create();

        $products = Product::factory()->for($category)->count(3)->create();

        foreach ($products as $product) {
            Cart::factory()->for($product)->for($order)->create();
        }
    }
}
