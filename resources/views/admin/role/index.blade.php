@extends('admin.layouts.master',['title' => 'Vai trò'])
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Vai trò</li>
        </ol>
    </nav>
    @can('role_add')
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-info mb-3" href="{{ route('role.create') }}">
                    <i class="fas fa-plus"></i> Tạo mới
                </a>
            </div>
        </div>
    @endcan
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
                    @forelse ($roles as $key => $role)
                        <tr class="rowTable{{$role->id}}">
                            <td>{{ \Request::get('page') ? ((\Request::get('page') - 1)*5+$key+1) : ($key + 1) }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->display_name }}</td>
                            <td>
                                @can('role_edit')
                                    <a href="{{ route('role.edit', $role->id) }}" type="button" title="Sửa"
                                       class="btn btn-sm mr-2 mb-2 btn-outline-primary">
                                        <i class="far fa-edit"></i>
                                    </a>
                                @endcan
                                @can('role_delete')
                                    <a href="{{ route('role.destroy', ['role' => $role->id]) }}" type="button"
                                       title="Xóa"
                                       class="btn btn-sm mb-2 btn-outline-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center;">Chưa có vai trò nào</td>
                        </tr>
                    @endforelse
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
@endsection
@push('adminAjax')
@endpush

