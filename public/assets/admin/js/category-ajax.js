$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    // add category
    function addCategory(event) {
        event.preventDefault();
        let url = $(this).data('url');
        let errorAddCatJS = $(".errorAddCatJS");
        let nameAddCatJS = $(".nameAddCatJS");
        let statusAddCatJS = $(".statusAddCatJS");
        errorAddCatJS.addClass("d-none");
        $.ajax({
            url: url,
            data: {
                name: nameAddCatJS.val(),
                status: statusAddCatJS.val()
            },
            type: "POST",
            dataType: "json",
            success: function (data) {
                if (data.code === 200) {
                    $('.card-body').html(data.tableComponent);
                    toastr.success(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                    nameAddCatJS.val('');
                    statusAddCatJS.val(1);
                    $("#addCatModal").modal("hide");
                }
            },
            error: function (errors) {
                let error = errors.responseJSON.errors.name;
                errorAddCatJS.removeClass("d-none");
                errorAddCatJS.text(error);
            }
        });
    }
    $(this).on('click', '.btn-saveAddCatJS', addCategory);

    // edit category
    function editCategory(event) {
        event.preventDefault();
        let url = $(this).data('url');
        let id = $(this).data('id');
        $('.idEditCatJS').val(id);
        let statusEditCatJS = $(".statusEditCatJS");
        let errorEditCatJS = $(".errorEditCatJS");
        errorEditCatJS.addClass("d-none");
        $.ajax({
            url: url,
            dataType: "json",
            type: "get",
            success: function (data) {
                $(".titleEditCatJS").text(data.name);
                $(".nameEditCatJS").val(data.name);
                if (data.status == 1) {
                    statusEditCatJS.val("1");
                } else {
                    statusEditCatJS.val("0");
                }
            }
        });
    }
    $(this).on('click', '.editCatJS', editCategory);

    //update category
    function updateCategory(event) {
        event.preventDefault();
        let id =  $('.idEditCatJS').val();
        let url = '/admin/category/' + id;
        let errorEditCatJS = $(".errorEditCatJS");
        $.ajax({
            url: url,
            data: {
                name: $(".nameEditCatJS").val(),
                status: $(".statusEditCatJS").val(),
                id: id // truyền id sang request để check trùng tên
            },
            type: "put",
            dataType: "json",
            success: function (data) {
                if(data.code === 200) {
                    $('.card-body').html(data.tableComponent);
                    toastr.success(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                    $("#editCatModal").modal("hide");
                };
            },
            error: function (errors) {
                let error = errors.responseJSON.errors.name;
                errorEditCatJS.removeClass("d-none");
                errorEditCatJS.text(error);
            }
        });
    }
    $(this).on('click', '.btn-updateCatJS', updateCategory);

    // delete category
    $(this).on("click", ".delCatJS", function () {
        $(".titleDelCatJS").text($(this).data("name"));
        $(".idDelCatJS").val($(this).data("id"));
    });
    function delCategory(event) {
        event.preventDefault();
        let id = $(".idDelCatJS").val();
        let url = "/admin/category/" + id;
        $.ajax({
            url: url,
            dataType: "json",
            type: "delete",
            success: function (data) {
                if(data.code === 200) {
                    $('.card-body').html(data.tableComponent);
                    toastr.success(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                    $("#delCatModal").modal("hide");
                };
            }
        });
    };
    $(this).on('click', '.btn-acceptDelCatJS', delCategory);
});
