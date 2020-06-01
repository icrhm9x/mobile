@extends('client.layouts.master', ['title' => 'Tin tức'])
@section('content')
    <style>
        .shop-with-sidebar {
            margin-top: 20px;
        }

        .product-img {
            height: 240px;
        }
    </style>
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
                            <li class="category3"><span>Tin tức</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-with-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="shop-list-tab">
                            <div class="list-view">
                                @forelse ($news as $item)
                                    <div class="product-list-wrapper">
                                        <div class="single-product">
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="product-img">
                                                    <a href="{{ route('get.detail.news', [$item->slug]) }}">
                                                        <img class="primary-image"
                                                             src="{{ asset($item->avatar) }}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <div class="product-content">
                                                    <h2 class="product-name"><a
                                                            href="{{ route('get.detail.news', [$item->slug]) }}">{{ $item->name }}</a>
                                                    </h2>
                                                    <div class="product-desc">
                                                        <p>{{ $item->description }}</p>
                                                    </div>
                                                    <div class="actions-e">
                                                        <span
                                                            style="margin-right: 7px;">Biên tập bởi {{ $item->author_name }}</span>
                                                        <span>{{ $item->created_at }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="row">
                                        <div class="col-md-12 my-12">
                                            <div class="f-title text-center">
                                                <h3 class="title text-uppercase">Đang cập nhật bài viết</h3>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="text-center">
                            {{ $news->render('client.layouts.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
