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
    $(".addCatJS").click(function() {
        var addCatModal = $("#addCatModal");
        reloadModal(addCatModal);

        $(".errorAddCatJS").hide();
        $(".btn-saveAddCatJS").click(function() {
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
                        timeOut: 1500
                    });
                    addCatModal.modal("hide");
                },
                error: function(errors) {
                    var error = errors.responseJSON.errors.name;
                    $(".errorAddCatJS").show();
                    $(".errorAddCatJS").text(error);
                }
            });
        });
    });

    // edit category
    $(".editCatJS").click(function() {
        var editCatModal = $("#editCatModal");
        reloadModal(editCatModal);

        $(".errorEditCatJS").hide();
        var id = $(this).data("id");
        $.ajax({
            url: "/admin/category/" + id + "/edit",
            dataType: "json",
            type: "get",
            success: function($result) {
                $(".titleEditCatJS").text($result.name);
                $(".nameEditCatJS").val($result.name);
                if ($result.status == 1) {
                    $(".activeEditCatJS").attr("selected", "selected");
                } else {
                    $(".hiddenEditCatJS").attr("selected", "selected");
                }
            }
        });

        $(".btn-saveEditCatJS").click(function() {
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
                        timeOut: 1500
                    });
                    editCatModal.modal("hide");
                },
                error: function(errors) {
                    var error = errors.responseJSON.errors.name;
                    $(".errorEditCatJS").show();
                    $(".errorEditCatJS").text(error);

                    // console.log(errors);
                }
            });
        });
    });
    // delete category
    $(".delCatJS").click(function() {
        var delCatModal = $("#delCatModal");
        reloadModal(delCatModal);

        var id = $(this).data("id");
        $.ajax({
            url: "/admin/category/" + id,
            dataType: "json",
            type: "get",
            success: function($result) {
                $(".titleDelCatJS").text($result.name);
            }
        });
        $(".btn-acceptDelCatJS").click(function() {
            $.ajax({
                url: "/admin/category/" + id,
                dataType: "json",
                type: "delete",
                success: function($result) {
                    toastr.success($result.message, "Thông báo", {
                        timeOut: 500
                    });
                    delCatModal.modal("hide");
                }
            });
        });
    });
});
