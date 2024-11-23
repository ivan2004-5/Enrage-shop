<?php

use Illuminate\Support\Facades\Route;

Route::get('/index', [App\Http\Controllers\Controller::class, 'index'])->name('index');
Route::get('/service', [App\Http\Controllers\Controller::class, 'service'])->name('service');
Route::get('/contact', [App\Http\Controllers\Controller::class, 'contact'])->name('contact');