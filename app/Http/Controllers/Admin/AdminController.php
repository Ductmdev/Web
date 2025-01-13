<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Utilities\Constant;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function getLogin()
    {
        return view('Admin/login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => [Constant::user_level_host, Constant::user_level_admin], 
        ];
        
        $remember = $request->remember;
        
        if (Auth::guard('admin')->attempt($credentials, $remember)) {

            return redirect('/quantri/dashboard');
        } else {
            return redirect()->back()->withErrors("Tài khoản không hợp lệ");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/quantri/login");
    }
}
