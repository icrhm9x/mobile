<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\View;

class NewsController extends Controller
{
    public function __construct()
    {
        $category = Category::where('status', 1)->get();
        View::share('category',$category);
    }

    public function show()
    {
        \Assets::addStyles(['jquery-ui'])->removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        $news = News::orderByDesc('id')->paginate(6);
        return view('client.news.index', compact('news'));
    }

    public function detail($n_slug)
    {
        \Assets::addStyles(['jquery-ui'])->removeStyles(['owl-carousel'])->removeScripts(['owl-carousel']);
        $news = News::whereSlug($n_slug)->firstOrFail();
        $list = News::orderByDesc('id')->limit(3)->get();
        $data = [
            'news' => $news,
            'list' => $list
        ];
        return view('client.news.detail', $data);
    }
}
