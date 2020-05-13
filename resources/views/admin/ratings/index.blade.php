@extends('admin.layouts.master', ['title' => 'Đánh giá sản phẩm'])
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
      <li class="breadcrumb-item active" aria-current="page">Đánh giá</li>
    </ol>
  </nav>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-info">Danh sách đánh giá</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên thành viên</th>
              <th>Sản phẩm</th>
              <th>Nội dung</th>
              <th>Rating</th>
              <th>Tùy chọn</th>
            </tr>
          </thead>
          <tbody id="dataTableJS">
            @foreach ($ratings as $value)
              <tr class="rowTable{{$value->id}}">
                <td>{{ $value->id }}</td>
                <td>{{ $value->user->name }}</td>
                <td>{{ $value->product->name }}</td>
                <td>{{ $value->content }}</td>
                <td>{{ $value->number }}<i class="fa fa-star"></i></td>
                <td>
                  <button type="button" title="Xóa" data-toggle="modal" data-target="#delCatModal" class="btn btn-sm ml-2 btn-outline-danger">
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
      {{ $ratings->links() }}
    </ul>
  </nav>
@endsection