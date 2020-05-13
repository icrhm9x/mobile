@extends('client.layouts.master', ['title' => 'Home'])
@section('content')
    <!-- start home slider -->
    <div class="slider-area an-1 hm-1">
        <!-- slider -->
       <div class="bend niceties preview-2">
           <div id="ensign-nivoslider" class="slides">	
               <img src="/assets/client/img/slider/home-1/slider1-1.jpg" alt="" title="#slider-direction-1"  />
               <img src="/assets/client/img/slider/home-1/slider1-2.jpg" alt="" title="#slider-direction-2"  />
           </div>
           <!-- direction 1 -->
           <div id="slider-direction-1" class="t-cn slider-direction">
               <div class="slider-progress"></div>
               <div class="slider-content t-cn s-tb slider-1">
                   <div class="title-container s-tb-c title-compress">
                       <h2 class="title1">minimal bags</h2>
                       <h3 class="title2" >collection</h3>
                       <h4 class="title2" >Simple is the best.</h4>
                       <a class="btn-title" href="">View collection</a>
                   </div>
               </div>	
           </div>
           <!-- direction 2 -->
           <div id="slider-direction-2" class="slider-direction">
               <div class="slider-progress"></div>
               <div class="slider-content t-lfl s-tb slider-2 lft-pr">
                   <div class="title-container s-tb-c">
                       <h2 class="title1">minimal bags</h2>
                       <h3 class="title2" >collection</h3>
                       <h4 class="title2" >Simple is the best.</h4>
                       <a class="btn-title" href="">View collection</a>
                   </div>
               </div>	
           </div>
       </div>
       <!-- slider end-->
   </div>
   <!-- end home slider -->
   <!-- product section start -->
   <div class="our-product-area">
       <div class="container">
           <!-- area title start -->
           <div class="area-title">
               <h2>Sản phẩm</h2>
           </div>
           <!-- area title end -->
           <!-- our-product area start -->
           <div class="row">
               <div class="col-md-12">
                   <div class="features-tab">
                       <!-- Nav tabs -->
                       <ul class="nav nav-tabs">
                           <li role="presentation" class="active"><a href="#home" data-toggle="tab">Bán chạy</a></li>
                           <li role="presentation"><a href="#profile" data-toggle="tab">Giá sốc</a></li>
                       </ul>
                       <!-- Tab pans -->
                       <div class="tab-content">
                           <div role="tabpanel" class="tab-pane fade in active" id="home">
                               <div class="row">
                                   <div class="features-curosel">
                                       @if (isset($bestSellers))
                                           @foreach ($bestSellers as $bestSeller)
                                            <div class="col-lg-12 col-md-12">
                                                <!-- single-product start -->
                                                <div class="single-product first-sale">
                                                    <div class="product-img">
                                                        <a href="{{ route('get.detail.product', [$bestSeller->Category->slug,$bestSeller->ProductType->slug,$bestSeller->slug]) }}">
                                                            <img class="primary-image" src="/img/upload/product/{{ $bestSeller->img }}" alt="" />
                                                        </a>
                                                        <div class="actions">
                                                            <div class="action-buttons">
                                                                <div class="add-to-links">
                                                                    <div class="add-to-wishlist">
                                                                        <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                                    </div>
                                                                    <div class="compare-button">
                                                                        <a href="{{ route('add.cart', $bestSeller->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                                    </div>									
                                                                </div>
                                                                <div class="quickviewbtn">
                                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h2 class="product-name"><a href="{{ route('get.detail.product', [$bestSeller->Category->slug,$bestSeller->ProductType->slug,$bestSeller->slug]) }}">{{ $bestSeller->name }}</a></h2>
                                                        <div class="product-price">
                                                            @if ($bestSeller->promotion > 0)
                                                            <strong>{{ number_format($bestSeller->price - $bestSeller->promotion,0,'','.') }}₫</strong>
                                                            <span>{{ number_format($bestSeller->price,0,'','.') }}₫</span>
                                                            @else
                                                            <strong>{{ number_format($bestSeller->price,0,'','.') }}₫</strong>
                                                            @endif
                                                        </div>
                                                        {{--  <p>Nunc facilisis sagittis ullamcorper...</p>  --}}
                                                    </div>
                                                </div>
                                                <!-- single-product end -->
                                            </div>
                                           @endforeach
                                       @endif
                                   </div>
                               </div>
                           </div>
                           <div role="tabpanel" class="tab-pane fade" id="profile">
                               <div class="row">
                                   <div class="features-curosel">
                                       @if (isset($promotion))
                                           @foreach ($promotion as $promo)
                                            <div class="col-lg-12 col-md-12">
                                                <div class="single-product first-sale">
                                                    <div class="product-img">
                                                        <a href="{{ route('get.detail.product', [$promo->Category->slug,$promo->ProductType->slug,$promo->slug]) }}">
                                                            <img class="primary-image" src="/img/upload/product/{{ $promo->img }}" alt="" />
                                                        </a>
                                                        <div class="actions">
                                                            <div class="action-buttons">
                                                                <div class="add-to-links">
                                                                    <div class="add-to-wishlist">
                                                                        <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                                    </div>
                                                                    <div class="compare-button">
                                                                        <a href="{{ route('add.cart', $promo->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                                    </div>									
                                                                </div>
                                                                <div class="quickviewbtn">
                                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h2 class="product-name"><a href="{{ route('get.detail.product', [$promo->Category->slug,$promo->ProductType->slug,$promo->slug]) }}">{{ $promo->name }}</a></h2>
                                                        <div class="product-price">
                                                            @if ($promo->promotion > 0)
                                                            <strong>{{ number_format($promo->price - $promo->promotion,0,'','.') }}₫</strong>
                                                            <span>{{ number_format($promo->price,0,'','.') }}₫</span>
                                                            @else
                                                            <strong>{{ number_format($promo->price,0,'','.') }}₫</strong>
                                                            @endif
                                                        </div>
                                                        {{--  <p>Nunc facilisis sagittis ullamcorper...</p>  --}}
                                                    </div>
                                                </div>
                                            </div>
                                           @endforeach
                                       @endif
                                       
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>				
               </div>
           </div>
           <!-- our-product area end -->	
       </div>
   </div>
   <!-- product section end -->
   <!-- banner-area start -->
   <div class="banner-area">
       <div class="container-fluid">
           <div class="row">
               <a href=""><img src="/assets/client/img/banner/banner-1.jpg" alt="" /></a>
           </div>
       </div>
   </div>
   <!-- banner-area end -->
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
                           @if (isset($newprds))
                               @foreach ($newprds as $newprd)
                                <div class="col-lg-12 col-md-12">
                                    <div class="single-product first-sale">
                                        <div class="product-img">
                                            <a href="{{ route('get.detail.product', [$newprd->Category->slug,$newprd->ProductType->slug,$newprd->slug]) }}">
                                                <img class="primary-image" src="/img/upload/product/{{ $newprd->img }}" alt="" />
                                            </a>
                                            <div class="actions">
                                                <div class="action-buttons">
                                                    <div class="add-to-links">
                                                        <div class="add-to-wishlist">
                                                            <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                        </div>
                                                        <div class="compare-button">
                                                            <a href="{{ route('add.cart', $newprd->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                        </div>									
                                                    </div>
                                                    <div class="quickviewbtn">
                                                        <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h2 class="product-name"><a href="{{ route('get.detail.product', [$newprd->Category->slug,$newprd->ProductType->slug,$newprd->slug]) }}">{{ $newprd->name }}</a></h2>
                                            <div class="product-price">
                                                @if ($newprd->promotion > 0)
                                                <strong>{{ number_format($newprd->price - $newprd->promotion,0,'','.') }}₫</strong>
                                                <span>{{ number_format($newprd->price,0,'','.') }}₫</span>
                                                @else
                                                <strong>{{ number_format($newprd->price,0,'','.') }}₫</strong>
                                                @endif
                                            </div>
                                            {{--  <p>Nunc facilisis sagittis ullamcorper...</p>  --}}
                                        </div>
                                    </div>
                                </div>
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
   <!-- latestpost area start -->
   <div class="latest-post-area">
       <div class="container">
           <div class="area-title">
               <h2>Tin tức</h2>
           </div>
           <div class="row">
               <div class="all-singlepost">
                   @forelse ($news as $item)
                   <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-post">
                            <div class="post-thumb">
                                <a href="{{ route('get.detail.news', [$item->slug]) }}">
                                    <img src="/img/upload/news/{{ $item->avatar }}" alt="" />
                                </a>
                            </div>
                            <div class="post-thumb-info">
                                <div class="post-time">
                                    <a href="#">{{ $item->name }}</a>
                                </div>
                                <div class="postexcerpt">
                                    <p>{{ $item->description }}</p>
                                    <a href="{{ route('get.detail.news', [$item->slug]) }}" class="read-more">Đọc tiếp</a>
                                </div>
                            </div>
                        </div>
                    </div>
                   @empty
                       <div>chưa có bài biết nào</div>
                   @endforelse
               </div>
           </div>
       </div>
   </div>
   <!-- latestpost area end -->
   <!-- testimonial area start -->
   <div class="testimonial-area lap-ruffel">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div class="crusial-carousel">
                       <div class="crusial-content">
                           <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                           <span>BootExperts</span>
                       </div>
                       <div class="crusial-content">
                           <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                           <span>Lavoro Store!</span>
                       </div>
                       <div class="crusial-content">
                           <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                           <span>MR Selim Rana</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- testimonial area end -->
@endsection