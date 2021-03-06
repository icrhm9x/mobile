<div class="modal fade" id="addCatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm mới danh mục</h5>
            </div>
            <div class="modal-body px-4">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form">
                            <fieldset class="form-group">
                                <label class="font-weight-bold">Tên danh mục</label>
                                <input class="form-control nameAddCatJS" name="name" placeholder="Nhập tên danh mục">
                                <span class="text-danger font-italic errorAddCatJS d-none"></span>
                            </fieldset>
                            <div class="form-group">
                                <label class="font-weight-bold">Status</label>
                                <select class="form-control statusAddCatJS" name="status">
                                    <option value="1">Hiển Thị</option>
                                    <option value="0">Không Hiển Thị</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-saveAddCatJS" data-url="{{ route('category.store') }}">Lưu</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
</div>
