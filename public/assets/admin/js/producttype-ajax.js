$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
$(document).ready(function() {
    // function reload when modal hidden
    function reloadModal(nameModal) {
        nameModal.on("hidden.bs.modal", function() {
            setTimeout(function() {
                window.location.reload(1);
            }, 500);
        });
    }

    // add category
    $(".addPrTypeJS").click(function() {
        var addPrTypeModal = $("#addPrTypeModal");
        reloadModal(addPrTypeModal);

        var errorAddPrType = $(".errorAddPrTypeJS");
        errorAddPrType.hide();
        $.ajax({
            url: "/admin/productType/create",
            dataType: "json",
            type: "get",
            success: function($result) {
                var html = "";
                $.each($result.category, function($key, $value) {
                    html += "<option value=" + $value["id"] + ">";
                    html += $value["name"];
                    html += "</option>";
                });
                $(".idCatAddPrTypeJS").html(html);
            }
        });
        $(".btn-saveAddPrTypeJS").click(function() {
            $.ajax({
                url: "/admin/productType",
                data: {
                    idCategory: $(".idCatAddPrTypeJS").val(),
                    name: $(".nameAddPrTypeJS").val(),
                    status: $(".statusAddCatJS").val()
                },
                type: "POST",
                dataType: "json",
                success: function($result) {
                    toastr.success($result.message, "Thông báo", {
                        timeOut: 1500
                    });
                    addPrTypeModal.modal("hide");
                },
                error: function(errors) {
                    var error = errors.responseJSON.errors.name;
                    errorAddPrType.show();
                    errorAddPrType.text(error);
                }
            });
        });
    });

    // edit category
    $(".editPrTypeJS").click(function() {
        var editPrTypeModal = $("#editPrTypeModal");
        reloadModal(editPrTypeModal);

        var id = $(this).data("id");
        var name = $(".nameEditPrTypeJS");
        var idCat = $(".idCatEditPrTypeJS");
        var errorEditPrType = $(".errorEditPrTypeJS");
        errorEditPrType.hide();
        $.ajax({
            url: "/admin/productType/" + id + "/edit",
            dataType: "json",
            type: "get",
            success: function($result) {
                $(".titleEditPrTypeJS").text($result.productType.name);
                name.val($result.productType.name);
                var html = "";
                $.each($result.category, function($key, $value) {
                    if ($value["id"] == $result.productType.idCategory) {
                        html +=
                            "<option value=" +
                            $value["id"] +
                            " selected='selected'>";
                    } else {
                        html += "<option value=" + $value["id"] + ">";
                    }
                    html += $value["name"];
                    html += "</option>";
                });
                idCat.html(html);
                if ($result.productType.status == 1) {
                    $(".activeEditPrTypeJS").attr("selected", "selected");
                } else {
                    $(".hiddenEditPrTypeJS").attr("selected", "selected");
                }
            }
        });
        // update
        $(".btn-saveEditPrTypeJS").click(function() {
            $.ajax({
                url: "/admin/productType/" + id,
                data: {
                    idCategory: idCat.val(),
                    id: id,
                    name: name.val(),
                    status: $(".statusEditPrTypeJS").val()
                },
                type: "PUT",
                dataType: "json",
                success: function($result) {
                    toastr.success($result.message, "Thông báo", {
                        timeOut: 1500
                    });
                    editPrTypeModal.modal("hide");
                },
                error: function(errors) {
                    var error = errors.responseJSON.errors.name;
                    errorEditPrType.show();
                    errorEditPrType.text(error);
                }
            });
        });
    });
    // delete
    $(".delPrTypeJS").click(function() {
        var delPrTypeModal = $("#delPrTypeModal");
        reloadModal(delPrTypeModal);

        let id = $(this).data("id");
        $.ajax({
            url: "/admin/productType/" + id,
            dataType: "json",
            type: "get",
            success: function($result) {
                $(".titleDelPrTypeJS").text($result.name);
            }
        });
        $(".btn-acceptDelPrTypeJS").click(function() {
            $.ajax({
                url: "/admin/productType/" + id,
                dataType: "json",
                type: "delete",
                success: function($result) {
                    toastr.success($result.message, "Thông báo", {
                        timeOut: 500
                    });
                    delPrTypeModal.modal("hide");
                }
            });
        });
    });
});
