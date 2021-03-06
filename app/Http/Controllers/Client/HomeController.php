<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        \Assets::addStyles(['jquery-ui', 'nivo-slider', 'preview'])->addScripts(['Nivo-slider', 'home']);
        $bestSellers = $this->product->orderByDesc('purchase_number')->limit('8')->get();
        $promotion = $this->product->where('promotion', '>', 0)->orderByDesc('promotion')->limit('8')->get();
        $newprds = $this->product->orderByDesc('id')->limit('8')->get();
        $news = News::whereStatus(1)->orderByDesc('id')->limit(3)->get();
        $data = [
            'bestSellers' => $bestSellers,
            'promotion' => $promotion,
            'newprds' => $newprds,
            'news' => $news
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
