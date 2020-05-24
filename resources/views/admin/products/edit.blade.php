@extends('admin.layouts.master', ['title' => 'Sửa sản phẩm'])
@section('content')
<style>
    label {
        font-weight: bold;
    }
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
      <li class="breadcrumb-item"><a class="text-black" href="{{ route('product.index') }}">Sản phẩm</a></li>
      <li class="breadcrumb-item active" aria-current="page">Sửa sản phẩm</li>
    </ol>
</nav>
<div class="card shadow mb-4 px-5 pt-4">
    <div class="pb-3">
        <h1 class="h3">Sửa sản phẩm <span class="text-info">{{ $product->name }}</span></h1>
    </div>
    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col-md-8 pr-5">
                <div class="form-group">
                    <label>Tên sản phẩm</label><span class="text-danger"> *</span>
                    <input name="name" type="text" class="form-control" placeholder="Nhập tên sản phẩm" value="{{ $product->name }}">
                    {{ notifyError($errors,'name') }}
                </div>
                <div class="form-group">
                    <label>Số lượng</label><span class="text-danger"> *</span>
                    <input name="quantity" type="number" min="0" class="form-control" value="{{ $product->quantity }}">
                    {{ notifyError($errors,'quantity') }}
                </div>
                <div class="form-group">
                    <label>Đơn giá</label><span class="text-danger"> *</span>
                    <input name="price" type="number" min="0" class="form-control" value="{{ $product->price }}">
                    {{ notifyError($errors,'price') }}
                </div>
                <div class="form-group">
                    <label>Khuyến mãi</label>
                    <input name="promotion" type="number" min="0" class="form-control" placeholder="Nhập giá khuyến mại nếu có" value="{{ $product->promotion }}">
                </div>
                <div class="form-group">
                    <label>Mô tả</label><span class="text-danger"> *</span>
                    <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
                    {{ notifyError($errors,'description') }}
                </div>
                <div class="form-group">
                    <label>Bài viết</label><span class="text-danger"> *</span>
                    <textarea name="article" class="form-control" id="article" rows="4">{{ $product->article }}</textarea>
                    {{ notifyError($errors,'article') }}
                    <script>
                        CKEDITOR.replace( 'article', options);
                    </script>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="idCategory" class="form-control idCatEditJS">
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $product->idCategory == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <select name="idProductType" class="form-control idProTypeEditJS">
                        @foreach ($productTypes as $prd)
                            <option value="{{ $prd->id }}" {{ $product->idProductType == $prd->id ? 'selected' : '' }}>{{ $prd->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Còn hàng</option>
                        <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>Sắp ra mắt</option>
                        <option value="3" {{ $product->status == 3 ? 'selected' : '' }}>Hết hàng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Sản phẩm nổi bật</label>
                    <div class="custom-control custom-switch">
                        <input name="hot" value="1" type="checkbox" class="custom-control-input" id="hot" {{ $product->hot == 1 ? 'checked' : '' }}>
                        <label class="custom-control-label font-weight-normal" for="hot" style="user-select: none">Nổi bật</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ảnh minh họa</label><span class="text-danger"> *</span>
                    <div class="custom-file">
                        <input name="img" type="file" class="custom-file-input" id="input_img">
                        <label class="custom-file-label" for="input_img">Choose file</label>
                    </div>
                    {{ notifyError($errors,'img') }}
                </div>
                <div class="form-group">
                    <img id="output_img" src="{{ asset($product->img_path) }}" style="max-width: 260px">
                </div>
            </div>
            <div class="col-md-12 mb-5">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@push('adminAjax')
    <script src="{{ asset('assets/admin/js/product-ajax.js') }}"></script>
    <script src="{{ asset('assets/admin/js/uploadFile.js') }}"></script>
@endpush
