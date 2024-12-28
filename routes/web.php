<?php

use Illuminate\Support\Facades\Route;

//Calling Site controller for UI
use App\Http\Controllers\siteController;

Route::get('/', [siteController::class, 'index']);

Route::get('/products', [siteController::class, 'products'])->name('products');

Route::get('/products/{id}', [siteController::class, 'productDetails']);