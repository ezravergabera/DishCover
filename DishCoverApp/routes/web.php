<?php

use App\Http\Controllers\GroceryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\MealplanController;
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
    if(Auth::user()) {
        return view('search.index');
    }
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return redirect('search');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/search/recipes', [RecipeController::class, 'search'])->name('recipes.search');

Route::get('/recipe/json/{name}', [RecipeController::class, 'showJSON'])->name('viewRecipeJSON.index');
Route::get('/recipe/{name}', [RecipeController::class, 'show'])->name('viewRecipe.index');

Route::middleware('auth')->group(function () {
    Route::get('/search', function () {
        return view('search.index');
    })->name('search');
    
    Route::get('/saved-recipes', [RecipeController::class,'index'])->name('savedRecipes.index');
    Route::post('/search/recipes', [RecipeController::class,'store'])->name('recipes.store');
    Route::delete('/saved-recipes/{recipe}', [RecipeController::class,'destroy'])->name('savedRecipes.destroy');

    Route::get('/meal-plan', [MealplanController::class, "index"])->name('mealPlan.index');
    Route::post('/meal-plan', [MealplanController::class, "store"])->name('mealPlan.store');
    Route::get('/meal-plan/{mealplan}/edit', [MealplanController::class, "edit"])->name('mealPlan.edit');
    Route::put('/meal-plan/{mealplan}', [MealplanController::class, "update"])->name('mealPlan.update');
    Route::delete('/meal-plan/{mealplan}/delete', [MealplanController::class, 'destroy'])->name('mealPlan.destroy');

    Route::get('/grocery-list', [GroceryController::class, 'index'])->name('grocery.index');
    Route::post('/grocery-list', [GroceryController::class, 'store'])->name('grocery.store');
    Route::put('/grocery-list/{name}/update-quantity', [GroceryController::class, 'updateQuantity'])->name('grocery.updateQuantity');
    Route::delete('/grocery-list/{name}', [GroceryController::class, 'destroy'])->name('grocery.destroy');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';