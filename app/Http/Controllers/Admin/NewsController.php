<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\NewsRequest;
use File;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            // lấy đuôi file
            $file_name = $file->getClientOriginalExtension();
            // lấy loại file
            $file_type = $file->getMimeType();
            // kích thước file đơn vị byte
            $file_size = $file->getSize();

            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg') {

                if ($file_size <= 5242880) {

                    $file_name = date('D-m-yyyy') . '-' . rand() . '.' . $file_name;

                    if ($file->move('img/upload/news', $file_name)) {
                        $data = $request->all();
                        $data['slug'] = str_slug($request->name);
                        $data['avatar'] = $file_name;
                        $data['idAuthor'] = Auth::guard('members')->user()->id;
                        News::create($data);
                        return redirect()->route('news.index')->with('success', 'Thêm sản phẩm thành công');
                    }
                } else {
                    return back()->with('error', 'Bạn không thể upload ảnh quá 5mb');
                }
            } else {
                return back()->with('error', 'File bạn chọn không phải là hình ảnh');
            }
        } else {
            return back()->with('error', 'Bạn chưa thêm ảnh minh họa cho sản phẩm');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {

        $news = News::find($id);
        $data = $request->all();
        $data['slug'] = str_slug($request->name);

        if ($request->status === null) {
            $data['status'] = 0;
        }
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            // lấy đuôi file
            $file_name = $file->getClientOriginalExtension();
            // lấy loại file
            $file_type = $file->getMimeType();
            // kích thước file đơn vị byte
            $file_size = $file->getSize();

            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg') {

                if ($file_size <= 5242880) {

                    $file_name = date('D-m-yyyy') . '-' . rand() . '.' . $file_name;

                    if ($file->move('img/upload/news', $file_name)) {
                        $data['avatar'] = $file_name;
                        if (File::exists('img/upload/news/' . $news->avatar)) {
                            unlink('img/upload/news/' . $news->avatar);
                        }
                    }
                } else {
                    return back()->with('error', 'Bạn không thể upload ảnh quá 5mb');
                }
            } else {
                return back()->with('error', 'File bạn chọn không phải là hình ảnh');
            }
        } else {
            $data['avatar'] = $news->avatar;
        }
        $news->update($data);
        return redirect()->route('news.index')->with('success', 'Sửa bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        if (File::exists('img/upload/news/' . $news->avatar)) {
            unlink('img/upload/news/' . $news->avatar);
        }
        $news->delete();
        return response()->json(['message' => 'Xóa thành công'], 200);
    }
}
