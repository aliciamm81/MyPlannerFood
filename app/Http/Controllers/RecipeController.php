<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\recipes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    function createRecipe()
    {
        return view('vista_recipes_create');
    }

    function saveRecipe(Request $request)
    {
        $recipes = new recipes();
        $recipes->recipe_name = $request->input('name');
        $recipes->recipe_description = $request->input('description');
        $recipes->ingredient = $request->input('ingredient');
        $recipes->calories = $request->input('calories');
        $recipes->carbohydrate = $request->input('carbohydrate');
        $recipes->fat = $request->input('fat');
        $recipes->protein = $request->input('protein');
        $recipes->recipe_image = $request->input('recipe_image');
        $recipes->user_id =
            Auth::user()->id;

        $recipes->save();
        return view('vista_recipes_create');
    }

    function listRecipesUsers()
    {
        $recipes = DB::table('recipes')
            ->select(
                'id',
                'recipe_name',
                'recipe_description',
                'ingredient',
                'calories',
                'carbohydrate',
                'fat',
                'protein',
                'recipe_image',
                'user_id',
            )
            ->get();

        return view('vista_recipes_list_users', ['recipes' => $recipes]);
    }
    function recipeUserDescription($valor)
    {
        $recipes = DB::table('recipes')
            ->select(
                'recipe_name',
                'recipe_description',
                'ingredient',
                'recipe_image',
            )
            ->where('id', '=', $valor)
            ->get();

        return view('vista_recipe_users_description', ['recipes' => $recipes]);
    }
}
