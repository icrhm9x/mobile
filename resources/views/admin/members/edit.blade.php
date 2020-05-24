@extends('admin.layouts.master', ['title' => 'Sửa thông tin thành viên'])
@push('styleAdmin')
    <link href="{{ asset('assets/admin/css/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/admin/member/add-member.css') }}" rel="stylesheet"/>
@endpush
@section('content')
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
                    <div class="form-group">
                        <label>Chọn vai trò</label>
                        <select name="role_id[]" class="form-control select2_init" multiple="multiple">
                            <option value=""></option>
                            @foreach($roles as $role)
                                <option
                                    {{ $rolesOfMember->contains('id', $role->id) ? 'selected' : '' }}
                                    value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
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
                    <img id="output_img" src="{{ asset(isset($member->avatar) ? $member->avatar : 'assets/admin/img/default-avatar.png') }}" style="width: 250px">
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
    <script src="{{ asset('assets/admin/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/uploadFile.js') }}"></script>
    <script src="{{ asset('assets/admin/member/add-member.js') }}"></script>
@endpush
