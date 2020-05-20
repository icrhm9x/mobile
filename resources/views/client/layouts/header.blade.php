<header class="short-stor">
    <div class="container-fluid">
        <div class="row">
            <!-- logo start -->
            <div class="col-md-3 col-sm-12 text-center nopadding-right">
                <div class="top-logo">
                    <a href="/"><img src="/assets/client/img/logo.gif" alt="" /></a>
                </div>
            </div>
            <!-- logo end -->
            <!-- mainmenu area start -->
            <div class="col-md-6 text-center">
                <div class="mainmenu">
                    <nav>
                        <ul>
                            <li class="expand"><a href="/">Trang chủ</a></li>
                            @if (isset($category->first()->slug))
                            <li class="expand"><a href="{{ route('get.category', $category->first()->slug) }}">Sản phẩm</a>
                                <div class="restrain mega-menu megamenu1">
                                    @foreach ($category as $cat)
                                    <span>
                                        <a class="mega-menu-title" href="{{ route('get.category', [$cat->slug]) }}"> {{ $cat->name }} </a>
                                        @if (count($cat->productType) > 0)
                                            @foreach ($cat->productType as $key => $protype)
                                                @if ($key > 4)
                                                    @break
                                                @endif
                                                @if ($protype->Product->count() > 0)
                                                    <a href="{{ route('get.list.productType',['c_slug'=>$cat->slug, 'prdType_slug'=>$protype->slug]) }}">{{ $protype->name }}</a>
                                                @endif
                                            @endforeach
                                        @endif
                                    </span>
                                    @endforeach
                                </div>
                            </li>
                            @else
                            <li class="expand"><a href="#">Sản phẩm</a></li>
                            @endif
                            <li class="expand"><a href="{{ route('get.list.news') }}">Tin tức</a></li>
                            <li class="expand"><a href="{{ route('get.about') }}">Giới thiệu</a></li>
                            <li class="expand"><a href="{{ route('get.contact') }}">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- mobile menu start -->
                <div class="row">
                    <div class="col-sm-12 mobile-menu-area">
                        <div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
                            <span class="mobile-menu-title">Menu</span>
                            <nav>
                                <ul>
                                    <li><a href="/">Trang chủ</a></li>
                                    @if (isset($category->first()->slug))
                                    <li><a href="{{ route('get.category', $category->first()->slug) }}">Sản phẩm</a>
                                        <ul>
                                            @foreach ($category as $cat)
                                            <li><a href="{{ route('get.category', [$cat->slug]) }}">{{ $cat->name }}</a>
                                                <ul>
                                                    @if (count($cat->productType) > 0)
                                                        @foreach ($cat->productType as $key => $protype)
                                                            @if ($key > 4)
                                                                @break
                                                            @endif
                                                            @if ($protype->Product->count() > 0)
                                                                <li><a href="{{ route('get.list.productType',['c_slug'=>$cat->slug, 'prdType_slug'=>$protype->slug]) }}">{{ $protype->name }}</a></li>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @else
                                    <li><a href="#">Sản phẩm</a></li>
                                    @endif
                                    <li><a href="#">Tin tức</a>
                                        <ul>
                                            <li><a href="shop-grid.html">Shop Grid</a></li>
                                            <li><a href="shop-list.html">Shop List</a></li>
                                            <li><a href="#">Product Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('get.about') }}">Giới thiệu</a></li>
                                    <li><a href="{{ route('get.contact') }}">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- mobile menu end -->
            </div>
            <!-- mainmenu area end -->
            <!-- top details area start -->
            <div class="col-md-3 col-sm-12 nopadding-left">
                <div class="top-detail">
                    <!-- addcart top start -->
                    <div class="disflow">
                        <div class="circle-shopping expand">
                            <div class="shopping-carts text-right">
                                <div class="cart-toggler">
                                    <a href="{{ route('list.cart') }}"><i class="icon-bag"></i></a>
                                    <a href="#"><span class="cart-quantity">{{ Cart::count() }}</span></a>
                                </div>
                                @if (Cart::count() > 0)
                                <div class="restrain small-cart-content">
                                    <ul class="cart-list">
                                        @foreach (Cart::content() as $key => $item)
                                            <li>
                                                <a class="sm-cart-product" href="#">
                                                    <img src="{{ $item->options->img_path }}" alt="">
                                                </a>
                                                <div class="small-cart-detail">
                                                    <a class="remove" href="{{ route('del.cart', $key) }}"><i class="fa fa-times-circle"></i></a>
                                                    <a class="small-cart-name" href="#">{{ $item->name }}</a>
                                                    <span class="quantitys"><strong>{{ $item->qty }}</strong>x<span>{{ number_format($item->price, 0, ',', '.') }}₫</span></span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <p class="total">Tổng tiền: <span class="amount">{{ Cart::subtotal(0,',','.') }}₫</span></p>
                                    <p class="buttons">
                                        <a href="{{ route('list.cart') }}" class="button">Xem giỏ hàng</a>
                                    </p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- addcart top start -->
                    <!-- search divition start -->
                    <div class="disflow">
                        <div class="header-search expand">
                            <div class="search-icon fa fa-search"></div>
                            <div class="product-search restrain">
                                <div class="container nopadding-right">
                                    <form action="{{ route('get.list.search') }}" id="searchform" method="get">
                                        <div class="input-group">
                                            <input type="text" name="key" class="form-control" maxlength="128" placeholder="Search product...">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- search divition end -->
                    <div class="disflow">
                        <div class="expand dropps-menu">
                            <a href="#"><i class="fa fa-align-right"></i></a>
                            <ul class="restrain language">
                                @if (Auth::check())
                                    <li><a href="#">{{ Auth::user()->name }}</a></li>
                                    <li><a href="#">Yêu thích</a></li>
                                    <li><a href="{{ route('list.cart') }}">Giỏ hàng</a></li>
                                    <li><a href="{{ route('get.logout') }}">Thoát</a></li>
                                @else
                                    <li><a href="{{ route('get.register') }}">Đăng ký</a></li>
                                    <li><a href="{{ route('get.login') }}">Đăng nhập</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- top details area end -->
        </div>
    </div>
</header>
