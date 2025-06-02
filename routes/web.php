<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\ProductController;
use App\Models\Features;

Route::get('/', function () {
    return view('auth.login');
});

//AUTHENTICATION ROUTES
Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('show.register');
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::get('/forgot-password', 'forgotPassword')->name('password.request');
    Route::post('/forgot-password', 'passwordEmail')->name('password.email');

    Route::get('/reset-password/{token}', 'passwordReset')->name('password.reset');

    Route::post('/reset-password', 'passwordUpdate')->name('password.update');
});
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');

//GENERIC AUTHENTICATED USERS
Route::middleware('auth')->group(function () {
    //EMAIL VERIFICATION NOTICE Route
    Route::get('/email/verify', [AuthController::class, 'verifyNotice'])->name('verification.notice');

    //Email Verification Handler Route
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->middleware('signed')->name('verification.verify');

    //Resending the Verification Email Route
    Route::post('/email/verification-notification', [AuthController::class, 'verifyHandler'])->middleware('throttle:6,1')->name('verification.send');
});

//PRODUCTS AUTHENTICATED ROUTES
Route::middleware(['auth', 'verified'])->controller(ProductController::class)->group(function () {
    // Route::get('/', 'index')->name('products.index');
    // Route::get('/products', 'index')->name('products.index');
    // Route::get('/products/create', 'create')->name('products.create');
    // Route::get('/products/{product}', 'show')->name('products.show');
    // Route::post('/products', 'store')->name('products.store');
    // Route::delete('/products/{product}', 'destroy')->name('products.destroy');

    Route::resource('products', ProductController::class);
    Route::get('/my-products', 'myProducts')->name('products.myProducts');
});

// Route::get('/forgot-password', function () {
//     return view('auth.forgot-password');
// })->middleware('guest')->name('password.request');
//