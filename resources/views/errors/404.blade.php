@extends('client.layouts.master', ['title' => 'Lỗi 404'])
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
                            <li class="category3"><span>404 Error</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- not-found-area start -->
    <div class="not-found">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-not-found">
                        <h1 class="entry-title">Not Found.</h1>
                        <h2 class="small-title">RẤT TIẾC, TRANG BẠN TÌM KIẾM KHÔNG TỒN TẠI</h2>
                        <a class="go-to-home" href="/">Trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- not-found-area end -->
@endsection
