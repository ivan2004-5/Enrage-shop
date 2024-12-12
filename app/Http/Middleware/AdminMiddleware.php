<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): mixed
    {
        // Проверяем, авторизован ли пользователь и является ли он администратором
        if (Auth::check() && Auth::user()->is_admin) {
            // Если пользователь авторизован и является администратором, передаем запрос дальше
            return $next($request);
        }

        abort(403, 'Доступ запрещён');
    }
}
