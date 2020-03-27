@extends('admin.layouts.master',['title' => 'Danh mục'])
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Danh mục</li>
  </ol>
</nav>
<button type="button" data-toggle="modal" data-target="#addCatModal" class="btn btn-info mb-3 addCatJS">
  <i class="fas fa-plus"></i> Thêm mới
</button>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Danh sách danh mục</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>slug</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($category as $key => $value)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $value->name }}</td>
              <td>{{ $value->slug }}</td>
              <td>
                <span class="rounded-0 badge badge-{{ $value->status == 1 ? 'info' : 'secondary' }}">{{ $value->status == 1 ? 'Hiển thị' : 'Không hiển thị' }}</span>
              </td>
              <td>
                <button type="button" title="{{ "Sửa" }}" data-toggle="modal" data-target="#editCatModal" class="btn btn-sm btn-outline-primary editCatJS" data-id="{{ $value->id }}">
                  <i class="far fa-edit"></i>
                </button>
                <button type="button" title="{{ "Xóa" }}" data-toggle="modal" data-target="#delCatModal" class="btn btn-sm ml-2 btn-outline-danger delCatJS" data-id="{{ $value->id }}">
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
<!-- Add Modal-->
@include('admin.categories.addModal')
<!-- Edit Modal-->
@include('admin.categories.editModal')
<!-- delete Modal-->
@include('admin.categories.delModal')

@endsection
@push('adminAjax')
  <!-- ajax modal -->
  <script src="/assets/admin/js/category-ajax.js"></script>
@endpush