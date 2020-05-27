<?php

namespace App\Http\Controllers\Client;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class SearchController extends Controller
{
    public function __construct()
    {
        $category = Category::where('status', 1)->get();
        View::share('category', $category);
    }

    public function list(Request $request)
    {
        \Assets::addStyles(['jquery-ui'])->removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);

        $product = Product::where('name', 'like', '%' . $request->key . '%');

        if ($request->orderby) {
            $orderby = $request->orderby;
            switch ($orderby) {
                case 'id_desc':
                    $product->orderBy('id', 'DESC');
                    break;
                case 'id_asc':
                    $product->orderBy('id', 'ASC');
                    break;
                case 'price_desc':
                    $product->orderBy('price', 'DESC');
                    break;
                case 'price_asc':
                    $product->orderBy('price', 'ASC');
                    break;
            }
        }

        $listPrd = $product->paginate(12);
        $data = [
            'listPrd' => $listPrd
        ];
        return view('client.search.index', $data);
    }
}
