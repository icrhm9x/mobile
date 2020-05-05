<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function getOrder()
    {
        $order = Order::orderByDesc('id')->paginate(10);
        return view('admin.orders.index', compact('order'));
    }
}
