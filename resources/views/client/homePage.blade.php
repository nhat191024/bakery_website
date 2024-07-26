@extends('client.layout.layout')
@section('content')
    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            @foreach ($banners as $banner)
                <div class="slider-item"
                    style="background-image:
                url({{ asset('img/home/' . $banner->image) }});">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                            <div class="col-banner ftco-animate text-center">
                                <h1 class="mb-2 text-nowrap font-res">
                                    @if ($lang == 'en')
                                        {{ $banner->title_en }}@else{{ $banner->title }}
                                    @endif
                                </h1>
                                <h1 class="mb-2 text-nowrap font-sub">
                                    @if ($lang == 'en')
                                        {{ $banner->subtitle_en }}@else{{ $banner->subtitle }}
                                    @endif
                                </h1>
                                <div>
                                    <a href="{{ route('client.shop.productList') }}" class="btn btn-primary mr-1">
                                        {{ __('home.bannerBtn1') }}
                                    </a>
                                    <a href="{{ route('client.about.index') }}" class="btn btn-primary ml-1">
                                        {{ __('home.bannerBtn2') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-shipped"></span>
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
                            <span class="flaticon-diet"></span>
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
                            <span class="flaticon-award"></span>
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
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">{{ __('home.service.subtitle4') }}</h3>
                            <span>{{ __('home.service.subtitle4') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-category ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 order-md-last align-items-stretch d-flex">
                            <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex"
                                style="background-image: url({{ asset('img/client/shop/product-5.webp') }});">
                                <div class="overlaya"></div>
                                <div class="text text-center">
                                    <h2 class="text-cate">{{ __('home.banner.title') }}</h2>
                                    <p class="p-cate">{{ __('home.banner.subtitle') }}</p>
                                    <p><a href="{{ route('client.shop.productList') }}"
                                            class="btn btn-primary">{{ __('home.banner.callout') }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @php
                                $index = 0;
                            @endphp
                            @foreach ($categoriesL as $leftItem)
                                <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                                    style="background-image: url({{ asset('img/client/shop/' . $imagesCategoryL[$leftItem->id]) }});">
                                    <div class="text px-3 py-1">
                                        <h2 class="mb-0">
                                            <a href="{{ route('client.shop.productList') }}/{{ $leftItem->id }}">
                                                @if ($lang == 'en')
                                                    {{ $leftItem->name_en }}@else{{ $leftItem->name }}
                                                @endif
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    @foreach ($categoriesR as $rightItem)
                        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                            style="background-image: url({{ asset('img/client/shop/' . $imagesCategoryR[$rightItem->id]) }});">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0">
                                    <a href="{{ route('client.shop.productList') }}/{{ $rightItem->id }}">
                                        @if ($lang == 'en')
                                            {{ $rightItem->name_en }}@else{{ $rightItem->name }}
                                        @endif
                                    </a>
                                </h2>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">{{ __('home.subheading.title') }}</span>
                    <h2 class="text-ab-h2">{{ __('home.subheading.subtitle') }}</h2>
                    <p>{{ __('home.subheading.content') }}</p>
                </div>
            </div>
        </div>
        <div class="container">
            @include('client.components.productList')
        </div>
    </section>

    @foreach ($promotions as $promotion)
        <section class="ftco-section img"
            style="background-image: url({{ asset('img/client/shop/' . $promotion->Products->image) }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-end">
                    <a id="link"
                        href="{{ route('client.shop.productDetail', ['productId' => $promotion->product_id]) }}">
                        <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                            <span class="subheading">{{ __('home.promotion.title') }}</span>
                            <h2 class="text-sale">{{ __('home.promotion.subtitle') }}</h2>
                            <h3 class="text-sale">{{ $promotion->Products->name }}</h3>
                            <span class="price">{{ number_format($promotion->fake_price, 0, ',', '.') }} Đ</span>
                            <span style="margin-left: 10px;"><a
                                    href="{{ route('client.shop.productDetail', ['productId' => $promotion->product_id]) }}"
                                    class="sale"> {{ __('home.promotion.sale') }}
                                    {{ number_format($price, 0, ',', '.') }} Đ</a></span>
                            <div id="timer" class="d-flex mt-5">
                                <div class="time" id="days"></div>
                                <div class="time pl-3" id="hours"></div>
                                <div class="time pl-3" id="minutes"></div>
                                <div class="time pl-3" id="seconds"></div>
                            </div>
                            <div>
                                <div class="end" id="end"></div>
                            </div>

                        </div>

                </div>
                </a>
            </div>
        </section>
    @endforeach
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">{{ __('home.review.title') }}</span>
                    <h2 class="mb-4">{{ __('home.review.subtitle') }}</h2>
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
                                        {{-- <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="icon-quote-left"></i>
                                        </span> --}}
                                    </div>
                                    <div class="text text-center">
                                        <p class="mb-5 pl-4 line">{{ __('home.review.content' . $i) }}</p>
                                        <p class="name">{{ __('home.review.name' . $i) }}</p>
                                        <span class="position">{{ __('home.review.type') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    {{-- <section class="ftco-section ftco-partner">
        <div class="container">
            <div class="row">
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="{{ asset('img/partner-1.png') }}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="{{ asset('img/partner-2.png') }}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="{{ asset('img/partner-3.png') }}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="{{ asset('img/partner-4.png') }}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="{{ asset('img/partner-5.png') }}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
            </div>
        </div>
    </section> --}}

    @include('client.components.contactUsRedirect')
    <script>
        var endDate = '{{ $promotions[0]->end_time }}';
    </script>
@endsection
