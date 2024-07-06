@extends('client.layout.layout')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('img/blog.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Blog</span></p>
                    <h1 class="mb-0 bread">Blog</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <div class="row">

                        @foreach ($blogs as $blog)
                            <div class="col-md-12 d-flex ftco-animate">
                                <div class="blog-entry align-self-stretch d-md-flex">
                                    <a href="blog-single.html" class="block-20"
                                        style="background-image: url({{ asset('img/blog.jpg') }});">
                                    </a>
                                    <div class="text d-block pl-md-4">
                                        <div class="meta mb-3">
                                            <div><a href="#">{{ $blog->created_at }}</a></div>
                                            <div><a href="#">{{ $blog->user_id }}</a></div>
                                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                            </div>
                                        </div>
                                        <h3 class="heading"><a href="#">{{ $blog->title }}</a></h3>
                                        <p>{{ $blog->subtitle }}</p>
                                        <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Đọc thêm</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon ion-ios-search"></span>
                                <input type="text" class="form-control" placeholder="Tìm kiếm...">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading">Danh sách</h3>
                        <ul class="categories">
                            @foreach ($categories as $category)
                                <li><a href="#">{{ $category->name }} <span>(12)</span></a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading">Blog gần đây</h3>

                        @foreach ($recentBlogs as $recentBlog)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url({{ asset('img/blog.jpg') }});"></a>
                                <div class="text">
                                    <h3 class="heading-1"><a href="#">{{ $recentBlog->title }}</a></h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="icon-calendar"></span>
                                                {{ $recentBlog->created_at }}</a></div>
                                        <div><a href="#"><span class="icon-person"></span>
                                                {{ $recentBlog->user_id }}</a>
                                        </div>
                                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading">Tag Cloud</h3>
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">sweet</a>
                            <a href="#" class="tag-cloud-link">pastry</a>
                            <a href="#" class="tag-cloud-link">cakes</a>
                        </div>
                    </div>

                    {{-- <div class="sidebar-box ftco-animate">
                        <h3 class="heading">Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus
                            voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur
                            similique, inventore eos fugit cupiditate numquam!</p>
                    </div> --}}
                </div>

            </div>
        </div>
    </section>
@endsection
