<?php

use Illuminate\Support\Facades\Route;

//Calling Site controller for UI
use App\Http\Controllers\siteController;

Route::get('/', [siteController::class, 'index']);
Route::get('/login', [siteController::class, 'login']);
Route::get('/signup', [siteController::class, 'signup']);
Route::get('/admin', [siteController::class, 'admin']);
Route::get('/category', [siteController::class, 'category']);
Route::get('/subcategory', [siteController::class, 'subcategory']);

