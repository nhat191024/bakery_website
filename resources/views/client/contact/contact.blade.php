@extends('client.layout.layout')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url({{ URL::asset('img/home/bg-4.webp') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a
                                href="{{ route('client.homepage.index') }}">{{ __('contact.breadcrumb1') }}</a></span>/<span>{{ __('contact.breadcrumb2') }}</span>
                    </p>
                    <h1 class="mb-0 bread">{{ __('contact.breadcrumb') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block text-center">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block text-center">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="row d-flex mb-5 contact-info justify-content-around ">
                <div class="col-md-4 d-flex">
                    <div class="info bg-white p-3">
                        <p>{{ __('contact.address') }}:</p>
                        <p>1. {{ __('contact.address1') }}</p>
                        <p>2. {{ __('contact.address2') }}</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="info bg-white p-3">
                        <p>{{ __('contact.phone') }}:</p>
                        <p>{{ __('contact.hotline') }}</p>
                        <p>{{ __('contact.phone1') }}</p>
                        <p>{{ __('contact.phone2') }}</p>

                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="info bg-white p-4 d-flex flex-column justify-content-center align-items-center">
                        <p>{{ __('contact.social') }}</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate">
                                <a href="https://www.threads.net/@odouceurs_bakery"><span><img
                                            src="{{ URL::asset('img/threads.svg') }}" width="90%" /></span></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="https://www.facebook.com/odouceurs"><span class="icon-facebook"></span></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="https://www.instagram.com/odouceurs_bakery/"><span
                                        class="icon-instagram"></span></a>
                            </li>
                            <li class="ftco-animate ">
                                <a
                                    href="https://www.tripadvisor.com.vn/Restaurant_Review-g293924-d7789388-Reviews-O_Douceurs_French_Pastry_Bakery-Hanoi.html">
                                    <span><img src="{{ URL::asset('img/tripadvisor.svg') }}" width="90%" /></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <form action="{{ route('client.contact.store') }}" method="POST" class="bg-white p-5 contact-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name"
                                placeholder="{{ __('contact.message.name') }}" autocomplete="name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email"
                                placeholder="{{ __('contact.message.email') }}" autocomplete="email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone"
                                placeholder="{{ __('contact.message.phone') }}" autocomplete="tel">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject"
                                placeholder="{{ __('contact.message.subject') }}">
                        </div>
                        <div class="form-group">
                            <textarea id="" cols="30" rows="7" name="message" class="form-control"
                                placeholder="{{ __('contact.message.message') }}"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary py-3 px-5 "
                                style="background-color: #fff; border: #f8c53f;">{{ __('contact.message.send') }}</button>

                        </div>
                    </form>

                </div>

                {{-- <div class="col-md-6 d-flex">
                    <div id="map" class="bg-white ">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d232.7036311975898!2d105.83036606164897!3d21.06235132406192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab28f9e8f5d7%3A0x844f13fb3943b485!2sO&#39;douceurs%20French%20Pastry%20Bakery!5e0!3m2!1svi!2s!4v1720366555184!5m2!1svi!2s"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div> --}}
                <div class="col-md-6 d-flex">
                    <div id="map" class="carousel slide w-100" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="bg-white" id="map1">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d232.7036311975898!2d105.83036606164897!3d21.06235132406192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab28f9e8f5d7%3A0x844f13fb3943b485!2sO&#39;douceurs%20French%20Pastry%20Bakery!5e0!3m2!1svi!2s!4v1720366555184!5m2!1svi!2s"
                                        width="600" height="610" style="border: 0" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="bg-white" id="map2">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d232.77415775795333!2d105.84724958618047!3d21.017214780744045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab61974f57b5%3A0x7c2bcd24766beed3!2sO&#39;Douceurs%20Pastry%20Cafe!5e0!3m2!1svi!2s!4v1721642239273!5m2!1svi!2s"
                                        width="600" height="610" style="border: 0" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#map" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#map" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var index = 1;
        $(document).ready(function() {
            $("#map").carousel({
                interval: false,
            });
        });
    </script>
@endsection
