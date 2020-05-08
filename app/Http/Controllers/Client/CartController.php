<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\View;
use Cart;
use Carbon\Carbon;

class CartController extends Controller
{
    public function __construct()
    {
        $category = Category::where('status', 1)->get();
        View::share('category',$category);
    }

    public function getList()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        if(Cart::count() > 0) {
            $cart = Cart::content();
            return view('client.cart.index', compact('cart'));
        }else{
            return redirect()->route('home')->with('warning', 'Giỏ hàng của bạn chưa có sản phẩm nào');
        }
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

        $cart = ['id'=>$id, 'name'=>$product->name, 'qty'=>$qty, 'price'=>$price, 'options'=>['img'=>$product->img, 'old_price'=>$product->price, 'promotion'=>$product->promotion]];
        Cart::add($cart);
        return redirect()->back()->with('success', 'Sản phẩm '.$product->name.' đã được thêm vào giỏ hàng');
    }

    public function delProduct($key)
    {
        Cart::remove($key);
        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
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

    public function saveInfoOrder(OrderRequest $request)
    {
        $totalMoney = str_replace('.', '', Cart::subtotal(0,',','.'));
        $orderId = Order::insertGetId([
            'idUser' => get_data_user('web'),
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'message' => $request->message,
            'totalMoney' => $totalMoney,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        if($orderId) {
            $products = Cart::content();
            foreach($products as $product) {
                if($product->options->promotion){
                    $promotion = $product->options->promotion;
                }else{
                    $promotion = 0;
                }
                OrderDetail::insert([
                    'idOrder' => $orderId,
                    'idProduct' => $product->id,
                    'quantity' => $product->qty,
                    'price' => $product->options->old_price,
                    'promotion' => $promotion,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                // trừ số sản phẩm đã mua
                $prd = Product::find($product->id);
                if($prd->quantity - $product->qty == 0) {
                    $prd->status = 3;
                }
                $prd->quantity -= $product->qty;
                $prd->purchase_number += $product->qty;
                $prd->save();
            }
            Cart::destroy();
        }
        return redirect()->route('complete');
    }

    public function complete()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        return view('client.cart.complete');
    }
}
