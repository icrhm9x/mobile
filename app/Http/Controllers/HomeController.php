<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Order;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function show()
    {

        $total_rating = Rating::count();
        $earnings_month = Order::whereMonth('created_at', Carbon::now()->month)->sum('totalMoney');
        $data = [
            'total_rating' => $total_rating,
            'earnings_month' => $earnings_month,
        ];
        return view('admin.home.index', $data);
    }
}
