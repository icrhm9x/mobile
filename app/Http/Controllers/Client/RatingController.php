<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Product;
use Carbon\Carbon;
use App\Http\Requests\SaveRatingRequest;

class RatingController extends Controller
{
    public function saveRating($id, SaveRatingRequest $request)
    {
        $idUser = get_data_user('web');
        $check = Rating::where('idProduct', $id)->where('idUser', $idUser)->count();
        if($check > 0){
            return redirect()->back()->with('warning', 'Bạn đã đánh giá sản phẩm này');
        }
        $rating = Rating::create([
            'idProduct' => $id,
            'idUser' => $idUser,
            'number' => $request->number,
            'comment' => $request->comment,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $product = Product::find($id);
        $product->star_total += $request->number;
        $product->star_number += 1;
        $product->save();

        return redirect()->back()->with('success', 'Gửi đánh giá thành công');
    }
}
