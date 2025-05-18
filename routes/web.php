<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/cart/update', [CartController::class, 'update']);

Route::get('market', [ProductController::class, 'index']);
