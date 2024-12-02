<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\TrackController;

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
Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

// Маршруты для добавления услуг в корзину
Route::get('/service', [ServiceController::class, 'index'])->name('service');
Route::post('/cart/{serviceId}', [CartController::class, 'addToCart'])->name('cart.add'); //Маршрут для добавления товара
Route::get('/cart', [CartController::class, 'showCart'])->name('cart'); //Маршрут для отображения корзины
Route::post('/cart/{service}/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/{itemId}', [CartController::class, 'removeCartItem'])->name('cart.remove'); //Маршрут для удаления товара

// Маршруты для оформления заказа в корзине
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/success', [OrderController::class, 'success'])->name('order.success');

// админка
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('services', ServiceController::class);
});