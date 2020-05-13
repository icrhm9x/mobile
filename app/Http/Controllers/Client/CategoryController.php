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

        if($request->orderby){
            $orderby = $request->orderby;
            switch($orderby)
            {
                case 'id_desc': $product->orderBy('id', 'DESC');break;
                case 'id_asc': $product->orderBy('id', 'ASC');break;
                case 'price_desc': $product->orderBy('price', 'DESC');break;
                case 'price_asc': $product->orderBy('price', 'ASC');break;
            }
        }

        $listPrd = $product->where('idCategory', $cate->id)->orderByDesc('id')->paginate(6);
        $data = [
            'cate' => $cate,
            'listPrd' => $listPrd
        ];
        return view('client.categories.list', $data);
    }
}
