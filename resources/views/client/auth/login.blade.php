@extends('client.layouts.master', ['title' => 'Login'])
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
                        <li class="category3"><span>Đăng nhập</span></li>
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
                    <form method="post" class="login" action="{{ route('post.login') }}">
                        @csrf
                        <div class="form-fields">
                            <h2>Đăng nhập</h2>
                            <p class="form-row form-row-wide">
                                <label for="email">Email <span class="required">*</span></label>
                                <input type="text" class="input-text" name="email" id="email" value="{{ old('email') }}">
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="password">Mật khẩu <span class="required">*</span></label>
                                <input class="input-text" type="password" name="password" id="password">
                            </p>
                        </div>
                        <div class="form-action">
                            <p class="lost_password"> <a href="#">Quên mật khẩu?</a></p>
                            <div class="actions-log">
                                <input type="submit" class="button" name="login" value="Login">
                            </div>
                            <label for="rememberme" class="inline"> 
                            <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember me </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- account-details Area end -->
@endsection