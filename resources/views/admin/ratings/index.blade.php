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
                    </tr>
                    </thead>
                    <tbody id="dataTableJS">
                    @forelse ($ratings as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ isset($value->user->name) ? $value->user->name : 'đã xóa' }}</td>
                            <td>{{ isset($value->product->name) ? $value->product->name : 'đã xóa' }}</td>
                            <td>{{ $value->comment }}</td>
                            <td>{{ $value->number }}<i class="fa fa-star"></i></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center;">Chưa có Đánh giá nào</td>
                        </tr>
                    @endforelse
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
