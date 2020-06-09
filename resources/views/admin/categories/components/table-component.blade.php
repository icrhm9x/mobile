<div class="table-responsive">
    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>slug</th>
            <th>Trạng thái</th>
            <th>Tùy chọn</th>
        </tr>
        </thead>
        <tbody id="dataTableJS">
        @forelse ($categories as $key => $value)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->slug }}</td>
                <td>
                    <span
                        class="rounded-0 badge badge-{{ $value->status == 1 ? 'info' : 'secondary' }}">{{ $value->status == 1 ? 'Hiển thị' : 'Không hiển thị' }}</span>
                </td>
                <td>
                    @can('category_edit')
                        <button type="button" title="Sửa" data-toggle="modal" data-target="#editCatModal"
                                class="btn btn-sm btn-outline-primary editCatJS" data-id="{{ $value->id }}"
                                data-url="{{ route('category.edit',['category' => $value->id]) }}">
                            <i class="far fa-edit"></i>
                        </button>
                    @endcan
                    @can('category_delete')
                        <button type="button" title="Xóa" data-toggle="modal" data-target="#delCatModal"
                                class="btn btn-sm ml-2 btn-outline-danger delCatJS" data-id="{{ $value->id }}"
                                data-name="{{$value->name}}">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    @endcan
                </td>
            </tr>
        @empty
            <tr><td colspan="5" style="text-align: center;">Chưa có Danh mục nào</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
