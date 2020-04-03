<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $category = Category::where('status', 1)->get();
        view()->share(['category' => $category]);
    }

    public function index()
    {
        \Assets::addStyles(['jquery-ui', 'nivo-slider', 'preview'])->addScripts(['Nivo-slider', 'home']);
        return view('client.home.index');
    }

    public function about()
    {
        \Assets::removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        return view('client.home.about');
    }

    public function contact()
    {
        \Assets::addScripts(['gmap'])->removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        return view('client.home.contact');
    }
}
