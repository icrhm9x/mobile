<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function index(Request $request)
    {
        $products = Product::with('Category:id,name', 'ProductType:id,name');
        if ($request->name != '') {
            $products->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->cate != '') {
            $products->where('idCategory', $request->cate);
        }
        if ($request->prdType != '') {
            $products->where('idProductType', $request->prdType);
        }
        $products = $products->orderByDesc('id')->paginate(5);
        $categories = Category::get();
        $productTypes = ProductType::get();
        $data = [
            'products' => $products,
            'categories' => $categories,
            'productTypes' => $productTypes
        ];
        return view('admin.products.index', $data);
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
        $productType = ProductType::where('idCategory', $firstCat->id)->get();
        return view('admin.products.create', ['category' => $category, 'productType' => $productType]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        if ($request->hasFile('img')) {
            $file = $request->img;
            // lấy đuôi file
            $file_name = $file->getClientOriginalExtension();
            // lấy loại file
            $file_type = $file->getMimeType();
            // kích thước file đơn vị byte
            $file_size = $file->getSize();

            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg') {

                if ($file_size <= 5242880) {

                    $file_name = date('D-m-yyyy') . '-' . rand() . '.' . $file_name;

                    if ($file->move('img/upload/product', $file_name)) {
                        $data = $request->all();
                        $data['slug'] = str_slug($request->name);
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
     * @param \App\Product $product
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
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        $productTypes = ProductType::whereIdcategory($product->idCategory)->get();
        return view('admin.products.edit',
            ['product' => $product, 'categories' => $categories, 'productTypes' => $productTypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $product = Product::find($id);
        $data = $request->all();
        $data['slug'] = str_slug($request->name);

        if ($request->hot === null) {
            $data['hot'] = 0;
        }

        if ($request->hasFile('img')) {
            $file = $request->img;
            // lấy đuôi file
            $file_name = $file->getClientOriginalExtension();
            // lấy loại file
            $file_type = $file->getMimeType();
            // kích thước file đơn vị byte
            $file_size = $file->getSize();

            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg') {

                if ($file_size <= 5242880) {

                    $file_name = date('D-m-yyyy') . '-' . rand() . '.' . $file_name;

                    if ($file->move('img/upload/product', $file_name)) {
                        $data['img'] = $file_name;
                        if (File::exists('img/upload/product/' . $product->img)) {
                            unlink('img/upload/product/' . $product->img);
                        }
                    }
                } else {
                    return back()->with('error', 'Bạn không thể upload ảnh quá 5mb');
                }
            } else {
                return back()->with('error', 'File bạn chọn không phải là hình ảnh');
            }
        } else {
            $data['img'] = $product->img;
        }
        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Sửa sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (File::exists('img/upload/product/' . $product->img)) {
            unlink('img/upload/product/' . $product->img);
        }
        $product->delete();
        return response()->json(['message' => 'Xóa thành công'], 200);
    }
}
