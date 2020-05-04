<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use Cart;

class CartController extends Controller
{
    public function __construct()
    {
        $category = Category::where('status', 1)->get();
        View::share('category',$category);
    }

    public function addProduct($id, Request $request)
    {
        $product = Product::findOrFail($id);

        if($product->status == 3) {
            return redirect()->back()->with('warning', 'Sản phẩm đang tạm thời hết hàng');
        } elseif($product->status == 2) {
            return redirect()->back()->with('warning', 'Sản phẩm sắp ra mắt');
        }

        if($request->qty) {
            $qty = $request->qty;
        }else{
            $qty = 1;
        }

        if($product->promotion > 0){
            $price = $product->price - $product->promotion;
        }else{
            $price = $product->price;
        }

        $cart = ['id'=>$id, 'name'=>$product->name, 'qty'=>$qty, 'price'=>$price, 'options'=>['img'=>$product->img, 'promotion'=>$product->promotion]];
        Cart::add($cart);
        return redirect()->back()->with('success', $product->name.' đã được thêm vào giỏ hàng');
    }

    public function getList()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        if(Cart::count() > 0) {
            $cart = Cart::content();
            return view('client.cart.index', compact('cart'));
        }else{
            return redirect()->back()->with('warning', 'Giỏ hàng của bạn chưa có sản phẩm nào');
        }
    }

    public function checkout()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        if(Cart::count() > 0) {
            $cart = Cart::content();
            return view('client.cart.checkout', compact('cart'));
        }else{
            return redirect()->back()->with('warning', 'Giỏ hàng của bạn chưa có sản phẩm nào');
        }
    }

    public function complete()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        return view('client.cart.complete');
    }
}
