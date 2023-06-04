<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('recipes', [NewController::class, 'listRecipes'])
    ->middleware('auth')
    ->name('recipes');

Route::get('recipes/search', [NewController::class, 'searchRecipes'])
    ->middleware('auth')
    ->name('recipes/search');


Route::get('recipes/create', [RecipeController::class, 'createRecipe'])
    ->middleware('auth')
    ->name('recipe/create');

Route::get('recipes/save', [RecipeController::class, 'saveRecipe'])
    ->middleware('auth')
    ->name('recipes/save');

Route::get('recipes/users', [RecipeController::class, 'listRecipesUsers'])
    ->middleware('auth')
    ->name('recipes/users');

Route::get('recipe/description/{valor}', [NewController::class, 'getRecipes'])
    ->middleware('auth')
    ->name('recipe/description');

Route::get('recipe/users/description/{valor}', [RecipeController::class, 'recipeUserDescription'])
    ->middleware('auth')
    ->name('recipe/users/description');

Route::get('food', [NewController::class, 'searchFoods'])
    ->middleware('auth')
    ->name('food');

Route::get('food/description/{valor}', [NewController::class, 'getFood'])
    ->middleware('auth')
    ->name('food/description');

Route::get('menu', [NewController::class, 'searchRecipes'])
    ->middleware('auth')
    ->name('menu');

Route::get('menu/save', [MenuController::class, 'createMenu'])
    ->middleware('auth')
    ->name('menu/save');

Route::get('menu/create', [MenuController::class, 'listmenu'])
    ->middleware('auth')
    ->name('menu/create');