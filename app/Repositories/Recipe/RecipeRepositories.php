<?php

namespace App\Repositories\Recipe;

interface RecipeRepositories
{
    public function RecipeId(string $nameRecipe);

    public function listRecipe();
}