<!DOCTYPE html>
<html lang="en">

<head>
    <title>Odouceurs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/logo.png') }} " />
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">


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
    <link rel="stylesheet" href="{{ URL::asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">

</head>


<body class="goto-here">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand " href="{{ route('client.homepage.index') }}">
                <img class="scaleL" src="{{ asset('img/LogoTest.png') }}" alt="">
            </a>
            <button class="scaleR navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> {{ __('layout.menu') }}
            </button>

            <div class="collapse navbar-collapse " id="ftco-nav">
                <ul class="navbar-nav ml-auto ">
                    <li class=" scaleR nav-item">
                        <a class="nav-link" href="{!! route('change-language') !!}">
                            en/vi
                        </a>
                    </li>
                    <li
                        class=" scaleR nav-item {{ Request::url() == route('client.homepage.index') || Request::url() == null ? 'active' : '' }}">
                        <a href="{{ route('client.homepage.index') }}" class="nav-link">
                            {{ __('layout.home') }}
                        </a>
                    </li>
                    <li
                        class="scaleR nav-item {{ Request::url() == route('client.shop.productList') ? 'active' : '' }}">
                        <a href="{{ route('client.shop.productList') }}" class="nav-link">
                            {{ __('layout.shop') }}
                        </a>
                    </li>
                    <li class="scaleR nav-item {{ Request::url() == route('client.about.index') ? 'active' : '' }}"><a
                            href="{{ route('client.about.index') }}" class="nav-link">
                            {{ __('layout.about') }}
                        </a>
                    </li>
                    <li class="scaleR nav-item {{ Request::url() == route('client.blog.index') ? 'active' : '' }}"><a
                            href="{{ route('client.blog.index') }}" class="nav-link">
                            {{ __('layout.blog') }}
                        </a>
                    </li>
                    <li class="scaleR nav-item {{ Request::url() == route('client.contact.index') ? 'active' : '' }}">
                        <a href="{{ route('client.contact.index') }}" class="nav-link">
                            {{ __('layout.contact') }}
                        </a>
                    </li>
                    <li
                        class="scaleR nav-item cta cta-colored {{ Request::url() == route('client.cart.index') ? 'active' : '' }}">
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
                        <h2 class="ftco-heading-2"><img src="{{ asset('img/LogoFull.png') }}" width="300px"
                                alt="">
                        </h2>

                        <p>{{ __('layout.footer_about') }}</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="https://www.threads.net/@odouceurs_bakery"><span><img
                                            src="{{ URL::asset('img/threads.svg') }}" width="90%" /></span></a>
                            </li>
                            <li class="ftco-animate"><a href="https://www.facebook.com/odouceurs"><span
                                        class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="https://www.instagram.com/odouceurs_bakery/"><span
                                        class="icon-instagram"></span></a></li>
                            <li class="ftco-animate">
                                <a
                                    href="https://www.tripadvisor.com.vn/Restaurant_Review-g293924-d7789388-Reviews-O_Douceurs_French_Pastry_Bakery-Hanoi.html">
                                    <span><img src="{{ URL::asset('img/tripadvisor.svg') }}"
                                            width="90%" /></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Menu</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('client.shop.productList') }}"
                                    class="py-2 d-block">{{ __('layout.shop') }}</a>
                            </li>
                            <li><a href="{{ route('client.contact.index') }}"
                                    class="py-2 d-block">{{ __('layout.about') }}</a>
                            </li>
                            <li><a href="" class="py-2 d-block">{{ __('layout.blog') }}</a></li>
                            <li><a href="{{ route('client.contact.index') }}"
                                    class="py-2 d-block">{{ __('layout.contact') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">{{ __('layout.footer1') }}</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li>
                                    <span class="icon icon-map-marker"></span>
                                    <div class="d-flex flex-column">
                                        <span class="text">{{ __('layout.address1') }}</span>
                                        <p class="text">{{ __('layout.phone1') }}</p>

                                    </div>
                                </li>
                                <li>
                                    <span class="icon icon-map-marker"></span>
                                    <div class="d-flex flex-column">
                                        <span class="text">{{ __('layout.address2') }}</span>
                                        <p class="text">{{ __('layout.phone2') }}</p>

                                    </div>
                                </li>
                                <li><span class="icon icon-phone"></span>
                                    <div class="d-flex flex-column">
                                        <p class="text">{{ __('layout.hotline') }}</p>
                                    </div>
                                </li>
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
                        </script> {{ __('layout.copyright') }}</a>
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
                stroke-miterlimit="10" stroke="#e26968" />
        </svg></div>

    <script>
        var currentLang = "{{ App::getLocale() }}";
    </script>
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

    <script src="{{ URL::asset('js/main.js') }}"></script>
    <script src="{{ URL::asset('js/updateCartCount.js') }}"></script>

</body>

</html>
