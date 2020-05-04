<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{
    public function __construct()
    {
        $category = Category::where('status', 1)->get();
        View::share('category',$category);
    }
    public function list(Request $request, $c_slug)
    {
        \Assets::addStyles(['jquery-ui'])->removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        $cate = Category::where('slug', $c_slug)->orderByDesc('id')->firstOrFail();
        $product = Product::with('Category:id,slug','ProductType:id,slug');

        if($request->price){
            $price = $request->price;
            switch($price)
            {
                case '1': $product->where('price','<',1000000);break;
                case '2': $product->whereBetween('price',[1000000,3000000]);break;
                case '3': $product->whereBetween('price',[3000000,5000000]);break;
                case '4': $product->whereBetween('price',[5000000,10000000]);break;
                case '5': $product->where('price','>',10000000);break;
            }
        }

        $gridPrd = $product->where('idCategory', $cate->id)->orderByDesc('id')->paginate(9);
        $listPrd = $product->where('idCategory', $cate->id)->orderByDesc('id')->paginate(4);
        $data = [
            'cate' => $cate,
            'gridPrd' => $gridPrd,
            'listPrd' => $listPrd
        ];
        return view('client.categories.list', $data);
    }
}
