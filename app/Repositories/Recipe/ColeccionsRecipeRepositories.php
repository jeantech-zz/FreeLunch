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

}