$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    // add category
    $(".addPrTypeJS").click(function() {
        $.ajax({
            url: "/admin/productType/create",
            dataType: "json",
            type: "get",
            success: function(data) {
                if(data.check === 1) {
                    let html = "";
                    $.each(data.category, function($key, $value) {
                        html += "<option value=" + $value["id"] + ">";
                        html += $value["name"];
                        html += "</option>";
                    });
                    $(".idCatAddPrTypeJS").html(html);
                }else{
                    alert('Bạn phải tạo Danh mục trước');
                    window.location.href = '/admin/category';
                }

            }
        });
    });
    $(".btn-saveAddPrTypeJS").click(function() {
        let errorAddPrType = $(".errorAddPrTypeJS");
        let nameAddPrTypeJS = $(".nameAddPrTypeJS");
        let statusAddPrTypeJS = $(".statusAddPrTypeJS");
        let idCatAddPrTypeJS = $(".idCatAddPrTypeJS");
        $.ajax({
            url: "/admin/productType",
            data: {
                idCategory: idCatAddPrTypeJS.val(),
                name: nameAddPrTypeJS.val(),
                status: statusAddPrTypeJS.val()
            },
            type: "POST",
            dataType: "json",
            success: function(data) {
                errorAddPrType.addClass("d-none");
                toastr.success(data.message, "Thông báo", {
                    timeOut: 3000
                });
                let html = "<tr class='rowTable" + data.productType.id + "'>";
                html += "<td>" + data.productType.id + "</td>";
                html += "<td>" + data.productType.name + "</td>";
                html += "<td>" + data.productType.slug + "</td>";
                html += "<td>" + data.category.name + "</td>";
                if (data.productType.status == 1) {
                    html +=
                        "<td><span class='rounded-0 badge badge-info'>Hiển thị</span></td>";
                } else {
                    html +=
                        "<td><span class='rounded-0 badge badge-secondary'>Không hiển thị</span></td>";
                }
                html += "<td>";
                html +=
                    "<button type='button' title='Sửa' data-toggle='modal' data-target='#editPrTypeModal' class='btn btn-sm btn-outline-primary editPrTypeJS' data-id='" +
                    data.productType.id +
                    "'><i class='far fa-edit'></i></button>";
                html +=
                    " <button type='button' title='Xóa' data-toggle='modal' data-target='#delPrTypeModal' class='btn btn-sm ml-2 btn-outline-danger delPrTypeJS' data-id='" +
                    data.productType.id +
                    "' data-name='" +
                    data.productType.name +
                    "'><i class='far fa-trash-alt'></i></button>";
                html += "</td>";
                html += "</tr>";
                $("#dataTableJS").prepend(html);
                nameAddPrTypeJS.val("");
                idCatAddPrTypeJS.val("1");
                statusAddPrTypeJS.val("1");
            },
            error: function(errors) {
                let error = errors.responseJSON.errors.name;
                errorAddPrType.removeClass("d-none");
                errorAddPrType.text(error);
            }
        });
    });

    // edit category
    $(this).on("click", ".editPrTypeJS", function() {
        let id = $(this).data("id");
        let name = $(".nameEditPrTypeJS");
        let statusEditPrTypeJS = $(".statusEditPrTypeJS")
        $(".idEditPrTypeJS").text(id);
        $.ajax({
            url: "/admin/productType/" + id + "/edit",
            dataType: "json",
            type: "get",
            success: function(data) {
                $(".titleEditPrTypeJS").text(data.productType.name);
                name.val(data.productType.name);
                let html = "";
                $.each(data.category, function($key, $value) {
                    if ($value["id"] == data.productType.idCategory) {
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
                $(".idCatEditPrTypeJS").html(html);
                if (data.productType.status == 1) {
                    statusEditPrTypeJS.val("1");
                } else {
                    statusEditPrTypeJS.val("0");
                }
            }
        });
    });
    // update
    $(".btn-saveEditPrTypeJS").click(function() {
        let errorEditPrType = $(".errorEditPrTypeJS");
        let id = $(".idEditPrTypeJS").text();
        $.ajax({
            url: "/admin/productType/" + id,
            data: {
                idCategory: $(".idCatEditPrTypeJS").val(),
                id: id,
                name: $(".nameEditPrTypeJS").val(),
                status: $(".statusEditPrTypeJS").val()
            },
            type: "PUT",
            dataType: "json",
            success: function(data) {
                errorEditPrType.addClass("d-none");
                toastr.success(data.message, "Thông báo", {
                    timeOut: 3000
                });
                let html = "<tr class='rowTable" + data.productType.id + "'>";
                html += "<td>" + data.productType.id + "</td>";
                html += "<td>" + data.productType.name + "</td>";
                html += "<td>" + data.productType.slug + "</td>";
                html += "<td>" + data.category.name + "</td>";
                if (data.productType.status == 1) {
                    html +=
                        "<td><span class='rounded-0 badge badge-info'>Hiển thị</span></td>";
                } else {
                    html +=
                        "<td><span class='rounded-0 badge badge-secondary'>Không hiển thị</span></td>";
                }
                html += "<td>";
                html +=
                    "<button type='button' title='Sửa' data-toggle='modal' data-target='#editPrTypeModal' class='btn btn-sm btn-outline-primary editPrTypeJS' data-id='" +
                    data.productType.id +
                    "'><i class='far fa-edit'></i></button>";
                html +=
                    " <button type='button' title='Xóa' data-toggle='modal' data-target='#delPrTypeModal' class='btn btn-sm ml-2 btn-outline-danger delPrTypeJS' data-id='" +
                    data.productType.id +
                    "' data-name='" +
                    data.productType.name +
                    "'><i class='far fa-trash-alt'></i></button>";
                html += "</td>";
                html += "</tr>";

                $('.rowTable' + data.productType.id).replaceWith(html);
                $("#editPrTypeModal").modal("hide");
            },
            error: function(errors) {
                let error = errors.responseJSON.errors.name;
                errorEditPrType.removeClass("d-none");
                errorEditPrType.text(error);
            }
        });
    });
    // delete
    $(this).on("click", ".delPrTypeJS", function() {
        $(".titleDelPrTypeJS").text($(this).data("name"));
        $(".idDelPrTypeJS").text($(this).data("id"));
    });
    $(".btn-acceptDelPrTypeJS").click(function() {
        let id = $(".idDelPrTypeJS").text();
        $.ajax({
            url: "/admin/productType/" + id,
            dataType: "json",
            type: "delete",
            success: function(data) {
                toastr.success(data.message, "Thông báo", {
                    timeOut: 3000
                });
                $(".rowTable" + id).remove();
                $("#delPrTypeModal").modal("hide");
            }
        });
    });
});
