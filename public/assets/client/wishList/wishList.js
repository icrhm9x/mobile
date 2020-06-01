$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    // delete wish list
    function wishListDel(event) {
        event.preventDefault();
        let url = $(this).attr('href');
        $.ajax({
            type: "delete",
            dataType: "JSON",
            url: url,
            success: function (data) {
                if (data.code === 200) {
                    $('.wishList_wrapper').html(data.wishListComponent);
                    toastr.success(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                }
            }
        });
    }

    $(this).on('click', '.wishListDelJs', wishListDel);
})
