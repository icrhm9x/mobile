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
        $orders = Order::orderByDesc('id')->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $orderDetails = OrderDetail::with('product')->where('idOrder', $id)->get();
        $html = view('admin.orders.order-detail', compact('orderDetails'))->render();
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
        $orderDetails = OrderDetail::where('idOrder', $id)->get();
        foreach ($orderDetails as $orderDetail) {
            $product = Product::find($orderDetail->idProduct);
            $product->quantity += $orderDetail->quantity;
            $product->purchase_number -= $orderDetail->quantity;
            if($product->status == 0) {
                $product->status = 1;
            }
            $product->save();
        }
        return response()->json(['message' => 'Đã hủy đơn hàng'], 200);
    }

    public function destroy($id)
    {
        Order::find($id)->delete();
        OrderDetail::where('idOrder', $id)->delete();
        return response()->json(['message' => 'Đã xóa đơn hàng'], 200);
    }
}
