<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    //trang chủ admin
    public function index()
    {
        return view("admins/index");
    }

    //hiển thị trang login
    public function login()
    {
        $this->logout();
        return view("login");
    }

    //kiểm tra login
    public function authLogin(Request $request)
    {
        $request->validate([
            'email'         =>  'required|email',
            'password'      =>  'required',
        ]);

        // if(Auth::attempt(["email"=>$request->email, "password"=>$request->password])){
        //     return redirect()->route("admin.index");
        // }else{
        //     return redirect()->route("login")->with("error","email hoặc pass sai");
        // }

        // lấy ra thông tin nhập ở form
        $credentials = $request->only('email', 'password');

        //so sánh thông tin nhập ở form xem có trùng với db hay không
        if (Auth::attempt($credentials)) {
            return redirect()->route("admin.index");
        }
        return redirect()->route("login")->with("error", "fail! email hoặc password không đúng");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }
}