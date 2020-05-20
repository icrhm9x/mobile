<?php

namespace App\Http\Controllers\Admin;

use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\NewsRequest;
use File;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    use StorageImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $news = News::orderByDesc('id');
        if (isset($request->name)) {
            $news->where('name', 'like', '%' . $request->name . '%');
        }
        $news = $news->paginate(6);

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        $dataUploadImg = $this->storageTraitUpload($request, 'avatar', 'news');
        if(!empty($dataUploadImg)) {
            $data = $request->all();
            $data['slug'] = str_slug($request->name);
            $data['idAuthor'] = Auth::guard('members')->user()->id;
            $data['avatar'] = $dataUploadImg['file_path'];
            News::create($data);
            return redirect()->route('news.index')->with('success', 'Thêm sản phẩm thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, $id)
    {

        $news = News::find($id);
        $data = $request->all();
        $data['slug'] = str_slug($request->name);

        if ($request->status === null) {
            $data['status'] = 0;
        }
        $dataUploadImg = $this->storageTraitUpload($request, 'avatar', 'news');
        if(!empty($dataUploadImg)) {
            $data['avatar'] = $dataUploadImg['file_path'];
            $url_file = substr($news->avatar, 1); // xoa dau / trong url
            if (File::exists($url_file)) {
                unlink($url_file);
            }
        } else {
            $data['avatar'] = $news->avatar;
        }
        $news->update($data);
        return redirect()->route('news.index')->with('success', 'Sửa bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $url_file = substr($news->avatar, 1); // xoa dau / trong url
        if (File::exists($url_file)) {
            unlink($url_file);
        }
        $news->delete();
        return response()->json(['message' => 'Xóa thành công'], 200);
    }
}
