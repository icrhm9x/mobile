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
                        @foreach ($newprds as $newprd)
                            <div class="col-lg-12 col-md-12">
                                <div class="single-product first-sale">
                                    <div class="product-img">
                                        <a href="{{ route('get.detail.product', [$newprd->slug]) }}">
                                            <img class="primary-image" src="{{ asset($newprd->img_path) }}" alt=""/>
                                        </a>
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <div class="add-to-wishlist">
                                                        <a href="{{ route('wishlist.store', $newprd->id) }}"
                                                           title="Yêu thích" class="addWishListJS"><i
                                                                class="fa fa-heart"></i></a>
                                                    </div>
                                                    <div class="compare-button">
                                                        <a href="{{ route('add.cart', $newprd->id) }}"
                                                           title="Thêm vào giỏ hàng" class="addCardJS"><i
                                                                class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name"><a
                                                href="{{ route('get.detail.product', [$newprd->slug]) }}">{{ $newprd->name }}</a>
                                        </h2>
                                        <div class="product-price">
                                            @if ($newprd->promotion > 0)
                                                <strong>{{ number_format($newprd->price - $newprd->promotion,0,'','.') }}
                                                    ₫</strong>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- our-product area end -->
    </div>
</div>
