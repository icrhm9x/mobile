@extends('client.layouts.master', ['title' => 'Quản lý đơn hàng'])
@section('content')
    <style>
        .cart-table tbody tr td {
            padding: 36px 28px !important;
        }
    </style>
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{ route('home') }}">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Quản lý đơn hàng</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- wishlist-area-start -->
    <div class="wishlist-concept">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <aside class="widge-topbar">
                        <div class="bar-title">
                            <div class="bar-ping"><img src="{{ asset('assets/client/img/bar-ping.png') }}" alt=""></div>
                            <h2>Tài khoản</h2>
                        </div>
                    </aside>
                    <aside>
                        <div class="wish-left-menu">
                            <ul>
                                <li><a href="{{ route('user.index') }}">Thông tin tài khoản</a></li>
                                <li><a class="active" href="{{ route('user.orderList') }}">Quản lý đơn hàng</a></li>
                                <li><a href="{{ route('wishlist.index') }}">Danh sách yêu thích</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-12 col-lg-9 col-md-9">
                    <div class="form-title">
                        <h1>Đơn hàng của tôi</h1>
                    </div>
                    <div class="table-responsive">
                        <table class="cart-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Sản phẩm</th>
                                <th>Tổng tiền</th>
                                <th>Ngày mua</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($orderList as $item)
                                <tr>
                                    <td>
                                        <p>{{ $item->id }}</p>
                                    </td>
                                    <td>
                                        @foreach($item->orderDetails as $orderDetail)
                                            <p><a target="_blank" href="{{ route('get.detail.product', [$orderDetail->product->slug]) }}">{{ $orderDetail->product->name }} <span>({{ $orderDetail->quantity }})</span></a></p>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <div class="price-box">
                                            <span class="special-price">{{ number_format($item->totalMoney, 0, ',', '.') }}đ</span>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="special-price">{{ $item->created_at }}</p>
                                    </td>
                                    <td><p>
                                            @if($item->status == 0)
                                                Đơn hàng đang được xử lý
                                            @elseif($item->status == 1)
                                                Giao hàng thành công
                                            @elseif($item->status == 2)
                                                Đơn hàng đã hủy
                                            @endif
                                        </p></td>
                                </tr>
                            @empty
                                <tr><td colspan="5">Bạn chưa có đơn hàng nào</td></tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wishlist-area-end -->
@endsection
