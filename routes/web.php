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
Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('show.register');
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');

//PRODUCTS ROUTES
Route::middleware('auth')->controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/create', 'create')->name('products.create');
    Route::get('/products/{product}', 'show')->name('products.show');
    Route::post('/products', 'store')->name('products.store');
    Route::delete('/products/{product}', 'destroy')->name('products.destroy');
});


//