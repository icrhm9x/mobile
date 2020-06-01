@extends('client.layouts.master', ['title' => 'Thông tin tài khoản'])
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
                            <li class="category3"><span>Tài khoản</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- wishlist-area-start -->
    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <aside class="widge-topbar">
                        <div class="bar-title">
                            <div class="bar-ping"><img src="{{ asset('assets/client/img/bar-ping.png') }}" alt=""></div>
                            <h2>Tài khoản</h2>
                        </div>
                    </aside>
                    <aside>
                        <div class="wish-left-menu">
                            <ul>
                                <li><a class="active" href="{{ route('user.index') }}">Thông tin tài khoản</a></li>
                                <li><a href="{{ route('user.orderList') }}">Quản lý đơn hàng</a></li>
                                <li><a href="{{ route('wishlist.index') }}">Danh sách yêu thích</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="contact-us-area">
                        <!-- contact us form start -->
                        <div class="contact-us-form">
                            <div class="sec-heading-area">
                                <h2>Thông tin tài khoản</h2>
                            </div>
                            <div class="contact-form">
                                <form action="{{ route('user.update', $user->id) }}" method="POST">
                                    @csrf
                                    <div class="form-top">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-10">
                                            <label>Họ tên <sup>*</sup></label>
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ $user->name }}">
                                            {{ notifyError($errors,'name') }}
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-10">
                                            <label>Email <sup>*</sup></label>
                                            <input type="email" class="form-control" name="email"
                                                   value="{{ $user->email }}">
                                            {{ notifyError($errors,'email') }}
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-10">
                                            <label>Số điện thoại <sup>*</sup></label>
                                            <input type="text" class="form-control" name="phone"
                                                   value="{{ $user->phone }}">
                                            {{ notifyError($errors,'phone') }}
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-10">
                                            <label>Giới tính <sup>*</sup></label>
                                            <div class="sex-group">
                                                <div>
                                                    <input class="form-check-input" type="radio" name="gender" id="male"
                                                           value="1" {{ $user->gender == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="male">Nam</label>
                                                </div>
                                                <div>
                                                    <input class="form-check-input" type="radio" name="gender"
                                                           id="female"
                                                           value="2" {{ $user->gender == 2 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="female">Nữ</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-form form-group col-sm-12 submit-review">
                                        <button type="submit" class="add-tag-btn">Cập nhật</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- contact us form end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wishlist-area-end -->
@endsection
