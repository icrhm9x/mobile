$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    // add category
    function addProductType(event) {
        event.preventDefault();
        let url = $(this).data('url');
        let errorAddPrType = $(".errorAddPrTypeJS");
        let nameAddPrTypeJS = $(".nameAddPrTypeJS");
        let statusAddPrTypeJS = $(".statusAddPrTypeJS");
        let idCatAddPrTypeJS = $(".idCatAddPrTypeJS");
        $.ajax({
            url: url,
            data: {
                idCategory: idCatAddPrTypeJS.val(),
                name: nameAddPrTypeJS.val(),
                status: statusAddPrTypeJS.val()
            },
            type: "POST",
            dataType: "json",
            success: function(data) {
                if(data.code === 200) {
                    $('.card-body').html(data.tableComponent);
                    toastr.success(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                    nameAddPrTypeJS.val("");
                    statusAddPrTypeJS.val("1");
                    $("#addPrTypeModal").modal("hide");
                }
            },
            error: function(errors) {
                let error = errors.responseJSON.errors.name;
                errorAddPrType.removeClass("d-none");
                errorAddPrType.text(error);
            }
        });
    }
    $(this).on('click', '.btn-addPrTypeJS', addProductType);

    // edit category
    function editPrType(event) {
        event.preventDefault();
        let url = $(this).data('url');
        let id = $(this).data("id");
        let name = $(".nameEditPrTypeJS");
        let statusEditPrTypeJS = $(".statusEditPrTypeJS")
        $(".idEditPrTypeJS").val(id);
        $.ajax({
            url: url,
            dataType: "json",
            type: "get",
            success: function(data) {
                $(".titleEditPrTypeJS").text(data.productType.name);
                name.val(data.productType.name);
                $(".idCatEditPrTypeJS").html(data.listCat);
                if (data.productType.status == 1) {
                    statusEditPrTypeJS.val("1");
                } else {
                    statusEditPrTypeJS.val("0");
                }
            }
        });
    };
    $(this).on("click", ".editPrTypeJS", editPrType);

    // update
    function updatePrType() {
        let errorEditPrType = $(".errorEditPrTypeJS");
        let id = $(".idEditPrTypeJS").val();
        let url = "/admin/productType/" + id;
        $.ajax({
            url: url,
            data: {
                idCategory: $(".idCatEditPrTypeJS").val(),
                id: id, // check trung ten
                name: $(".nameEditPrTypeJS").val(),
                status: $(".statusEditPrTypeJS").val()
            },
            type: "PUT",
            dataType: "json",
            success: function(data) {
                if(data.code === 200) {
                    $('.card-body').html(data.tableComponent);
                    toastr.success(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                    $("#editPrTypeModal").modal("hide");
                }
            },
            error: function(errors) {
                let error = errors.responseJSON.errors.name;
                errorEditPrType.removeClass("d-none");
                errorEditPrType.text(error);
            }
        });
    };
    $(this).on('click', '.btn-updatePrTypeJS', updatePrType)
    // delete
    $(this).on("click", ".delPrTypeJS", function() {
        $(".titleDelPrTypeJS").text($(this).data("name"));
        $(".idDelPrTypeJS").val($(this).data("id"));
    });
    function acceptDelPrType() {
        let id = $(".idDelPrTypeJS").val();
        let url = "/admin/productType/" + id;
        $.ajax({
            url: url,
            dataType: "json",
            type: "delete",
            success: function(data) {
                if(data.code === 200) {
                    $('.card-body').html(data.tableComponent);
                    toastr.success(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                    $("#delPrTypeModal").modal("hide");
                }
            }
        });
    };
    $(this).on('click', '.btn-acceptDelPrTypeJS', acceptDelPrType)
});
