$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
$(document).ready(function() {
    // add category
    $(".addCatJS").on("click", function() {
        $(".errorAddCatJS").hide();

        let btnSaveAddCatJS = $(".btn-saveAddCatJS");
        btnSaveAddCatJS.off("click");
        btnSaveAddCatJS.on("click", function() {
            $.ajax({
                url: "/admin/category",
                data: {
                    name: $(".nameAddCatJS").val(),
                    status: $(".statusAddCatJS").val()
                },
                type: "POST",
                dataType: "json",
                success: function($result) {
                    toastr.success($result.message, "Thông báo", {
                        timeOut: 1000
                    });
                    $("#addCatModal").modal("hide");
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 1000);
                },
                error: function(errors) {
                    let error = errors.responseJSON.errors.name;
                    $(".errorAddCatJS").show();
                    $(".errorAddCatJS").text(error);
                }
            });
        });
    });

    // edit category
    $(".editCatJS").click(function() {
        $(".errorEditCatJS").hide();
        let id = $(this).data("id");
        let activeEditCatJS = $(".activeEditCatJS");
        let hiddenEditCatJS = $(".hiddenEditCatJS");
        $.ajax({
            url: "/admin/category/" + id + "/edit",
            dataType: "json",
            type: "get",
            success: function($result) {
                $(".titleEditCatJS").text($result.name);
                $(".nameEditCatJS").val($result.name);
                if ($result.status == 1) {
                    hiddenEditCatJS.removeAttr("selected");
                    activeEditCatJS.attr("selected", "selected");
                } else {
                    activeEditCatJS.removeAttr("selected");
                    hiddenEditCatJS.attr("selected", "selected");
                }
            }
        });

        let btnSaveEditCatJS = $(".btn-saveEditCatJS");
        btnSaveEditCatJS.off("click");
        btnSaveEditCatJS.on("click", function() {
            $.ajax({
                url: "/admin/category/" + id,
                data: {
                    name: $(".nameEditCatJS").val(),
                    status: $(".statusEditCatJS").val(),
                    id: id // truyền id sang request để check trùng tên
                },
                type: "put",
                dataType: "json",
                success: function($result) {
                    toastr.success($result.message, "Thông báo", {
                        timeOut: 1000
                    });
                    $("#editCatModal").modal("hide");
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 1000);
                },
                error: function(errors) {
                    let error = errors.responseJSON.errors.name;
                    $(".errorEditCatJS").show();
                    $(".errorEditCatJS").text(error);

                    // console.log(errors);
                }
            });
        });
    });
    // delete category
    $(".delCatJS").click(function() {
        let id = $(this).data("id");
        $.ajax({
            url: "/admin/category/" + id,
            dataType: "json",
            type: "get",
            success: function($result) {
                $(".titleDelCatJS").text($result.name);
            }
        });
        let btnAcceptDelCatJS = $(".btn-acceptDelCatJS");
        btnAcceptDelCatJS.off("click");
        btnAcceptDelCatJS.on("click", function() {
            $.ajax({
                url: "/admin/category/" + id,
                dataType: "json",
                type: "delete",
                success: function($result) {
                    toastr.success($result.message, "Thông báo", {
                        timeOut: 1000
                    });
                    $("#delCatModal").modal("hide");
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 1000);
                }
            });
        });
    });
});
