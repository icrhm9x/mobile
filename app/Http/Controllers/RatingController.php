<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function show()
    {
        $ratings = Rating::orderBy('id')->paginate(10);
        return view('admin.ratings.index', compact('ratings'));
    }
}
