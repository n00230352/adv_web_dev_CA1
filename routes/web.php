<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Get all
    // Search Route
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::get('/items/search', [ItemController::class, 'search'])->name('items.search');});

    // View form to create new item
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');

    // Save new item
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');

    // Edit an existing item
    Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');

    // Show a single item
    Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');

    // Delete an item
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');

    //creates all routes for reviews
    Route::resource('reviews', ReviewController::class);
    Route::post('items/{item}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    Route::resource('category', CategoryController::class)->middleware('auth');

require __DIR__.'/auth.php';
