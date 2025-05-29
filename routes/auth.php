<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::prefix("auth")->group(function () {
	// GET-requests
	Route::get("register", function () {
		return view("auth.register");
	})->name("auth.register-view")->middleware('web');
	Route::get("login", function () {
		return view("auth.login");
	})->name("auth.login-view")->middleware('web');
	Route::get("logout", [AuthController::class, "logout"])->name("auth.logout")->middleware("web");

	// POST-requests
	Route::post('register', [AuthController::class, 'register'])->name('auth.register')->middleware('web');
	Route::post('login', [AuthController::class, 'login'])->name("auth.login")->middleware("web");
});
