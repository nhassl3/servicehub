<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

Route::get('/', function () {
    $reviews = Cache::remember("review_on_main_page", 86400, function () {
        return ReviewsController::indexMainPage();
    });
    return view('welcome', compact('reviews'));
});

Route::get('/cart', [CartController::class, 'index'])->middleware('web');
Route::post('/cart/update', [CartController::class, 'update'])->middleware('web');
Route::get('/cart/countCartItems', [CartController::class, 'countCartItems'])->middleware('web');
Route::post('/cart/updateQuantity', [CartController::class, 'updateQuantity'])->middleware('web');
Route::post('/cart/likeProduct', [CartController::class, 'updateLikeProduct'])->middleware('web');
Route::delete('/cart/delete', [CartController::class, 'delete'])->middleware('web');

Route::get('/market', [ProductController::class, 'index']);
Route::get('/market/{slug}', [ProductController::class, 'showCategory'])->name('market.category')->middleware("web");

Route::get('/card', [ProductController::class, 'card'])->middleware('web');

Route::get('/about', function () {
    return view('about');
})->middleware('web');
Route::get('/contacts', function () {
    return view('contacts');
})->middleware('web');
Route::get('/contact-seller', function () {
    return view('contact-seller');
})->middleware('web');
Route::get('/create-seller', function () {
    return view('create-seller');
})->middleware('web');
Route::get("/orders", function () {
    return view("orders");
})->middleware('web');
Route::get('/likes', function () {
    return view('likes');
})->middleware('web');
Route::get("/reviews", [ReviewsController::class, 'index'])->middleware('web');

Route::get('/gocheckout', function () {
    return view('gocheckout');
})->middleware('web');
