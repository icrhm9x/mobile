$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    })

    $(this).on("click", ".showOrderDetailJS", function() {
        let id = $(this).data("id");
        $(".idOrderDetail").text(id);
        $.ajax({
            url: "/admin/orderDetail/" + id,
            dataType: "json",
            type: "get",
            success: function(data) {
                $("#mdContent").html('').append(data);
            }
        });
    });

    // delete order
    $(this).on("click", ".delOrderDetailJS", function() {
        $(".titleOrderDetailJS").text($(this).data("name"));
        $(".idOrderDetailJS").text($(this).data("id"));
    });
    $(".btn-acceptOrderDetailJS").click(function() {
        let id = $(".idOrderDetailJS").text();
        $.ajax({
            url: "/admin/order/" + id,
            dataType: "json",
            type: "delete",
            success: function(data) {
                toastr.success(data.message, "Thông báo", {
                    timeOut: 3000
                });
                $(".rowTable" + id).remove();
                $("#delOrderDetailModal").modal("hide");
            }
        });
    });
})