<?php

namespace App\Repositories\Recipe;

use App\Models\Recipe;

class ColeccionsRecipeRepositories implements RecipeRepositories
{

    public function RecipeId(string $nameRecipe):int
    {        
        $recipe = Recipe::where('name',$nameRecipe) ->first();
        return   $recipe->id;
    }

    public function listRecipe()
    {        
        return Recipe::select('recipes.*', 'products.name as product_name', 'detail_recipes.quantity')
        ->join('detail_recipes', 'detail_recipes.recipe_id', '=', 'recipes.id')
        ->join('products', 'detail_recipes.product_id', '=', 'products.id')
        ->get();
    }

}