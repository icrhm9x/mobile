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
    public function list(Request $request, $c_slug)
    {
        \Assets::addStyles(['jquery-ui'])->removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);

        $category = Category::with('productTypes')->where('slug', $c_slug)->orderByDesc('id')->firstOrFail();
        $products = Product::with('category', 'productType');

        if ($request->price) {
            $price = $request->price;
            switch ($price) {
                case '1':
                    $products->where('price', '<', 1000000);
                    break;
                case '2':
                    $products->whereBetween('price', [1000000, 3000000]);
                    break;
                case '3':
                    $products->whereBetween('price', [3000000, 5000000]);
                    break;
                case '4':
                    $products->whereBetween('price', [5000000, 10000000]);
                    break;
                case '5':
                    $products->where('price', '>', 10000000);
                    break;
            }
        }

        if ($request->orderby) {
            $orderby = $request->orderby;
            switch ($orderby) {
                case 'id_desc':
                    $products->orderBy('id', 'DESC');
                    break;
                case 'id_asc':
                    $products->orderBy('id', 'ASC');
                    break;
                case 'price_desc':
                    $products->orderBy('price', 'DESC');
                    break;
                case 'price_asc':
                    $products->orderBy('price', 'ASC');
                    break;
            }
        }

        $listProduct = $products->where('idCategory', $category->id)->orderByDesc('id')->paginate(6);
        $data = [
            'category' => $category,
            'listProduct' => $listProduct
        ];
        return view('client.categories.list', $data);
    }
}
