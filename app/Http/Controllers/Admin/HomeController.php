<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Order;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function show()
    {
        $totalOrder = Order::count();
        $totalRating = Rating::count();
        $earningsMonth = Order::whereMonth('created_at', Carbon::now()->month)->sum('totalMoney');
        $totalProduct = Product::count();
        $orders = Order::orderByDesc('id')->limit(5)->get();
        $products = Product::orderByDesc('purchase_number')->limit(5)->get();
        $data = [
            'totalOrder' => $totalOrder,
            'totalRating' => $totalRating,
            'earningsMonth' => $earningsMonth,
            'totalProduct' => $totalProduct,
            'orders' => $orders,
            'products' => $products,
        ];
        return view('admin.home.index', $data);
    }
}
