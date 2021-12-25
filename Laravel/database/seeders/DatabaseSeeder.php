<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(5)->create();
        $user = User::factory()->create(['name' => 'test']);
        Category::factory(4)->create();
        $order = Order::factory()->for($user)->create();
        $products = Product::factory(3)->for(Category::factory())->create();
        foreach ($products as $product) {
            Cart::factory()->for($product)->for($order)->create();
        }
    }
}
