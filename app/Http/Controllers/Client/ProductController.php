<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    public function __construct()
    {
        $category = Category::where('status', 1)->get();
        View::share('category',$category);
    }

    public function detail($c_slug, $prdType_slug, $prd_slug)
    {
        \Assets::addStyles(['jquery-ui']);
        $product = Product::with('Category:id,name,slug','ProductType:id,name,slug')->whereSlug($prd_slug)->firstOrFail();
        $data = [
            'product' => $product
        ];
        return view('client.products.detail', $data);
    }
}
