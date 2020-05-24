<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::orderBy('id')->paginate(10);
        return view('admin.ratings.index', compact('ratings'));
    }
}
