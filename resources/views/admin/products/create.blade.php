@extends('admin.layouts.master', ['title' => 'Thêm mới sản phẩm'])
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
      <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
    </ol>
</nav>
<div class="card shadow mb-4 px-5 pt-4">
    <div class="pb-3">
        <h1 class="h3 text-info">Thêm sản phẩm</h1>
    </div>
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col-md-8 pr-5">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input name="name" type="text" class="form-control" placeholder="Nhập tên sản phẩm">
                    {{ notifyError($errors,'name') }}
                </div>
                <div class="form-group">
                    <label>Số lượng</label>
                    <input name="quantity" type="number" min="1" class="form-control">
                    {{ notifyError($errors,'quantity') }}
                </div>
                <div class="form-group">
                    <label>Đơn giá</label>
                    <input name="price" type="number" min="0" class="form-control">
                    {{ notifyError($errors,'price') }}
                </div>
                <div class="form-group">
                    <label>Khuyến mãi</label>
                    <input name="promotion" type="number" min="0" class="form-control" placeholder="Nhập giá khuyến mại nếu có">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                    {{ notifyError($errors,'description') }}
                </div>
                <div class="form-group">
                    <label>Bài viết</label>
                    <textarea name="article" class="form-control" id="article" rows="4"></textarea>
                    {{ notifyError($errors,'article') }}
                    <script>
                        CKEDITOR.replace( 'article' );
                    </script>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="idCategory" class="form-control idCatCreateJS">
                        @foreach ($category as $cat)
                            <option value="{{ $cat->id }}" >{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <select name="idProductType" class="form-control idProTypeCreateJS">
                        @foreach ($productType as $prd)
                            <option value="{{ $prd->id }}" >{{ $prd->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="1" >Còn hàng</option>
                        <option value="2" >Sắp ra mắt</option>
                        <option value="3" >Hết hàng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Sản phẩm nổi bật</label>
                    <div class="custom-control custom-switch">
                        <input name="hot" value="1" type="checkbox" class="custom-control-input" id="hot">
                        <label class="custom-control-label font-weight-normal" for="hot" style="user-select: none">Nổi bật</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ảnh minh họa</label>
                    <input type="file" id="input_img" name="img" class="form-control-file">
                    {{ notifyError($errors,'img') }}
                </div>
                <div class="form-group">
                    <img id="output_img" src="/img/upload/product/default.jpg" style="max-width: 260px">
                </div>
            </div>
            <div class="col-md-12 mb-5">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Thêm mới</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@push('adminAjax')
    <script src="/assets/admin/js/product-ajax.js"></script>
@endpush
