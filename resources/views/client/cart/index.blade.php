@extends('client.layouts.master',['title' => 'Cart'])
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
                            <li class="category3"><span>Giỏ hàng</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- Shopping Table Container -->
    <div class="cart-area-start cart_wrapper">
        @include('client.cart.components.cart_component')
    </div>
    <!-- Shopping Table Container -->
@endsection
@push('clientAjax')
    <script src="{{ asset('assets/client/cart/add-index.js') }}"></script>
@endpush
