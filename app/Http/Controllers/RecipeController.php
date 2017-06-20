<?php

namespace App\Http\Controllers;

use App\Recipe;

class RecipeController extends Controller
{
    public function getRecipes(array $options  = [])
    {
        $recipes = Recipe::all();

        return response()->json(['data' => $recipes]);
    }

    public function getRecipe()
    {

    }

    public function rateRecipe(int $rating)
    {

    }

    public function updateRecipe()
    {

    }

    public function createRecipe()
    {

    }
}
