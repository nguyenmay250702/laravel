<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    //trang chủ admin
    public function index(){
        return view("admins/index");
    }

    //hiển thị trang login
    public function login(){
        return view("login");
    }

    //kiểm tra login
    public function authLogin(Request $request){
        // dd(Auth::attempt(["email"=>$request->email, "password"=>$request->pass]));
        // if(Auth::attempt(["email"=>$request->email, "password"=>$request->password])){
        //     return redirect()->route("admin.index");
        // }else{
        //     return redirect()->route("login")->with("error","email hoặc pass sai");
        // }
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            echo "ttt";
            return redirect()->intended('admin.index');
        }
            return redirect()->route("login")->with("error","fail");

    }
}
