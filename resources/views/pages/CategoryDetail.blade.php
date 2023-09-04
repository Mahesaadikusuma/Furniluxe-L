@extends('layouts.Main2')

@section('title', 'Category ')

@section('content')
    <!-- carousel -->
    <section style="margin-top: 150px; margin-bottom: 100px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('Ikea/src/public/img/carousel-1.png') }}" class="d-block w-100"
                                    alt="..." />
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('Ikea/src/public/img/carousel-2.png') }}" class="d-block w-100"
                                    alt="..." />
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('Ikea/src/public/img/carousel-3.png') }}" class="d-block w-100"
                                    alt="..." />
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- carousel end -->

    <!-- Category -->
    <section class="category">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-start">Category Product {{ $category->name }}</h2>
                </div>
            </div>

            <div class="row">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($categories as $item)
                            <div class="swiper-slide">
                                <a href="{{ route('categoryDetail', $item->slug) }}" class="text-decoration-none">
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
                    <h2 class="text-start">Product {{ $category->name }}</h2>
                    {{-- <p>{{ $category }}</p> --}}
                </div>

                <div class="row">
                    @foreach ($product as $item)
                        <div class="col-12 col-lg-4">
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
                                            <a href="{{ route('detail', $item->slug) }}" class="btn btn-Buy">Buy Now</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- ini bootsrap --}}
                    <div class="mt-5">{{ $product->onEachSide(5)->links() }}</div>

                    {{-- {{ $product->links('vendor.pagination.tailwind') }} --}}
                </div>



            </div>
        </div>
    </section>
    <!-- product end -->
@endsection

@push('after-style')
    <!-- SWIPPER -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
@endpush


@push('after-script')
    <!-- Swiper JS -->
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
                delay: 5500,
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
@endpush
