<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::prefix("auth")->group(function () {
	// GET-requests
	Route::get("register", function () {
		return view("auth.register");
	})->name("auth.register-view");
	Route::get("login", function () {
		return view("auth.login");
	})->name("auth.login-view");

	// POST-requests
	Route::post('register', [AuthController::class, 'register'])->name('auth.register');
	Route::post('login', [AuthController::class, 'login'])->name("auth.login");
});
