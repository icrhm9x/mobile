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
