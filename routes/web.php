<?php

use Illuminate\Support\Facades\Route;

//Calling Site controller for UI
use App\Http\Controllers\siteController;

Route::get('/', [siteController::class, 'index']);
Route::get('/products', [siteController::class, 'products'])->name('products');
Route::get('/products/{id}', [siteController::class, 'productDetails']);

Route::get('/signup', [siteController::class, 'signup']);
Route::post('/signup', [siteController::class, 'postSignup']);

Route::get('/login', [siteController::class, 'login']);
Route::post('/login', [siteController::class, 'postLogin']);

Route::get('/admin', [siteController::class, 'admin']);
Route::get('/category', [siteController::class, 'category']);
Route::get('/subcategory', [siteController::class, 'subcategory']);

