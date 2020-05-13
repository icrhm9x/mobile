@extends('admin.layouts.master', ['title' => 'Thành viên'])
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thành viên</li>
    </ol>
</nav>
<div class="row">
<div class="col-md-9">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <form action="">
        <div class="form-row">
            <div class="form-group col-md-3">
            <input type="text" class="form-control" placeholder="Tên thành viên ..." name="name" value="{{ \Request::get('name') }}">
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
</div>
<div class="col-md-3">
    <a class="btn btn-info mb-3 float-right" href="{{ route('member.create') }}">
    <i class="fas fa-plus"></i> Thêm thành viên
    </a>
</div>
</div>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-info">Danh sách thành viên</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tên thành viên</th>
              <th>Email</th>
              <th>Ảnh đại diện</th>
              <th>Level</th>
              <th>Trạng thái</th>
              <th>Ngày tạo</th>
              <th>Tùy chọn</th>
            </tr>
          </thead>
          <tbody id="dataTableJS">
            @foreach ($members as $value)
              <tr class="rowTable{{$value->id}}">
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td><img src="/img/upload/member/{{ $value->avatar }}" class="img-fluid" style="width:100px"></td>
                <td>
                    @if ($value->ruler == 1)
                        {!! '<span class="rounded-0 badge badge-danger">Boss</span>' !!}
                    @elseif ($value->ruler == 2)
                        {!! '<span class="rounded-0 badge badge-warning">Super Admin</span>' !!}
                    @elseif ($value->ruler == 3)
                        {!! '<span class="rounded-0 badge badge-success">Admin</span>' !!}
                    @elseif ($value->ruler == 4)
                        {!! '<span class="rounded-0 badge badge-info">Mod</span>' !!}
                    @endif
                </td>
                <td>
                  <span class="rounded-0 badge badge-{{ $value->status == 1 ? 'success' : 'secondary' }}">{{ $value->status == 1 ? 'active' : 'deactive' }}</span>
                </td>
                <td>{{ $value->created_at }}</td>
                <td>
                  <a href="{{ route('member.edit', $value->id) }}" type="button" title="{{ "Sửa" }}" class="btn btn-sm mr-2 mb-2 btn-outline-primary">
                    <i class="far fa-edit"></i>
                  </a>
                  <button type="button" title="Xóa" data-toggle="modal" data-target="#delModal" class="btn btn-sm mb-2 btn-outline-danger delMemberJS" data-id="{{ $value->id }}" data-name="{{ $value->name }}">
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
      {{ $members->appends(['name'=>request()->name])->links() }}
    </ul>
  </nav>
  {{-- del modal --}}
  <div class="modal fade" id="delModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bạn có muốn xóa thành viên <span class="titleDelJS text-danger"></span> #<span class="idDelJS text-danger"></span> ?</h5>
            </div>
            <div class="modal-body">
                <div class="float-right">
                    <button type="button" class="btn btn-success btn-acceptDelJS">Có</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
@push('adminAjax')
<script>
  $(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    // del prd
    $(this).on("click", ".delMemberJS", function() {
        $(".titleDelJS").text($(this).data("name"));
        $(".idDelJS").text($(this).data("id"));
    });
    $(".btn-acceptDelJS").click(function() {
        let id = $(".idDelJS").text();
        $.ajax({
            url: "/admin/member/" + id,
            dataType: "json",
            type: "delete",
            success: function($result) {
                toastr.success($result.message, "Thông báo", {
                    timeOut: 3000
                });
                $(".rowTable" + id).remove();
                $("#delModal").modal("hide");
            }
        });
    });
});

</script>
@endpush