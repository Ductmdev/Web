<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next): Response
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            $user = Auth::user();

            // Kiểm tra level của người dùng
            if ($user->level === 0 || $user->level === 1) {
                return $next($request);
            }

            // Nếu level không hợp lệ, bạn có thể đăng xuất người dùng và chuyển hướng
            // Auth::logout();
            return redirect("/login")->withErrors("Tài khoản không hợp lệ");
        }

        // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
        return redirect("/login");
    }
}
