@extends('client.layout.layout')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url({{ URL::asset('img/home/bg-2.webp') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a
                                href="{{ route('client.homepage.index') }}">{{ __('blog.breadcrumb1') }}</a></span>/<span>{{ __('blog.breadcrumb2') }}</span>
                    </p>
                    <h1 class="mb-0 bread">{{ __('blog.breadcrumb') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <div class="row">
                        {{ $blogs->links('client.components.pagination') }}
                        @foreach ($blogs as $blog)
                            <div class="col-md-12 d-flex ftco-animate">
                                <div class="blog-entry align-self-stretch d-md-flex">
                                    <a href="{{ route('client.blog.show', ['id' => $blog->id]) }}" class="block-20"
                                        style="background-image: url('{{ asset('img/client/blog/' . $blog->thumbnail) }}');">
                                    </a>
                                    <div class="text d-block pl-md-4">
                                        <div class="meta mb-3">
                                            <div><a href="#">{{ $blog->created_at }}</a></div>
                                            <div><a href="#">{{ $blog->user->username }}</a></div>
                                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                            </div>
                                        </div>
                                        <h3 class="heading">
                                            <a href="{{ route('client.blog.show', ['id' => $blog->id]) }}">
                                                @if ($lang == 'en')
                                                    {{ $blog->title_en }}@else{{ $blog->title }}
                                                @endif
                                            </a>
                                        </h3>
                                        <p>
                                            @if ($lang == 'en')
                                                {{ $blog->subtitle_en }}@else{{ $blog->subtitle }}
                                            @endif
                                        </p>
                                        <p><a href="{{ route('client.blog.show', ['id' => $blog->id]) }}"
                                                class="btn btn-primary py-2 px-3">{{ __('blog.readMore') }}</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $blogs->links('client.components.pagination') }}
                    </div>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading">{{ __('blog.list') }}</h3>
                        <ul class="categories">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('client.shop.productList') }}/{{ $category->id }} ">
                                        @if ($lang == 'en')
                                            {{ $category->name_en }}@else{{ $category->name }}
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading">{{ __('blog.recent') }}</h3>

                        @foreach ($recentBlogs as $recentBlog)
                            <div class="block-21 mb-4 d-flex pointer" onclick="location.href = '{{ route('client.blog.show', ['id' => $recentBlog->id]) }}';">
                                <a class="blog-img mr-4"
                                style="background-image: url('{{ asset('img/client/blog/' . $recentBlog->thumbnail) }}');"></a>
                                <div class="text">
                                    <h3 class="heading-1">
                                        <a href="{{ route('client.blog.show', ['id' => $recentBlog->id]) }}">
                                            @if ($lang == 'en')
                                                {{ $recentBlog->title_en }}@else{{ $recentBlog->title }}
                                            @endif
                                        </a>
                                    </h3>
                                    <div class="meta">
                                        <div><a><span class="icon-calendar"></span>
                                                {{ $recentBlog->created_at }}</a></div>
                                        <div><a><span class="icon-person"></span>
                                                {{ $recentBlog->user->username }}</a>
                                        </div>
                                        <div><a><span class="icon-chat"></span> 19</a></div>
                                    </div>
                                </div>
                            </div>
                            <a>
                        @endforeach
                    </div>

                    {{-- <div class="sidebar-box ftco-animate">
                        <h3 class="heading">Tag Cloud</h3>
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">sweet</a>
                            <a href="#" class="tag-cloud-link">pastry</a>
                            <a href="#" class="tag-cloud-link">cakes</a>
                        </div>
                    </div> --}}

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
