@extends('client.layouts.master', ['title' => 'Register'])
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
                        <li class="category3"><span>Đăng ký</span></li>
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
                <div class="customer-register my-account">
                    <form method="post" class="register" action="{{ route('post.register') }}">
                        @csrf
                        <div class="form-fields">
                            <h2>Đăng ký</h2>
                            <p class="form-row form-row-wide">
                                <label for="name">Họ và tên <span class="required">*</span></label>
                                <input type="text" class="input-text" name="name" id="name" value="{{ old('name') }}">
                                {{ notifyError($errors,'name') }}
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="reg_email">Địa chỉ Email <span class="required">*</span></label>
                                <input type="text" class="input-text" name="email" id="reg_email" value="{{ old('email') }}">
                                {{ notifyError($errors,'email') }}
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="reg_password">Mật khẩu <span class="required">*</span></label>
                                <input type="password" class="input-text" name="password" id="reg_password">
                                {{ notifyError($errors,'password') }}
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="re_password">Nhập lại mật khẩu <span class="required">*</span></label>
                                <input type="password" class="input-text" name="re_password" id="re_password">
                                {{ notifyError($errors,'re_password') }}
                            </p>
                        </div>
                        <div class="form-action">
                            <div class="actions-log">
                                <input type="submit" class="button" name="register" value="Đăng ký">
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