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
                            <h3 class="mb-4 billing-heading">Thông tin giao hàng</h3>
                            <div class="row align-items-end">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fullName">Họ và tên</label>
                                        <input id="fullName" type="text" class="form-control"
                                            placeholder="Họ và tên người nhận">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Địa chỉ</label>
                                        <input id="address" type="text" class="form-control"
                                            placeholder="Số nhà \ tên đường \ khu \ xã \...">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="district">Quận\Huyện</label>
                                        <input id="district" type="text" class="form-control"
                                            placeholder="Quận\Huyện nơi giao">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ward">Phường\Xã</label>
                                        <input id="ward" type="text" class="form-control"
                                            placeholder="Phường\Xã nơi giao">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại</label>
                                        <input id="phone" type="number" class="form-control"
                                            placeholder="(+84) 123 456 789">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Địa chỉ email</label>
                                        <input id="email" type="text" class="form-control"
                                            placeholder="Địa chỉ email để nhận thông báo">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="delivery">Phương thức vận chuyển</label>
                                        <select class="form-control" id="delivery">
                                            <option selected>Ship tận tay</option>
                                            <option>Lấy tại quần</option>
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
                                    <h3 class="billing-heading mb-4">Cart Total</h3>
                                    <p class="d-flex">
                                        <span>Subtotal</span>
                                        <span id="subTotal">{{ number_format($subTotal) }}đ</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>Delivery</span>
                                        <span>0đ</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>Discount
                                            @if (isset($appliedCouponCode))
                                                ({{ $appliedCouponCode }})
                                            @endif
                                        </span>
                                        <span id="discountPrice" class="d-flex">{{ number_format($discount) }}đ</span>
                                        <span class="pointer text-danger">
                                            <u id="removeDiscount" onclick="removeDiscount()">
                                                {{ $discount > 0 ? 'Xoá voucher' : '' }}
                                            </u>
                                        </span>
                                    </p>
                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>Total</span>
                                        <span id="totalPrice">{{ number_format($total) }}đ</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Payment Method</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <input id="banking" type="radio" name="payment" class="mr-2"
                                                    value="banking">
                                                <label>Chuyển khoản qua ngân hàng</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <input id="cash" type="radio" name="payment" class="mr-2"
                                                    value="cash">
                                                <label>Thanh toán khi nhận hàng (COD)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" class="mr-2" required>
                                                    Tôi cam kết thông tin giao hàng là chính xác
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary py-3 px-4" onclick="checkout()">
                                        Xác nhận đặt hàng
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
        </div>
    </section>
    <script>
        var csrfToken = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('js/client/checkout.js') }}"></script>
@endsection
