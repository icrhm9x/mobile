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
      @if (isset($orders))
          @foreach ($orders as $item)
          <tr>
            <th scope="row">{{ $item->id }}</th>
            <td><a href="" target="_blank">{{ isset($item->Product->name) ? $item->Product->name : 'sản phẩm đã bị xóa'}}</a></td>
            <td><img src="{{ asset(isset($item->Product->img_path) ? $item->Product->img_path : 'assets/admin/img/product.jpg') }}" class="img-fluid" style="width:80px"></td>
            <td>{{ number_format($item->price,0,',','.') }}₫</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ number_format($item->price - $item->promotion,0,',','.') }}₫</td>
          </tr>
          @endforeach
      @endif
    </tbody>
</table>
