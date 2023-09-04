@extends('layouts.Admin.Main')

@section('title', 'Products Gallery')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Products Gallery</h3>
                    <p class="text-subtitle text-muted">All Products Gallery</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"></a>Dashboard</li>
                            <li class="breadcrumb-item active" aria-current="page">Products Gallery</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="button my-3">
            <a href="{{ route('gallery.create') }}" class="btn btn-primary">+ Products Gallery</a>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">Products Gallery</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-lg" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Photo</th>
                                    <th>Name Product</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gallery as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            @if (!Storage::exists($item->photo))
                                                <img src="{{ asset(Storage::url($item->photo)) }}" alt=""
                                                    width="100">
                                            @else
                                                <span>tidak ada image</span>
                                            @endif

                                            {{-- <img src="{{ asset(Storage::url($item->photo)) }}" alt=""
                                                width="100"> --}}
                                        </td>

                                        <td>{{ $item->product->name ?? 'none' }}</td>


                                        <td>
                                            <span onclick="window.location='{{ route('gallery.edit', $item->id) }}'"
                                                style="cursor: pointer"
                                                class="badge bg-success d-inline-block">update</span>


                                            <form action="{{ route('gallery.destroy', $item->id) }} }}" method="post"
                                                class="d-inline-block">
                                                @method('delete')
                                                @csrf

                                                <button class="badge bg-warning">delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                        {{ $gallery }}
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
    <!-- Need: Apexcharts -->


    <script src="{{ asset('Dashboard/assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>

    <script src="{{ asset('Dashboard/assets/js/pages/datatables.js') }}"></script>
@endpush
