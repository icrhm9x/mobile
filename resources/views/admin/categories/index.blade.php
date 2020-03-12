@extends('admin.layouts.master',['title' => 'Danh mục'])
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Danh mục</li>
  </ol>
</nav>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Danh sách danh mục</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>slug</th>
            <th>status</th>
            <th>Chỉnh sửa</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($category as $key => $value)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $value->name }}</td>
              <td>{{ $value->slug }}</td>
              <td>
                <span class="badge badge-{{ $value->status == 1 ? 'success' : 'secondary' }}">{{ $value->status == 1 ? 'Hiển thị' : 'Không hiển thị' }}</span>
              </td>
              <td>
                <button type="button" title="{{ "Sửa" }}" data-toggle="modal" data-target="#editModal" class="btn btn-sm btn-outline-primary editJS" data-id="{{ $value->id }}">
                  <i class="far fa-edit"></i>
                </button>
                <button type="button" title="{{ "Xóa" }}" data-toggle="modal" data-target="#delModal" class="btn btn-sm ml-2 btn-outline-danger delJS" data-id="{{ $value->id }}">
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
<!-- Edit Modal-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Sửa danh mục <span class="titleJS"></span></h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">
              <div class="row" style="margin: 5px">
          <div class="col-lg-12">
              <form role="form">
                  <fieldset class="form-group">
                      <label class="font-weight-bold">Tên danh mục</label>
                      <input class="form-control nameJS" name="name" placeholder="Nhập tên danh mục">
                      <span class="errorJS" style="color: red;font-size: 1rem;"></span>
                  </fieldset>
                  <div class="form-group">
                      <label class="font-weight-bold">Status</label>
                      <select class="form-control statusJS" name="status">
                          <option value="1" class="activeJS">Hiển Thị</option>
                          <option value="0" class="hiddenJS">Không Hiển Thị</option>
                      </select>
                  </div>
              </form>
          </div>
      </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-success updateJS">Save</button>
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          </div>
      </div>
  </div>
</div>
<!-- delete Modal-->
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body" style="margin-left: 183px;">
              <button type="button" class="btn btn-success acceptDelJS">Có</button>
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
          <div>
      </div>
  </div>
</div>
@endsection
@push('adminJS')
  <!-- ajax modal -->
  <script src="/assets/admin/js/ajax.js"></script>
@endpush