<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::orderByDesc('id')->paginate(10);
        return view('admin.orders.index', compact('order'));
    }

    public function show($id)
    {
        $orders = OrderDetail::where('idOrder', $id)->get();
        $html = view('admin.orders.orderDetail', compact('orders'))->render();
        return response()->json($html);
    }

    public function update($id)
    {
        $order = Order::find($id);
        $order->status = 1;
        $order->save();
        return response()->json(['message' => 'Cập nhật thành công'], 200);
    }

    public function cancel($id)
    {
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        $order_details = OrderDetail::where('idOrder', $id)->get();
        foreach ($order_details as $item) {
            $product = Product::find($item->idProduct);
            $product->quantity += $item->quantity;
            $product->purchase_number -= $item->quantity;
            if($product->status == 0) {
                $product->status = 1;
            }
            $product->save();
        }
        return response()->json(['message' => 'Đã hủy đơn hàng'], 200);
    }
}
