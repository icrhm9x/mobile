$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    })
    // order detail
    $(this).on("click", ".showOrderDetailJS", function() {
        let id = $(this).data("id");
        let url = $(this).data('url');
        $(".idOrderDetail").text(id);
        $.ajax({
            url: url,
            dataType: "json",
            type: "get",
            success: function(data) {
                $("#mdContent").html('').append(data);
            }
        });
    });
    //update
    $(this).on("click", ".handleOrderJS", function() {
        $(".idOrderJS").text($(this).data("id"));
    });
    $(".btn-acceptOrderJS").click(function() {
        let id = $(".idOrderJS").text();
        $.ajax({
            url: "/admin/order/" + id,
            dataType: "json",
            type: "put",
            success: function(data) {
                toastr.success(data.message, "Thông báo", {
                    timeOut: 3000
                });
                html = '<button type="button" class="btn btn-success btn-sm">Đã xử lý</button>';
                $(".rowTable" + id).find('#handleJS').empty().append(html);
                $("#handleOrder").modal("hide");
            }
        });
    });

    // delete order
    $(this).on("click", ".delOrderDetailJS", function() {
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
