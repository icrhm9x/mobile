<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('id', 'desc')->paginate(5);
        return view('admin.products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        $firstCat = Category::select('id')->first();
        $productType  = ProductType::where('idCategory', $firstCat->id)->get();
        return view('admin.products.create', ['category' => $category, 'productType' => $productType]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        if ($request->hasFile('img')) {
            $file = $request->img;
            // lấy tên file
            $file_name = $file->getClientOriginalName();
            // lấy loại file
            $file_type = $file->getMimeType();
            // kích thước file đơn vị byte
            $file_size = $file->getSize();

            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg') {

                if ($file_size <= 5242880) {

                    $file_name = date('D-m-yyyy') . '_' . rand() . '_' . utf8tourl($file_name);

                    if ($file->move('img/upload/product', $file_name)) {
                        $data = $request->all();
                        $data['slug'] = utf8tourl($request->name);
                        $data['img'] = $file_name;
                        Product::create($data);
                        return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công');
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product->name, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        $productTypes = ProductType::whereIdcategory($product->idCategory)->get();
        return view('admin.products.edit', ['product' => $product, 'categories' => $categories, 'productTypes' => $productTypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(File::exists('img/upload/product/'.$product->img)){
            unlink('img/upload/product/'.$product->img);
        }
        $product->delete();
        return response()->json(['message' => 'Xóa thành công'],200);
    }
}
