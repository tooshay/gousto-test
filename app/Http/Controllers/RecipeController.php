<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\JsonResponse;

/**
 * Class RecipeController
 * @package App\Http\Controllers
 */
class RecipeController extends Controller
{
    /**
     * GET /recipes
     *
     * @param array $options
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(array $options = []): JsonResponse
    {
        $recipes = Recipe::all();

        return response()->json(['data' => $recipes]);
    }

    /**
     * GET /recipes/{id}
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $recipe = Recipe::findOrFail($id);

        return response()->json(['data' => $recipe]);
    }

    public function rate(int $rating): JsonResponse
    {

    }

    public function update(): JsonResponse
    {

    }

    public function create(): JsonResponse
    {

    }
}
