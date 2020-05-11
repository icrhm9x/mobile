@extends('admin.layouts.master', ['title' => 'Thêm mới bài viết'])
@section('content')
<style>
    label {
        font-weight: bold;
    }
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
      <li class="breadcrumb-item"><a class="text-black" href="{{ route('news.index') }}">Bài viết</a></li>
      <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
    </ol>
</nav>
<div class="card shadow mb-4 px-5 pt-4">
    <div class="pb-3">
        <h1 class="h3 text-info">Thêm bài viết</h1>
    </div>
    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col-md-8 pr-5">
                <div class="form-group">
                    <label>Tên bài viết</label><span class="text-danger"> *</span>
                    <input name="name" type="text" class="form-control" placeholder="Nhập tên bài viết" value="{{ old('name') }}">
                    {{ notifyError($errors,'name') }}
                </div>
                <div class="form-group">
                    <label>Mô tả</label><span class="text-danger"> *</span>
                    <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                    {{ notifyError($errors,'description') }}
                </div>
                <div class="form-group">
                    <label>Bài viết</label><span class="text-danger"> *</span>
                    <textarea name="article" class="form-control" id="article" rows="4">{{ old('article') }}</textarea>
                    {{ notifyError($errors,'article') }}
                    <script>
                        CKEDITOR.replace('article', options);
                    </script>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Hiển thị bài viết</label>
                    <div class="custom-control custom-switch">
                        <input name="status" value="1" type="checkbox" class="custom-control-input" id="status">
                        <label class="custom-control-label font-weight-normal" for="status" style="user-select: none">Hiển thị</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ảnh minh họa</label><span class="text-danger"> *</span>
                    <div class="custom-file">
                        <input name="avatar" type="file" class="custom-file-input" id="input_img">
                        <label class="custom-file-label" for="input_img">Choose file</label>
                    </div>
                    {{ notifyError($errors,'avatar') }}
                </div>
                <div class="form-group">
                    <img id="output_img" src="/img/upload/product/default.jpg" style="width: 330px">
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
<script>
    // hien thi ten file upload bang bootstrap
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });

    // Preview an image before it is uploaded
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $("#output_img").attr("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    $("#input_img").change(function() {
        readURL(this);
    });
</script>
@endpush
