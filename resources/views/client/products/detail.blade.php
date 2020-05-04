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
								<img src="/img/upload/product/{{ $product->img }}" alt="big-1">
							</div>
						</div>
					</div>
					<div class="col-md-7 col-sm-7 col-xs-12">
						<div class="product-list-wrapper">
							<div class="single-product">
								<div class="product-content">
									<h2 class="product-name"><a href="#">{{ $product->name }}</a></h2>
									<div class="rating-price">	
										<div class="pro-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
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
							<li class=""><a href="#messages" data-toggle="tab"> Đánh giá (1)</a></li>
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
										<h3 class="comment-reply-title">1 đánh giá cho {{ $product->name }}</h3>
										<div class="comments-list">
											<ul>
												<li>
													<div class="comments-details">
														<div class="comments-list-img">
															<img src="/assets/client/img/user-1.jpg" alt="">
														</div>
														<div class="comments-content-wrap">
															<span>
																<b><a href="#">Admin - </a></b>
																<span class="post-time">October 6, 2014 at 1:38 am</span>
															</span>
															<p>Lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi.</p>
														</div>
													</div>
												</li>									
											</ul>
										</div>
									</div>
									<div class="comment-respond">
										<h3 class="comment-reply-title">Add a review</h3>
										<span class="email-notes">Your email address will not be published. Required fields are marked *</span>
										<form action="#">
											<div class="row">
												<div class="col-md-12">
													<p>Name *</p>
													<input type="text">
												</div>
												<div class="col-md-12">
													<p>Email *</p>
													<input type="email">
												</div>
												<div class="col-md-12">
													<p>Your Rating</p>
													<div class="pro-rating">
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star-o"></i></a>
														<a href="#"><i class="fa fa-star-o"></i></a>
													</div>
												</div>
												<div class="col-md-12 comment-form-comment">
													<p>Your Review</p>
													<textarea id="message" cols="30" rows="10"></textarea>
													<input type="submit" value="Submit">
												</div>
											</div>
										</form>
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
					<h2>New products</h2>
				</div>
				<!-- our-product area start -->
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="features-curosel">
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="/assets/client/img/products/product-1.jpg" alt="" />
												<img class="secondary-image" src="/assets/client/img/products/product-2.jpg" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
											<div class="actions">
												<div class="action-buttons">
													<div class="add-to-links">
														<div class="add-to-wishlist">
															<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
														</div>
														<div class="compare-button">
															<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
														</div>									
													</div>
													<div class="quickviewbtn">
														<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
													</div>
												</div>
											</div>
											<div class="price-box">
												<span class="new-price">$200.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Donec ac tempus</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="/assets/client/img/products/product-5.jpg" alt="" />
												<img class="secondary-image" src="/assets/client/img/products/product-6.jpg" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
											<div class="actions">
												<div class="action-buttons">
													<div class="add-to-links">
														<div class="add-to-wishlist">
															<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
														</div>
														<div class="compare-button">
															<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
														</div>									
													</div>
													<div class="quickviewbtn">
														<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
													</div>
												</div>
											</div>
											<div class="price-box">
												<span class="new-price">$300.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Primis in faucibus</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="/assets/client/img/products/product-9.jpg" alt="" />
												<img class="secondary-image" src="/assets/client/img/products/product-10.jpg" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
											<div class="actions">
												<div class="action-buttons">
													<div class="add-to-links">
														<div class="add-to-wishlist">
															<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
														</div>
														<div class="compare-button">
															<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
														</div>									
													</div>
													<div class="quickviewbtn">
														<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
													</div>
												</div>
											</div>
											<div class="price-box">
												<span class="new-price">$270.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Voluptas nulla</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
									
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="/assets/client/img/products/product-13.jpg" alt="" />
												<img class="secondary-image" src="/assets/client/img/products/product-1.jpg" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
											<div class="actions">
												<div class="action-buttons">
													<div class="add-to-links">
														<div class="add-to-wishlist">
															<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
														</div>
														<div class="compare-button">
															<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
														</div>									
													</div>
													<div class="quickviewbtn">
														<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
													</div>
												</div>
											</div>
											<div class="price-box">
												<span class="new-price">$340.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Cras neque metus</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<span class="sale-text">Sale</span>
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="/assets/client/img/products/product-4.jpg" alt="" />
												<img class="secondary-image" src="/assets/client/img/products/product-5.jpg" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
											<div class="actions">
												<div class="action-buttons">
													<div class="add-to-links">
														<div class="add-to-wishlist">
															<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
														</div>
														<div class="compare-button">
															<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
														</div>									
													</div>
													<div class="quickviewbtn">
														<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
													</div>
												</div>
											</div>
											<div class="price-box">
												<span class="new-price">$360.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Occaecati cupiditate</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="/assets/client/img/products/product-8.jpg" alt="" />
												<img class="secondary-image" src="/assets/client/img/products/product-9.jpg" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
											<div class="actions">
												<div class="action-buttons">
													<div class="add-to-links">
														<div class="add-to-wishlist">
															<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
														</div>
														<div class="compare-button">
															<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
														</div>									
													</div>
													<div class="quickviewbtn">
														<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
													</div>
												</div>
											</div>
											<div class="price-box">
												<span class="new-price">$400.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Accumsan elit</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="/assets/client/img/products/product-11.jpg" alt="" />
												<img class="secondary-image" src="/assets/client/img/products/product-12.jpg" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
											<div class="actions">
												<div class="action-buttons">
													<div class="add-to-links">
														<div class="add-to-wishlist">
															<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
														</div>
														<div class="compare-button">
															<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
														</div>									
													</div>
													<div class="quickviewbtn">
														<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
													</div>
												</div>
											</div>
											<div class="price-box">
												<span class="new-price">$280.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Pellentesque habitant</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="/assets/client/img/products/product-11.jpg" alt="" />
												<img class="secondary-image" src="/assets/client/img/products/product-2.jpg" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
											<div class="actions">
												<div class="action-buttons">
													<div class="add-to-links">
														<div class="add-to-wishlist">
															<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
														</div>
														<div class="compare-button">
															<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
														</div>									
													</div>
													<div class="quickviewbtn">
														<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
													</div>
												</div>
											</div>
											<div class="price-box">
												<span class="new-price">$222.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Donec ac tempus</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
							</div>
						</div>	
					</div>
				</div>
				<!-- our-product area end -->	
			</div>
		</div>
		<!-- product section end -->
@endsection