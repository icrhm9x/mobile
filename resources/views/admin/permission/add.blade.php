@extends('admin.layouts.master', ['title' => 'Thêm quyền'])
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
            <li class="breadcrumb-item"><a class="text-black" href="{{ route('permission.index') }}">Quyền</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm quyền</li>
        </ol>
    </nav>
    <div class="card shadow mb-4 px-5 pt-4">
        <div class="pb-3">
            <h1 class="h3 text-info">Thêm quyền</h1>
        </div>
        <form action="{{ route('permission.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Tên module</label><span class="text-danger"> *</span>
                        <input name="name" type="text" class="form-control" placeholder="Nhập tên quyền"
                               value="{{ old('name') }}">
                        {{ notifyError($errors,'name') }}
                    </div>
                    <div class="form-group">
                        <label>Key code</label><span class="text-danger"> *</span>
                        <select name="key_code" class="form-control" id="exampleFormControlSelect1">
                            @foreach(config('permissions.key_code') as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="permission">Chọn quyền cha</label>
                        <select class="form-control" id="permission" name="parent_id">
                            <option value="0">Chọn quyền cha</option>
                            {!! $html !!}
                        </select>
                    </div>
                </div>
                <div class="col-md-12 my-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Thêm mới</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
