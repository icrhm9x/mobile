<div class="modal fade" id="editCatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa danh mục <span class="titleEditCatJS text-info"></span></h5>
                <input class="idEditCatJS" type="hidden">
            </div>
            <div class="modal-body px-4">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form">
                            <fieldset class="form-group">
                                <label class="font-weight-bold">Tên danh mục</label>
                                <input class="form-control nameEditCatJS" name="name" placeholder="Nhập tên danh mục">
                                <span class="text-danger font-italic errorEditCatJS d-none"></span>
                            </fieldset>
                            <div class="form-group">
                                <label class="font-weight-bold">Status</label>
                                <select class="form-control statusEditCatJS" name="status">
                                    <option value="1">Hiển Thị</option>
                                    <option value="0">Không Hiển Thị</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-updateCatJS">Lưu</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
