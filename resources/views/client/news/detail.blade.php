@extends('client.layouts.master', ['title' => $news->name])
@push('clientStyle')
    <link rel="stylesheet" href="{{ asset('assets/client/news/add-detail.css') }}">
@endpush
@section('content')
<div class="shop-with-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <article>
                    <h1 class="titledetail">{{ $news->description }}</h1>
                        <div class="article-content">
                            {!! $news->article !!}
                        </div>
                        <span class="btv">Biên tập bởi {{ $news->Member->name }}</span>
                        <div class="slidePS"></div>
                </article>
            </div>
        </div>
    </div>
</div>
<div class="latest-post-area">
    <div class="container">
        <div class="area-title">
            <h2>Tin mới</h2>
        </div>
        <div class="row">
            <div class="all-singlepost">
                @forelse ($list as $item)
                <div class="col-md-4 col-sm-4 col-xs-12">
                     <div class="single-post">
                         <div class="post-thumb">
                             <a href="{{ route('get.detail.news', [$item->slug]) }}">
                                 <img src="{{ asset($item->avatar) }}" alt="" />
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
@endsection
