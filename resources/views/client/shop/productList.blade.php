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
            <section>
                @include('client.components.productList')
            </section>
            {{ $products->links('client.components.pagination') }}
        </div>
    </section>
    <section>
        @include('client.components.contactUsRedirect')
    </section>
    <script src="{{ URL::asset('js/aos.js.map') }}"></script>
@endsection


