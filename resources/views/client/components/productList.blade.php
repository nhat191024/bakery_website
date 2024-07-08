<div class="row">
    @foreach ($products as $pd)
        <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="product">
                <a class="img-prod"><img class="img-fluid" src="{{ asset('img/client/shop/' . $pd->image) }}"
                        alt="{{ $pd->image }}">
                    <div class="overlay d-flex justify-content-center align-items-center">
                        @if (count($pd->product_variations) > 1)
                            <div class="d-flex w-100 h-100 justify-content-center align-items-center shadow-lg pointer text-primary"
                                @if (Route::has('client.shop.productDetail')) onclick="window.location.href='{{ route('client.shop.productDetail', $pd->id) }}'" @endif
                                style="font-size: 1.2rem;">
                                <i class="ion-ios-menu text-primary mr-1"></i> See details
                            </div>
                        @else
                            <div data="{{ $pd->id }}"
                                class="addToCart w-100 h-100 d-flex justify-content-center align-items-center shadow-lg pointer text-primary"
                                onclick="addToCart({{ $pd->id }})" style="font-size: 1.2rem;">
                                <i class="ion-ios-cart text-primary mr-1"></i>
                                <p id="addingToCart{{ $pd->id }}" class="addingToCart m-0">Add to cart</p>
                            </div>
                        @endif
                    </div>
                </a>
                <div class="text py-3 pb-4 px-3 text-center pointer"
                    @if (Route::has('client.shop.productDetail')) onclick="window.location.href='{{ route('client.shop.productDetail', $pd->id) }}'" @endif>
                    <h3><a class="prod-title">{{ $pd->name }}</a></h3>
                    <div class="d-flex">
                        <div class="pricing">
                            <p class="price">
                                @if (count($pd->product_variations) > 1)
                                    <span
                                        class="price-sale font-weight-bold">{{ number_format($pd->product_variations->min('price'), 0, ',', '.') }}đ ~
                                    </span>
                                    <span
                                        class="price-sale font-weight-bold">{{ number_format($pd->product_variations->max('price'), 0, ',', '.') }}đ
                                    </span>
                                @else
                                    <span
                                        class="price-sale font-weight-bold">{{ number_format($pd->product_variations->min('price'), 0, ',', '.') }}đ
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
<script src="{{ asset('js/jquery.min.js') }}"></script>
@include('client.components.productListScript')
