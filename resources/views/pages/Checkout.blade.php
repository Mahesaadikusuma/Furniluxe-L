@extends('layouts.Main2')

@section('title', 'Checkout Furniluxe')

@section('content')

    <!-- Breadcumb -->
    <section class="breadcumb">
        <div class="container">
            <div class="d-flex">
                <div class="arrow d-flex align-items-center justify-content-center">
                    <a href="">
                        <img src="{{ asset('Ikea/src/public/icon/arrow.svg') }}" class="" alt="" />
                    </a>
                </div>
            </div>

            <div class="mt-3">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb ms-2">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Luminary Chair</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Breadcumb End-->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Main -->
    <section class="mainContent">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="d-lg-flex d-block align-items-center checkout">
                        <div class="">
                            <img src="{{ Storage::url($product->image) }}" alt="" class="rounded-4 w-50" />
                        </div>

                        <div class="Cbody mt-3 mt-lg-0">
                            <h5>{{ $product->name }}</h5>

                            <p class="price">Rp. {{ number_format($product->price) }}</p>

                            <div class="counter">
                                <span class="down" onclick="decreaseCount()">-</span>
                                <input type="text" id="counter" value="{{ $qty }}" readonly />
                                <span class="up" onclick="increaseCount()">+</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">Biodata Anda belum diisi klick <a
                                    href="#">disini</a>, Anda tidak bisa di checkout</div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-5">
                    <div class="card mx-auto d-flex justify-content-center p-3 information">
                        <h2 class="text-start">Checkout Information</h2>
                        <form action="{{ route('checkoutProsess', $product->slug) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <table class="table table-borderless text-center">
                                <tr>
                                    <th class="text-start" style="width: 50%">Price</th>
                                    <td class="text-end price" style="width: 50%">Rp. {{ number_format($product->price) }}
                                    </td>
                                </tr>

                                <tr class="">
                                    <th class="text-start" style="width: 50%">Shipping</th>
                                    <td class="text-end" style="width: 50%">free</td>
                                </tr>

                                <tr class="">
                                    <th class="text-start" style="width: 50%">Tax</th>
                                    <td class="text-end" name='tax' style="width: 50%">Rp. {{ number_format($tax) }}
                                    </td>

                                    <input type="hidden" name="tax" value="{{ $tax }}">
                                </tr>

                                <tr class="">
                                    <th class="text-start" style="width: 50%">Qty</th>
                                    <td class="text-end" id="qty" style="width: 50%">1</td>

                                    <input type="text" name="qty" id="quantity" value="{{ $qty }}"
                                        readonly />
                                </tr>
                            </table>
                            <hr />

                            <table class="table table-borderless text-center">
                                <tr>
                                    <th class="text-start" style="width: 50%">Total</th>
                                    <td class="text-end total" id="transaction_total" style="width: 50%"></td>

                                </tr>
                                <tr>
                                    @php
                                        $totalPrice = $product->price * $qty + $tax;
                                    @endphp
                                    <input type="hidden" id="transaction_total" name="transaction_total"
                                        value="{{ $totalPrice }}">
                                </tr>
                            </table>


                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary py-3" type="button">Checkout Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main End -->
@endsection


@push('after-script')
    <script>
        const hasil = document.querySelector('#counter');
        const qty = document.querySelector('#qty');
        const quantityInput = document.querySelector('#quantity');
        const price = {{ $product->price }}; // Harga produk dari backend Anda
        const tax = {{ $tax }}; // Jumlah pajak dari backend Anda
        let counter = {{ $qty }};

        function formatCurrency(amount) {
            return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(amount)
                .replace(/\D00(?=\D*$)/, '');
        }

        function updateTotalPrice() {
            const totalPrice = (price * counter) + tax;

            const formattedTotalPrice = formatCurrency(totalPrice);
            document.querySelector('#transaction_total').textContent = formattedTotalPrice;
        }

        function increaseCount() {
            counter++;
            hasil.value = counter;
            qty.innerText = counter;

            quantityInput.value = counter;
            console.log(counter);
            updateTotalPrice();
        }

        function decreaseCount() {
            counter--;
            if (counter < 1) {
                counter = 1;
            }
            hasil.value = counter;
            qty.innerText = counter;

            quantityInput.value = counter;
            console.log(counter);
            updateTotalPrice();
        }

        // Perhitungan total harga awal
        updateTotalPrice();
    </script>
@endpush
