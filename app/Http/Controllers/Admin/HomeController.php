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
        $total_order = Order::count();
        $total_rating = Rating::count();
        $earnings_month = Order::whereMonth('created_at', Carbon::now()->month)->sum('totalMoney');
        $total_product = Product::count();
        $data = [
            'total_order' => $total_order,
            'total_rating' => $total_rating,
            'earnings_month' => $earnings_month,
            'total_product' => $total_product,
        ];
        return view('admin.home.index', $data);
    }
}
