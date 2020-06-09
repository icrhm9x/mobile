<table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Hình ảnh</th>
        <th scope="col">Giá</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Thành tiền</th>
      </tr>
    </thead>
    <tbody>
          @forelse ($orderDetails as $orderDetail)
          <tr>
            <th scope="row">{{ $orderDetail->id }}</th>
            <td><a href="{{ route('get.detail.product', [$orderDetail->product->slug]) }}" target="_blank">{{ isset($orderDetail->product->name) ? $orderDetail->product->name : 'sản phẩm đã bị xóa' }}</a></td>
            <td><img src="{{ asset(isset($orderDetail->product->img_path) ? $orderDetail->product->img_path : 'assets/admin/img/product.jpg') }}" class="img-fluid" style="width:80px"></td>
            <td>{{ number_format($orderDetail->price,0,',','.') }}₫</td>
            <td>{{ $orderDetail->quantity }}</td>
            <td>{{ number_format($orderDetail->price - $orderDetail->promotion,0,',','.') }}₫</td>
          </tr>
          @empty
              <tr>
                  <td colspan="6" style="text-align: center;">Chi tiết đơn hàng không tồn tại</td>
              </tr>
          @endforelse
    </tbody>
</table>
