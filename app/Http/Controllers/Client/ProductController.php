<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;

class ProductController extends Controller
{
    public function detail($c_slug, $prdType_slug, $prd_slug)
    {
        \Assets::addStyles(['jquery-ui']);
        $product = Product::with('Category:id,name,slug','ProductType:id,name,slug')->whereSlug($prd_slug)->firstOrFail();
        $newPrd = Product::orderByDesc('id')->limit(8)->get();
        $ratings = Rating::where('idProduct', $product->id)->get();
        $idUser = get_data_user('web');
        $count = Rating::where('idProduct', $product->id)->where('idUser', $idUser)->count();
        $data = [
            'product' => $product,
            'newPrd' => $newPrd,
            'ratings' => $ratings,
            'count' => $count
        ];
        return view('client.products.detail', $data);
    }
}
