<!DOCTYPE html>
<html lang="en">

<head>
    <title>Odouceurs-Cửa hàng bánh</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

</head>

<body class="goto-here">
    <div class="py-1 bg-primary">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-phone2"></span></div>
                            <span class="text">+84 24 6291 8575</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-paper-plane"></span></div>
                            <span class="text">odouceurs@gmail.com</span>
                        </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                            <span class="text">Giao hàng nhanh chóng &amp; Miễn phí nội thành</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">Odouceurs</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="{{ route('client.homepage.index') }}" class="nav-link">Trang chủ</a></li>
                    <li class="nav-item"><a href="{{ route('client.shop.productList') }}" class="nav-link">Cửa hàng</a></li>
                    <li class="nav-item"><a href="{{ route('client.about.index') }}" class="nav-link">Giới thiệu</a></li>
                    <li class="nav-item"><a href="{{ route('client.blog.index') }}" class="nav-link">Tin tức</a></li>
                    <li class="nav-item"><a href="{{ route('client.contact.index') }}" class="nav-link">Liên hệ</a></li>
                    <li class="nav-item cta cta-colored">
                        <a href="{{ route('client.cart.index') }}" class="nav-link d-flex">
                            <span class="icon-shopping_cart inline mt-1">
                            </span>
                            [<p class="inline" id="cartAmount">
                                ?
                            </p>]
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <!-- Page content goes here -->
    @yield('content')
    <!-- FOOTER -->
    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row">
                <div class="mouse">
                    <a href="#" class="mouse-icon">
                        <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                    </a>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <a class="navbar-brand" href="index.html">Odouceurs</a>
                        <h2 class="ftco-heading-2">Odouceurs</h2>
                        <p>Từ năm 2014, chúng tôi đã trở thành một trong những tiệm bánh Pháp ngon nhất tại Hà Nội. Hiện
                            tại, chúng tôi có 2 cơ sở tại Hà Nội, một ở Phố Cổ và một ở khu vực Hồ Tây.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="https://www.threads.net/@odouceurs_bakery"><span><img src="{{URL::asset('img/threads.svg')}}" width="90%"/></span></a></li>
                            <li class="ftco-animate"><a href="https://www.facebook.com/odouceurs"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="https://www.instagram.com/odouceurs_bakery/"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Menu</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Cửa hàng</a></li>
                            <li><a href="#" class="py-2 d-block">Giới thiệu</a></li>
                            <li><a href="#" class="py-2 d-block">Tin tức</a></li>
                            <li><a href="#" class="py-2 d-block">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Hỗ trợ</h2>
                        <div class="d-flex">
                            <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                                <li><a href="#" class="py-2 d-block">Thông tin đơn hàng</a></li>
                                <li><a href="#" class="py-2 d-block">Những câu hỏi thường gặp</a></li>
                                <li><a href="#" class="py-2 d-block">Điều khoản và dịch vụ</a></li>
                                <li><a href="#" class="py-2 d-block">Chính sách bảo mật</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Hãy đến với chúng tôi</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">72 Đ. Xuân Diệu, Tứ
                                        Liên, Tây Hồ, Hà Nội
                                    </span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span
                                            class="text">Phone:
                                            024 6291 8575</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">odouceurs@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | ODUCEURS</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js ') }}"></script>
    <script src="{{ URL::asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('js/aos.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ URL::asset('js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>
    <script src="{{ URL::asset('js/updateCartCount.js') }}"></script>
</body>

</html>
