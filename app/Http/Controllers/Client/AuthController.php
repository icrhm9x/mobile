<?php

namespace App\Http\Controllers\Client;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RequestResetPassword;

class AuthController extends Controller
{
    public function getRegister()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        if (Auth::guard('web')->check()) {
            return redirect()->route('home')->with('warning', 'Bạn đã đăng nhập');
        }
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
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        if ($user->id) {
            return redirect()->route('post.login')->with('success', 'Đăng ký thành công');
        }
        return redirect()->back()->with('error', 'Đăng ký thất bại');
    }

    public function getLogin()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        if (Auth::guard('web')->check()) {
            return redirect()->route('home')->with('warning', 'Bạn đã đăng nhập');
        }
        return view('client.auth.login');
    }

    public function postLogin(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($data)) {
            return redirect()->route('home')->with('success', 'Đăng nhập thành công');
        } else {
            return back()->with('error', 'Đăng nhập thất bại. Xin vui lòng kiểm tra lại tài khoản');
        }
    }

    public function getForgotPassword()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        if (Auth::guard('web')->check()) {
            return redirect()->route('home')->with('warning', 'Bạn đã đăng nhập');
        }
        return view('client.auth.forgot');
    }

    public function codeForgotPassword(Request $request)
    {
        $email = $request->email;
        $checkUser = User::whereEmail($email)->first();
        if (!$checkUser) {
            return redirect()->back()->with('error', 'Email không tồn tại');
        }
        $code = bcrypt(md5(time() . $email));
        $checkUser->code_reset = $code;
        $checkUser->time_code = Carbon::now();
        $checkUser->save();

        $url = route('get.reset.password', ['code' => $code, 'email' => $email]);
        $data = [
            'route' => $url
        ];
        Mail::send('client.email.index', $data, function ($message) use ($email) {
            $message->to($email, 'Reset Password')->subject('Lấy lại mật khẩu');
        });
        return redirect()->back()->with('success',
            'Link lấy lại mật khẩu đã được gửi vào email của bạn, vui lòng kiểm tra.');
    }

    public function getResetPassword(Request $request)
    {
        $code = $request->code;
        $email = $request->email;
        $checkUser = User::where([
            'code_reset' => $code,
            'email' => $email
        ])->first();
        if (!$checkUser) {
            return redirect('/')->with('error', 'Đường dẫn lấy lại mật khẩu không đúng, vui lòng thử lại sau');
        }
        return view('client.auth.reset');
    }

    public function postResetPassword(RequestResetPassword $request)
    {
        if ($request->password) {
            $code = $request->code;
            $email = $request->email;
            $checkUser = User::where([
                'code_reset' => $code,
                'email' => $email
            ])->first();
            if(!$checkUser) {
                return redirect('/')->with('error', 'Đường dẫn lấy lại mật khẩu không đúng, vui lòng thử lại sau');
            }
            $checkUser->password = bcrypt($request->password);
            $checkUser->code_reset = Null;
            $checkUser->time_code = Null;
            $checkUser->save();
            return redirect()->route('get.login')->with('success', 'Đổi mật khẩu thành công');
        }
    }

    public function getLogout()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
            return redirect()->back()->with('success', 'Đăng xuất thành công');
        } else {
            return redirect()->back();
        }
    }
}
