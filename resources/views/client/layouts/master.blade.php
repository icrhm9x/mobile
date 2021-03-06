<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? '' }} | Lavoro</title>

    <!-- Favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/client/img/favicon.ico') }}">

    <!-- Fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet'
          type='text/css'>

    <link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
    <!-- CSS  -->
    {!! Assets::renderHeader() !!}

    @stack('clientStyle')
</head>
<body class="home-one">

<!-- header area start -->
@include('client.layouts.header')
<!-- header area end -->

@yield('content')

<!-- FOOTER START -->
@include('client.layouts.footer')
<!-- FOOTER END -->

<!-- JS -->
{!! Assets::renderFooter() !!}

@stack('clientAjax')
<script src="{{ asset('assets/admin/js/toastr.min.js') }}"></script>

@if (session('success'))
    <script type="text/javascript">
        toastr.success('{{ session('success') }}', "Thông báo", {timeOut: 2000});
    </script>
@endif
@if (session('error'))
    <script type="text/javascript">
        toastr.error('{{ session('error') }}', "Thông báo", {timeOut: 2000});
    </script>
@endif
@if (session('warning'))
    <script type="text/javascript">
        toastr.warning('{{ session('warning') }}', "Thông báo", {timeOut: 2000});
    </script>
@endif

</body>
</html>
