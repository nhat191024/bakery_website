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
                                <h1 class="mb-2">{{ $image->title }}</h1>
                                <h2 class="subheading mb-4">{{ $image->subtitle }}</h2>
                                <p><a href="{{ $image->link }}" class="btn btn-primary">Xem chi tiết </a></p>
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
                                style="background-image: url({{ asset('img/client/shop/product-5.jpg') }});">
                                <div class="text text-center">
                                    <h2>Các loại bánh</h2>
                                    <p>Tạo điểm nhấn cho bữa tiệc của bạn</p>
                                    <p><a href="#" class="btn btn-primary">Đặt ngay</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                                style="background-image: url({{ asset('img/client/shop/product-1.jpg') }});">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a href="#"> Bánh Đặt Trước</a></h2>
                                </div>
                            </div>
                            <div class="category-wrap ftco-animate img d-flex align-items-end"
                                style="background-image: url({{ asset('img/client/shop/product-2.jpg') }});">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a href="#">Bánh Đặt Tiệc</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                        style="background-image: url({{ asset('img/client/shop/product-3.jpg') }});">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="#">Bánh Dessert</a></h2>
                        </div>
                    </div>
                    <div class="category-wrap ftco-animate img d-flex align-items-end"
                        style="background-image: url({{ asset('img/client/shop/product-4.jpg') }});">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="#">Bánh Sỉ</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Chúng tôi hiểu rằng</span>
                    <h2 class="mb-4">BÁNH PHÁP LÀ NGHỆ THUẬT</h2>
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
        <section class="ftco-section img" style="background-image: url({{ asset('img/client/shop/product-2.jpg') }});">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                        <span class="subheading">Giá ưu đãi cho bạn</span>
                        <h2 class="mb-4">Giảm giá hàng ngày</h2>
                        <p>Mang đến cho người dùng những sản phẩm chất lượng với mức giá ưu đãi nhất</p>
                        <h3><a href="#">{{ $promotion->description }}</a></h3>
                        <span class="price">50.0000 <a href="#">chỉ còn 30.000 </a></span>
                        <div id="timer" class="d-flex mt-5">
                            <div class="time" id="days"></div>
                            <div class="time pl-3" id="hours"></div>
                            <div class="time pl-3" id="minutes"></div>
                            <div class="time pl-3" id="seconds"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Phản hồi</span>
                    <h2 class="mb-4">Khách hàng của chúng tôi nói rằng</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('img/person_1.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Quán cà phê tráng miệng ngon nhất Hà Nội. Hương vị rất ngon.
                                        Nhân viên rất tử tế. Bạn nên ăn bánh éclair ở đây. Ngon!</p>
                                    <p class="name">Joonyoung Kim</p>
                                    {{-- <span class="position">Marketing Manager</span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('img/person_1.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Một quán cà phê nhỏ tuyệt vời với những chiếc bánh ngon
                                        tuyệt... tôi và bạn bè đã đến đây mỗi ngày trong kỳ nghỉ ngắn ngày ở Hà Nội... Nhân
                                        viên cũng tuyệt vời nữa</p>
                                    <p class="name">Will Knight</p>
                                    {{-- <span class="position">Marketing Manager</span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('img/person_1.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Nơi để tìm thấy tất cả những gì bạn nhớ từ Pháp. Mọi thứ thực
                                        sự giống như trong tiệm bánh ở góc phố nên đừng quẹt thẻ thăm quan khi ở trong khu
                                        phố</p>
                                    <p class="name">Remi Nguyen</p>
                                    {{-- <span class="position">Marketing Manager</span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('img/person_1.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Quán cà phê/tiệm bánh nằm ngay đối diện Nhà hát Opera. Họ
                                        cũng phục vụ bữa trưa và cung cấp nhiều loại rượu vang. Tôi đã gọi bánh tart chanh.
                                        Kem thực sự tươi với bánh quy. Đối với bữa trưa, tôi đã chọn mì spaghetti với sốt cà
                                        chua, thực sự rất ngon. Bạn tôi đã gọi một suất ăn trưa bao gồm một món khai vị lớn
                                        và một món cá chính (cùng với trà/cà phê miễn phí). Nhìn chung, trải nghiệm của
                                        chúng tôi là thỏa đáng. Nhân viên cũng tuyệt vời, rất thân thiện và hữu ích</p>
                                    <p class="name">Trang Do</p>
                                    {{-- <span class="position">Marketing Manager</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr>

    <section class="ftco-section ftco-partner">
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
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container py-4">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-6">
                    <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                    <span>Get e-mail updates about our latest shops and special offers</span>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Enter email address">
                            <input type="submit" value="Subscribe" class="submit px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
