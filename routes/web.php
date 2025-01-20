<?php

use Illuminate\Support\Facades\Route;

use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\siteController;
use App\Http\Controllers\GoogleController;



//Calling GoogleController for Google Auth
// Route::get('/auth/redirect',[GoogleController::class,'redirectToGoogle']);
// Route::get('/auth/callback',[GoogleController::class,'handleGoogleCallback']);
// Route::get('/auth/redirect', function () {
//     return Socialite::driver('google')->redirect();
// });
// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('google')->user();
//     // $user->token
// });
 


Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

//Calling Site controller for UI
Route::get('/', [siteController::class, 'index']);
Route::get('/products', [siteController::class, 'products'])->name('products');
Route::get('/products/{id}', [siteController::class, 'productDetails']);

// Route::get('/signup', [siteController::class, 'signup']);
// Route::post('/signup', [siteController::class, 'postSignup']);

// Route::get('/login', [siteController::class, 'login']);
// Route::post('/login', [siteController::class, 'postLogin']);

Route::get('/admin', [siteController::class, 'admin']);
Route::get('/category', [siteController::class, 'category']);
Route::get('/subcategory', [siteController::class, 'subcategory']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
