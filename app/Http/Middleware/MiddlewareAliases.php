<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class MiddlewareAliases extends Middleware
{
    protected $middlewareAliases = [
        // другие middleware
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];
}