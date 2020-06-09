<?php

namespace App\Http\Controllers\Client;

use App\Models\Category;
use App\Models\Product;
use App\Models\WishLish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class WishListController extends Controller
{
    public function index()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        $wishList = WishLish::with('product')->where('idUser', Auth::guard('web')->id())->orderByDesc('id')->get();
        return view('client.wishlist.index', compact('wishList'));
    }

    public function store($id)
    {
        if (Auth::guard('web')->check()) {
            $count = Auth::guard('web')->user()->wishLists()->count();
            if ($count >= 6) {
                return response()->json(['message' => 'Danh sách của bạn đã đầy, vui lòng xóa bớt', 'status' => 2],
                    200);
            }
            $product = Product::find($id);
            $idUser = Auth::guard('web')->id();
            $unique = WishLish::where('idUser', $idUser)->where('idProduct', $id)->count();
            if ($unique > 0) {
                return response()->json([
                    'message' => 'Sản phẩm ' . $product->name . ' đã nằm trong danh sách yêu thích',
                    'status' => 3
                ], 200);
            }
            WishLish::create([
                'idProduct' => $id,
                'idUser' => $idUser,
            ]);
            return response()->json([
                'message' => 'Sản phẩm ' . $product->name . ' đã được thêm vào danh sách yêu thích',
                'status' => 4
            ], 200);
        } else {
            return response()->json(['message' => 'Bạn phải đăng nhập ', 'status' => 1], 200);
        }
    }

    public function destroy($id)
    {
        $wishList = WishLish::find($id);
        $wishList->delete();
        $wishList = WishLish::where('idUser', Auth::guard('web')->id())->orderByDesc('id')->get();
        $wishListComponent = view('client.wishlist.components.wishlist_component', compact('wishList'))->render();
        return response()->json([
            'message' => 'Sản phẩm đã được xóa khỏi danh sách yêu thích',
            'wishListComponent' => $wishListComponent,
            'code' => 200
        ], 200);
    }
}
