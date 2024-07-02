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
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a class="prod-title" href="#">{{ $pd->name }}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price">
                                            <span class="mr-2 price-dc">{{ number_format($pd->fake_price, 0, ',', '.') }}đ</span>
                                            <span class="price-sale font-weight-bold">{{ number_format($pd->real_price, 0, ',', '.') }} đ</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="#"
                                            class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <a href="#"
                                            class="buy-now d-flex justify-content-center align-items-center mx-1">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
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
    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container py-4">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-6">
                    <h2 style="font-size: 22px;" class="mb-0">Đăng kí nhận ưu đãi</h2>
                    <span>
                        Nhận e-mail về những chương trình khuyến mại đặc biệt mới nhất!
                    </span>
                </div>
                <div class="col-md-6 align-items-center">
                    <div class="">
                        <a href="#" class="btn form-control" style="line-height: 200%">Đăng kí</a>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <script src="{{ URL::asset('js/aos.js.map') }}"></script>
@endsection
