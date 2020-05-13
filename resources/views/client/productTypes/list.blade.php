@extends('client.layouts.master', ['title' => $prdType->name])
@section('content')
<style>
	.sidebar-content .active {
		color: #c2a476;
	}
</style>
<!-- category-banner area start -->
<div class="category-banner">
</div>
<!-- category-banner area end -->
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
							<a href="{{ route('get.category',['c_slug'=>$prdType->Category->slug]) }}">{{ $prdType->Category->name }}</a>
							<span><i class="fa fa-angle-right"></i></span>
						</li>
						<li class="category3">
							<span>{{ $prdType->name }}</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumbs area end -->
<!-- shop-with-sidebar Start -->
<div class="shop-with-sidebar">
	<div class="container">
		<div class="row">
			<!-- left sidebar start -->
			<div class="col-md-3 col-sm-12 col-xs-12 text-left">
				<div class="topbar-left">
					<aside class="widge-topbar">
						<div class="bar-title">
							<div class="bar-ping"><img src="/assets/client/img/bar-ping.png" alt=""></div>
							<h2>Lọc sản phẩm</h2>
						</div>
					</aside>
					<aside class="sidebar-content">
						<div class="sidebar-title">
							<h6>Thương hiệu</h6>
						</div>
						<ul class="sidebar-tags">
							@if (isset($cate))
								@foreach ($cate->productType as $item)
									@if ($item->Product->count() > 0)
										<li><a class="{{ (Request::is($cate->slug.'/'.$item->slug) ? 'active' : '') }}" href="{{ route('get.list.productType',['c_slug'=>$cate->slug, 'prdType_slug'=>$item->slug]) }}">{{ $item->name }}</a><span> ({{ $item->Product->count() }})</span></li>
									@endif
								@endforeach
							@endif
						</ul>
					</aside>
					<aside class="sidebar-content">
						<div class="sidebar-title">
							<h6>Khoảng giá</h6>
						</div>
						<ul>
							<li><a class="{{ Request::get('price') == 1 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price' => 1]) }}">Dưới 1.000.000đ</a></li>
							<li><a class="{{ Request::get('price') == 2 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price' => 2]) }}">1.000.000đ - 3.000.000đ</a></li>
							<li><a class="{{ Request::get('price') == 3 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price' => 3]) }}">3.000.000đ - 5.000.000đ</a></li>
							<li><a class="{{ Request::get('price') == 4 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price' => 4]) }}">5.000.000đ - 10.000.000đ</a></li>
							<li><a class="{{ Request::get('price') == 5 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price' => 5]) }}">Trên 10.000.000đ</a></li>
						</ul>
					</aside>
					<aside class="widge-topbar">
						<div class="bar-title">
							<div class="bar-ping"><img src="/assets/client/img/bar-ping.png" alt=""></div>
							<h2>Tags</h2>
						</div>
						<div class="exp-tags">
							<div class="tags">
								<a href="#">Samsung</a>
								<a href="#">Mobile</a>
								<a href="#">Sản phẩm mới</a>
								<a href="#">Giá rẻ</a>
								<a href="#">Apple</a>
								<a href="#">Laptop</a>
							</div>
						</div>
					</aside>
				</div>
			</div>
			<!-- left sidebar end -->
			<!-- right sidebar start -->
			<div class="col-md-9 col-sm-12 col-xs-12">
				<!-- shop toolbar start -->
				<div class="shop-content-area">
					<div class="shop-toolbar">
						<div class="col-md-4 col-sm-4 col-xs-12 nopadding-left text-left">
							<form class="tree-most" id="sort-by" method="get">
								<div class="orderby-wrapper">
									<label style="color: #000; font-size: 14px;">Sắp xếp</label>
									<select name="orderby" class="orderby">
										<option {{ Request::get('orderby') == 'id_desc' || !Request::get('orderby') ? 'selected="selected"' : '' }} value="id_desc">Mới nhất</option>
										<option {{ Request::get('orderby') == 'id_asc' ? 'selected="selected"' : '' }} value="id_asc">Sản phẩm cũ</option>
										<option {{ Request::get('orderby') == 'price_desc' ? 'selected="selected"' : '' }} value="price_desc">Giá giảm dần</option>
										<option {{ Request::get('orderby') == 'price_asc' ? 'selected="selected"' : '' }} value="price_asc">Giá tăng dần</option>
									</select>
								</div>
							</form>
						</div>
						<div class="nopadding-right text-right">
							<div class="view-mode">
								<label>View on</label>
								<ul>
									<li class="active"><a href="#shop-grid-tab" data-toggle="tab"><i class="fa fa-th"></i></a></li>
									<li class=""><a href="#shop-list-tab" data-toggle="tab" ><i class="fa fa-th-list"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- shop toolbar end -->
				<div class="tab-content">
					<div class="tab-pane fade in active" id="shop-grid-tab">
						<div class="row">
							<div class="shop-product-tab first-sale">
								@if (isset($listPrd))
									@foreach ($listPrd as $item)
										<div class="col-lg-4 col-md-4 col-sm-4 mb-4">
											<div class="two-product">
												<div class="single-product">
													<div class="product-img">
														<a href="{{ route('get.detail.product', [$item->Category->slug,$item->ProductType->slug,$item->slug]) }}">
															<img class="primary-image" src="/img/upload/product/{{ $item->img }}" alt="" />
														</a>
														<div class="actions">
															<div class="action-buttons">
																<div class="add-to-links">
																	<div class="add-to-wishlist">
																		<a href="#" title="Yêu thích"><i class="fa fa-heart"></i></a>
																	</div>
																	<div class="compare-button">
																		<a href="{{ route('add.cart', $item->id) }}" title="Thêm vào giỏ hàng"><i class="icon-bag"></i></a>
																	</div>									
																</div>
																<div class="quickviewbtn">
																	<a href="#" title="So sánh"><i class="fa fa-retweet"></i></a>
																</div>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h2 class="product-name"><a href="{{ route('get.detail.product', [$item->Category->slug,$item->ProductType->slug,$item->slug]) }}">{{ $item->name }}</a></h2>
														<div class="product-price">
															@if ($item->promotion > 0)
															<strong>{{ number_format($item->price - $item->promotion,0,'','.') }}₫</strong>
															<span>{{ number_format($item->price,0,'','.') }}₫</span>
															@else
															<strong>{{ number_format($item->price,0,'','.') }}₫</strong>
															@endif
														</div>
														{{--  <p>Nunc facilisis sagittis ullamcorper...</p>  --}}
													</div>
												</div>
											</div>
										</div>
									@endforeach
								@endif
							</div>
						</div>
					</div>
					<!-- list view -->
					<div class="tab-pane fade" id="shop-list-tab">
						<div class="list-view">
							@if (isset($listPrd))
								@foreach ($listPrd as $item)
									<div class="product-list-wrapper">
										<div class="single-product mb-2">								
											<div class="col-md-4 col-sm-4 col-xs-12">
												<div class="product-img">
													<a href="{{ route('get.detail.product', [$item->Category->slug,$item->ProductType->slug,$item->slug]) }}">
														<img class="primary-image" src="/img/upload/product/{{ $item->img }}" alt="" />
													</a>
												</div>								
											</div>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<div class="product-content">
													<h2 class="product-name"><a href="{{ route('get.detail.product', [$item->Category->slug,$item->ProductType->slug,$item->slug]) }}">{{ $item->name }}</a></h2>
													<div class="rating-price">	
														<div class="pro-rating">
															<?php
															$average = 0;
															if ($item->star_number != 0){
																$average = round($item->star_total / $item->star_number, 2);
															}
															?>
															@for ($i = 1; $i <= 5; $i++)
																@if ($i <= $average)
																<i class="fa fa-star"></i>
																@else
																<i class="fa fa-star-o"></i>
																@endif
															@endfor
														</div>
														<div class="price-boxes">
															<span class="new-price">{{ number_format($item->price,0,'','.') }}₫</span>
															@if ($item->promotion > 0)
																<span class="promo-price">{{ number_format($item->promotion,0,'','.') }}₫</span>
															@endif
														</div>
													</div>
													<div class="product-desc">
														<p>{{ $item->description }}</p>
													</div>
													<div class="actions-e">
														<div class="action-buttons">
															<div class="add-to-cart">
																<a href="{{ route('add.cart', $item->id) }}">Thêm vào giỏ hàng</a>
															</div>
															<div class="add-to-links">
																<div class="add-to-wishlist">
																	<a href="#" data-toggle="tooltip" title="Yêu thích" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
																</div>
																<div class="compare-button">
																	<a href="#" data-toggle="tooltip" title="So sánh" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
																</div>									
															</div>
														</div>
													</div>										
												</div>									
											</div>
										</div>
									</div>
								@endforeach
							@endif
						</div>
					</div>
					<!-- shop toolbar start -->
					<div class="shop-content-bottom">
						<div class="shop-toolbar btn-tlbr">
							<div class="text-center">
								<div class="pages">
									<label>Page:</label>
									<ul>
										<li class="current">1</li>
										<li><a href="#">2</a></li>
										<li><a href="#" class="next i-next" title="Next"><i class="fa fa-arrow-right"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- shop toolbar end -->
				</div>
			</div>
			<!-- right sidebar end -->
		</div>
	</div>
</div>
<!-- shop-with-sidebar end -->
@endsection
@push('clientAjax')
	<script>
		$(function() {
			$('.orderby').change(function() {
				$('#sort-by').submit();
			});
		});
	</script>
@endpush