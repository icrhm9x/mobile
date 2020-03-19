@extends('admin.layouts.master',['title' => 'Loại sản phẩm'])
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Loại sản phẩm</li>
  </ol>
</nav>
<button type="button" data-toggle="modal" data-target="#addPrTypeModal" class="btn btn-primary mb-3 addPrTypeJS">
  <i class="fas fa-plus"></i> Thêm mới
</button>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Danh sách Loại sản phẩm</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>STT</th>
            <th>Loại sản phẩm</th>
            <th>slug</th>
            <th>Danh mục</th>
            <th>status</th>
            <th>Chỉnh sửa</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($productType as $key => $value)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $value->name }}</td>
              <td>{{ $value->slug }}</td>
              <td>{{ $value->Category->name }}</td>
              <td>
                <span class="badge badge-{{ $value->status == 1 ? 'success' : 'secondary' }}">{{ $value->status == 1 ? 'Hiển thị' : 'Không hiển thị' }}</span>
              </td>
              <td>
                <button type="button" title="{{ "Sửa" }}" data-toggle="modal" data-target="#editPrTypeModal" class="btn btn-sm btn-outline-primary editPrTypeJS" data-id="{{ $value->id }}">
                  <i class="far fa-edit"></i>
                </button>
                <button type="button" title="{{ "Xóa" }}" data-toggle="modal" data-target="#delPrTypeModal" class="btn btn-sm ml-2 btn-outline-danger delPrTypeJS" data-id="{{ $value->id }}">
                  <i class="far fa-trash-alt"></i>
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    {{ $productType->links() }}
  </ul>
</nav>
<!-- Add Modal-->
@include('admin.productType.addModal')
<!-- Edit Modal-->
 @include('admin.productType.editModal') 
<!-- delete Modal-->
 @include('admin.productType.delModal') 

@endsection
@push('adminAjax')
  <!-- ajax modal -->
  <script src="/assets/admin/js/producttype-ajax.js"></script>
@endpush