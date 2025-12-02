@extends('client.layout.layout')

@section('content')
    <div class="container py-5 recent-view-section">
        <h2 class="mb-4 text-center">Sản phẩm bạn đã xem gần đây</h2>

        @if($products->isEmpty())
            <p class="text-center">Bạn chưa xem sản phẩm nào.</p>
        @else
            <div class="row g-4 justify-content-center">
                @foreach($products as $product)
                    <div class="col-10 col-sm-6 col-md-4 col-lg-3 mb-3">
                        <div class="card recent-view-card h-100 text-center">

                            {{-- Khung ảnh cố định tỉ lệ, ảnh luôn căn giữa --}}
                            <div class="recent-view-image-wrapper">
                                @if(!empty($product->image))
                                    <img src="{{ asset('img/client/shop/' . $product->image) }}"
                                         class="img-fluid recent-view-image"
                                         alt="{{ $product->name }}">
                                @endif
                            </div>

                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title recent-view-title mb-3">
                                    {{ $product->name }}
                                </h5>

                                <div class="mt-auto">
                                    <a href="{{ route('client.shop.productDetail', ['productId' => $product->id]) }}"
                                       class="btn recent-view-btn">
                                        Xem chi tiết
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
