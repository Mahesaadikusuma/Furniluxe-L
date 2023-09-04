@extends('layouts.Admin.Main')

@section('title', 'Category')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Category</h3>
                    <p class="text-subtitle text-muted">All Category</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"></a>Dashboard</li>
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="button my-3">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Category</a>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">Category</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-lg" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>



                                            <img src="{{ asset(Storage::url($item->photo)) ?? 'none' }}" alt=""
                                                width="100px">


                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->slug }}</td>

                                        <td>
                                            <span onclick="window.location='{{ route('categories.edit', $item->id) }}'"
                                                style="cursor: pointer" class="badge bg-success">update</span>


                                            <form action="{{ route('categories.destroy', $item->id) }} }}" method="post"
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

                        {{ $category }}
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
