@extends('client.layout.layout')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url({{ URL::asset('img/home/bg-1.webp') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a
                                href="{{ route('client.homepage.index') }}">{{ __('about.breadcrumb1') }}</a></span>/<span>{{ __('about.breadcrumb2') }}</span>
                    </p>
                    <h1 class="mb-0 bread">{{ __('about.breadcrumb') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center"
                    style="background-image: url('{{ URL::asset('img/about/'. $About_us->image) }}');">
                    <a href="#"
                        class="icon popup-vimeo d-flex justify-content-center align-items-center">
                        <span class="icon-play"></span>
                    </a>
                </div>
                <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                    <div class="heading-section-bold mb-4 mt-md-5">
                        <div class="ml-md-0">
                            <h2 class="mb-4">
                                @if ($lang == 'en')
                                    {{ $About_us->title_en }}@else{{ $About_us->title }}
                                @endif
                            </h2>
                        </div>
                    </div>
                    <div class="pb-md-5">
                        <p>
                            @if ($lang == 'en')
                                {{ $About_us->description_en }}@else{{ $About_us->description }}
                            @endif
                        </p>
                        <p><a href="{{ route('client.shop.productList') }}"
                                class="btn btn-primary">{{ __('about.callOut') }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('client.components.contactUsRedirect')
    <section class="ftco-section ftco-counter img" id="section-counter"
        style="background-image: url({{ asset('img/home/bg-3.webp') }});">
        <div class="container">
            <div class="row justify-content-center py-5">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="26000">0</strong>
                                    <span>{{ __('about.satisfy') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="2">0</strong>
                                    <span>{{ __('about.branch') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="100">0</strong>
                                    <span>{{ __('about.partner') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="10">0</strong>
                                    <span>{{ __('about.prize') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">{{ __('about.review.title') }}</span>
                    <h2 class="mb-4">{{ __('about.review.subtitle') }}</h2>
                    <p>
                    </p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        @for ($i = 1; $i <= 9; $i++)
                            <div class="item">
                                <div class="testimony-wrap p-4 pb-5">
                                    <div class="user-img mb-5"
                                        style="background-image: url({{ asset('img/home/person-' . $i . '.webp') }})">
                                        <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="icon-quote-left"></i>
                                        </span>
                                    </div>
                                    <div class="text text-center">
                                        <p class="mb-5 pl-4 line">{{ __('about.review.content' . $i) }}</p>
                                        <p class="name">{{ __('about.review.name' . $i) }}</p>
                                        <span class="position">{{ __('about.review.type') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-cakes"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">{{ __('home.service.title1') }}</h3>
                            <span>{{ __('home.service.subtitle1') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-cake"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">{{ __('home.service.title2') }}</h3>
                            <span>{{ __('home.service.subtitle2') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-food-fruits"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">{{ __('home.service.title3') }}</h3>
                            <span>{{ __('home.service.subtitle3') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-chill"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">{{ __('home.service.title4') }}</h3>
                            <span>{{ __('home.service.subtitle4') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
