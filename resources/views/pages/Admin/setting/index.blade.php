@extends('layouts.Admin.Main')

@section('title', 'Settings')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Settings</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="product.html"> Settings</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Settings</li>
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
                            <h4 class="card-title">Settings</h4>
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
                                <form action="{{ route('updateOrcreate') }}" class="form" method="POST"
                                    enctype="multipart/form-data">


                                    @csrf
                                    <div class="row">
                                        <div class="card-content pb-4">
                                            <div class="recent-message d-flex px-4 py-3">
                                                <div class="avatar avatar-lg">
                                                    {{-- {{ asset('Dashboard/assets/images/faces/4.jpg') }} --}}
                                                    <img src="{{ $item->setting->avatar
                                                        ? asset(Storage::url($item->setting->avatar))
                                                        : 'https://ui-avatars.com/api/?name=esa+adi/?background=random' }}"
                                                        style="width: 100px; height: 100px" />
                                                </div>
                                                <div class="form-group ms-4">
                                                    <label for="formFileMultiple" class="form-label">Upload Image
                                                        Profile</label>
                                                    <input class="form-control" type="file" id="formFileMultiple"
                                                        name="avatar" multiple />
                                                    <p class="text-muted mt-2">Max 2MB | IMG | JPG | JPEG</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Name</label>
                                                <input type="text" id="first-name-column" class="form-control" disabled
                                                    placeholder="First Name" name="name" value="{{ $item->name }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="full-name-column">Full Name</label>
                                                <input type="text" id="full-name-column" class="form-control"
                                                    placeholder="full Name" name="full_name"
                                                    value="{{ $item->setting->full_name }} " />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column">Email</label>
                                                <input type="email" id="email-id-column" class="form-control" disabled
                                                    placeholder="Email" name="email" value="{{ $item->email }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Kota</label>
                                                <input type="text" id="city-column" class="form-control"
                                                    placeholder="City" name="kota" value="{{ $item->setting->kota }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="country-floating">Provinsi</label>
                                                <input type="text" id="country-floating" class="form-control"
                                                    placeholder="Country" name="province"
                                                    value="{{ $item->setting->province }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="no_hp">No Hp</label>
                                                <input type="number" id="no_hp" class="form-control" name="no_hp"
                                                    placeholder="87766757" value="{{ $item->setting->no_hp }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea id="dark" cols="30" rows="10" name="alamat">
                                                    {{ $item->setting->alamat }}
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-lg-12">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="checkbox5" class="form-check-input"
                                                        checked />
                                                    <label for="checkbox5">Remember Me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>

                                        </div>
                                    </div>
                                </form>

                                {{ $item->setting }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@push('before-style')
    <link rel="stylesheet"
        href="{{ asset('Dashboard/assets/extensions/choices.js/public/assets/styles/choices.css') }}" />
@endpush

@push('after-script')
    <script src="{{ asset('Dashboard/assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('Dashboard/assets/js/pages/form-element-select.js') }}"></script>

    <script src="{{ asset('Dashboard/assets/extensions/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('Dashboard/assets/js/pages/tinymce.js') }}"></script>
@endpush
