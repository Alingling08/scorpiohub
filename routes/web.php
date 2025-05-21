<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\ProductController;
use App\Models\Features;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Route::get('/features', [FeaturesController::class, 'index'])->name('features.index');
// Route::get('/features/create', [FeaturesController::class, 'create'])->name('features.create');
// Route::get('/features/{id}', [FeaturesController::class, 'show'])->name('features.show');


