@extends('client.layouts.master', ['title' => 'Đổi mật khẩu'])
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
                            <li class="category3"><span>Đổi mật khẩu</span></li>
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
                        <form method="post" class="login" action="">
                            @csrf
                            <div class="form-fields">
                                <h2>Đổi mật khẩu</h2>
                                <p class="form-row form-row-wide">
                                    <label for="reg_password">Mật khẩu mới<span class="required">*</span></label>
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
