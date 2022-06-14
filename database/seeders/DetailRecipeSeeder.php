<?php

namespace Database\Seeders;

use App\Models\DetailRecipe;
use App\Repositories\Recipe\ColeccionsRecipeRepositories;
use App\Repositories\Product\ColeccionsProductRepositories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DetailRecipeSeeder extends Seeder
{
    private ColeccionsRecipeRepositories $coleccionRecipe;
    private ColeccionsProductRepositories $coleccionProduct;

    public function __construct()
    {
        $this->coleccionRecipe = new ColeccionsRecipeRepositories;
        $this->coleccionProduct = new ColeccionsProductRepositories;
    }

    public function run():void
    {
        //Salad
        $salad = $this->coleccionRecipe->RecipeId('Salad');
        DetailRecipe::create([
            'recipe_id'=>  $salad,
            'product_id'=> $this->coleccionProduct->productId('tomato'),
            'quantity'=> 1,
        ]);

        DetailRecipe::create([
            'recipe_id'=>  $salad,
            'product_id'=> $this->coleccionProduct->productId('lemon'),
            'quantity'=> 1,
        ]);

        DetailRecipe::create([
            'recipe_id'=>  $salad,
            'product_id'=> $this->coleccionProduct->productId('lettuce'),
            'quantity'=> 1,
        ]);

        DetailRecipe::create([
            'recipe_id'=>  $salad,
            'product_id'=> $this->coleccionProduct->productId('lettuce'),
            'quantity'=> 1,
        ]);

        DetailRecipe::create([
            'recipe_id'=>  $salad,
            'product_id'=> $this->coleccionProduct->productId('lettuce'),
            'quantity'=> 1,
        ]);

        DetailRecipe::create([
            'recipe_id'=>  $salad,
            'product_id'=>$this->coleccionProduct->productId('lettuce'),
            'quantity'=> 1,
        ]);

        //Chicken Rice
        $chickenRice = $this->coleccionRecipe->RecipeId('Chicken Rice');
        DetailRecipe::create([
            'recipe_id'=>  $chickenRice,
            'product_id'=> $this->coleccionProduct->productId('rice'),
            'quantity'=> 2,
        ]);

        DetailRecipe::create([
            'recipe_id'=>  $chickenRice,
            'product_id'=> $this->coleccionProduct->productId('chicken'),
            'quantity'=> 2,
        ]);

        //Burger
        $burger = $this->coleccionRecipe->RecipeId('Burger');
        DetailRecipe::create([
            'recipe_id'=>  $burger,
            'product_id'=> $this->coleccionProduct->productId('tomato'),
            'quantity'=> 1,
        ]);

        DetailRecipe::create([
            'recipe_id'=>  $burger,
            'product_id'=> $this->coleccionProduct->productId('ketchup'),
            'quantity'=> 1,
        ]);

        DetailRecipe::create([
            'recipe_id'=>  $burger,
            'product_id'=> $this->coleccionProduct->productId('lettuce'),
            'quantity'=> 1,
        ]);

        DetailRecipe::create([
            'recipe_id'=>  $burger,
            'product_id'=> $this->coleccionProduct->productId('onion'),
            'quantity'=> 1,
        ]);

        DetailRecipe::create([
            'recipe_id'=>  $burger,
            'product_id'=> $this->coleccionProduct->productId('cheese'),
            'quantity'=> 1,
        ]);

        DetailRecipe::create([
            'recipe_id'=>  $burger,
            'product_id'=> $this->coleccionProduct->productId('meat'),
            'quantity'=> 1,
        ]);

        //Tomato Cream
        $tomatoCream = $this->coleccionRecipe->RecipeId('Tomato Cream');
        DetailRecipe::create([
            'recipe_id'=>  $tomatoCream,
            'product_id'=> $this->coleccionProduct->productId('tomato'),
            'quantity'=> 2,
        ]);

        DetailRecipe::create([
            'recipe_id'=>  $tomatoCream,
            'product_id'=> $this->coleccionProduct->productId('potato'),
            'quantity'=> 2,
        ]);

        DetailRecipe::create([
            'recipe_id'=>  $tomatoCream,
            'product_id'=> $this->coleccionProduct->productId('onion'),
            'quantity'=> 2,
        ]);

        //Potatoes with meat
        $potatoesMeat = $this->coleccionRecipe->RecipeId('Potatoes with meat');
        DetailRecipe::create([
              'recipe_id'=>  $potatoesMeat,
              'product_id'=> $this->coleccionProduct->productId('potato'),
              'quantity'=> 2,
        ]);

        DetailRecipe::create([
            'recipe_id'=>  $potatoesMeat,
            'product_id'=> $this->coleccionProduct->productId('ketchup'),
            'quantity'=> 1,
        ]);

        DetailRecipe::create([
            'recipe_id'=>  $potatoesMeat,
            'product_id'=> $this->coleccionProduct->productId('cheese'),
            'quantity'=> 1,
        ]);

        DetailRecipe::create([
            'recipe_id'=>  $potatoesMeat,
            'product_id'=> $this->coleccionProduct->productId('meat'),
            'quantity'=> 2,
        ]);

        //Chicken rice
        $chickenRice = $this->coleccionRecipe->RecipeId('Chicken rice');
        DetailRecipe::create([
              'recipe_id'=>  $chickenRice,
              'product_id'=> $this->coleccionProduct->productId('rice'),
              'quantity'=> 2,
        ]);

        DetailRecipe::create([
              'recipe_id'=>  $chickenRice,
              'product_id'=> $this->coleccionProduct->productId('chicken'),
              'quantity'=> 2,
        ]);
    }
}
