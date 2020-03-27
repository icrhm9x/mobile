$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
$(document).ready(function() {
    // add category
    $(".addPrTypeJS").click(function() {
        let errorAddPrType = $(".errorAddPrTypeJS");
        errorAddPrType.hide();
        $.ajax({
            url: "/admin/productType/create",
            dataType: "json",
            type: "get",
            success: function($result) {
                let html = "";
                $.each($result.category, function($key, $value) {
                    html += "<option value=" + $value["id"] + ">";
                    html += $value["name"];
                    html += "</option>";
                });
                $(".idCatAddPrTypeJS").html(html);
            }
        });
        let btnSaveAddPrTypeJS = $(".btn-saveAddPrTypeJS");
        btnSaveAddPrTypeJS.off("click");
        btnSaveAddPrTypeJS.on("click", function() {
            $.ajax({
                url: "/admin/productType",
                data: {
                    idCategory: $(".idCatAddPrTypeJS").val(),
                    name: $(".nameAddPrTypeJS").val(),
                    status: $(".statusAddPrTypeJS").val()
                },
                type: "POST",
                dataType: "json",
                success: function($result) {
                    toastr.success($result.message, "Thông báo", {
                        timeOut: 1000
                    });
                    $("#addPrTypeModal").modal("hide");
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 1000);
                },
                error: function(errors) {
                    let error = errors.responseJSON.errors.name;
                    errorAddPrType.show();
                    errorAddPrType.text(error);
                }
            });
        });
    });

    // edit category
    $(".editPrTypeJS").click(function() {
        let id = $(this).data("id");
        let name = $(".nameEditPrTypeJS");
        let idCat = $(".idCatEditPrTypeJS");
        let errorEditPrType = $(".errorEditPrTypeJS");
        let activeEditPrTypeJS = $(".activeEditPrTypeJS");
        let hiddenEditPrTypeJS = $(".hiddenEditPrTypeJS");
        errorEditPrType.hide();
        $.ajax({
            url: "/admin/productType/" + id + "/edit",
            dataType: "json",
            type: "get",
            success: function($result) {
                $(".titleEditPrTypeJS").text($result.productType.name);
                name.val($result.productType.name);
                let html = "";
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
                    hiddenEditPrTypeJS.removeAttr("selected");
                    activeEditPrTypeJS.attr("selected", "selected");
                } else {
                    activeEditPrTypeJS.removeAttr("selected");
                    hiddenEditPrTypeJS.attr("selected", "selected");
                }
            }
        });
        // update
        let btnSaveEditPrTypeJS = $(".btn-saveEditPrTypeJS");
        btnSaveEditPrTypeJS.off("click");
        btnSaveEditPrTypeJS.on("click", function() {
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
                        timeOut: 1000
                    });
                    $("#addPrTypeModal").modal("hide");
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 1000);
                },
                error: function(errors) {
                    let error = errors.responseJSON.errors.name;
                    errorEditPrType.show();
                    errorEditPrType.text(error);
                }
            });
        });
    });
    // delete
    $(".delPrTypeJS").click(function() {
        let id = $(this).data("id");
        $.ajax({
            url: "/admin/productType/" + id,
            dataType: "json",
            type: "get",
            success: function($result) {
                $(".titleDelPrTypeJS").text($result.name);
            }
        });
        let btnAcceptDelPrTypeJS = $(".btn-acceptDelPrTypeJS");
        btnAcceptDelPrTypeJS.off("click");
        btnAcceptDelPrTypeJS.on("click", function() {
            $.ajax({
                url: "/admin/productType/" + id,
                dataType: "json",
                type: "delete",
                success: function($result) {
                    toastr.success($result.message, "Thông báo", {
                        timeOut: 1000
                    });
                    $("#delPrTypeModal").modal("hide");
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 1000);
                }
            });
        });
    });
});
