@extends('layouts.Main')


@section('title', 'HomePage Furniluxe')


@section('content')
    <!-- header start -->
    <section class="text-center">
        <header>
            <h1 class="text-center">
                Elevate the look of your interior with <br />
                captivating minimalistic touches and <br />
                modern style
            </h1>

            <p class="text-center">
                you can effortlessly and quickly transform your room <br />
                into a minimalist and modern space, creating a fresh <br />
                and stylish atmosphere
            </p>

            <a href="#" class="btn btn btn-outline-light px-5 py-3 rounded-pill">Shop Now</a>
        </header>
    </section>
    <!-- header end -->

    <!-- Featuree -->
    <section class="my-5 features">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-3">
                    <div class="">
                        <h5 class="choosing ms-2">
                            Why <br />
                            Choosing
                        </h5>
                    </div>
                </div>

                <div class="col-12 col-xl-3">
                    <div class="card p-2">
                        <div class="card-body">
                            <h5 class="card-title">FurniLuxe features</h5>

                            <p class="card-text lh-base">The advantage of hiring a workspace with us is that givees you
                                comfortable service and all-around facilities.</p>

                            <a href="#" class="card-link more lh-lg">
                                More Info

                                <img src="{{ asset('Ikea/src/public/img/arrow.svg') }}" alt="More Arrow " />
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-3">
                    <div class="card p-2">
                        <div class="card-body">
                            <h5 class="card-title">Affordable Price</h5>

                            <p class="card-text lh-base">You can get a workspace of the highst quality at an affordable
                                price and still enjoy the facilities that are oly here.</p>

                            <a href="#" class="card-link more lh-lg">
                                More Info

                                <img src="{{ asset('Ikea/src/public/img/arrow.svg') }}" alt="More Arrow " />
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-3">
                    <div class="card p-2">
                        <div class="card-body">
                            <h5 class="card-title">Many Choices</h5>

                            <p class="card-text lh-base">We provide many unique work space choices so that you can
                                choose the workspace to your liking.</p>

                            <a href="#" class="card-link more lh-lg">
                                More Info

                                <img src="{{ asset('Ikea/src/public/img/arrow.svg') }}" alt="More Arrow " />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featuree end -->

    <!-- Category -->
    <section class="category">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Category</h2>
                </div>
            </div>

            <div class="row">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">

                        @foreach ($category as $item)
                            <div class="swiper-slide">
                                <a href="{{ route('category') }}" class="text-decoration-none">
                                    <div class="card">
                                        <img src="{{ asset(Storage::url($item->photo)) }}" class="card-img-top"
                                            alt="Category-Sofa" />
                                        <div class="card-body">
                                            <h5 class="card-title text-center">{{ $item->name }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach




                    </div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Category end -->

    <!-- product -->
    <section class="product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Product</h2>
                </div>

                <div class="row">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">

                            @foreach ($product10 as $item)
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img src="{{ asset(Storage::url($item->image)) }}" alt="{{ $item->name }}" />

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
                                                    <a href="{{ route('detail', $item->slug) }}" class="btn btn-Buy">Buy
                                                        Now</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <!-- <div class="swiper-pagination"></div> -->
                    </div>
                </div>

                <div class="row" style="margin-top: 50px">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">

                            @foreach ($product20 as $item)
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img src="{{ asset(Storage::url($item->image)) }}" alt="{{ $item->name }}" />

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
                                                    <a href="{{ route('detail', $item->slug) }}" class="btn btn-Buy">Buy
                                                        Now</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                        <!-- <div class="swiper-pagination"></div> -->
                    </div>
                </div>

                <div class="row">
                    <div class="d-flex justify-content-center mt-5 align-items-center">
                        <a href="#" class="btn btn-outline-primary px-4 py-2 rounded-pill text-decoration-none">
                            load More

                            <img src="{{ asset('Ikea/src/public/icon/arrow-load.svg') }}" alt="Load More Arrow" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product end -->

    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 d-flex order-2">
                    <div class="hero-heading">
                        <h3>
                            Exquisite Materials for <br />
                            Crafting Exceptional <br />
                            Furniture
                        </h3>
                        <p class="lh-base">
                            Explore our carefully selected materials known for their durability, strength, and exquisite
                            beauty. With these materials, you can create long-lasting, elegant, and highly valuable
                            furniture. Explore our collection of
                            premium materials and start crafting impressive furniture today
                        </p>

                        <a href="#" class="text-decoration-none more d-flex align-items-center">
                            More
                            <img src="{{ asset('Ikea/src/public/icon/arrow-load.svg') }}" class="ms-3"
                                alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-flex order-1">
                    <div class="mt-5">
                        <img src="{{ asset('Ikea/src/public/img/hero-2.png') }}" class="d-block img-fluid"
                            alt="hero" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('after-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
@endpush


@push('after-script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper category -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            // pagination: {
            //   el: ".swiper-pagination",
            //   clickable: true,
            // },

            autoplay: {
                delay: 3500,
                disableOnInteraction: true,
            },
            breakpoints: {
                460: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },

                // 640: {
                //   slidesPerView: 2,
                //   spaceBetween: 20,
                // },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },

                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            },
        });
    </script>

    <!--  -->
    <script>
        var swiper = new Swiper(".mySwiper2", {
            slidesPerView: 1,
            spaceBetween: 10,
            // pagination: {
            //   el: ".swiper-pagination",
            //   clickable: true,
            // },

            autoplay: {
                delay: 3500,
                disableOnInteraction: true,
            },
            breakpoints: {
                460: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },

                // 640: {
                //   slidesPerView: 2,
                //   spaceBetween: 20,
                // },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },

                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },

                1200: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            },
        });
    </script>

    <script>
        window.onscroll = () => {
            const navbar = document.getElementById("navbar");
            const navtop = navbar.offsetTop;

            if (window.pageYOffset > navtop) {
                // ini untuk cek pageYoffsetnya math.round itu angka yang mendekati pembulatan
                // console.log(Math.round(window.pageYOffset));

                navbar.classList.add("navbarScroll");
                navbar.classList.remove("navbarNo");
            } else {
                navbar.classList.remove("navbarScroll");
                navbar.classList.add("navbarNo");
            }
        };
    </script>
@endpush
