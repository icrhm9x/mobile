@extends('admin.layouts.master',['title' => 'Sản phẩm'])
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-9">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <form action="">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" placeholder="Tên sản phẩm ..." name="name"
                               value="{{ \Request::get('name') }}">
                    </div>
                    <div class="form-group col-md-auto">
                        <select class="form-control" name="cate">
                            <option value="">Danh mục</option>
                            @if (isset($categories))
                                @foreach ($categories as $category)
                                    <option
                                        value="{{ $category->id }}" {{ \Request::get('cate') == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-auto">
                        <select class="form-control" name="prdType">
                            <option value="">Loại sản phẩm</option>
                            @if (isset($productTypes))
                                @foreach ($productTypes as $prdType)
                                    <option
                                        value="{{ $prdType->id }}" {{ \Request::get('prdType') == $prdType->id ? "selected" : "" }}>{{ $prdType->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        @can('product_add')
            <div class="col-md-3">
                <a class="btn btn-info mb-3 float-right" href="{{ route('product.create') }}">
                    <i class="fas fa-plus"></i> Tạo mới
                </a>
            </div>
        @endcan
    </div>
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
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $key => $value)
                        <?php
                        $average = 0;
                        if ($value->star_number) {
                            $average = round($value->star_total / $value->star_number, 2);
                        }
                        ?>
                        <tr class="rowTable{{$value->id}}">
                            <td>{{ \Request::get('page') ? ((\Request::get('page') - 1)*5+$key+1) : ($key + 1) }}</td>
                            <td>
                                {{ $value->name }}
                                <ul class="product-list">
                                    <li>
                                        <span>Đánh giá: </span>
                                        <span>
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $average)
                                                    <i class="fa fa-star"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor
                                        </span>
                                        <span> {{ $average }}</span>
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
                            <td><img src="{{ asset($value->img_path) }}" class="img-fluid" style="width:100px"></td>
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
                                <span
                                    class="rounded-0 badge badge-{{ $value->hot == 1 ? 'danger' : 'secondary' }}">{{ $value->hot == 1 ? 'Hot' : 'Không' }}</span>
                            </td>
                            <td>
                                @can('product_edit')
                                    <a href="{{ route('product.edit', $value->id) }}" type="button" title="{{ "Sửa" }}"
                                       class="btn btn-sm mr-2 mb-2 btn-outline-primary">
                                        <i class="far fa-edit"></i>
                                    </a>
                                @endcan
                                @can('product_delete')
                                    <button type="button" title="Xóa" data-toggle="modal" data-target="#delPrdModal"
                                            class="btn btn-sm mb-2 btn-outline-danger delPrdJS"
                                            data-id="{{ $value->id }}"
                                            data-name="{{ $value->name }}">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                @endcan
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
            {{ $products->appends(['name'=>request()->name,'cate'=>request()->cate,'prdType'=>request()->prdType])->links() }}
        </ul>
    </nav>
    @can('product_delete')
    <!-- delete Modal-->
    @include('admin.products.delModal')
    @endcan

@endsection
@push('adminAjax')
    <script src="/assets/admin/js/product-ajax.js"></script>
@endpush
