<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

class Middleware
{
    protected $middlewareAliases = [
        // другие middleware
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];
}