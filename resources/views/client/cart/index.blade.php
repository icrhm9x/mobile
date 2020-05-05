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
									<a href="index.html">Trang chủ</a>
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
		<div class="cart-area-start">
			<div class="container">
				<div class="area-title">
					<h2>Giỏ hàng của bạn</h2>
				</div>
				<!-- Shopping Cart Table -->
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="cart-table">
								<thead>
									<tr>
										<th>Hình ảnh</th>
										<th>Tên sản phẩm</th>
										<th>Giá</th>
										<th>Số lượng</th>
										<th>Thành tiền</th>
										<th>Chỉnh sửa</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($cart as $key => $item)
									<tr>
										<td>
											<a href="#"><img src="/img/upload/product/{{ $item->options->img }}" class="img-responsive" alt=""/></a>
										</td>
										<td>
											<h6>{{ $item->name }}</h6>
										</td>
										<td>
											<div class="cart-price">{{ number_format($item->price, 0, ',', '.') }}₫</div>
										</td>
										<td>
											<form>
												<input type="text" placeholder="{{ $item->qty }}">
											</form>
										</td>
										<td>
											<div class="cart-subtotal">{{ number_format($item->price*$item->qty, 0, ',', '.') }}₫</div>
										</td>
										<td><a href="{{ route('del.cart', $key) }}"><i class="fa fa-times"></i></a></td>
									</tr>
									@endforeach
									<tr>
										<td class="actions-crt" colspan="7">
											<div class="">
												{{-- <div class="col-md-4 col-sm-4 col-xs-4 align-center"><a class="cbtn" href="#">UPDATE SHOPPING CART</a></div> --}}
												<div class="col-md-4 col-sm-4 col-xs-4 pull-right"><a class="cbtn" href="{{ route('home') }}">Tiếp tục mua hàng</a></div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- Shopping Cart Table -->
				<!-- Shopping Coupon -->
				<div class="row">
					<div class="col-md-12 vendee-clue">
						<!-- Shopping Totals -->
						<div class="shipping coupon cart-totals">
							<ul>
								<li class="cartSubT">Tổng tiền ({{ Cart::count() }} sản phẩm):    <span>{{ Cart::subtotal(0,',','.') }}₫</span></li>
							</ul>
							<a class="proceedbtn" href="{{ route('checkout') }}">THANH TOÁN</a>
						</div>
						<!-- Shopping Totals -->
					</div>
				</div>
				<!-- Shopping Coupon -->
			</div>	
		</div>
		<!-- Shopping Table Container -->
@endsection