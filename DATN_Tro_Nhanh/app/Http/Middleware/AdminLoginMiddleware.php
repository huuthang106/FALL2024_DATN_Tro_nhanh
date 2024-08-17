<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if (!Auth::check()) {
        // Nếu người dùng chưa đăng nhập, chuyển hướng về trang chủ
        return redirect()->route('client.home');
    }

    if (Auth::user()->role !== 0) {
        // Nếu người dùng đã đăng nhập nhưng không phải admin, chuyển hướng về trang chủ
        return redirect()->route('client.home');
    }

        return $next($request);
    }
}
