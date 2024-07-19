@extends('client.layout.layout')
@section('content')
    <hr>
    <section class="ftco-section pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="images/product-1.jpg" class="image-popup"><img
                            src="{{ asset('img/client/shop/' . $product->image) }}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3><b>{{ $product->name }}</b></h3>
                    <div class="rating d-flex">
                        <p class="text-left">
                            <span style="color: #bbb;">Đã bán</span></a>
                            <a href="#" class="mr-2" style="color: #000;">{{ count($product->bill_details) }}

                        </p>
                    </div>
                    @if (count($product->product_variations) > 1)
                        <p class="price">
                        <h2 class="productPrice h3 text-black" id="productPrice" id="productPrice">
                            {{ number_format($product->product_variations[0]->price ?? $product->product_variations, 0, ',', '.') }}đ
                        </h2>
                        </p>
                    @elseif (count($product->product_variations) == 1)
                        <p class="price-dc"><s><span>{{ number_format($product->fake_price, 0, ',', '.') }}đ</span></s></p>
                        <h2 class="productPrice h3 text-black" id="productPrice" id="productPrice">
                            {{ number_format($product->product_variations[0]->price ?? $product->product_variations, 0, ',', '.') }}đ
                        </h2>
                        </p>
                    @endif

                    <p>{{ $product->description }}</p>
                    <div class="row mt-4">
                        @if (count($product->product_variations) > 1)
                            <div class="col-md-6">
                                <div class="form-group d-flex">
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="variation" id="productVariation" class="form-control">
                                            @foreach ($product->product_variations as $variation)
                                                @continue(!$variation->variation)
                                                <option data-price="{{ $variation->price }}"
                                                    value="{{ $variation->variation_id }}">{{ $variation->variation->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                        @endif
                        @foreach ($product->product_variations as $variation)
                        @continue(!$variation->variation)
                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                    <i class="ion-ios-remove"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number"
                                value="1" min="1" max="100">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="ion-ios-add"></i>
                                </button>
                            </span>
                        </div>
                        <div class="w-100"></div>
                    </div>
                        <p>
                            <a class="btn btn-primary py-3 px-5 text-center" id="addToCart">Thêm vào giỏ</a>
                        </p>
                        <p>Nếu quý khánh muốn mua cỡ lớn . vui lòng liên hệ cửa hàng <br>
                        @break
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section pt-0">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Các loại bánh</span>
                <h2 class="mb-4">Sản phẩm bán chạy</h2>
                <p>Cùng chúng tôi khám phá những món bánh được nhiều người ưa thích ~</p>
            </div>
        </div>
    </div>
    <div class="container">
        <section>
            @include('client.components.productList')
        </section>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#addToCart').click(function(e) {
            var id = {{ $product->id }}
            $quantitiy = 1;
            $price = $('#productPrice').val().replace('đ', '').replace('.', '');
            $quantity = $('#quantity').val();
            $variation_id = $('#productVariation').val() ? $('#productVariation').val() : 1;
            console.log($price, $quantity, $variation_id);
            $.ajax({
                url: "{{ route('client.cart.add') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    'product_id': id,
                    'quantity': $quantity,
                    'variation_id': $variation_id
                },
                beforeSend: function() {
                    $('#addToCart').text('Đang thêm...');
                },
                success: function(data) {
                    $('#addToCart').text('Đã thêm vào giỏ hàng!');
                    updateCartCount();
                    setTimeout(function() {
                        $('#addToCart').text('Mua thêm');
                    }, 5000);
                },
                error: function(err) {
                    $('#addToCart').text('Failed');
                    console.log(err);
                }
            });
        });

        $('.quantity-right-plus').click(function(e) {
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            $('#quantity').val(quantity + 1);
        });

        $('#productVariation').change(function(e) {
            var categoryId = e.target.value;
            var price = $(this).find('option:selected').data('price');
            $('#productPrice').text(new Intl.NumberFormat('de-DE').format(price) + 'đ');
            console.log('change price based on selected variant' + e.target.value + ' ' + new Intl
                .NumberFormat('de-DE').format(price) + 'đ');
        });

        $('.quantity-left-minus').click(function(e) {
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            if (quantity > 1) {
                $('#quantity').val(quantity - 1);
            }
        });
    });
</script>
<section>
    @include('client.components.contactUsRedirect')
</section>
@endsection
