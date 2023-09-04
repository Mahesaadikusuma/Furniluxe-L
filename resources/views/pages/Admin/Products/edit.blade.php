@extends('layouts.Admin.Main')

@section('title', 'Edit Product')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Product</h3>
                    <p class="text-subtitle text-muted"></p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="Product.html">Product</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
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

        <!-- Basic Vertical form layout section start -->
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Product</h4>
                        </div>

                        <!-- INPUT START -->
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('products.update', $item->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Name</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="name" placeholder="Name" value="{{ $item->name }}" />
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="select-Product">Category</label>
                                                <select class="choices form-select" id="select-Product"
                                                    name="categories_id">
                                                    <option value="{{ $item->categories_id }}" selected>
                                                        {{ $item->category->name }}</option>
                                                    @foreach ($category as $items)
                                                        <option value="{{ $items->id }}">
                                                            {{ $items->name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 my-2">
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="number" id="Price" class="form-control" name="price"
                                                    placeholder="" value="{{ $item->price }}" />
                                            </div>
                                        </div>

                                        <div class="col-12 my-2">
                                            <div class="form-group">
                                                <label for="stok">Stok</label>
                                                <input type="number" id="stok" class="form-control" name="stok"
                                                    placeholder="" value="{{ $item->stok }}" />
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="formFileMultiple" class="form-label">Thumbnail</label>
                                                <input class="form-control" type="file" id="formFileMultiple"
                                                    name="image" multiple />
                                            </div>
                                        </div>

                                        <div class="col-12 my-2">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea id="dark" name="description" cols="30" rows="10">
                                                    {!! $item->description !!}

                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end my-2">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        {{ $item }}

    </div>

@endsection

@push('before-style')
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/extensions/choices.js/public/assets/styles/choices.css') }}" />
@endpush

@push('after-script')
    <script src="{{ asset('Dashboard/assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('Dashboard/assets/js/pages/form-element-select.js') }}"></script>

    <script src="{{ asset('Dashboard/assets/extensions/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('Dashboard/assets/js/pages/tinymce.js') }}"></script>
@endpush
