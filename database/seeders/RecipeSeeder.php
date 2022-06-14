<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipe::create(['name'=>"Salad"]);
        Recipe::create(['name'=>"Chicken Rice"]);
        Recipe::create(['name'=>"Burger"]);
        Recipe::create(['name'=>"Tomato Cream"]);
        Recipe::create(['name'=>"Potatoes with meat"]);
        Recipe::create(['name'=>"Vegetables rice"]);
    }
}
