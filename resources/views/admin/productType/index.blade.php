@extends('admin.layouts.master',['title' => 'Loại sản phẩm'])
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Loại sản phẩm</li>
        </ol>
    </nav>
    @can('productType_add')
        <button type="button" data-toggle="modal" data-target="#addPrTypeModal" class="btn btn-info mb-3">
            <i class="fas fa-plus"></i> Thêm mới
        </button>
    @endcan
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Danh sách Loại sản phẩm</h6>
        </div>
        <div class="card-body">
            @include('admin.productType.components.table-component')
        </div>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            {{ $productTypes->links() }}
        </ul>
    </nav>

    @can('productType_add')
        <!-- Add Modal-->
        @include('admin.productType.add-modal')
    @endcan
    @can('productType_edit')
        <!-- Edit Modal-->
        @include('admin.productType.edit-modal')
    @endcan
    @can('productType_delete')
        <!-- delete Modal-->
        @include('admin.productType.del-modal')
    @endcan

@endsection
@push('adminAjax')
    <!-- ajax modal -->
    <script src="{{ asset('assets/admin/js/producttype-ajax.js') }}"></script>
@endpush
