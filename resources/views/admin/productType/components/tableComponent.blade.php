<div class="table-responsive">
    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>STT</th>
            <th>Loại sản phẩm</th>
            <th>slug</th>
            <th>Danh mục</th>
            <th>Trạng thái</th>
            <th>Tùy chọn</th>
        </tr>
        </thead>
        <tbody id="dataTableJS">
        @foreach ($productType as $key => $value)
            <tr class="rowTable{{$value->id}}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->slug }}</td>
                <td>{{ $value->Category->name }}</td>
                <td>
                    <span
                        class="rounded-0 badge badge-{{ $value->status == 1 ? 'info' : 'secondary' }}">{{ $value->status == 1 ? 'Hiển thị' : 'Không hiển thị' }}</span>
                </td>
                <td>
                    @can('productType_edit')
                        <button type="button" title="Sửa" data-toggle="modal" data-target="#editPrTypeModal"
                                class="btn btn-sm btn-outline-primary editPrTypeJS" data-id="{{ $value->id }}"
                                data-url="{{ route('productType.edit', ['productType' => $value->id]) }}">
                            <i class="far fa-edit"></i>
                        </button>
                    @endcan
                    @can('productType_delete')
                        <button type="button" title="Xóa" data-toggle="modal" data-target="#delPrTypeModal"
                                class="btn btn-sm ml-2 btn-outline-danger delPrTypeJS" data-id="{{ $value->id }}"
                                data-name="{{$value->name}}">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
