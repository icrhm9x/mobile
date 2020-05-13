<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;

class OrderDetailController extends Controller
{
    public function show($id)
    {
        $orders = OrderDetail::where('idOrder', $id)->get();
        $html = view('admin.orders.orderDetail', compact('orders'))->render();
        return response()->json($html);
    }
}
