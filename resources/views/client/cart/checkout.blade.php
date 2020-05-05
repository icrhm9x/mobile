@extends('client.layouts.master',['title' => 'Checkout'])
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
								<li class="home">
									<a href="{{ route('list.cart') }}">Giỏ hàng</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="category3"><span>Thanh toán</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container wrapper my-4">    
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="">
                @csrf
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Danh sách sản phẩm <div class="pull-right"><small><a class="afix-1" href="{{ route('list.cart') }}">Cập nhật</a></small></div>
                        </div>
                        <div class="panel-body">
							@foreach ($cart as $item)
							<div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="/img/upload/product/{{ $item->options->img }}" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">{{ $item->name }}</div>
                                    <div class="col-xs-12"><small>Số lượng:<span>{{ $item->qty }}</span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6 class="checkout-price">{{ number_format($item->price, 0, ',', '.') }}<span>₫</span></h6>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
							@endforeach
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Tổng tiền ({{ Cart::count() }} sản phẩm)</strong>
                                    <div class="pull-right checkout-total"><span>{{ Cart::subtotal(0,',','.') }}</span><span>₫</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Thông tin thanh toán</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12"><strong>Tên người mua:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="name" class="form-control" value="{{ get_data_user('web', 'name') }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa chỉ:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Số điện thoại:</strong></div>
                                <div class="col-md-12"><input type="text" name="phone" class="form-control" value="" /></div>
                            </div>
							<div class="form-group">
                                <div class="col-md-12"><strong>Ghi chú:</strong></div>
                                <div class="col-md-12">
									<textarea name="message" cols="30" rows="4" class="form-control"></textarea>
								</div>
							</div>
							<div class="form-group">
                                <div class="col-md-12">
									<button type="submit" class="btn btn-success">Xác nhận thông tin</button>
								</div>
                            </div>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                </div>
                
                </form>
            </div>
            <div class="row cart-footer">
        
            </div>
    </div>
		<div class="clearfix"></div>
@endsection