<table class="cart-table">
    <thead>
    <tr>
        <th>Ảnh</th>
        <th>Sản phẩm</th>
        <th>Giỏ hàng</th>
        <th>Xóa</th>
    </tr>
    </thead>
    <tbody>
    @forelse($wishList as $item)
        <tr>
            <td>
                <a class="tb-img" href="{{ route('get.detail.product', [$item->product->slug]) }}"><img alt="" class="img-responsive" src="{{ asset($item->product->img_path) }}"></a>
            </td>
            <td>
                <h6><a href="{{ route('get.detail.product', [$item->product->slug]) }}">{{ $item->product->name }}</a></h6>
                <p>{{ $item->product->description }}</p>
            </td>
            <td class="text-center">
                <div class="price-box">
                    <span class="special-price">{{ number_format($item->product->price, 0, ',', '.') }}đ</span>
                </div>
                <a href="{{ route('add.cart', $item->idProduct) }}" class="cart-button-wi addCardJS">Thêm vào giỏ hàng</a>
            </td>
            <td><a href="{{ route('wishlist.destroy', $item->id) }}" class="remove wishListDelJs"><i class="fa fa-times"></i></a></td>
        </tr>
    @empty
        <tr><td colspan="4">Chưa có sản phẩm nào</td></tr>
    @endforelse
    </tbody>
</table>
