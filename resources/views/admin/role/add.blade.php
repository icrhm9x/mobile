@extends('admin.layouts.master',['title' => 'Thêm vai trò'])
@push('styleAdmin')
    <link rel="stylesheet" href="{{ asset('assets/admin/role/add.css') }}">
@endpush
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
            <li class="breadcrumb-item"><a class="text-black" href="{{ route('role.index') }}">Vai trò</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
        </ol>
    </nav>
    <div class="card shadow mb-4 px-5 pt-4">
        <div class="pb-3">
            <h1 class="h3 text-info">Thêm vai trò</h1>
        </div>
        <form action="{{ route('role.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Tên vai trò</label><span class="text-danger"> *</span>
                        <input name="name" type="text" class="form-control" placeholder="Nhập tên bài viết"
                               value="{{ old('name') }}">
                        {{ notifyError($errors,'name') }}
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label><span class="text-danger"> *</span>
                        <textarea name="display_name" class="form-control" rows="3">{{ old('display_name') }}</textarea>
                        {{ notifyError($errors,'description') }}
                    </div>
                </div>
                @foreach($permissionsParent as $permissionsParentItem)
                    @if(count($permissionsParentItem->permissionsChildrents) > 0)
                        <div class="col-md-12 card_wrapper">
                            <div class="form-group">
                                <div class="card">
                                    <h5 class="card-header">
                                        <label for="parent-{{ $permissionsParentItem->id }}">
                                            <input type="checkbox" value="{{ $permissionsParentItem->id }}"
                                                   id="parent-{{ $permissionsParentItem->id }}"
                                                   class="checkbox_wrapper">
                                            Module {{ $permissionsParentItem->name }}
                                        </label>
                                    </h5>
                                    <div class="row">
                                        @foreach($permissionsParentItem->permissionsChildrents as $permissionsChildrentItem)
                                            <div class="card-body col-md-3">
                                                <p class="card-text pl-2">
                                                    <label for="childrent-{{ $permissionsChildrentItem->id }}">
                                                        <input type="checkbox" name="permission_id[]"
                                                               value="{{ $permissionsChildrentItem->id }}"
                                                               id="childrent-{{ $permissionsChildrentItem->id }}"
                                                               class="checkbox_childrent">
                                                        {{ $permissionsChildrentItem->name }}
                                                    </label>
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="col-md-12 my-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Thêm mới</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('adminAjax')
    <script src="{{ asset('assets/admin/role/add.js') }}"></script>
@endpush

