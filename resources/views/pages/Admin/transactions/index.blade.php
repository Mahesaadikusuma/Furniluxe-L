@extends('layouts.Admin.Main')

@section('title', 'All Transactions')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Transactions</h3>
                    <!-- <p class="text-subtitle text-muted">All Products</p> -->
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"></a>Dashboard</li>
                            <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="button my-3">
            <!-- <a href="TambahProduct.html" class="btn btn-primary">+ Product</a> -->
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">Transactions</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-lg" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($transactions as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('Dashboard/assets/images/samples/motorcycle.jpg') }}"
                                                alt="" width="100" />
                                        </td>
                                        <td>{{ $item->user->name }}</td>
                                        @foreach ($item->product as $product)
                                            <td>{{ $product->name }}</td>

                                            <td>Rp {{ number_format($product->price) }}</td>
                                        @endforeach



                                        <td>
                                            @if ($item->transaction_status == 'SUCCESS')
                                                <span class="badge text-bg-success">{{ $item->transaction_status }}</span>
                                            @elseif ($item->transaction_status == 'PENDING')
                                                <span class="badge text-bg-warning">{{ $item->transaction_status }}</span>
                                            @elseif ($item->transaction_status == 'FAILED')
                                                <span class="badge text-bg-danger">{{ $item->transaction_status }}</span>
                                            @endif

                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</td>

                                        <td>
                                            <a href="{{ route('transaction.show', $item->id) }}"
                                                class="badge bg-primary text-white">Watch</a>

                                            <a href="{{ route('transaction.edit', $item->id) }}"
                                                class="badge bg-warning">Update</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>

@endsection


@push('after-style')
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/css/pages/fontawesome.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('Dashboard/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/css/pages/datatables.css') }}" />
@endpush

@push('after-script')
    <script src="{{ asset('Dashboard/assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>

    <script src="{{ asset('Dashboard/assets/js/pages/datatables.js') }}"></script>
@endpush
