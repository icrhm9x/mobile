@extends('admin.layouts.master',['title' => 'Sản phẩm'])
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
  </ol>
</nav>
<a class="btn btn-info mb-3" href="{{ route('product.create') }}">
  <i class="fas fa-plus"></i> Thêm mới
</a>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Danh sách sản phẩm</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Giá - Giảm giá</th>
            <th>Danh mục</th>
            <th>Loại sản phẩm</th>
            <th>Ảnh</th>
            <th>Trạng thái</th>
            <th>Nổi bật</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($product as $key => $value)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>
                {{ $value->name }}
                <ul class="product-list">
                  <li>
                    <span>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </span>
                  </li>
                  <li>
                    <span>Số lượng: {{ $value->quantity }}</span>
                  </li>
                </ul>
              </td>
              <td>
                <p>{{ number_format($value->price,0,',','.') }}₫</p>
                <p>-{{ number_format($value->promotion,0,',','.') }}₫</p>
              </td>
              <td>{{ $value->Category->name }}</td>
              <td>{{ $value->ProductType->name }}</td>
              <td><img src="/img/upload/product/{{ $value->img }}" class="img-fluid" style="width:100px"></td>
              <td>
                @if ($value->status == 1)
                    {!! '<span class="rounded-0 badge badge-success">Còn hàng</span>' !!}
                @elseif ($value->status == 2)
                    {!! '<span class="rounded-0 badge badge-info">Sắp ra mắt</span>' !!}
                @else
                    {!! '<span class="rounded-0 badge badge-warning">Hết hàng</span>' !!}
                @endif
              </td>
              <td>
                <span class="rounded-0 badge badge-{{ $value->hot == 1 ? 'danger' : 'secondary' }}">{{ $value->hot == 1 ? 'Hot' : 'Không' }}</span>
              </td>
              <td>
                <a href="{{ route('product.edit', $value->id) }}" type="button" title="{{ "Sửa" }}" class="btn btn-sm btn-outline-primary">
                  <i class="far fa-edit"></i>
                </a>
                <button type="button" title="{{ "Xóa" }}" data-toggle="modal" data-target="#delPrdModal" class="btn btn-sm ml-2 btn-outline-danger delPrdJS" data-id="{{ $value->id }}">
                  <i class="far fa-trash-alt"></i>
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    {{ $product->links() }}
  </ul>
</nav>
<!-- delete Modal-->
@include('admin.products.delModal')

@endsection
@push('adminAjax')
    <script src="/assets/admin/js/product-ajax.js"></script>
@endpush