<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Class RecipeController
 * @package App\Http\Controllers
 */
class RecipeController extends Controller
{
    const LIMIT = 5;
    /**
     * GET /recipes/{cuisine}
     *
     * @param string $cuisine
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(string $cuisine = null): JsonResponse
    {
        if (!is_null($cuisine)) {
            $recipes = Recipe::where('recipe_cuisine', $cuisine)->paginate(self::LIMIT);
        } else {
            $recipes = Recipe::all();
        }

        return response()->json(['data' => $recipes]);
    }

    /**
     * GET /recipes/show/{id}
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

    /**
     * PUT /recipes/{id}
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $recipe = Recipe::findOrFail($id);

        $recipe->fill($request->all());
        $recipe->save();

        return response()->json(['data' => $recipe]);
    }

    /**
     * PUT /recipes/rate/{id}
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function rate(Request $request, int $id): JsonResponse
    {
        $recipe = Recipe::findOrFail($id);

        try {
            $recipe->rate($request->get('rating'));
        } catch (Exception $e) {
            return response()->json(dd($e->getMessage()));
        }


        return response()->json(['data' => $recipe]);
    }
}
