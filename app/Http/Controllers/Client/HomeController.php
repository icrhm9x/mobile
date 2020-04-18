<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $category = Category::where('status', 1)->get();
        View::share('category',$category);
    }

    public function index()
    {
        \Assets::addStyles(['jquery-ui', 'nivo-slider', 'preview'])->addScripts(['Nivo-slider', 'home']);
        $product = Product::with('Category:id,slug','ProductType:id,slug');
        $bestSellers = $product->orderByDesc('purchase_number')->limit('8')->get();
        $promotion = $product->where('promotion', '>', 0)->orderByDesc('promotion')->limit('8')->get();
        $newprds = $product->orderByDesc('id')->limit('8')->get();
        $data = [
            'bestSellers' => $bestSellers,
            'promotion' => $promotion,
            'newprds' => $newprds
        ];
        return view('client.home.index', $data);
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
