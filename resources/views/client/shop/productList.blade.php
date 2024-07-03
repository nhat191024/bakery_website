@extends('client.layout.layout')
@section('content')
    <hr>
    <section class="ftco-section" style="padding-top: 25px" !important>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 text-center">
                    <ul class="product-category">
                        <li><a href="{{ route('client.shop.productList') }}"
                                class="{{ request()->route('categoryId') ? '' : 'active' }}">Tất cả</a></li>
                        @foreach ($categories as $ct)
                            <li>
                                <a href="{{ route('client.shop.productList', $ct->id) }}"
                                    class="{{ request()->route('categoryId') == $ct->id ? 'active' : '' }}">
                                    {{ $ct->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $pd)
                    <div class="col-md-6 col-lg-4 ftco-animate">
                        <div class="product">
                            <a href="{{ route('client.shop.productList', $pd->id) }}" class="img-prod"><img
                                    class="img-fluid" src="{{ asset('img/client/shop/' . $pd->image) }}"
                                    alt="{{ $pd->image }}">
                                <div class="overlay d-flex justify-content-center align-items-center">
                                    @if ($pd->product_variations->isNotEmpty())
                                    <div class="m bg-primary rounded-pill justify-content-center align-items-center mr-2 shadow-lg">
                                        <i class="ion-ios-menu text-white p-5" style="font-size: 3rem;"></i>
                                    </div>
                                    @endif
                                    <div class=" bg-primary rounded-pill justify-content-center align-items-center shadow-lg">
                                        <i class="ion-ios-cart text-white p-5" style="font-size: 3rem;"></i>
                                    </div>
                                </div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a class="prod-title" href="#">{{ $pd->name }}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price">
                                            @if ($pd->product_variations->isNotEmpty())
                                                <span
                                                    class="price-sale font-weight-bold">{{ number_format($pd->product_variations->first()->price, 0, ',', '.') }} đ ~
                                                </span>
                                                <span
                                                    class="price-sale font-weight-bold">{{ number_format($pd->product_variations->last()->price, 0, ',', '.') }} đ
                                                </span>
                                            @else
                                                <span
                                                    class="mr-2 price-dc">{{ number_format($pd->fake_price, 0, ',', '.') }} đ
                                                </span>
                                                <span
                                                    class="price-sale font-weight-bold">{{ number_format($pd->real_price, 0, ',', '.') }} đ
                                                </span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $products->links('client.components.pagination') }}
        </div>
    </section>
    <section>
        @include('client.components.contactUsRedirect')
    </section>
    <script src="{{ URL::asset('js/aos.js.map') }}"></script>
@endsection


