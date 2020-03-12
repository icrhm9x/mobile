$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
$(document).ready(function() {
    // edit category
    $(".editJS").click(function() {
        $(".errorJS").hide();
        let id = $(this).data("id");
        $.ajax({
            url: "category/" + id + "/edit",
            dataType: "json",
            type: "get",
            success: function($result) {
                $(".nameJS").val($result.name);
                $(".titleJS").text($result.name);
                if ($result.status == 1) {
                    $(".activeJS").attr("selected", "selected");
                } else {
                    $(".hiddenJS").attr("selected", "selected");
                }
            }
        });
        $(".updateJS").click(function() {
            let name = $(".nameJS").val();
            let status = $(".statusJS").val();
            $.ajax({
                url: "category/" + id,
                data: {
                    name: name,
                    status: status
                },
                type: "put",
                dataType: "json",
                success: function($result) {
                    if ($result.error == "true") {
                        $(".errorJS").show();
                        $(".errorJS").text($result.message.name[0]);
                    } else {
                        toastr.success($result.success, "Thông báo", {
                            timeOut: 1500
                        });
                        $("#editModal").modal("hide");
                        setTimeout(function() {
                            window.location.reload(1);
                        }, 1500);
                    }
                }
            });
        });
    });
    // delete category
    $(".delJS").click(function() {
        let id = $(this).data("id");
        $(".acceptDelJS").click(function() {
            $.ajax({
                url: "category/" + id,
                dataType: "json",
                type: "delete",
                success: function($result) {
                    toastr.success($result.success, "Thông báo", {
                        timeOut: 1500
                    });
                    $("#delModal").modal("hide");
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 1500);
                }
            });
        });
    });
});
