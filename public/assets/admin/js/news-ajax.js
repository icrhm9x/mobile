$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    // del prd
    $(this).on("click", ".delNewsJS", function () {
        $(".titleDelJS").text($(this).data("name"));
        $(".idDelJS").text($(this).data("id"));
    });
    $(".btn-acceptDelJS").click(function () {
        let id = $(".idDelJS").text();
        $.ajax({
            url: "/admin/news/" + id,
            dataType: "json",
            type: "delete",
            success: function ($result) {
                toastr.success($result.message, "Thông báo", {
                    timeOut: 3000
                });
                $(".rowTable" + id).remove();
                $("#delModal").modal("hide");
            }
        });
    });
});
