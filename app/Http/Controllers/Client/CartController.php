<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        return view('client.cart.index');
    }

    public function checkout()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        return view('client.cart.checkout');
    }

    public function complete()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        return view('client.cart.complete');
    }
}
