@extends('layouts.Admin.Main')

@section('title', 'Transactions Update Detail')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Transaction Update Detail</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('transaction.index') }}">Transaction</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Transaction Update Detail</li>
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
                            <h4 class="card-title">{{ $items->code }} </h4>
                            <span>Your Transaction Update Detail</span>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('transaction.update', $items->id) }}" class="form" method="POST">
                                    @method('put')
                                    @csrf

                                    <div class="row">

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                {{-- Dashboard/assets/images/samples/motorcycle.jpg --}}
                                                @foreach ($items->product as $item)
                                                    <img src="{{ asset(Storage::url($item->image)) }}" @endforeach
                                                    alt="" width="300" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Customer Name</label>
                                                <input type="text" id="first-name-column" class="form-control"
                                                    placeholder="First Name" name="name" disabled
                                                    value="{{ $items->user->name }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="full-name-column">Product Name</label>
                                                <input type="text" id="full-name-column" class="form-control" disabled
                                                    placeholder="full Name" name="fname-column"
                                                    @foreach ($items->product as $item)
                                                        
                                                    value='{{ $item->name }}' @endforeach />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column">Email</label>
                                                <input type="email" id="email-id-column" class="form-control" disabled
                                                    name="email-id-column" placeholder="Email"
                                                    value="{{ $items->user->email }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">City</label>
                                                <input type="text" id="city-column" class="form-control" disabled
                                                    placeholder="City" name="city-column"
                                                    value='{{ $items->user->setting->kota }}' />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="province">Province</label>
                                                <input type="text" id="province" class="form-control" disabled
                                                    name="province" placeholder="province"
                                                    value='{{ $items->user->setting->kota }}' />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="no_hp">No Hp</label>
                                                <input type="number" id="no_hp" class="form-control" name="no_hp"
                                                    placeholder="87766757" disabled
                                                    value='{{ $items->user->setting->no_hp }}' />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Status</label>
                                                <select class="form-select" name="transaction_status" id="">
                                                    <option selected value="{{ $items->transaction_status }}">
                                                        jangan diubah {{ $items->transaction_status }}</option>

                                                    <option
                                                        value="SUCCESS
                                                    {{ old('transaction_status') === 'SUCCESS' ? 'selected' : '' }} 
                                                    ">
                                                        SUCCESS</option>

                                                    <option
                                                        value="FAILED 
                                                    {{ old('transaction_status') === 'FAILED' ? 'selected' : '' }}
                                                    ">
                                                        FAILED</option>

                                                    <option
                                                        value="PENDING
                                                    {{ old('transaction_status') === 'PENDING' ? 'selected' : '' }}
                                                    ">
                                                        PENDING</option>
                                                </select>

                                                {{-- <input type="text" id="city-column" class="form-control" placeholder=""
                                                    name="transaction_status" value='{{ $items->transaction_status }}' /> --}}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Input Resi</label>
                                                <input type="text" id="city-column" class="form-control" placeholder=""
                                                    name="resi"
                                                    value='{{ old('resi', $items->detail->resi ?? null) }}"' />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Price</label>
                                                <input type="text" id="city-column" class="form-control"
                                                    placeholder="City" name="city-column" disabled
                                                    @foreach ($items->product as $item)
                                                        value='Rp. {{ number_format($item->price) }}' @endforeach />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Quantity</label>
                                                <input type="number" id="city-column" class="form-control" disabled
                                                    placeholder="City" name="city-column" value="{{ $items->qty }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Total Price</label>
                                                <input type="text" id="city-column" class="form-control" disabled
                                                    placeholder="City" name="city-column"
                                                    value='Rp. {{ number_format($items->transaction_total) }}' />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Etimated Delevery</label>
                                                <input type="text" id="city-column" class="form-control"
                                                    placeholder="" name="estimated_delevery"
                                                    value='{{ old('estimated_delevery', $items->detail->estimated_delevery ?? null) }}' />
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea id="dark" cols="30" rows="10" disabled>

                                                    {!! $items->user->setting->alamat !!}
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>

                                        </div>
                                    </div>
                                </form>

                                {{ $items->detail }}
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
