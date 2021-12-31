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
        $categories = ['tshirt', 'hoodie', 'jacket', 'jeans', 'sneaker'];
        foreach($categories as $category) {
            Category::create(['name' => $category]);
        }
        User::factory(5)->create();
        $user = User::factory()->create(['name' => 'test']);
        $order = Order::factory()->for($user)->create();
        $products = Product::factory(3)->for(Category::factory())->create();
        foreach ($products as $product) {
            Cart::factory()->for($product)->for($order)->create();
        }
    }
}
