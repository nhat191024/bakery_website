<div class="row">
    @foreach ($products as $pd)
        <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="product">
                <a class="img-prod"><img
                        class="img-fluid" src="{{ asset('img/client/shop/' . $pd->image) }}"
                        alt="{{ $pd->image }}">
                    <div class="overlay d-flex justify-content-center align-items-center">
                        @if ($pd->product_variations->isNotEmpty())
                        <div class="d-flex justify-content-center align-items-center shadow-lg pointer text-primary"
                            @if (Route::has('client.shop.productDetail'))
                                onclick="window.location.href='{{ route('client.shop.productDetail', $pd->id) }}'"
                            @endif
                             style="font-size: 1.2rem;">
                             <i class="ion-ios-menu text-primary mr-1" ></i> Chi tiết
                            </div>
                        @else
                            <div class="d-flex justify-content-center align-items-center shadow-lg pointer text-primary"
                             onclick="window.location.href='#'"
                             style="font-size: 1.2rem;">
                             <i class="ion-ios-cart text-primary mr-1" ></i> Thêm vào giỏ
                            </div>
                        @endif
                    </div>
                </a>
                <div class="text py-3 pb-4 px-3 text-center pointer" @if (Route::has('client.shop.productDetail'))  onclick="window.location.href='{{ route('client.shop.productDetail', $pd->id) }}'"@endif>
                    <h3><a class="prod-title">{{ $pd->name }}</a></h3>
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
