$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    // lấy prdtype theo category
    function getPrdType(idCat, idPrdType) {
        idCat.change(function () {
            let idCat = $(this).val();
            $.ajax({
                url: "/admin/product/getprdtype",
                data: {
                    idCat: idCat
                },
                dataType: "json",
                type: "get",
                success: function ($data) {
                    let html = "";
                    $.each($data, function ($key, $value) {
                        html += "<option value=" + $value["id"] + ">";
                        html += $value["name"];
                        html += "</option>";
                    });
                    idPrdType.html(html);
                }
            });
        });
    }

    getPrdType($(".idCatCreateJS"), $(".idProTypeCreateJS"));
    getPrdType($(".idCatEditJS"), $(".idProTypeEditJS"));

    // del prd
    $(this).on("click", ".delPrdJS", function () {
        $(".titleDelPrdJS").text($(this).data("name"));
        $(".idDelPrdJS").text($(this).data("id"));
    });
    $(this).on("click", ".btn-acceptDelPrdJS", function () {
        let id = $(".idDelPrdJS").text();
        let url = "/admin/product/" + id;
        $.ajax({
            url: url,
            dataType: "json",
            type: "delete",
            success: function ($result) {
                toastr.success($result.message, "Thông báo", {
                    timeOut: 3000
                });
                $(".rowTable" + id).remove();
                $("#delPrdModal").modal("hide");
            }
        });
    });
});
