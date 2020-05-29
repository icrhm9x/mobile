@extends('admin.layouts.master', ['title' => 'Danh sách quyền'])
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quyền</li>
        </ol>
    </nav>
    @can('permission_add')
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-info mb-3" href="{{ route('permission.create') }}">
                    <i class="fas fa-plus"></i> Tạo mới
                </a>
            </div>
        </div>
    @endcan
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Danh sách quyền</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên quyền</th>
                        <th>key code</th>
                        <th>Ngày tạo</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($permissions as $permission)
                        <tr class="rowTable{{$permission->id}}">
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->key_code }}</td>
                            <td>{{ $permission->created_at }}</td>
                            <td>
                                @can('permission_edit')
                                    <a href="{{ route('permission.edit', $permission->id) }}" type="button"
                                       title="Sửa" class="btn btn-sm mr-2 mb-2 btn-outline-primary">
                                        <i class="far fa-edit"></i>
                                    </a>
                                @endcan
                                @can('permission_delete')
                                    <a href="{{ route('permission.destroy', ['permission' => $permission->id]) }}"
                                       type="button" title="Xóa" class="btn btn-sm mb-2 btn-outline-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                @endcan
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
            {{ $permissions->links() }}
        </ul>
    </nav>
@endsection
