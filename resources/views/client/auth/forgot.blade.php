@extends('client.layouts.master', ['title' => 'Quên mật khẩu'])
@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="index.html">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Lấy lại mật khẩu</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- account-details Area Start -->
    <div class="customer-login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-xs-12">
                    <div class="customer-login my-account">
                        <form method="post" class="login" action="{{ route('code.forgot.password') }}">
                            @csrf
                            <div class="form-fields">
                                <h2>Lấy lại mật khẩu</h2>
                                <p class="form-row form-row-wide">
                                    <label for="email">Vui lòng cung cấp email để lấy lại mật khẩu <span class="required">*</span></label>
                                    <input type="email" class="input-text" name="email" id="email"
                                           value="{{ old('email') }}">
                                </p>
                            </div>
                            <div class="form-action">
                                <div class="actions-log">
                                    <input type="submit" class="button" name="login" value="Xác nhận">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- account-details Area end -->
@endsection
