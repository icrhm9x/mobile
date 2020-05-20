@extends('admin.layouts.master',['title' => 'Tin tức'])
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
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
                        <input type="text" class="form-control" placeholder="Tên bài viết ..." name="name"
                               value="{{ \Request::get('name') }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3">
            <a class="btn btn-info mb-3 float-right" href="{{ route('news.create') }}">
                <i class="fas fa-plus"></i> Tạo mới
            </a>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Danh sách bài viết</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên bài viết</th>
                        <th>Ảnh</th>
                        <th>Mô tả</th>
                        <th>Tác giả</th>
                        <th style="width:100px">Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th style="width:105px">Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($news as $key => $value)
                        <tr class="rowTable{{$value->id}}">
                            <td>{{ \Request::get('page') ? ((\Request::get('page') - 1)*5+$key+1) : ($key + 1) }}</td>
                            <td>{{ $value->name }}</td>
                            <td><img src="{{ asset($value->avatar) }}" class="img-fluid" style="width:170px">
                            </td>
                            <td>{{ $value->description }}</td>
                            <td>{{ $value->Member->name }}</td>
                            <td>
                                @if ($value->status == 1)
                                    {!! '<span class="rounded-0 badge badge-success">Hiển thị</span>' !!}
                                @else
                                    {!! '<span class="rounded-0 badge badge-secondary">Không hiển thị</span>' !!}
                                @endif
                            </td>
                            <td>{{ $value->created_at }}</td>
                            <td>
                                <a href="{{ route('news.edit', $value->id) }}" type="button" title="{{ "Sửa" }}"
                                   class="btn btn-sm mr-2 mb-2 btn-outline-primary">
                                    <i class="far fa-edit"></i>
                                </a>
                                <button type="button" title="Xóa" data-toggle="modal" data-target="#delModal"
                                        class="btn btn-sm mb-2 btn-outline-danger delNewsJS" data-id="{{ $value->id }}"
                                        data-name="{{ $value->name }}">
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
            {{ $news->appends(['name'=>request()->name])->links() }}
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
    <script src="{{ asset('assets/admin/js/news-ajax.js') }}"></script>
@endpush
