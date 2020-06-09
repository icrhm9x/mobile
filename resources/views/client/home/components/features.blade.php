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
                            @foreach ($bestSellers->chunk(2) as $chunk)
                            <div class="col-lg-12 col-md-12">
                                @foreach ($chunk as $bestSeller)
                                <div class="single-product first-sale">
                                    <div class="product-img">
                                        <a href="{{ route('get.detail.product', [$bestSeller->slug]) }}">
                                            <img class="primary-image" src="{{ asset($bestSeller->img_path) }}"
                                                 alt=""/>
                                        </a>
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <div class="add-to-wishlist">
                                                        <a href="{{ route('wishlist.store', $bestSeller->id) }}"
                                                           title="Yêu thích" class="addWishListJS"><i
                                                                class="fa fa-heart"></i></a>
                                                    </div>
                                                    <div class="compare-button">
                                                        <a href="{{ route('add.cart', $bestSeller->id) }}"
                                                           title="Thêm vào giỏ hàng" class="addCardJS"><i
                                                                class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name"><a
                                                href="{{ route('get.detail.product', [$bestSeller->slug]) }}">{{ $bestSeller->name }}</a>
                                        </h2>
                                        <div class="product-price">
                                            @if ($bestSeller->promotion > 0)
                                                <strong>{{ number_format($bestSeller->price - $bestSeller->promotion,0,'','.') }}
                                                    ₫</strong>
                                                <span>{{ number_format($bestSeller->price,0,'','.') }}₫</span>
                                            @else
                                                <strong>{{ number_format($bestSeller->price,0,'','.') }}
                                                    ₫</strong>
                                            @endif
                                        </div>
                                        {{--  <p>Nunc facilisis sagittis ullamcorper...</p>  --}}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="profile">
                    <div class="row">
                        <div class="features-curosel">
                            @foreach ($promotion->chunk(2) as $chunk)
                                <div class="col-lg-12 col-md-12">
                                    @foreach ($chunk as $promo)
                                    <div class="single-product first-sale">
                                        <div class="product-img">
                                            <a href="{{ route('get.detail.product', [$promo->slug]) }}">
                                                <img class="primary-image" src="{{ asset($promo->img_path) }}"
                                                     alt=""/>
                                            </a>
                                            <div class="actions">
                                                <div class="action-buttons">
                                                    <div class="add-to-links">
                                                        <div class="add-to-wishlist">
                                                            <a href="{{ route('wishlist.store', $promo->id) }}"
                                                               title="Yêu thích" class="addWishListJS"><i
                                                                    class="fa fa-heart"></i></a>
                                                        </div>
                                                        <div class="compare-button">
                                                            <a href="{{ route('add.cart', $promo->id) }}"
                                                               title="Thêm vào giỏ hàng" class="addCardJS"><i
                                                                    class="icon-bag"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h2 class="product-name"><a
                                                    href="{{ route('get.detail.product', [$promo->slug]) }}">{{ $promo->name }}</a>
                                            </h2>
                                            <div class="product-price">
                                                @if ($promo->promotion > 0)
                                                    <strong>{{ number_format($promo->price - $promo->promotion,0,'','.') }}
                                                        ₫</strong>
                                                    <span>{{ number_format($promo->price,0,'','.') }}₫</span>
                                                @else
                                                    <strong>{{ number_format($promo->price,0,'','.') }}₫</strong>
                                                @endif
                                            </div>
                                            {{--  <p>Nunc facilisis sagittis ullamcorper...</p>  --}}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
