<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\recipes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Throwable;

class RecipeController extends Controller
{
    function createRecipe()
    {
        return view('vista_recipes_create');
    }

    function saveRecipe(Request $request)
    {
        try {
            $recipes = new recipes();
            $recipes->recipe_name = $request->input('name');
            $recipes->recipe_description = $request->input('description');
            $recipes->ingredient = $request->input('ingredient');
            $recipes->steps = $request->input('steps');
            $recipes->time = $request->input('time');
            $recipes->calories = $request->input('calories');
            $recipes->carbohydrate = $request->input('carbohydrate');
            $recipes->fat = $request->input('fat');
            $recipes->protein = $request->input('protein');

            $recipes->recipe_image = $request->input('imagen');
            /* $ruta = $imagen->store('public/image');
            $recipes->recipe_image = $ruta;*/

            $recipes->user_id =
                Auth::user()->id;

            $recipes->save();

            return view('vista_recipes_create');
        } catch (Throwable $e) {
            report($e);
            Session::flash('error', 'Se produjo un error: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    function listRecipesUsers()
    {
        $recipes = DB::table('recipes')
            ->select(
                'id',
                'recipe_name',
                'recipe_description',
                'ingredient',
                'steps',
                'time',
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
                'time',
                'steps',
                'ingredient',
                'recipe_image'
            )
            ->where('id', '=', $valor)
            ->get();


        return view('vista_recipe_users_description', ['recipes' => $recipes]);
    }
}
