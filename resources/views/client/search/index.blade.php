@extends('client.layouts.master', ['title' => 'Tìm kiếm'])
@section('content')
    <style>
        .sidebar-content .active {
            color: #c2a476;
        }
    </style>
    <!-- category-banner area start -->
    <div class="category-banner"></div>
    <!-- category-banner area end -->
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{ route('home') }}}">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Tìm kiếm</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Request::get('key'))
        <div class="area-title_search">
            <h2 class="title_search">{{ Request::get('key') }}</h2>
        </div>
    @endif
    <!-- breadcrumbs area end -->
    <div class="shop-with-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="tab-content">
                        <div
                            class="tab-pane fade active in"
                            id="shop-grid-tab">
                            <div class="row">
                                <div class="shop-product-tab">
                                    @if (isset($listProduct))
                                        @foreach ($listProduct as $item)
                                            <div class="col-lg-3 col-md-3 col-sm-3 my-4">
                                                <div class="two-product">
                                                    <div class="single-product">
                                                        <div class="product-img">
                                                            <a href="{{ route('get.detail.product', [$item->slug]) }}">
                                                                <img class="primary-image"
                                                                     src="{{ asset($item->img_path) }}" alt=""/>
                                                            </a>
                                                            <div class="actions">
                                                                <div class="action-buttons">
                                                                    <div class="add-to-links">
                                                                        <div class="add-to-wishlist">
                                                                            <a href="{{ route('wishlist.store', $item->id) }}"
                                                                               title="Yêu thích"
                                                                               class="addWishListJS"><i
                                                                                    class="fa fa-heart"></i></a>
                                                                        </div>
                                                                        <div class="compare-button">
                                                                            <a href="{{ route('add.cart', $item->id) }}"
                                                                               title="Thêm vào giỏ hàng"
                                                                               class="addCardJS"><i
                                                                                    class="icon-bag"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h2 class="product-name"><a
                                                                    href="{{ route('get.detail.product', [$item->slug]) }}">{{ $item->name }}</a>
                                                            </h2>
                                                            <div class="product-price">
                                                                @if ($item->promotion > 0)
                                                                    <strong>{{ number_format($item->price - $item->promotion,0,'','.') }}
                                                                        ₫</strong>
                                                                    <span>{{ number_format($item->price,0,'','.') }}₫</span>
                                                                @else
                                                                    <strong>{{ number_format($item->price,0,'','.') }}
                                                                        ₫</strong>
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
                        <!-- shop toolbar start -->
                        <div class="text-center">
                            {{ $listProduct->appends(['key'=>request()->key, 'orderby'=>request()->orderby])->render('client.layouts.paginate') }}
                        </div>
                        <!-- shop toolbar end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('clientAjax')
    <script src="{{ asset('assets/client/addCart/add-index.js') }}"></script>
@endpush
