@extends('client.layouts.master', ['title' => 'Yêu thích'])
@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="/">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Yêu thích</span></li>
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
                                <li><a href="{{ route('user.orderList') }}">Quản lý đơn hàng</a></li>
                                <li><a class="active" href="{{ route('wishlist.index') }}">Danh sách yêu thích</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-12 col-lg-9 col-md-9">
                    <div class="form-title">
                        <h1>Yêu thích</h1>
                    </div>
                    <div class="table-responsive wishList_wrapper">
                        @include('client.wishlist.components.wishlist_component')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wishlist-area-end -->
@endsection
@push('clientAjax')
    <script src="{{ asset('assets/client/addCart/add-index.js') }}"></script>
    <script src="{{ asset('assets/client/wishList/wishList.js') }}"></script>
@endpush
