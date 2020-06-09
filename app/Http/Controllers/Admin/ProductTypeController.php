<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreProductTypeRequest;

class ProductTypeController extends Controller
{
    public function index()
    {
        if(Category::count() > 0) {
            $categories = Category::all();
            $productTypes = ProductType::with('Category')->orderBy('id', 'desc')->paginate(10);
            $data = [
                'categories' => $categories,
                'productTypes' => $productTypes
            ];
            return view('admin.productType.index', $data);
        }else{
            return redirect()->route('category.index')->with('warning', 'Bạn phải tạo Danh mục trước');
        }
    }

    public function store(StoreProductTypeRequest $request)
    {
        $data = $request->all();
        $data['slug'] = str_slug($request->name);
        ProductType::create($data);
        $productTypes = ProductType::with('Category')->orderByDesc('id')->paginate(10);
        $tableComponent = view('admin.productType.components.table-component', compact('productTypes'))->render();
        return response()->json(['message' => 'Thêm mới thành công','tableComponent' => $tableComponent, 'code' => 200],200);
    }

    public function show($id)
    {
        //
        $productType = ProductType::find($id);
        return response()->json($productType,200);
    }

    public function edit($id)
    {
        $productType = ProductType::find($id);
        $categories = Category::where('status',1)->get();
        $html = '';
        foreach ($categories as $value) {
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

    public function update(StoreProductTypeRequest $request, $id)
    {
        $productType = ProductType::find($id);
        $data = $request->all();
        $data['slug'] = str_slug($request->name);
        $productType->update($data);
        $productTypes = ProductType::with('Category:id,name')->orderByDesc('id')->paginate(10);
        $tableComponent = view('admin.productType.components.table-component', compact('productTypes'))->render();
        return response()->json(['message' => 'Sửa thành công', 'tableComponent' => $tableComponent, 'code' => 200],200);
    }

    public function destroy($id)
    {
        $productType = ProductType::find($id);
        $productType->delete();
        $productTypes = ProductType::orderByDesc('id')->paginate(10);
        $tableComponent = view('admin.productType.components.table-component', compact('productTypes'))->render();
        return response()->json(['message' => 'Xóa thành công', 'tableComponent' => $tableComponent, 'code' => 200], 200);
    }
}
