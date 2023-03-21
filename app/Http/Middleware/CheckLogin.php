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
            // if (Auth::user()->email) {
            //     return $next($request);
            // }
            // return redirect()->route("login")->with("error", "email hoặc pass sai");
            return $next($request);

        }
        return redirect()->route("login")->with("error", "bạn cần đăng nhập trước");
    }
}