@extends('client.layout.layout')
@section('content')
    <hr>
    <section class="ftco-section pt-3">
        <form action="{{ route('client.checkout.store') }}" method="POST">
            @csrf
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 ftco-animate">
                        <div class="billing-form">
                            <h3 class="mb-4 billing-heading">{{ __('checkout.deliveryInformation.title') }}</h3>
                            <div class="row align-items-end">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fullName">{{ __('checkout.deliveryInformation.name') }}</label>
                                        <input id="fullName" type="text" class="form-control"
                                            placeholder="{{ __('checkout.placeholder.name') }}" required>
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">{{ __('checkout.deliveryInformation.address') }}</label>
                                        <input id="address" type="text" class="form-control"
                                            placeholder="{{ __('checkout.placeholder.address') }}" required>
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="district">{{ __('checkout.deliveryInformation.district') }}</label>
                                        <input id="district" type="text" class="form-control"
                                            placeholder="{{ __('checkout.placeholder.district') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ward">{{ __('checkout.deliveryInformation.ward') }}</label>
                                        <input id="ward" type="text" class="form-control"
                                            placeholder="{{ __('checkout.placeholder.district') }}" required>
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">{{ __('checkout.deliveryInformation.phone') }}</label>
                                        <input minlength="10" maxlength="13" id="phone" type="number"
                                            class="form-control" placeholder="(+84) 123 456 789" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">{{ __('checkout.deliveryInformation.email') }}</label>
                                        <input id="email" type="email" class="form-control"
                                            placeholder="{{ __('checkout.placeholder.district') }}" required>
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="delivery">{{ __('checkout.deliveryInformation.delivery') }}</label>
                                        <select class="form-control" id="delivery" required>
                                            <option value="1" selected>
                                                {{ __('checkout.deliveryInformation.deliveryMethod.directly') }}</option>
                                            <option value="2">
                                                {{ __('checkout.deliveryInformation.deliveryMethod.store') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="row mt-5 pt-3">
                            <div class="col-md-12 d-flex mb-5">
                                <div class="cart-detail cart-total p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">{{ __('checkout.accessory.title') }}</h3>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio d-flex align-items-start">
                                                <input class="accessories" id="accessory-0" type="radio" name="accessory"
                                                    class="mr-2" style="transform: translateY(8px)" value="0"
                                                    checked>
                                                <div class="ml-3">
                                                    <label for="accessory-0">{{ __('checkout.accessory.none') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($accessories as $ac)
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="radio d-flex align-items-start">
                                                    <input class="accessories" id="accessory-{{ $ac->id }}"
                                                        type="radio" name="accessory" class="mr-2"
                                                        value="{{ $ac->price }}" data-id="{{ $ac->id }}"
                                                        style="transform: translateY(8px)">
                                                    <div class="ml-3">
                                                        <label for="accessory-{{ $ac->id }}">
                                                            @if ($lang == 'en')
                                                                {{ $ac->name_en }}@else{{ $ac->name }}
                                                            @endif
                                                            ({{ number_format($ac->price) }}₫)
                                                        </label>
                                                        <small class="d-block">
                                                            @if ($lang == 'en')
                                                                {{ $ac->description_en }}@else{{ $ac->description }}
                                                            @endif
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12 d-flex mb-5">
                                <div class="cart-detail cart-total p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">{{ __('checkout.bill.title') }}</h3>
                                    <p class="d-flex">
                                        <span>{{ __('checkout.bill.subtotal') }}</span>
                                        <span id="subTotal"
                                            data-price="{{ $subTotal }}">{{ number_format($subTotal) }}đ</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>{{ __('checkout.bill.delivery') }}</span>
                                        <span>0đ</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>{{ __('checkout.bill.discount') }}
                                            @if (isset($appliedCouponCode))
                                                ({{ $appliedCouponCode }})
                                            @endif
                                        </span>
                                        <span id="discountPrice" class="d-flex">{{ number_format($discount) }}đ</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>{{ __('checkout.bill.accessory') }}</span>
                                        <span id="cartAccessory">0đ</span>
                                    </p>
                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>{{ __('checkout.bill.total') }}</span>
                                        <span id="totalPrice">{{ number_format($total) }}đ</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">{{ __('checkout.payment.title') }}</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <input id="banking" type="radio" name="payment" class="mr-2"
                                                    value="2">
                                                <label for="banking">{{ __('checkout.payment.method.transfer') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <input id="cash" type="radio" name="payment" class="mr-2"
                                                    value="1" checked>
                                                <label for="cash">{{ __('checkout.payment.method.cash') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" class="mr-2" required>
                                                    {{ __('checkout.payment.accept') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary py-3 px-4" id="submitBtn" type="submit"
                                        class="btn btn-primary">
                                        {{ __('checkout.submit') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
        </div>
    </section>
    <div class="modal" id="myModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header  d-flex justify-content-center">
                    <h4 class="modal-title">QR thanh toán đơn hàng</h4>
                </div>
                <div class="modal-body d-flex justify-content-center align-items-center flex-column">
                    <img id="modalImage" src="" alt="QR">
                    {{-- <hr>
                    <div class="d-flex justify-content-center h5">
                        <span class="mx-1">STK: <strong>113366668888</strong></span>
                        <span class="mx-1">Chủ tài khoản: <strong>TRINH THU DUNG</strong></span>
                    </div>
                    <p class="h5">Ngân hàng thụ hưởng: <strong>ViettinBank</strong></p>
                    <span class="mx-1 h5">Tổng tiền: <strong id="total"></strong></span>
                    <span class="mx-1 h5">Nội dung: <strong id="description"></strong></span> --}}
                </div>
                <div class="modal-footer" onclick="home()">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Về trang chủ</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var csrfToken = "{{ csrf_token() }}";
    </script>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/client/checkout.js') }}"></script>

    <div id="checkout-loader" class="fullscreen-checkout">
        <svg class="circular-checkout" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path-checkout" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
        <p>{{ __('checkout.loader') }}</p>
    </div>

    <style>
        #checkout-loader {
            display: flex;
            flex-direction: column;
            justify-content: start;
            position: fixed;
            width: 196px;
            height: 116px;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            /* background-color: rgba(255, 255, 255, 0.9); */
            /* -webkit-box-shadow: 0px 24px 64px rgba(0, 0, 0, 0.24);
                    box-shadow: 0px 24px 64px rgba(0, 0, 0, 0.24); */
            border-radius: 16px;
            opacity: 100;
            visibility: hidden;
            -webkit-transition: opacity .2s ease-out, visibility 0s linear .2s;
            -o-transition: opacity .2s ease-out, visibility 0s linear .2s;
            transition: opacity .2s ease-out, visibility 0s linear .2s;
            z-index: 1000;
        }

        #checkout-loader p {
            width: 100%;
            font-size: 16px;
            font-weight: 700;
            color: #333;
            text-align: center;
        }

        #checkout-loader .fullscreen-checkout {
            padding: 0;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            -webkit-transform: none;
            -ms-transform: none;
            transform: none;
            background-color: #fff;
            border-radius: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        #checkout-loader .circular-checkout {
            -webkit-animation: loader-rotate 2s linear infinite;
            animation: loader-rotate 2s linear infinite;
            position: absolute;
            left: calc(50% - 24px);
            top: calc(50% - 24px);
            display: block;
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        #checkout-loader .path-checkout {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
            -webkit-animation: loader-dash 1.5s ease-in-out infinite;
            animation: loader-dash 1.5s ease-in-out infinite;
            stroke-linecap: round;
        }
    </style>
@endsection
