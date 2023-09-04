@extends('layouts.Admin.Main')

@section('title', 'Transactions Detail')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Transaction Detail {{ $datail->user->name }}</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('transaction.index') }}">Transaction</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Transaction Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Bootstrap Select end -->

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ $datail->code }} </h4>
                            <span>Your Transaction Detail</span>
                        </div>

                        <div class="card-content">
                            <div class="card-body">
                                <form class="form">
                                    <div class="row">

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                {{-- Dashboard/assets/images/samples/motorcycle.jpg --}}
                                                @foreach ($datail->product as $item)
                                                    <img src="{{ asset(Storage::url($item->image)) }}" @endforeach
                                                    alt="" width="300" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Customer Name</label>
                                                <input type="text" id="first-name-column" class="form-control"
                                                    placeholder="First Name" name="name" disabled
                                                    value="{{ $datail->user->name }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="full-name-column">Product Name</label>
                                                <input type="text" id="full-name-column" class="form-control" disabled
                                                    placeholder="full Name" name="fname-column"
                                                    @foreach ($datail->product as $item)
                                                        
                                                    value='{{ $item->name }}' @endforeach />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column">Email</label>
                                                <input type="email" id="email-id-column" class="form-control" disabled
                                                    name="email-id-column" placeholder="Email"
                                                    value="{{ $datail->user->email }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">City</label>
                                                <input type="text" id="city-column" class="form-control" disabled
                                                    placeholder="City" name="city-column"
                                                    value='{{ $datail->user->setting->kota }}' />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="province">Province</label>
                                                <input type="text" id="province" class="form-control" disabled
                                                    name="province" placeholder="province"
                                                    value='{{ $datail->user->setting->kota }}' />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="no_hp">No Hp</label>
                                                <input type="number" id="no_hp" class="form-control" name="no_hp"
                                                    placeholder="87766757" disabled
                                                    value='{{ $datail->user->setting->no_hp }}' />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Status</label>
                                                <input type="text" id="city-column" class="form-control" disabled
                                                    placeholder="" name="city-column"
                                                    value='{{ $datail->transaction_status }}' />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Input Resi</label>
                                                <input type="text" id="city-column" class="form-control" disabled
                                                    placeholder="" name="city-column"
                                                    value='{{ $datail->detail->resi ?? null }}' />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Price</label>
                                                <input type="text" id="city-column" class="form-control"
                                                    placeholder="City" name="city-column" disabled
                                                    @foreach ($datail->product as $item)
                                                        value='Rp. {{ number_format($item->price) }}' @endforeach />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Quantity</label>
                                                <input type="number" id="city-column" class="form-control" disabled
                                                    placeholder="City" name="city-column" value="{{ $datail->qty }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Total Price</label>
                                                <input type="text" id="city-column" class="form-control" disabled
                                                    placeholder="City" name="city-column"
                                                    value='Rp. {{ number_format($datail->transaction_total) }}' />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Etimated Delevery</label>
                                                <input type="text" id="city-column" class="form-control" disabled
                                                    placeholder="" name="city-column"
                                                    value='{{ $datail->detail->estimated_delevery ?? null }}' />
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea id="dark" disabled cols="30" rows="10">

                                                    {!! $datail->user->setting->alamat !!}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                {{ $datail->detail }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

@endsection

@push('after-script')
    <script src="{{ asset('Dashboard/assets/extensions/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('Dashboard/assets/js/pages/tinymce.js') }}"></script>
@endpush
