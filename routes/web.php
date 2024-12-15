<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticatedSessionController;

// Маршруты по сайту
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/service', [IndexController::class, 'service'])->name('service');

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

// Маршрут удаления услуги из корзины
Route::delete('/cart/remove/{itemId}', [CartController::class, 'removeCartItem'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');

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

// Маршруты администратора - с использованием middleware
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->as('admin.')->group(function () {
    Route::resource('services', ServiceController::class); // Используем Route::resource для краткости и удобства
});

// Маршруты поиска
Route::get('/search', [ServiceController::class, 'search'])->name('service.search')->middleware('auth');

// Маршруты яндекс авторизации
Route::get('login/yandex', [AuthenticatedSessionController::class, 'yandex'])->name('yandex');
    Route::get('login/yandex/redirect', [AuthenticatedSessionController::class, 'yandexRedirect'])->name('yandexRedirect');

    // Маршрут для скачивания отчета
Route::get('/admin/download-report', [AdminController::class, 'downloadReport'])->name('admin.download-report')->middleware(['auth', AdminMiddleware::class]);

// Маршрут истории заказов
Route::get('/orders/history', [OrderController::class, 'history'])->name('orders.history');