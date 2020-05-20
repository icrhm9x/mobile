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
        View::share('category', $category);
    }

    public function getList()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        if (Cart::count() > 0) {
            $cart = Cart::content();
            return view('client.cart.index', compact('cart'));
        } else {
            return redirect()->route('home')->with('warning', 'Giỏ hàng của bạn chưa có sản phẩm nào');
        }
    }

    public function addCart($id, Request $request)
    {
        $product = Product::findOrFail($id);

        if ($product->status == 3) {
            return redirect()->back()->with('warning', 'Sản phẩm đang tạm thời hết hàng');
        } elseif ($product->status == 2) {
            return redirect()->back()->with('warning', 'Sản phẩm sắp ra mắt');
        }

        if ($request->qty) {
            $qty = $request->qty;
        } else {
            $qty = 1;
        }

        if ($product->promotion > 0) {
            $price = $product->price - $product->promotion;
        } else {
            $price = $product->price;
        }

        $cart = [
            'id' => $id,
            'name' => $product->name,
            'qty' => $qty,
            'price' => $price,
            'options' => ['img_path' => $product->img_path, 'old_price' => $product->price, 'promotion' => $product->promotion]
        ];
        Cart::add($cart);
        return redirect()->back()->with('success', 'Sản phẩm ' . $product->name . ' đã được thêm vào giỏ hàng');
    }

    public function updateCart(Request $request, $key)
    {
        if ($request->id && $request->quantity) {
            $id = $request->id;
            $quantity = $request->quantity;
            $product = Product::whereId($id)->first();
            if ($quantity > $product->quantity) {
                return response()->json([
                    'message' => 'Số lượng sản phẩm không đủ, vui lòng liên hệ shop qua số điện thoại chăm sóc khách hàng',
                    'code' => 400
                ], 200);
            }
            Cart::update($key, $quantity);
            $cart = Cart::content();
            $cartComponent = view('client.cart.components.cart_component', compact('cart'))->render();
            return response()->json([
                'message' => 'Cập nhật số lượng sản phẩm thành công',
                'cartComponent' => $cartComponent,
                'code' => 200
            ], 200);
        }
    }

    public function delCart($key)
    {
        Cart::remove($key);
        $cart = Cart::content();
        $cartComponent = view('client.cart.components.cart_component', compact('cart'))->render();
        return response()->json([
            'message' => 'Sản phẩm đã được xóa khỏi giỏ hàng',
            'cartComponent' => $cartComponent,
            'code' => 200
        ], 200);
    }

    public function checkout()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        if (Cart::count() > 0) {
            $cart = Cart::content();
            return view('client.cart.checkout', compact('cart'));
        } else {
            return redirect()->back()->with('warning', 'Giỏ hàng của bạn chưa có sản phẩm nào');
        }
    }

    public function saveInfoOrder(OrderRequest $request)
    {
        $totalMoney = str_replace('.', '', Cart::subtotal(0, ',', '.'));
        $order = Order::create([
            'idUser' => get_data_user('web'),
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'message' => $request->message,
            'totalMoney' => $totalMoney,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        if ($order) {
            $products = Cart::content();
            foreach ($products as $product) {
                if ($product->options->promotion) {
                    $promotion = $product->options->promotion;
                } else {
                    $promotion = 0;
                }
                $order->Order_details()->create([
                    'idProduct' => $product->id,
                    'quantity' => $product->qty,
                    'price' => $product->options->old_price,
                    'promotion' => $promotion,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                // trừ số sản phẩm đã mua
                $prd = Product::find($product->id);
                if ($prd->quantity - $product->qty == 0) {
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
