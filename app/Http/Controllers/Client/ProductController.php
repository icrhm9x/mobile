<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
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

        $ProductType = ProductType::where('slug', $prdType_slug)->first();
        $sameProduct = $ProductType->product;
        $ratings = Rating::where('idProduct', $product->id)->get();
        $idUser = get_data_user('web');
        $count = Rating::where('idProduct', $product->id)->where('idUser', $idUser)->count();
        $data = [
            'product' => $product,
            'sameProduct' => $sameProduct,
            'ratings' => $ratings,
            'count' => $count
        ];
        return view('client.products.detail', $data);
    }
}
