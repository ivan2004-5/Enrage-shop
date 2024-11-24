<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/service', [IndexController::class, 'service'])->name('service');
Route::get('/basket', [IndexController::class, 'basket'])->name('basket');

// Маршруты авторизации/регистрации:
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'registerUser'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Маршруты личного кабинета
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

