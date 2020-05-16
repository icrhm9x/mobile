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
           <!-- features-product area start -->
           @include('client.home.components.features')
           <!-- features-product area end -->
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
   <!-- new product start -->
   @include('client.home.components.new_product')
   <!-- new product end -->
   <!-- news area start -->
   @include('client.home.components.news')
   <!-- news area end -->
@endsection
