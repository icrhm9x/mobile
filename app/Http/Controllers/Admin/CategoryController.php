<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.categories.index', compact("category"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'status' => $request->status
        ]);
        $category = Category::all();
        $tableComponent = view('admin.categories.components.tableComponent', compact('category'))->render();
        return response()->json(['message' => 'Thêm mới thành công', 'tableComponent' => $tableComponent, 'code' => 200], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::find($id);
        return response()->json($category, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
            'slug' => utf8tourl($request->name),
            'status' => $request->status
        ]);
        $category = Category::all();
        $tableComponent = view('admin.categories.components.tableComponent', compact('category'))->render();
        return response()->json(['message' => 'Sửa thành công', 'tableComponent' => $tableComponent, 'code' => 200], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        $category = Category::all();
        $tableComponent = view('admin.categories.components.tableComponent', compact('category'))->render();
        return response()->json(['message' => 'Xóa thành công', 'tableComponent' => $tableComponent, 'code' => 200], 200);
    }
}
