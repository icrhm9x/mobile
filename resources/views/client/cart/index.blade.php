@extends('client.layouts.master',['title' => 'Cart'])
@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="index.html">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Giỏ hàng</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- Shopping Table Container -->
    <div class="cart-area-start cart_wrapper">
        @include('client.cart.components.cart_component')
    </div>
    <!-- Shopping Table Container -->
@endsection
@push('clientAjax')
    <script>
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
            $(this).on('click', '.cartDelJs', cartDel);
        })
    </script>
@endpush
