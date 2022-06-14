<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(['name'=>"tomato"]);
        Product::create(['name'=>"lemon"]);
        Product::create(['name'=>"potato"]);
        Product::create(['name'=>"rice"]);
        Product::create(['name'=>"ketchup"]);
        Product::create(['name'=>"lettuce"]);
        Product::create(['name'=>"onion"]);
        Product::create(['name'=>"cheese"]);
        Product::create(['name'=>"meat"]);
        Product::create(['name'=>"chicken"]);
    }
}
