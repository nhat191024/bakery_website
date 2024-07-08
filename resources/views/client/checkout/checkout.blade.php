@extends('client.layout.layout')
@section('content')
    <hr>
    <section class="ftco-section pt-3">
        <form action="{{ route('client.checkout.store') }}"  method="POST">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate">
                    <div class="billing-form">
                        <h3 class="mb-4 billing-heading">Thông tin giao hàng</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Họ và tên đệm</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Tên</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            {{-- <div class="col-md-12">
                      <div class="form-group">
                          <label for="country">State / Country</label>
                          <div class="select-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="" id="" class="form-control">
                            <option value="">France</option>
                          <option value="">Italy</option>
                          <option value="">Philippines</option>
                          <option value="">South Korea</option>
                          <option value="">Hongkong</option>
                          <option value="">Japan</option>
                        </select>
                      </div>
                      </div>
                  </div> --}}
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">Địa chỉ</label>
                                    <input type="text" class="form-control" placeholder="Tên đường hoặc số nhà...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        placeholder="Chi tiết... VD: Quận... (không cần thiết)">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="towncity">Town / City</label>
                                    <input type="text" class="form-control" placeholder="Hà Nội" value="Hà Nội">
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                      <div class="form-group">
                          <label for="postcodezip">Postcode / ZIP *</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
                  </div> --}}
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" placeholder="(+84) 123 456 789">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">Email Address</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            {{-- <div class="col-md-12">
                  <div class="form-group mt-4">
                                      <div class="radio">
                                        <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
                                        <label><input type="radio" name="optradio"> Ship to different address</label>
                                      </div>
                                  </div>
              </div> --}}
                        </div>
                    </div><!-- END -->
                </div>
                <div class="col-xl-5">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Cart Total</h3>
                                <p class="d-flex">
                                    <span>Subtotal</span>
                                    <span id="subTotal">{{ number_format($subTotal) }}đ</span>
                                    <span></span>
                                </p>
                                <p class="d-flex">
                                    <span>Delivery</span>
                                    <span>0đ</span>
                                    <span></span>
                                </p>
                                <p class="d-flex">
                                    <span>Discount @if (isset($appliedCouponCode))
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
                                            <label><input type="radio" name="optradio" class="mr-2"> Chuyển khoản qua
                                                ngân hàng</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" class="mr-2"> Thanh toán khi nhận
                                                hàng (COD)</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="radio">
                                             <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                                          </div>
                                      </div>
                                  </div> --}}
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="" class="mr-2" required>
                                                Tôi cam kết thông tin giao hàng là chính xác</label>
                                        </div>
                                    </div>
                                </div>
                                <p><button type="submit" class="btn btn-primary py-3 px-4">Xác nhận đặt hàng</button></p>
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </form>
        </div>
    </section>
    <script src="{{ asset('js/checkout.js') }}"></script>
@endsection
