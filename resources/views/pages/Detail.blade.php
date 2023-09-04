@extends('layouts.Main2')

@section('title', 'Detail product')

@section('content')

    <!-- Breadcumb -->
    <section class="breadcumb">
        <div class="container">
            <div class="">
                <div class="arrow d-flex align-items-center justify-content-center">
                    <a href="">
                        <img src="{{ asset('Ikea/src/public/icon/arrow.svg') }}" class="" alt="" />
                    </a>
                </div>
            </div>

            <div class="mt-3">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb ms-2">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category') }}">Category</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('categoryDetail', $product->Category->slug) }}">{{ $product->Category->name }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Breadcumb End-->

    <!-- Main -->
    <section class="mainContent">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-lg-6 d-flex order-2 order-lg-1">
                    <div class="heading">
                        <h1>{{ $product->name }}</h1>
                        <p class="price">Rp. {{ number_format($product->price) }}</p>

                        <p class="describe lh-base">
                            {!! $product->description !!}
                        </p>

                        <div class="button-Shop">
                            <div class="d-grid align-items-center d-lg-block">
                                <a class="btn btn-shop" href="{{ route('checkout', $product->slug) }}">
                                    <img src="{{ asset('Ikea/src/public/icon/Shop.svg') }}" alt="" class="me-2" />
                                    Shop And Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">

                            @if ($product->gallery->count() > 0)
                                @foreach ($product->gallery as $item)
                                    <div class="thumbnail swiper-slide">
                                        <img src="{{ Storage::url($item->photo) }}" alt="thumbnail" class="w-100" />
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>

                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($product->gallery as $item)
                                <div class="swiper-slide secondImage d-flex justify-content-center">
                                    <img src="{{ Storage::url($item->photo) }}" alt="" class="" />
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD -->
            <div class="row cardHeader">

                @foreach ($products as $item)
                    <div class="col-lg-3 mt-3">
                        <div class="card">
                            <img src="{{ asset(Storage::url($item->image)) }}" alt="" />

                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <span>{{ $item->Category->name }}</span>
                                </div>

                                <p class="card-text">
                                    {{ strip_tags($item->short_description) }}
                                </p>

                                <form action="">
                                    <div class="d-flex justify-content-between">
                                        <span class="price">Rp. {{ number_format($item->price) }}</span>
                                        <a href="{{ route('detail', $item->slug) }}" class="btn btn-Buy">Buy Now</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mt-5">
                    {{ $products->onEachSide(5)->links() }}
                    {{-- {{ $products->links() }} --}}
                </div>
            </div>
            <!-- CARD END -->
        </div>
    </section>
    <!-- Main End -->
@endsection

@push('after-style')
    <!-- SWIPPER -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
@endpush


@push('after-script')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            // loop: true,
            // spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });

        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
@endpush
