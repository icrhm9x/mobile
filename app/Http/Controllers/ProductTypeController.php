<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreProductTypeRequest;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productType = ProductType::orderBy('id', 'desc')->paginate(6);
        return view('admin.productType.index', compact('productType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status',1)->get();
        return response()->json(['category' => $category],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductTypeRequest $request)
    {
        $data = $request->all();
        $data['slug'] = utf8tourl($request->name);
        if(ProductType::create($data)){
            return response()->json(['message' => 'Thêm mới thành công'],200);
        }else{
            return response()->json(['message' => 'Đã có lỗi xảy ra, vui lòng thử lại'],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $productType = ProductType::find($id);
        return response()->json($productType,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productType = ProductType::find($id);
        $category = Category::where('status',1)->get();
        return response()->json(['category' => $category, 'productType' => $productType],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductTypeRequest $request, $id)
    {
        
        $productType = ProductType::find($id);
        $data = $request->all();
        $data['slug'] = utf8tourl($request->name);
        if($productType->update($data)){
            return response()->json(['message' => 'Sửa thành công'],200);
        }else{
            return response()->json(['message' => 'Đã có lỗi xảy ra, vui lòng thử lại'],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productType = ProductType::find($id);
        if($productType->delete()){
            return response()->json(['message' => 'Xóa thành công'],200);
        }else{
            return response()->json(['message' => 'Đã có lỗi xảy ra, vui lòng thử lại'],200);
        }
    }
}
