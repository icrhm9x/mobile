$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    // update cart
    function cartUpdate(event) {
        event.preventDefault();
        let url = $(this).attr('href');
        let id = $(this).data('id');
        let quantity = $(this).parents('tr').find('input.quantity').val();
        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: url,
            data: {
                id: id,
                quantity: quantity
            },
            success: function (data) {
                if (data.code === 200) {
                    $('.cart_wrapper').html(data.cartComponent);
                    $('.cart-quantity').text(data.quantity);
                    toastr.success(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                } else if (data.code === 400) {
                    toastr.warning(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                }
            }
        });
    }

    $(this).on('click', '.cartUpdateJs', cartUpdate);

    // delete cart
    function cartDel(event) {
        event.preventDefault();
        let url = $(this).attr('href');
        $.ajax({
            type: "delete",
            dataType: "JSON",
            url: url,
            success: function (data) {
                if (data.code === 200) {
                    $('.cart_wrapper').html(data.cartComponent);
                    $('.cart-quantity').text(data.quantity);
                    toastr.success(data.message, "Thông báo", {
                        timeOut: 3000
                    });
                }
            }
        });
    }

    $(this).on('click', '.cartDelJs', cartDel);
})
