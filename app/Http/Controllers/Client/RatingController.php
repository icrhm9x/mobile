<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Product;
use Carbon\Carbon;

class RatingController extends Controller
{
    public function saveRating($id, Request $request)
    {
        $rating = Rating::create([
            'idProduct' => $id,
            'idUser' => get_data_user('web'),
            'number' => $request->number,
            'content' => $request->content,
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
