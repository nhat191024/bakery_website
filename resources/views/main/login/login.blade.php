<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/logo.svg') }} " />
    <title>ODOUCEURS - Đăng nhập</title>
    <link href="{{ url('') . '/' }}vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ url('') . '/' }}css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{ url('') . '/' }}css/styles.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
</head>

<body class="bg-gradient-login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 col-10">
                <div class="cards o-hidden border-0 shadow-lg mys-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h1 texts mb-4">Đăng nhập để tiếp tục</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('main.login.auth') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="forms-control form-control-user" id="username"
                                                aria-describedby="emailHelp" name="username"
                                                placeholder="Username, email hoặc SĐT...">
                                            @if ($errors->has('username'))
                                                <p class="text-danger small mt-1 text-center ">
                                                    <i>{{ $errors->first('username') }}</i>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="forms-control form-control-user"
                                                id="password" name="password" placeholder="Mật khẩu">
                                            @if ($errors->has('password'))
                                                <p class="text-danger small mt-1 text-center ">
                                                    <i>{{ $errors->first('password') }}</i>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            @if (session('message'))
                                                <div class="alert alert-danger">
                                                    <i class="fa fa-exclamation-circle text-danger mr-2"></i>
                                                    {{ session('message') }}
                                                </div>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-login btn-log btn-block ">
                                            <h5>Đăng nhập</h5>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('') . '/' }}vendor/jquery/jquery.min.js"></script>
    <script src="{{ url('') . '/' }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('') . '/' }}vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{ url('') . '/' }}js/sb-admin-2.min.js"></script>
</body>

</html>
