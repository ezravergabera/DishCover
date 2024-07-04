<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
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

Route::get('/search/recipes', [RecipeController::class, 'search'])->name('search.recipes');

Route::middleware('auth')->group(function () {
    Route::get('/search', function () {
        return view('search.index');
    })->name('search');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';