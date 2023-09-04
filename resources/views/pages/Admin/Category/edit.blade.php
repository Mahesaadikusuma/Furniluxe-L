@extends('layouts.Admin.Main')

@section('title', 'Edit Category')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Category</h3>
                    <p class="text-subtitle text-muted"></p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="Category.html">Category</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Vertical form layout section start -->
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Category</h4>
                        </div>

                        <!-- INPUT START -->
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('categories.update', $item->id) }}" class="form form-vertical"
                                    enctype="multipart/form-data" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Name</label>
                                                    <input type="text" id="first-name-vertical" class="form-control"
                                                        name='name' name="fname" placeholder="Name"
                                                        value="{{ $item->name }}" />
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="formFileMultiple" class="form-label">Photo</label>
                                                    <input class="form-control" type="file" id="formFileMultiple"
                                                        name="photo" multiple />
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end my-3">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- INPUT END -->
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic Vertical form layout section end -->
    </div>

@endsection
