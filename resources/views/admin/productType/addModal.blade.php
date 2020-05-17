<div class="modal fade" id="addPrTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm mới loại sản phẩm</h5>
            </div>
            <div class="modal-body px-4">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form">
                            <fieldset class="form-group">
                                <label class="font-weight-bold">Tên loại sản phẩm</label>
                                <input class="form-control nameAddPrTypeJS" name="name" placeholder="Nhập tên loại sản phẩm">
                                <span class="text-danger font-italic errorAddPrTypeJS d-none"></span>
                            </fieldset>
                            <div class="form-group">
                                <label class="font-weight-bold">Danh mục</label>
                                <select class="form-control idCatAddPrTypeJS" name="idCategory">
                                    @foreach($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Trạng thái</label>
                                <select class="form-control statusAddPrTypeJS" name="status">
                                    <option value="1" selected="selected">Hiển Thị</option>
                                    <option value="0">Không Hiển Thị</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-addPrTypeJS" data-url="{{ route('productType.store') }}">Lưu</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
</div>
