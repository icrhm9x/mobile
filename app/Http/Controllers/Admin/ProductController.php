<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Http\Requests\StoreProductRequest;
use App\Models\Rating;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use File;

class ProductController extends Controller
{
    use StorageImageTrait;

    public function index(Request $request)
    {
        $products = Product::with('Category', 'ProductType');
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

    public function getPrdType(Request $request){
        $productTypes = ProductType::where('idCategory',$request->idCat)->get();
        return response()->json($productTypes, 200);
    }

    public function create()
    {
        if (Category::count() > 0) {
            if (ProductType::count() > 0) {
                $categories = Category::get();
                $firstCat = Category::min('id');
                $productTypes = ProductType::where('idCategory', $firstCat)->get();
                return view('admin.products.create', ['categories' => $categories, 'productTypes' => $productTypes]);
            } else {
                return redirect()->route('productType.index')->with('warning', 'Bạn cần tạo Loại sản phẩm trước');
            }
        } else {
            return redirect()->route('category.index')->with('warning', 'Bạn cần tạo Danh mục trước');
        }
    }

    public function store(StoreProductRequest $request)
    {
        $dataUploadImg = $this->storageTraitUpload($request, 'img', 'product');
        if (!empty($dataUploadImg)) {
            $data = $request->all();
            $data['slug'] = str_slug($request->name);
            $data['img_name'] = $dataUploadImg['file_name'];
            $data['img_path'] = $dataUploadImg['file_path'];
            Product::create($data);
            return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công');
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        $productTypes = ProductType::whereIdcategory($product->idCategory)->get();
        return view('admin.products.edit',
            ['product' => $product, 'categories' => $categories, 'productTypes' => $productTypes]);
    }

    public function update(StoreProductRequest $request, $id)
    {
        $product = Product::find($id);
        $data = $request->all();
        $data['slug'] = str_slug($request->name);

        if ($request->hot === null) {
            $data['hot'] = 0;
        }
        $dataUploadImg = $this->storageTraitUpload($request, 'img', 'product');
        if (!empty($dataUploadImg)) {
            $data['img_name'] = $dataUploadImg['file_name'];
            $data['img_path'] = $dataUploadImg['file_path'];
            $url_file = substr($product->img_path, 1); // xoa dau / trong url
            if (File::exists($url_file)) {
                unlink($url_file);
            }
        } else {
            $data['img_name'] = $product->img_name;
            $data['img_path'] = $product->img_path;
        }
        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Sửa sản phẩm thành công');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $url_file = substr($product->img_path, 1); // xoa dau / trong url
        if (File::exists($url_file)) {
            unlink($url_file);
        }
        $product->delete();
        Rating::where('idProduct', $id)->delete();
        return response()->json(['message' => 'Xóa thành công'], 200);
    }
}
