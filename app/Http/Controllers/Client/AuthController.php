<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $category = Category::where('status', 1)->get();
        View::share('category',$category);
    }

    public function getRegister()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        return view('client.auth.register');
    }
    public function postRegister(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:2|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:255',
                're_password' => 'same:password',
            ],
            [
                'name.required' => 'Họ và tên không được bỏ trống',
                'name.min' => 'Họ và tên phải có tối thiểu 2 ký tự',
                'name.max' => 'Họ và tên tối đa có 255 ký tự',
                'email.required' => 'Địa chỉ email không được bỏ trống',
                'email.email' => 'Địa chỉ email nhập không đúng định dạng',
                'email.unique' => 'Đã tồn tại địa chỉ email trong hệ thống',
                'password.required' => 'Mật khẩu không được bỏ trống',
                'password.min' => 'Mật khẩu phải có tối thiểu 6 ký tự',
                'password.max' => 'Mật khẩu tối đa có 255 ký tự',
                're_password.same' => 'Nhập không đúng với trường mật khẩu',
            ]
        );
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if ($user->id) {
            return redirect()->route('post.login')->with('success', 'Đăng ký thành công');
        }
        return redirect()->back()->with('error', 'Đăng ký thất bại');
    }

    public function getLogin()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        return view('client.auth.login');
    }

    public function postLogin(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->route('home')->with('success', 'Đăng nhập thành công');
        } else {
            return back()->with('error', 'Đăng nhập thất bại. Xin vui lòng kiểm tra lại tài khoản');
        }
    }

    public function getLogout()
    {
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('home')->with('success','Đăng xuất thành công');
        }
    }
}
