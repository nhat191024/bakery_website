@extends('client.layout.layout')
@section('content')


    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ</a></span> <span>Liên Hệ</span>
                    </p>
                    <h1 class="mb-0 bread">Liên hệ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="w-100"></div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p>Địa chỉ:</p>
                        <p>{{ $Contact_us->address }}</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p>Số điện thoại:</p>
                        <p>{{ $Contact_us->phone_number }}</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p>Email: {{ $Contact_us->email }}</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p>Website </p>
                        <a href="{{ $Contact_us->website }}">Facebook</a>
                    </div>
                </div>
            </div>

            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <form action="{{ route('client.contact.store') }}" method="POST" class="bg-white p-5 contact-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Tên của bạn">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email của bạn">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Tiêu đề">
                        </div>
                        <div class="form-group">
                            <textarea id="" cols="30" rows="7" name="message" class="form-control"
                                placeholder="Nội dung góp ý"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary py-3 px-5 " style="background-color: #f8c53f; border: #f8c53f;" > Gửi góp ý</button>

                        </div>
                    </form>

                </div>

                <div class="col-md-6 d-flex">
                    <div id="map" class="bg-white"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
