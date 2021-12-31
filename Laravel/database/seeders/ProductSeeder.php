<?php

namespace Database\Seeders;

use App\Models\{ Product, Category };
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::factory()->count(3)->for(Category::factory())->create();
    }
}
