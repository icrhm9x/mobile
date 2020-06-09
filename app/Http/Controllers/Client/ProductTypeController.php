<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\Facades\View;

class ProductTypeController extends Controller
{
    public function list(Request $request, $prdType_slug)
    {
        \Assets::addStyles(['jquery-ui'])->removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);

        $productType = ProductType::with('category')->where('slug', $prdType_slug)->orderByDesc('id')->firstOrFail();
        $menuProductType = ProductType::with('products')->where('idCategory', $productType->category->id)->get();

        $product = Product::with('category','productType');

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

        $listProduct = $product->where('idProductType', $productType->id)->orderByDesc('id')->paginate(6);
        $data = [
            'productType' => $productType,
            'menuProductType' => $menuProductType,
            'listProduct' => $listProduct
        ];
        return view('client.productTypes.list', $data);
    }
}
