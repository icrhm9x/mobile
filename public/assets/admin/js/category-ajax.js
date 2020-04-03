$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    // add category
    $(".btn-saveAddCatJS").click(function() {
        let errorAddCatJS = $(".errorAddCatJS");
        let nameAddCatJS = $(".nameAddCatJS");
        let statusAddCatJS = $(".statusAddCatJS");
        $.ajax({
            url: "/admin/category",
            data: {
                name: nameAddCatJS.val(),
                status: statusAddCatJS.val()
            },
            type: "POST",
            dataType: "json",
            success: function(data) {
                errorAddCatJS.addClass("d-none");
                toastr.success(data.message, "Thông báo", {
                    timeOut: 3000
                });
                let html = "<tr class='rowTable" + data.category.id + "'>";
                html += "<td>" + data.category.id + "</td>";
                html += "<td>" + data.category.name + "</td>";
                html += "<td>" + data.category.slug + "</td>";
                if (data.category.status == 1) {
                    html +=
                        "<td><span class='rounded-0 badge badge-info'>Hiển thị</span></td>";
                } else {
                    html +=
                        "<td><span class='rounded-0 badge badge-secondary'>Không hiển thị</span></td>";
                }
                html += "<td>";
                html +=
                    "<button type='button' title='Sửa' data-toggle='modal' data-target='#editCatModal' class='btn btn-sm btn-outline-primary editCatJS' data-id='" +
                    data.category.id +
                    "'><i class='far fa-edit'></i></button>";
                html +=
                    " <button type='button' title='Xóa' data-toggle='modal' data-target='#delCatModal' class='btn btn-sm ml-2 btn-outline-danger delCatJS' data-id='" +
                    data.category.id +
                    "' data-name='" +
                    data.category.name +
                    "'><i class='far fa-trash-alt'></i></button>";
                html += "</td>";
                html += "</tr>";
                $("#dataTableJS").append(html);
                nameAddCatJS.val("");
                statusAddCatJS.val("1");
            },
            error: function(errors) {
                let error = errors.responseJSON.errors.name;
                errorAddCatJS.removeClass("d-none");
                errorAddCatJS.text(error);
            }
        });
    });

    // edit category
    $(this).on("click", ".editCatJS", function() {
        let statusEditCatJS = $(".statusEditCatJS");
        let nameEditCatJS = $(".nameEditCatJS");
        let errorEditCatJS = $(".errorEditCatJS");
        let id = $(this).data("id");
        $(".idEditCatJS").text(id);
        $.ajax({
            url: "/admin/category/" + id + "/edit",
            dataType: "json",
            type: "get",
            success: function(data) {
                $(".titleEditCatJS").text(data.name);
                nameEditCatJS.val(data.name);
                if (data.status == 1) {
                    statusEditCatJS.val("1");
                } else {
                    statusEditCatJS.val("0");
                }
            }
        });
    });

    $(".btn-saveEditCatJS").click(function() {
        let id = $(".idEditCatJS").text();
        $.ajax({
            url: "/admin/category/" + id,
            data: {
                name: nameEditCatJS.val(),
                status: statusEditCatJS.val(),
                id: id // truyền id sang request để check trùng tên
            },
            type: "put",
            dataType: "json",
            success: function(data) {
                errorEditCatJS.addClass("d-none");
                toastr.success(data.message, "Thông báo", {
                    timeOut: 3000
                });
                let html = "<tr class='rowTable" + data.category.id + "'>";
                html += "<td>" + data.category.id + "</td>";
                html += "<td>" + data.category.name + "</td>";
                html += "<td>" + data.category.slug + "</td>";
                if (data.category.status == 1) {
                    html +=
                        "<td><span class='rounded-0 badge badge-info'>Hiển thị</span></td>";
                } else {
                    html +=
                        "<td><span class='rounded-0 badge badge-secondary'>Không hiển thị</span></td>";
                }
                html += "<td>";
                html +=
                    "<button type='button' title='Sửa' data-toggle='modal' data-target='#editCatModal' class='btn btn-sm btn-outline-primary editCatJS' data-id='" +
                    data.category.id +
                    "'><i class='far fa-edit'></i></button>";
                html +=
                    " <button type='button' title='Xóa' data-toggle='modal' data-target='#delCatModal' class='btn btn-sm ml-2 btn-outline-danger delCatJS' data-id='" +
                    data.category.id +
                    "' data-name='" +
                    data.category.name +
                    "'><i class='far fa-trash-alt'></i></button>";
                html += "</td>";
                html += "</tr>";

                $('.rowTable' + data.category.id).replaceWith(html);
                $("#editCatModal").modal("hide");
            },
            error: function(errors) {
                let error = errors.responseJSON.errors.name;
                errorEditCatJS.removeClass("d-none");
                errorEditCatJS.text(error);
            }
        });
    });
    // delete category
    $(this).on("click", ".delCatJS", function() {
        $(".titleDelCatJS").text($(this).data("name"));
        $(".idDelCatJS").text($(this).data("id"));
    });
    $(".btn-acceptDelCatJS").click(function() {
        let id = $(".idDelCatJS").text();
        $.ajax({
            url: "/admin/category/" + id,
            dataType: "json",
            type: "delete",
            success: function($result) {
                toastr.success($result.message, "Thông báo", {
                    timeOut: 3000
                });
                $(".rowTable" + id).remove();
                $("#delCatModal").modal("hide");
            }
        });
    });
});
