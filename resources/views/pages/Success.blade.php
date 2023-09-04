@extends('layouts.Success')

@section('title', 'Success Checkout')

@section('content')
    <!-- Main -->
    <section class="mainContent pageSuccess">
        <div class="container">
            <div class="row row-login">
                <div class="col-12">
                    <div class="success text-center">
                        <img src="{{ asset('Ikea/src/public/img/success.svg') }}" alt="" class="mb-4" />

                        <h2>Transaction Processed!</h2>
                        <p class="text-muted fs-6">
                            Silahkan cek kembali pesanan anda dan <br />
                            kami akan menginformasikan resi secepat mungkin!
                        </p>

                        <div>
                            <a class="btn btn-primary w-25 mt-4" href="{{ route('dashboard') }}"> My Dashboard </a>
                        </div>
                        <a class="btn btn-signup w-25 mt-2" href="{{ route('home') }}"> Go To Shopping </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main End -->
@endsection
