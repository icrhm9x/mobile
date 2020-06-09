<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\UserRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function index()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        $user = Auth::guard('web')->user();
        return view('client.users.index', compact('user'));
    }

    public function update($id, UserRequest $request)
    {
        $user = User::find($id);
        $data = $request->all();
        $user->update($data);
        return redirect()->route('user.index')->with('success', 'Cập nhật thông tin thành công');
    }

    public function orderList()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        $idUser = Auth::guard('web')->id();
        $orderList = Order::with('products')->where('idUser', $idUser)->orderByDesc('id')->get();
        return view('client.users.orderList', compact('orderList'));
    }
}
