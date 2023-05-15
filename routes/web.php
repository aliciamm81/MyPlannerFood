<?php

use App\Http\Controllers\AdminController;
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

Route::get('recipes', [NewController::class, 'searchRecipes'])
    ->middleware('auth')
    ->name('recipes');


Route::get('food', [NewController::class, 'getFood'])
    ->middleware('auth')
    ->name('food');


Route::get('menu', [NewController::class, 'searchFood'])
    ->name('menu');
    

/*Route::get('menu/search', [AdminController::class, 'prueba'])
    ->middleware('auth')
    ->name('menu/search');*/
