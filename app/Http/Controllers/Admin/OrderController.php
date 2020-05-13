<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function getOrder()
    {
        $order = Order::orderByDesc('id')->paginate(10);
        return view('admin.orders.index', compact('order'));
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        $orderDetail = OrderDetail::where('idOrder', $id)->delete();
        return response()->json(['message' => 'Xóa thành công'], 200);
    }
}
