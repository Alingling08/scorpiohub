<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\ProductController;
use App\Models\Features;

Route::get('/', function () {
    return view('welcome');
});

//AUTHENTICATION ROUTES
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::get('/login',  [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login',  [AuthController::class, 'login'])->name('login');

//PRODUCTS ROUTES
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

//