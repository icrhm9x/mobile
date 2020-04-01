<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail()
    {
        \Assets::addStyles(['jquery-ui']);
        return view('client.products.detail');
    }
}
