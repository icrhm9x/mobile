$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
$(document).ready(function() {
    // lấy prdtype theo category
    function getPrdType(idCat, idPrdType) {
        idCat.change(function() {
            let idCat = $(this).val();
            $.ajax({
                url: "/admin/getprdtype",
                data: {
                    idCat: idCat
                },
                dataType: "json",
                type: "get",
                success: function($data) {
                    let html = "";
                    $.each($data, function($key, $value) {
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
    $(".delPrdJS").click(function() {
        let id = $(this).data("id");
        $.ajax({
            url: "/admin/product/" + id,
            dataType: "json",
            type: "get",
            success: function($result) {
                $(".titleDelPrdJS").text($result);
            }
        });
        let btnAcceptDelPrdJS = $(".btn-acceptDelPrdJS");
        btnAcceptDelPrdJS.off("click");
        btnAcceptDelPrdJS.on("click", function() {
            $.ajax({
                url: "/admin/product/" + id,
                dataType: "json",
                type: "delete",
                success: function($result) {
                    toastr.success($result.message, "Thông báo", {
                        timeOut: 500
                    });
                    $("#delPrdModal").modal("hide");
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 500);
                }
            });
        });
    });

    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });

    // Preview an image before it is uploaded
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $("#output_img").attr("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#input_img").change(function() {
        readURL(this);
    });
});
