@extends('admin.layouts.master', ['title' => 'Sửa thông tin thành viên'])
@section('content')
<style>
    label {
        font-weight: bold;
    }
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
      <li class="breadcrumb-item"><a class="text-black" href="{{ route('member.index') }}">Thành viên</a></li>
      <li class="breadcrumb-item active" aria-current="page">Thêm thành viên</li>
    </ol>
</nav>
<div class="card shadow mb-4 px-5 pt-4">
    <div class="pb-3">
        <h1 class="h3 text-info">Thêm thành viên</h1>
    </div>
    <form action="{{ route('member.update', $member->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col-md-7 pr-5">
                <div class="form-group">
                    <label>Tên thành viên</label><span class="text-danger"> *</span>
                    <input name="name" type="text" class="form-control" placeholder="Nhập tên thành viên" value="{{ $member->name }}">
                    {{ notifyError($errors,'name') }}
                </div>
                <div class="form-group">
                    <label>Email</label><span class="text-danger"> *</span>
                    <input name="email" type="email" class="form-control" placeholder="Nhập email" value="{{ $member->email }}">
                    {{ notifyError($errors,'email') }}
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label><span class="text-danger"> *</span>
                    <input name="password" type="password" class="form-control" placeholder="Nhập mật khẩu" value="">
                    {{ notifyError($errors,'password') }}
                </div>
                <div class="form-group">
                    <label>Nhập lại mật khẩu</label><span class="text-danger"> *</span>
                    <input name="re_password" type="password" class="form-control" placeholder="Nhập mật khẩu" value="">
                    {{ notifyError($errors,'re_password') }}
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6 mr-5">
                            <div class="form-group">
                                <label>Ruler</label>
                                <select name="ruler" class="form-control">
                                    <option value="1" {{ $member->ruler == 1 ? "selected='selected'" : '' }}>Boss</option>
                                    <option value="2" {{ $member->ruler == 2 ? "selected='selected'" : '' }}>Super Admin</option>
                                    <option value="3" {{ $member->ruler == 3 ? "selected='selected'" : '' }}>Admin</option>
                                    <option value="4" {{ $member->ruler == 4 ? "selected='selected'" : '' }}>Mod</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status</label>
                                <div class="custom-control custom-switch">
                                    <input name="status" value="1" type="checkbox" class="custom-control-input" id="status" {{ $member->status != 0 ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="status" style="user-select: none">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label>Ảnh đại diện</label><span class="text-danger"> *</span>
                    <div class="custom-file">
                        <input name="avatar" type="file" class="custom-file-input" id="input_img">
                        <label class="custom-file-label" for="input_img">Choose file</label>
                    </div>
                    {{ notifyError($errors,'avatar') }}
                </div>
                <div class="form-group">
                    <img id="output_img" src="/img/upload/member/{{ $member->avatar }}" style="width: 250px">
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