<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;




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

    // get all
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::get('/items/search', [ItemController::class, 'search'])->name('items.search');});

    // view form
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    // saves
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');

    // bring us to the edit form
    Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');

    Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');

    Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');

    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');

    // Search Route

require __DIR__.'/auth.php';
