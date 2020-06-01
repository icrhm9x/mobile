<div class="container">
    <div class="area-title">
        <h2>Giỏ hàng của bạn</h2>
    </div>
    <!-- Shopping Cart Table -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="cart-table">
                    <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Cập nhật</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($cart as $key => $item)
                        <tr>
                            <td>
                                <a href="#"><img src="{{ asset($item->options->img_path) }}" class="img-responsive"/></a>
                            </td>
                            <td>
                                <h6>{{ $item->name }}</h6>
                            </td>
                            <td>
                                <div class="cart-price">{{ number_format($item->price, 0, ',', '.') }}₫</div>
                            </td>
                            <td>
                                <input class="quantity" type="number" value="{{ $item->qty }}" min="1" max="10">
                            </td>
                            <td>
                                <div class="cart-subtotal">{{ number_format($item->price*$item->qty, 0, ',', '.') }}₫
                                </div>
                            </td>
                            <td><a href="{{ route('update.cart', $key) }}" data-id="{{ $item->id }}"
                                   class="btn btn-primary cartUpdateJs">Cập nhật</a></td>
                            <td><a href="{{ route('del.cart', $key) }}" class="btn btn-danger cartDelJs">Xóa</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="7">Giỏ hàng của bạn chưa có sản phẩm nào</td></tr>
                    @endforelse
                    <tr>
                        <td class="actions-crt" colspan="7">
                            <div class="">
                                <div class="col-md-4 col-sm-4 col-xs-4 pull-right">
                                    <a class="cbtn" href="{{ route('home') }}">Tiếp tục mua sắm</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Shopping Cart Table -->
    @if(Cart::count() > 0)
    <div class="row">
        <div class="col-md-12 vendee-clue">
            <div class="shipping coupon cart-totals">
                <ul>
                    <li class="cartSubT">Tổng tiền ({{ Cart::count() }} sản phẩm): <span>{{ Cart::subtotal(0,',','.') }}₫</span>
                    </li>
                </ul>
                <a class="proceedbtn" href="{{ route('checkout') }}">THANH TOÁN</a>
            </div>
        </div>
    </div>
    @endif
</div>
