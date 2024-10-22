<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('index');
Route::get('/catalog', [App\Http\Controllers\Controller::class, 'catalog'])->name('catalog');
Route::get('/contact', [App\Http\Controllers\Controller::class, 'contact'])->name('contact');