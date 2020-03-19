<div class="modal fade" id="addPrTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm mới loại sản phẩm</h5>
            </div>
            <div class="modal-body">
                <div class="row" style="margin: 5px">
            <div class="col-lg-12">
                <form role="form">
                    <fieldset class="form-group">
                        <label class="font-weight-bold">Tên loại sản phẩm</label>
                        <input class="form-control nameAddPrTypeJS" name="name" placeholder="Nhập tên loại sản phẩm">
                        <span class="errorAddPrTypeJS" style="color: red"></span>
                    </fieldset>
                    <div class="form-group">
                        <label class="font-weight-bold">Danh mục</label>
                        <select class="form-control idCatAddPrTypeJS" name="idCategory">
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Status</label>
                        <select class="form-control statusAddPrTypeJS" name="status">
                            <option value="1">Hiển Thị</option>
                            <option value="0">Không Hiển Thị</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-saveAddPrTypeJS">Lưu</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
  </div>