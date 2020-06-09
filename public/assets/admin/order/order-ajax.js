$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    })
    // order detail
    $(this).on("click", ".showOrderDetailJS", function () {
        let id = $(this).data("id");
        let url = $(this).data('url');
        $(".idOrderDetail").text(id);
        $.ajax({
            url: url,
            dataType: "json",
            type: "get",
            success: function (data) {
                $("#mdContent").html('').append(data);
            }
        });
    });
    //update
    $(this).on("click", ".handleOrderJS", function () {
        $(".idOrderJS").text($(this).data("id"));
    });
    $(".btn-acceptOrderJS").click(function () {
        let id = $(".idOrderJS").text();
        $.ajax({
            url: "/admin/order/" + id,
            dataType: "json",
            type: "put",
            success: function (data) {
                toastr.success(data.message, "Thông báo", {
                    timeOut: 3000
                });
                let htmlHandle = '<button type="button" class="btn btn-success btn-sm">Đã thanh toán</button>';
                let row = $(".rowTable" + id);
                row.find('#handleJS').empty().append(htmlHandle);
                let htmlAction = '<button type="button" title="Xóa đơn hàng" data-toggle="modal" data-target="#delOrderModal" class="btn btn-sm ml-2 btn-outline-danger delOrderJS" data-id="' + id + '"><i class="far fa-trash-alt"></i></button>';
                row.find('.cancelOrderDetailJS').remove();
                row.find('#actionJS').append(htmlAction);
                $("#handleOrder").modal("hide");
            }
        });
    });

    // cancel order
    $(this).on("click", ".cancelOrderDetailJS", function () {
        $(".idOrderDetailJS").text($(this).data("id"));
    });
    $(".btn-acceptOrderDetailJS").click(function () {
        let id = $(".idOrderDetailJS").text();
        $.ajax({
            url: "/admin/order/cancel/" + id,
            dataType: "json",
            type: "put",
            success: function (data) {
                toastr.success(data.message, "Thông báo", {
                    timeOut: 3000
                });
                let htmlCancel = '<button type="button" class="btn btn-warning btn-sm">Đã hủy</button>';
                let row = $(".rowTable" + id);
                row.find('#handleJS').empty().append(htmlCancel);
                let htmlAction = '<button type="button" title="Xóa đơn hàng" data-toggle="modal" data-target="#delOrderModal" class="btn btn-sm ml-2 btn-outline-danger delOrderJS" data-id="' + id + '"><i class="far fa-trash-alt"></i></button>';
                row.find('.cancelOrderDetailJS').remove();
                row.find('#actionJS').append(htmlAction);
                $("#cancelOrderDetailModal").modal("hide");
            }
        });
    });

    // delete category
    $(this).on("click", ".delOrderJS", function () {
        $(".idDelOrderJS").text($(this).data("id"));
    });
    function delOrder(event) {
        event.preventDefault();
        let id = $(".idDelOrderJS").text();
        let url = "/admin/order/" + id;
        $.ajax({
            url: url,
            dataType: "json",
            type: "delete",
            success: function (data) {
                $(".rowTable" + id).remove();
                toastr.success(data.message, "Thông báo", {
                    timeOut: 3000
                });
                $("#delOrderModal").modal("hide");
            }
        });
    };
    $(this).on('click', '.btn-acceptDelOrderJS', delOrder);
})
