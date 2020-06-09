@extends('admin.layouts.master',['title' => 'Danh mục'])
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh mục</li>
        </ol>
    </nav>
    @can('category_add')
        <button type="button" data-toggle="modal" data-target="#addCatModal" class="btn btn-info mb-3 addCatJS">
            <i class="fas fa-plus"></i> Thêm mới
        </button>
    @endcan
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Danh sách danh mục</h6>
        </div>
        <div class="card-body">
            @include('admin.categories.components.table-component')
        </div>
    </div>

    @can('category_add')
        <!-- Add Modal-->
        @include('admin.categories.add-modal')
    @endcan
    @can('category_edit')
        <!-- Edit Modal-->
        @include('admin.categories.edit-modal')
    @endcan
    @can('category_delete')
        <!-- delete Modal-->
        @include('admin.categories.del-modal')
    @endcan

@endsection
@push('adminAjax')
    <!-- ajax modal -->
    <script src="{{ asset('assets/admin/js/category-ajax.js') }}"></script>
@endpush
