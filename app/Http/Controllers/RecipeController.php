<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Repositories\Recipe\ColeccionsRecipeRepositories;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    private ColeccionsRecipeRepositories $coleccionRecipe;

    public function __construct()
    {
        $this->coleccionRecipe = new ColeccionsRecipeRepositories;
    }


    public function index()
    {
         $recipes = $this->coleccionRecipe->listRecipe();
         $nameRecipe = "";
         $recipesList = [];
         foreach ($recipes as $recipe){
            if( $nameRecipe == $recipe->name) {
                array_push(
                    $recipesList[$recipe->name],
                    [
                    "product_name" => $recipe->product_name,
                    "quantity" => $recipe->quantity
                    ]
                ); 
                $nameRecipe =$recipe->name;
            }else{
                $recipesList[$recipe->name] [] =  [
                    "product_name" => $recipe->product_name,
                    "quantity" => $recipe->quantity
                    ];
                    $nameRecipe =$recipe->name;                    
            }
         }

         return $recipesList;
    }

}
