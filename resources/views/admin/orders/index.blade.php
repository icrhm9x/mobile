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
                        <th>Ngày tạo</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody id="dataTableJS">
                    @forelse ($order as $value)
                        <tr class="rowTable{{$value->id}}">
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->address }}</td>
                            <td>{{ $value->phone }}</td>
                            <td>{{ number_format($value->totalMoney,0,',','.') }}₫</td>
                            <td id="handleJS">
                                @can('order_status')
                                    @if($value->status == 0)
                                        <button type="button" data-toggle="modal" data-target="#handleOrder"
                                                class="btn btn-secondary btn-sm handleOrderJS"
                                                data-id="{{ $value->id }}">
                                            Chờ xử lý
                                        </button>
                                    @elseif ($value->status == 1)
                                        <button type="button" class="btn btn-success btn-sm">Đã xử lý</button>
                                    @elseif ($value->status == 2)
                                        <button type="button" class="btn btn-warning btn-sm">Đã hủy</button>
                                    @endif
                                @endcan
                            </td>
                            <td>{{ $value->created_at }}</td>
                            <td>
                                @can('order_detail')
                                    <button type="button" title="Chi tiết đơn hàng" data-toggle="modal"
                                            data-target="#orderDetail"
                                            class="btn btn-sm btn-outline-primary showOrderDetailJS"
                                            data-id="{{ $value->id }}"
                                            data-url="{{ route('order.show', ['id' => $value->id]) }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                @endcan
                                @can('order_cancel')
                                    <button type="button" title="Hủy đơn hàng" data-toggle="modal"
                                            data-target="#cancelOrderDetailModal"
                                            class="btn btn-sm ml-2 btn-outline-danger cancelOrderDetailJS"
                                            data-id="{{ $value->id }}">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align: center;">Chưa có Đơn hàng nào</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @can('order_detail')
        <!-- order detail Modal-->
        <div class="modal fade" id="orderDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Chi tiết đơn hàng #<span class="idOrderDetail"></span></h5>
                    </div>
                    <div class="modal-body" id="mdContent"></div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    @endcan

    @can('order_status')
        @include('admin.orders.handleOrder')
    @endcan
    @can('order_cancel')
        @include('admin.orders.cancelModal')
    @endcan

@endsection
@push('adminAjax')
    <!-- ajax modal -->
    <script src="{{ asset('assets/admin/order/order-ajax.js') }}"></script>
@endpush
