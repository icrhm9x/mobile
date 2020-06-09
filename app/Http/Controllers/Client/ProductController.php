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
    public function detail($prd_slug)
    {
        \Assets::addStyles(['jquery-ui']);

        $product = Product::with('category','productType')->whereSlug($prd_slug)->firstOrFail();
        $sameProduct = Product::where('idProductType', $product->productType->id)->where('id', '<>', $product->id)->get();
        $ratings = Rating::with('user')->where('idProduct', $product->id)->get();
        $idUser = get_data_user('web');
        $countRating = Rating::where('idProduct', $product->id)->where('idUser', $idUser)->count();
        $data = [
            'product' => $product,
            'sameProduct' => $sameProduct,
            'ratings' => $ratings,
            'countRating' => $countRating
        ];
        return view('client.products.detail', $data);
    }
}
