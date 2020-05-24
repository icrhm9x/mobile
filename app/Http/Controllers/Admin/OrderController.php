<?php

namespace App\Http\Controllers\Admin;

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

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        OrderDetail::where('idOrder', $id)->delete();
        return response()->json(['message' => 'Xóa thành công'], 200);
    }
}
