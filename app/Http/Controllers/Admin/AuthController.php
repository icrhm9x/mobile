<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        if(Auth::guard('members')->check()){
            return redirect()->route('admin.home')->with('warning', 'Bạn đã đăng nhập');
        }
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::guard('members')->attempt($data)) {
            return redirect()->route('admin.home')->with('success', 'Đăng nhập thành công');
        } else {
            return back()->with('error', 'Đăng nhập thất bại. Xin vui lòng kiểm tra lại tài khoản');
        }
    }

    public function getLogout()
    {
        if(Auth::guard('members')->check()){
            Auth::guard('members')->logout();
            return redirect()->back()->with('success','Đăng xuất thành công');
        }else{
            return redirect()->back();
        }
    }
}
