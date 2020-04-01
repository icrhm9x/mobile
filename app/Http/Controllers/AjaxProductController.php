<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;

class AjaxProductController extends Controller
{
    public function getPrdType(Request $request){
        $productType = ProductType::where('idCategory',$request->idCat)->get();
        return response()->json($productType, 200);
    }
}
