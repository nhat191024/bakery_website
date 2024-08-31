@extends('client.layout.layout')
@section('content')
    <hr>

    <section class="ftco-section ftco-cart pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="mx-auto text-center mb-3" style="width: 200px;">
                        <button onclick="clearCart()" class="btn btn-primary w-100" >{{ __('cart.clear') }}</button>
                    </div>
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>{{ __('cart.name') }}</th>
                                    <th>{{ __('cart.price') }}</th>
                                    <th>{{ __('cart.quantity') }}</th>
                                    <th>{{ __('cart.total') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($cart) && count($cart) > 0 && !empty($cart))
                                    @foreach ($cart as $id => $pd)
                                        <tr class="text-center" id="product-{{ $id }}">
                                            <td class="product-remove" onclick="removeProduct({{ $pd['product']->id }}, {{ $pd['variation_id'] }})">
                                                <a><span class="ion-ios-close"></span></a>
                                            </td>

                                            <td class="image-prod">
                                                <div class="img pointer"
                                                onclick="window.location.href='{{ route('client.shop.productDetail', $pd['product']->id) }}'"
                                                    style="background-image:url('{{ asset('img/client/shop/' . $pd['product']->image) }}');">
                                                </div>
                                            </td>

                                            <td class="product-name">
                                                <h3 class="pointer" onclick="window.location.href='{{ route('client.shop.productDetail', $pd['product']->id) }}'">
                                                    {{ $pd['product']->categories?->name. ' - ' . $pd['product']->name }}
                                                        @if (count($pd['product']->product_variations) > 1)
                                                        @if ($pd['product']->product_variations->where('variation_id', $pd['variation_id'])->first()->variation)
                                                            ({{ $pd['product']->product_variations->where('variation_id', $pd['variation_id'])->first()->variation->name }})
                                                        @endif
                                                        @endif
                                                    </h3>
                                                </td>

                                                <td class="price">
                                                    {{ number_format($pd['product']->product_variations->where('variation_id', $pd['variation_id'])->first()?->price ?? 0, 0, ',', '.') }}đ
                                                </td>
                                            <td class="quantity">
                                                <div class="input-group mb-3">
                                                    <div class="input-group d-flex mt-3">
                                                        <span class="input-group-btn mr-2">
                                                            <button type="button" class="quantity-left-minus btn shadow-sm"
                                                                onclick="updateQuantity({{ $pd['product']->id }}, {{ $pd['variation_id'] }}, 1) ">
                                                                <i class="ion-ios-remove"></i>
                                                            </button>
                                                        </span>
                                                        <input readonly type="tel" id="quantity-{{ $id }}"
                                                            name="quantity" class="form-control input-number shadow-lg"
                                                            value="{{ $pd['quantity'] }}" min="1" max="100">
                                                        <span class="input-group-btn ml-2">
                                                            <button type="button" class="quantity-right-plus btn shadow-sm"
                                                                onclick="updateQuantity({{ $pd['product']->id }}, {{ $pd['variation_id'] }}, 2)">
                                                                <i class="ion-ios-add"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                                <td class="total" style="min-width: 176.984375px" id="total-{{ $id }}"
                                                    value="{{ $pd['product']->product_variations->where('variation_id', $pd['variation_id'])->first()?->price * $pd['quantity'] }}">
                                                    {{ number_format($pd['product']->product_variations->where('variation_id', $pd['variation_id'])->first()?->price * $pd['quantity']) }}đ
                                                </td>

                                        </tr>
                                    @endforeach
                                    @endif
                                    <tr>
                                        <td colspan="6">- {{ __('cart.endList') }} -</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-6 mt-5 cart-wrap ftco-animate">
                    <form action="{{ route('client.cart.applyVoucher') }}" method="get">
                        <div class="cart-total mb-3">
                            <h3>{{ __('cart.coupon.title') }}</h3>
                            <p>{{ __('cart.coupon.subtitle') }}</p>
                            <div class="info">
                                <div class="form-group">
                                    <input type="text" name="voucher-code" id="voucherCode"
                                        class="form-control text-left px-3" placeholder="A1B2C3D4..."
                                        value="{{ isset($currentCouponCode) ? $currentCouponCode : '' }}">
                                    <small class="form-text text-danger" id="voucherError"></small>
                                </div>
                            </div>
                        </div>
                        <p><button type="button" id="addVoucher" class="btn btn-primary px-4">{{ __('cart.coupon.apply') }}</button>
                        </p>
                    </form>
                </div>
                <div class="col-lg-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>{{ __('cart.calculate.title') }}</h3>
                        <p class="d-flex">
                            <span>{{ __('cart.calculate.subtotal') }}</span>
                            <span id="subTotal">{{ number_format($subTotal) }}đ</span>
                            <span></span>
                        </p>
                        <p class="d-flex">
                            <span>{{ __('cart.calculate.discount') }} @if (isset($appliedCouponCode))
                                    ({{ $appliedCouponCode }})
                                @endif
                            </span>
                            <span id="discountPrice" class="d-flex">{{ number_format($discount) }}đ
                            </span>
                            <span class="pointer text-danger"><u id="removeDiscount"
                                    onclick="removeDiscount()">{{ $discount > 0 ? 'Xoá voucher' : '' }}</u></span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>{{ __('cart.calculate.total') }}</span>
                            <span id="totalPrice">{{ number_format($total) }}đ</span>
                        </p>
                    </div>
                    <p><button onclick="checkout()" class="btn btn-primary px-4">{{ __('cart.calculate.apply') }}</button></p>
                </div>
            </div>
        </div>
    </section>
    <script>var csrfToken = "{{ csrf_token() }}";</script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/client/cart.js') }}"></script>
    <section>
        @include('client.cart.cartProductsScript')
    </section>
    <section>
        @include('client.components.contactUsRedirect')
    </section>
@endsection
