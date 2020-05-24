@extends('client.layouts.master',['title' => $product->name])
@section('content')
    		<!-- breadcrumbs area start -->
		<div class="breadcrumbs mb-4">
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
									<a href="{{ route('get.category',[$product->Category->slug]) }}">{{ $product->Category->name }}</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="home">
									<a href="{{ route('get.list.productType',[$product->Category->slug, $product->ProductType->slug]) }}">{{ $product->ProductType->name }}</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="category3"><span>{{ $product->name }}</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- product-details Area Start -->
		<div class="product-details-area">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-sm-5 col-xs-12">
						<div class="zoomWrapper">
							<div id="img-1" class="zoomWrapper single-zoom">
								<img src="{{ asset($product->img_path) }}" alt="big-1">
							</div>
						</div>
					</div>
					<div class="col-md-7 col-sm-7 col-xs-12">
						<div class="product-list-wrapper">
							<div class="single-product">
								<div class="product-content">
									<h1 class="product-name"><a href="#">{{ $product->name }}</a></h1>
									<div class="rating-price">
										<div class="pro-rating">
											<?php
											$average = 0;
											if ($product->star_number != 0){
												$average = round($product->star_total / $product->star_number, 2);
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
											@if ($product->promotion > 0)
											<span class="new-price">{{ number_format($product->price - $product->promotion, 0, ',', '.') }}₫</span>
											<span class="price-old">{{ number_format($product->price,0,',','.') }}₫</span>
											@else
											<span class="new-price">{{ number_format($product->price, 0, ',', '.') }}₫</span>
											@endif
										</div>
									</div>
									<div class="product-desc">
										<p>{{ $product->description }}</p>
									</div>
									<p class="availability in-stock">Trạng thái: <span>
										@if ($product->status == 1)
											{{ 'Còn hàng' }}
										@elseif ($product->status == 2)
											{{ 'Sắp ra mắt' }}
										@else
											{{ 'Hết hàng' }}
										@endif
									</span></p>
									<div class="actions-e">
										<div class="action-buttons-single">
											@if ($product->status == 1)
											<div class="add-to-cart">
												<a href="{{ route('add.cart', $product->id) }}">Thêm vào giỏ hàng</a>
											</div>
											@endif
											<div class="add-to-links">
												<div class="add-to-wishlist">
													<a href="#" data-toggle="tooltip" title="yêu thích" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
												</div>
												<div class="compare-button">
													<a href="#" data-toggle="tooltip" title="so sánh" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
												</div>
											</div>
										</div>
									</div>
									<div class="singl-share">
                                        <a href="#"><img src="/assets/client/img/single-share.png" alt=""></a>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="single-product-tab">
						  <!-- Nav tabs -->
						<ul class="details-tab">
							<li class="active"><a href="#home" data-toggle="tab">Bài viết</a></li>
							<li class=""><a href="#messages" data-toggle="tab"> Đánh giá ({{ $product->star_number }})</a></li>
						</ul>
						  <!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="home">
								<div class="product-tab-content">
									{!! $product->article !!}
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="messages">
								<div class="single-post-comments col-md-6 col-md-offset-3">
									<div class="comments-area">
										<h3 class="comment-reply-title">{{ $product->star_number }} đánh giá cho {{ $product->name }} ({{ $average }}<i class="fa fa-star"></i>)</h3>
										<div class="comments-list">
											<ul>
												@forelse ($ratings as $item)
												<li>
													<div class="comments-details">
														<div class="comments-list-img">
															<img style="width: 50px;" src="{{ asset('assets/admin/img/default-avatar.png') }}" alt="">
														</div>
														<div class="comments-content-wrap">
															<span>
																<b><a style="text-transform: capitalize;" href="#">{{ $item->User->name }} - </a></b>
																<span class="post-time">{{ $item->created_at }}</span>
															</span>
															<p>
																@for ($i = 1; $i <= 5; $i++)
																	@if ($i <= $average)
																	<i class="fa fa-star"></i>
																	@else
																	<i class="fa fa-star-o"></i>
																	@endif
																@endfor
																{{ $item->content }}
															</p>
														</div>
													</div>
												</li>
												@empty
												<p>chưa có đánh giá</p>
												@endforelse
											</ul>
										</div>
									</div>
									<div class="comment-respond">
										@if (Auth::check())
											@if ($count > 0)
											<h3 class="comment-reply-title">Bạn đã đánh giá sản phẩm này</h3>
											@else
											<h3 class="comment-reply-title">Thêm đánh giá của bạn</h3>
											<span class="email-notes">Các trường bắt buộc được đánh dấu *</span>
											<form action="{{ route('post.rating', $product->id) }}" method="POST">
												@csrf
												<div class="row">
													<div class="col-md-12">
														<p>Họ tên *</p>
														<input type="text" name="name" value="{{ Auth::user()->name }}">
														{{ notifyError($errors,'name') }}
													</div>
													<div class="col-md-12">
														<p>Email *</p>
														<input type="email" name="email" value="{{ Auth::user()->email }}">
														{{ notifyError($errors,'email') }}
													</div>
													<div class="col-md-12">
														<p>Đánh giá của bạn</p>
														<div class="pro-rating">
															@for ($i = 1; $i <= 5; $i++)
																<i class="fa fa-star-o ratingJS" data-key="{{ $i }}"></i>
															@endfor
														</div>
														<input type="hidden" value="" class="number_rating" name="number">
														{{ notifyError($errors,'number') }}
													</div>
													<div class="col-md-12 comment-form-comment">
														<textarea id="message" name="content" cols="30" rows="10"></textarea>
														{{ notifyError($errors,'content') }}
														<input type="submit" value="Gửi đánh giá">
													</div>
												</div>
											</form>
											@endif
										@else
											<h3 class="comment-reply-title">Thêm đánh giá của bạn</h3>
											<div class="noti-rating"><a class="login-rating" href="{{ route('get.login') }}">Đăng nhập</a></div>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- product-details Area end -->
		<!-- product section start -->
		<div class="our-product-area new-product">
			<div class="container">
				<div class="area-title">
					<h2>Sản phẩm mới</h2>
				</div>
				<!-- our-product area start -->
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="features-curosel">
								@if (isset($newPrd))
									@foreach ($newPrd as $item)
									<!-- single-product start -->
									<div class="col-lg-12 col-md-12">
										<div class="single-product first-sale">
											<div class="product-img">
												<a href="#">
													<img class="primary-image" src="{{ asset($item->img_path) }}" alt="" />
												</a>
												<div class="actions">
													<div class="action-buttons">
														<div class="add-to-links">
															<div class="add-to-wishlist">
																<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
															</div>
															<div class="compare-button">
																<a href="{{ route('add.cart', $item->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
															</div>
														</div>
														<div class="quickviewbtn">
															<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
														</div>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h2 class="product-name"><a href="">{{ $item->name }}</a></h2>
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
									<!-- single-product end -->
									@endforeach
								@endif
							</div>
						</div>
					</div>
				</div>
				<!-- our-product area end -->
			</div>
		</div>
		<!-- product section end -->
@endsection
@push('clientAjax')
<script>
	$(function(){
		let listStar = $(".ratingJS");
		listStar.mouseover(function(){
			let number = $(this).attr('data-key');
			$.each(listStar, function(key, value){
				if(key + 1 <= number){
					$(this).removeClass('fa-star-o');
					$(this).addClass('fa-star');
				}else{
					$(this).removeClass('fa-star');
					$(this).addClass('fa-star-o');
				}
			});
		});
		listStar.click(function(){
			let number = $(this).attr('data-key');
			$(".number_rating").val(number);
			$.each(listStar, function(key, value){
				$(this).unbind('mouseover');
				if(key + 1 <= number){
					$(this).removeClass('fa-star-o');
					$(this).addClass('fa-star');
				}else{
					$(this).removeClass('fa-star');
					$(this).addClass('fa-star-o');
				}
			});
		});

	});
</script>
@endpush
