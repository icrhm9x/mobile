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
									<a href="index.html">Home</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="category3"><span>Shopping Cart</span></li>
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
				<!-- Shopping Cart Table -->
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="cart-table">
								<thead>
									<tr>
										<th>Product</th>
										<th>Product name</th>
										<th></th>
										<th>Unit Price</th>
										<th>Qty</th>
										<th>Subtotal</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<a href="#"><img src="/assets/client/img/products/cart/cart-1.jpg" class="img-responsive" alt=""/></a>
										</td>
										<td>
											<h6>PLEASURE RATIO</h6>
										</td>
										<td><a href="#">Edit</a></td>
										<td>
											<div class="cart-price">$250.00</div>
										</td>
										<td>
											<form>
												<input type="text" placeholder="1">
											</form>
										</td>
										<td>
											<div class="cart-subtotal">$50.00</div>
										</td>
										<td><a href="#"><i class="fa fa-times"></i></a></td>
									</tr>
									<tr>
										<td>
											<a href="#"><img src="/assets/client/img/products/cart/cart-2.jpg" class="img-responsive" alt=""/></a>
										</td>
										<td>
											<h6>PRIMIS IN FAUCIBUS</h6>
										</td>
										<td><a href="#">Edit</a></td>
										<td>
											<div class="cart-price">$150.00</div>
										</td>
										<td>
											<form>
												<input type="text" placeholder="1">
											</form>
										</td>
										<td>
											<div class="cart-subtotal">$400.00</div>
										</td>
										<td><a href="#"><i class="fa fa-times"></i></a></td>
									</tr>
									<tr>
										<td class="actions-crt" colspan="7">
											<div class="">
												<div class="col-md-4 col-sm-4 col-xs-4 align-left"><a class="cbtn" href="#">Continue Shopping</a></div>
												<div class="col-md-4 col-sm-4 col-xs-4 align-center"><a class="cbtn" href="#">UPDATE SHOPPING CART</a></div>
												<div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="cbtn" href="#">CLEAR SHOPPING CART</a></div>
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
								<li class="cartSubT">Subtotal:    <span>$50.00</span></li>
								<li class="cartSubT">Grand total:    <span>$50.00</span></li>
							</ul>
							<a class="proceedbtn" href="#">PROCEED TO CHECK OUT</a>
							<div class="multiCheckout">
								<a href="#">Checkout with Multiple Addresses</a>
							</div>
						</div>
						<!-- Shopping Totals -->
					</div>
				</div>
				<!-- Shopping Coupon -->
			</div>	
		</div>
		<!-- Shopping Table Container -->
@endsection