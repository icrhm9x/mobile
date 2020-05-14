<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="/assets/admin/css/toastr.css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>Login-Admin</title>
<!------ Include the above in your HEAD tag ---------->
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #17a2b8;
        height: 100vh;
    }

    #login .container #login-row #login-column #login-box {
        margin-top: 120px;
        max-width: 600px;
        height: 320px;
        border: 1px solid #9C9C9C;
        background-color: #EAEAEA;
    }

    #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
    }

    #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
    }
</style>
<body>
<div id="login">
    <h3 class="text-center text-white pt-5">Admin - Lavoro</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="{{ route('post.admin.login') }}" method="post">
                        @csrf
                        <h3 class="text-center text-info">Đăng nhập</h3>
                        <div class="form-group">
                            <label for="email" class="text-info">Email:</label><br>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Mật khẩu:</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="xác nhận">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="/assets/admin/js/toastr.min.js"></script>

@if (session('success'))
    <script type="text/javascript">
        toastr.success('{{ session('success') }}', "Thông báo", {timeOut: 3000});
    </script>
@endif
@if (session('error'))
    <script type="text/javascript">
        toastr.error('{{ session('error') }}', "Thông báo", {timeOut: 3000});
    </script>
@endif
