@extends('client.layout.layout')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url({{ URL::asset('img/home/bg-1.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('client.homepage.index') }}">Trang
                                chủ</a></span>/<span>Giới
                            thiệu</span></p>
                    <h1 class="mb-0 bread">Giới thiệu</h1>
                </div>
            </div>
        </div>
    </div>

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
    @include('client.components.contactUsRedirect')
    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_3.jpg);">
        <div class="container">
            <div class="row justify-content-center py-5">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="99999">0</strong>
                                    <span>Khách Hàng Hài lòng</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="2">0</strong>
                                    <span>Chi nhánh </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="1000">0</strong>
                                    <span>Đối tác </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="1090">0</strong>
                                    <span>Giải thưởng</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section">
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
                                    style="background-image: url({{ asset('img/home/person-1.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Một quán cà phê tuyệt vời với những món bánh tuyệt hảo... tôi
                                        và những người bạn thường đến đây
                                        vào cuối tuần trong trời thu Hà Nội... Nhân viên cũng rất thân thiện.</p>
                                    <p class="name"> Quý ngài tốt bụng</p>
                                    <span class="position">Khách Hàng</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('img/home/person-2.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Nơi bạn tìm thấy tinh hoa ẩm thực từ nước Pháp.
                                        Mọi thứ thực sự giống như một tiệm bánh truyền thống ở góc phố Paris</p>
                                    <p class="name">Quốc trưởng</p>
                                    <span class="position">Khách Hàng</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('img/home/person-3.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Mọi thứ rất tuyệt vời từ vị trí, cách trang trí cho đến các
                                        loại bánh ,
                                        . Tôi thực sự thích bánh trái cây. Thực đơn rất đa dạng, bạn có thể đặt một
                                        số món bánh cho bữa trưa . Các nhân viên đều rất thân thiện. </p>
                                    <p class="name">A happy guy</p>
                                    <span class="position">Khách Hàng</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-shipped"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Miễn phí giao hàng</h3>
                            <span>Cho đơn hàng từ 2 triệu</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-diet"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Luôn tươi ngon</h3>
                            <span>Bánh được bảo quản an toàn</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-award"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Chất lượng tốt</h3>
                            <span>Đánh giá cao bởi nhiều khách hàng</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Hỗ trợ nhiệt tình</h3>
                            <span>Trực tuyến 24/7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
