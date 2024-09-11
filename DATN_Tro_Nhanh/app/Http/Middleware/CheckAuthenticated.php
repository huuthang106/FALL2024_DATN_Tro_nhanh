<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthenticated
{
     /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // Lưu price_list_id vào session
            session(['price_list_id' => $request->price_list_id]);

            // Chuyển hướng người dùng đến trang đăng nhập
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để tiếp tục.');
        }

        return $next($request);
    }
}
