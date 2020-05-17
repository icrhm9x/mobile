<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        if(Category::count() > 0) {
            $category = Category::all();
            $productType = ProductType::with('Category:id,name')->orderBy('id', 'desc')->paginate(10);
            $data = [
                'category' => $category,
                'productType' => $productType
            ];
            return view('admin.productType.index', $data);
        }else{
            return redirect()->route('category.index')->with('warning', 'Bạn phải tạo Danh mục trước');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $data['slug'] = str_slug($request->name);
        ProductType::create($data);
        $productType = ProductType::with('Category:id,name')->orderByDesc('id')->paginate(10);
        $tableComponent = view('admin.productType.components.tableComponent', compact('productType'))->render();
        return response()->json(['message' => 'Thêm mới thành công','tableComponent' => $tableComponent, 'code' => 200],200);
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
     */
    public function edit($id)
    {
        $productType = ProductType::find($id);
        $category = Category::where('status',1)->get();
        $html = '';
        foreach ($category as $value) {
            if ($value->id == $productType->idCategory) {
                $html .="<option value=".$value->id." selected='selected'>";
            } else {
                $html .="<option value=".$value->id.">";
            }
            $html .= $value->name;
            $html .= "</option>";
        }
        return response()->json(['productType' => $productType, 'listCat' => $html],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductTypeRequest $request, $id)
    {
        $productType = ProductType::find($id);
        $data = $request->all();
        $data['slug'] = str_slug($request->name);
        $productType->update($data);
        $productType = ProductType::with('Category:id,name')->orderByDesc('id')->paginate(10);
        $tableComponent = view('admin.productType.components.tableComponent', compact('productType'))->render();
        return response()->json(['message' => 'Sửa thành công', 'tableComponent' => $tableComponent, 'code' => 200],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productType = ProductType::find($id);
        $productType->delete();
        $productType = ProductType::orderByDesc('id')->paginate(10);
        $tableComponent = view('admin.productType.components.tableComponent', compact('productType'))->render();
        return response()->json(['message' => 'Xóa thành công', 'tableComponent' => $tableComponent, 'code' => 200], 200);
    }
}
