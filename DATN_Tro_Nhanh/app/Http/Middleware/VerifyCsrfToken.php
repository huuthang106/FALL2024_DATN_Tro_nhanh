<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    protected $except = [
        'api/*', // Bỏ bảo vệ CSRF cho tất cả các route trong api
    ];
}
