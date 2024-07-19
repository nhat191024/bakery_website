@extends('client.layout.layout')
@section('content')
    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            @foreach ($images as $image)
                <div class="slider-item"
                    style="background-image:
                url({{ asset('img/home/' . $image->image) }});">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                            <div class="col-md-12 ftco-animate text-center">
                                <h1 class="mb-2 text-nowrap">{{ $image->title }}</h1>
                                <div>
                                    <a href="{{ route('client.shop.productList') }}" class="btn btn-primary mr-1">Xem chi
                                        tiết </a>
                                    <a href="{{ route('client.about.index') }}" class="btn btn-primary ml-1">Tìm hiểu
                                        thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-shipped"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Miễn phí giao hàng</h3>
                            <span>Cho đơn hàng trên 2 triệu</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-diet"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Luôn tươi ngon</h3>
                            <span>Bánh được bảo quản cẩn thận </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-award"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Chất lượng tốt </h3>
                            <span>Được đánh giá bởi 95% khách hàng </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Hỗ trợ </h3>
                            <span>Hỗ trợ khách hàng 24/7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-category ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 order-md-last align-items-stretch d-flex">
                            <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex"
                                style="background-image: url({{ asset('img/client/shop/product-5.webp') }});">
                                <div class="overlaya"></div>
                                <div class="text text-center">
                                    <h2 class="text-cate">Các loại bánh</h2>
                                    <p class="p-cate">Tạo điểm nhấn cho bữa tiệc của bạn</p>
                                    <p><a href="{{ route('client.shop.productList') }}" class="btn btn-primary">Đặt ngay</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @php
                                $index = 0;
                            @endphp
                            @foreach ($categoriesL as $leftItem)
                                <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                                    style="background-image: url({{ asset('img/client/shop/' . $imagesCategoryL[$leftItem->id]) }});">
                                    <div class="text px-3 py-1">
                                        <h2 class="mb-0"><a
                                                href="{{ route('client.shop.productList') }}/{{ $leftItem->id }}">
                                                {{ $leftItem->name }}</a></h2>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    @foreach ($categoriesR as $rightItem)
                        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                            style="background-image: url({{ asset('img/client/shop/' . $imagesCategoryR[$rightItem->id]) }});">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a
                                        href="{{ route('client.shop.productList') }}/{{ $rightItem->id }}">{{ $rightItem->name }}</a>
                                </h2>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Chúng tôi hiểu rằng</span>
                    <h2 class="text-ab-h2">BÁNH PHÁP LÀ NGHỆ THUẬT</h2>
                    <p>Chúng tôi muốn chia sẻ với quý khách niềm đam mê cho những món bánh hấp dẫn và ngon miệng.
                        Bạn sẽ không phải đi quá xa để trải nghiệm sự phong phú và độc đáo của các món bánh ngọt Pháp.</p>
                </div>
            </div>
        </div>
        <div class="container">
            @include('client.components.productList')
        </div>
    </section>

@foreach ($promotions as $promotion)
        <section class="ftco-section img"
            style="background-image: url({{ asset('img/client/shop/' . $promotion->Products->image) }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-end">
                    <a id="link" href="{{ route('client.shop.productDetail', ['productId' => $promotion->product_id]) }}">
                        <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate" >
                            <span class="subheading">Giá ưu đãi cho bạn</span>
                            <h2 class="text-sale">Sự kiện giảm giá</h2>
                            <h3 class="text-sale">{{ $promotion->Products->name }}</h3>
                            <span class="price">{{ $promotion->Products->fake_price }}Đ</span>
                            <span style="margin-left: 10px;"><a href="{{ route('client.shop.productDetail', ['productId' => $promotion->product_id]) }}" class="sale"> Chỉ còn {{ $price }}
                                    Đ</a></span>
                            <div id="timer" class="d-flex mt-5">
                                <div class="time" id="days"></div>
                                <div class="time pl-3" id="hours"></div>
                                <div class="time pl-3" id="minutes"></div>
                                <div class="time pl-3" id="seconds"></div>
                            </div>
                            <div>
                                <div class="end" id="end"></div>
                            </div>

                        </div>

                </div>
                </a>
            </div>
        </section>
    @endforeach
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Khách hàng nói gì về chúng tôi</span>
                    <h2 class="mb-4">Những chia sẻ gần đây</h2>
                    <p>
                    </p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('img/home/person-1.webp') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Một quán cà phê tuyệt vời với những món bánh tuyệt hảo... tôi
                                        và những người bạn thường đến đây
                                        vào cuối tuần trong trời thu Hà Nội... Nhân viên cũng rất thân thiện.</p>
                                    <p class="name">Hoàng Thắng</p>
                                    <span class="position">Khách Hàng</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('img/home/person-2.webp') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Nơi bạn tìm thấy tinh hoa ẩm thực từ nước Pháp.
                                        Mọi thứ thực sự giống như một tiệm bánh truyền thống ở góc phố Paris</p>
                                    <p class="name">Khánh Lâm</p>
                                    <span class="position">Khách Hàng</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('img/home/person-4.webp') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Mọi thứ rất tuyệt vời từ vị trí, cách trang trí cho đến các
                                        loại bánh ,
                                        . Tôi thực sự thích bánh trái cây. Thực đơn rất đa dạng, bạn có thể đặt một
                                        số món bánh cho bữa trưa . Các nhân viên đều rất thân thiện. </p>
                                    <p class="name">Customer</p>
                                    <span class="position">Khách Hàng</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('img/home/person-3.webp') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Tôi đã tìm thấy một ốc đảo yên bình trong lòng thành phố, nơi
                                        mà mỗi chi tiết đều đọng lại vẻ đẹp lãng mạn của thế giới bánh ngọt.</p>
                                    <p class="name">Trung Phạm</p>
                                    <span class="position">Khách Hàng</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('img/home/person-5.webp') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Nơi mà mỗi miếng bánh đều là một tác phẩm nghệ thuật, từng
                                        đường nét và màu sắc như lời thơ êm đềm của Paris buổi chiều.</p>
                                    <p class="name">Customer</p>
                                    <span class="position">Khách Hàng</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('img/home/person-6.webp') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Một thế giới bánh ngọt thần tiên, nơi mà mỗi cảm nhận về vị
                                        ngọt đều là một hành trình khám phá đầy sự kỳ diệu.</p>
                                    <p class="name">Customer</p>
                                    <span class="position">Khách Hàng</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('img/home/person-7.webp') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Nơi đây không chỉ là một quán cà phê, mà là một phép màu của
                                        văn hóa ẩm thực, nơi mà mỗi miếng bánh là một câu chuyện dài về hương vị và cảm xúc.
                                    </p>
                                    <p class="name">Customer</p>
                                    <span class="position">Khách Hàng</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('img/home/person-8.webp') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Một nơi hoàn hảo để chill cùng bạn bè ,
                                    tôi đã được cảm nhận tinh hoa ẩm thực của Pháp qua những món ăn ở đây
                                    .</p>
                                    <p class="name">Khánh Huy</p>
                                    <span class="position">Khách Hàng</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('img/home/person-9.webp') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Mỗi lần ghé qua, tôi lại được như là một chuyến du hành đến
                                        với những hương vị của những nơi khác nhau trên thế giới, cảm nhận qua từng miếng
                                        bánh tuyệt vời.</p>
                                    <p class="name">Customer</p>
                                    <span class="position">Khách Hàng</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('img/home/person-10.webp') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Nơi mà mỗi chiếc bánh trở thành một bản nhạc tuyệt vời, cùng
                                        những giai điệu của hương vị mà tôi không thể quên được.</p>
                                    <p class="name">Customer</p>
                                    <span class="position">Khách Hàng</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    {{-- <section class="ftco-section ftco-partner">
        <div class="container">
            <div class="row">
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="{{ asset('img/partner-1.png') }}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="{{ asset('img/partner-2.png') }}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="{{ asset('img/partner-3.png') }}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="{{ asset('img/partner-4.png') }}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="{{ asset('img/partner-5.png') }}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
            </div>
        </div>
    </section> --}}

    @include('client.components.contactUsRedirect')
    <script>
        var endDate = '{{ $promotions[0]->end_time }}';
    </script>
@endsection
