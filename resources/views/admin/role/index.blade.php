@extends('admin.layouts.master',['title' => 'Vai trò'])
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Vai trò</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-info mb-3" href="{{ route('role.create') }}">
                <i class="fas fa-plus"></i> Tạo mới
            </a>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Danh sách vai trò</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên vai trò</th>
                        <th>Mô tả</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $key => $role)
                        <tr class="rowTable{{$role->id}}">
                            <td>{{ \Request::get('page') ? ((\Request::get('page') - 1)*5+$key+1) : ($key + 1) }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->display_name }}</td>
                            <td>
                                <a href="{{ route('news.edit', $role->id) }}" type="button" title="{{ "Sửa" }}"
                                   class="btn btn-sm mr-2 mb-2 btn-outline-primary">
                                    <i class="far fa-edit"></i>
                                </a>
                                <button type="button" title="Xóa" data-toggle="modal" data-target="#delModal"
                                        class="btn btn-sm mb-2 btn-outline-danger delNewsJS" data-id="{{ $role->id }}"
                                        data-name="{{ $role->name }}">
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
            {{ $roles->links() }}
        </ul>
    </nav>
    {{-- del modal --}}
    <div class="modal fade" id="delModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bạn có muốn xóa sản phẩm <span class="titleDelJS text-danger"></span> #<span
                            class="idDelJS text-danger"></span> ?</h5>
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
@endpush

