$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    $('.addCardJS').on('click', function (event) {
        event.preventDefault();
        let url = $(this).attr('href');
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            success: function (data) {
                if (data.status === 1) {
                    $('.cart-quantity').text(data.quantity);
                    toastr.success(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                } else if (data.status === 2) {
                    toastr.warning(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                } else if (data.status === 3) {
                    toastr.warning(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                }
            }
        });
    });
    $('.addWishListJS').on('click', function (event) {
        event.preventDefault();
        let url = $(this).attr('href');
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            success: function (data) {
                if (data.status === 1) {
                    toastr.warning(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                } else if (data.code === 2) {
                    toastr.warning(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                } else if (data.status === 3) {
                    toastr.warning(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                } else if (data.status === 4) {
                    toastr.success(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                }
            }
        })
    })
});
