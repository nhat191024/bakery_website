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
                            <a href="#" class="mr-2" style="color: #000;">{{ count($product->bill_details) }}
                                <span style="color: #bbb;">Sold</span></a>
                        </p>
                    </div>
                    @if ($product->product_variations->isNotEmpty())
                        <p class="price">
                            <input class="productPrice h3 text-black" id="productPrice" type="text" id="price"
                                value="{{ number_format($product->product_variations->first()->price, 0, ',', '.') }}đ"
                                disabled>
                        </p>
                    {{-- @else
                        <p class="price-dc"><s><span>{{ number_format($product->fake_price, 0, ',', '.') }}đ</span></s></p>
                        <input class="productPrice h3 text-black" id="productPrice" type="text" id="price"
                            value="{{ number_format($product->real_price, 0, ',', '.') }}đ" disabled> --}}
                    @endif
                    <p>{{ $product->description }}</p>
                    <div class="row mt-4">
                        @if ($product->product_variations->isNotEmpty())
                            <div class="col-md-6">
                                <div class="form-group d-flex">
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="variation" id="productVariation" class="form-control">
                                            @foreach ($product->product_variations as $variation)
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
                    <p><a class="btn btn-primary py-3 px-5 text-center" id="addToCart">Add to Cart</a></p>
                    <p>Large size please consult staff. <br>
                        Price does not include VAT 10% and shipping fee.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section pt-0">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Products</span>
                    <h2 class="mb-4">Related Products</h2>
                    <p>Explore our delicious selections ~</p>
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


                // id,quantity = 1, variation_id = null
                var id = {{ $product->id }}
                $quantitiy = 1;
                $variation_id = null;

                // variation_id
                $price = $('#productPrice').val().replace('đ', '').replace('.', '');
                $quantity = $('#quantity').val();
                $variation_id = $('#productVariation').val();
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
                        $('#addToCart').text('Adding...');
                        // $('#addToCart').class('btn-success');
                    },
                    success: function(data) {
                        $('#addToCart').text('Added to cart!');
                        updateCartCount();
                        setTimeout(function() {
                            $('#addToCart').text('Add more');
                        }, 5000);
                    },
                    error: function(err) {
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
                $('#productPrice').val(new Intl.NumberFormat('de-DE').format(price) + 'đ');
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
