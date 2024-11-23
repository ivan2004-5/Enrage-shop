<?php

use Illuminate\Support\Facades\Route;

Route::get('/index', [App\Http\Controllers\Controller::class, 'index'])->name('index');
Route::get('/service', [App\Http\Controllers\Controller::class, 'service'])->name('service');
Route::get('/basket', [App\Http\Controllers\Controller::class, 'basket'])->name('basket');