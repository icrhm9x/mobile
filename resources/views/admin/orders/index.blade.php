@extends('admin.layouts.master',['title' => 'Đơn hàng'])
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
      <li class="breadcrumb-item active" aria-current="page">Đơn hàng</li>
    </ol>
  </nav>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-info">Quản lý đơn hàng</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên khách hàng</th>
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
              <th>Tổng tiền</th>
              <th>Trạng thái</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody id="dataTableJS">
            @foreach ($order as $key => $value)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->address }}</td>
                <td>{{ $value->phone }}</td>
                <td>{{ number_format($value->totalMoney,0,',','.') }}₫</td>
                <td>
                  <span class="rounded-0 badge badge-{{ $value->status == 0 ? 'secondary' : 'info' }}">{{ $value->status == 0 ? 'Chờ xử lý' : 'Đã xử lý' }}</span>
                </td>
                <td>
                  <button type="button" title="Chi tiết đơn hàng" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button type="button" title="Xóa" class="btn btn-sm ml-2 btn-outline-danger">
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
@endsection