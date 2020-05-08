<table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Hình ảnh</th>
        <th scope="col">Giá</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Thành tiền</th>
        <th scope="col">Thao tác</th>
      </tr>
    </thead>
    <tbody>
      @if (isset($orders))
          @foreach ($orders as $item)
          <tr>
            <th scope="row">{{ $item->id }}</th>
            <td><a href="" target="_blank">{{ $item->Product->name }}</a></td>
            <td><img src="/img/upload/product/{{ $item->Product->img }}" class="img-fluid" style="width:80px"></td>
            <td>{{ number_format($item->price,0,',','.') }}₫</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ number_format($item->price - $item->promotion,0,',','.') }}₫</td>
            <td>
              <button type="button" title="Xóa" class="btn btn-sm mb-2 btn-outline-danger">
                <i class="far fa-trash-alt"></i>
              </button>
            </td>
          </tr>
          @endforeach
      @endif
    </tbody>
</table>