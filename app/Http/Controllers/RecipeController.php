<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    /**
     * POST /recipes
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $recipe = Recipe::create($request->all());

        return response()->json([
                'created' => true,
                201, [
                    'Location' => route('recipes.show', ['id' => $recipe->id])
                ]
            ]
        );
    }

    public function update(Request $request, $id): JsonResponse
    {

    }

    public function rate(int $rating): JsonResponse
    {

    }
}
