<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) { //kiểm tra xem người dùng đã đăng nhập hay chưa, nếu đăng nhập rồi thì next
            if (Auth::user()->role == 1) {
                return $next($request);
            }
            return redirect()->route("login")->with("error", "tk của bn có role= 0. TH này sẽ điều hướng sang trang khác");
            // return $next($request);

        }
        return redirect()->route("login")->with("error", "bạn cần đăng nhập trước");
    }
}