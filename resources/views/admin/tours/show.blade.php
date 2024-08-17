@extends('admin.layouts.master')
@section('title', 'Tour')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All Tours Guide</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Tours</li>
                <li class="breadcrumb-item active">{{ $tour->name }}</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')

    <section class="section dashboard">
        <div class="row">
            <div>
                <a href="{{ route('admin.guides.index') }}" class="btn btn-dark mb-3">All Tours</a>
            </div>
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">{{ $tour->name }}</h5>

                    <form method="POST" class="row g-3 needs-validation" novalidate
                        action="{{ route('admin.guides.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-5">
                            <img alt="{{ $tour->name }}" class="image-thumbnail w-100"
                                src="{{ asset('images/tours/' . $tour->image) }}">
                        </div>
                        {{-- <img alt="{{ $tour->name }}" class="image-thumbnail w-100" src="{{ $imageToShow }}"> --}}
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Guide Name</label>
                            <input readonly type="text" value="{{ $tour->name }}" class="form-control" name="name"
                                placeholder="Your Product Name" id="name" required>
                            <div class="invalid-feedback">Please enter your product name.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Phone No</label>
                            <input readonly type="text" value="{{ $tour->phone_no }}" class="form-control" name="time"
                                placeholder="Your Product Name" id="name" required>
                            <div class="invalid-feedback">Please enter your product name.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Facebook</label>
                            <input readonly type="text" value="{{ $tour->facebook_link }}" class="form-control"
                                name="time" placeholder="Your Product Name" id="name" required>
                            <div class="invalid-feedback">Please enter your product name.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Twitter</label>
                            <input readonly type="text" value="{{ $tour->twitter_link }}" class="form-control"
                                name="time" placeholder="Your Product Name" id="name" required>
                            <div class="invalid-feedback">Please enter your product name.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Instagram</label>
                            <input readonly type="text" value="{{ $tour->instagram_link }}" class="form-control"
                                name="time" placeholder="Your Product Name" id="name" required>
                            <div class="invalid-feedback">Please enter your product name.</div>
                        </div>
                        <div class="text-center">
                            {{-- <button type="submit" class="btn btn-dark">Create</button> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            plugins: 'placeholder',
            setup: function(editor) {
                editor.on('init', function() {
                    editor.getContainer().querySelector('.tox-editor-container').style.minHeight =
                        '200px';
                });
            },
            placeholder: 'Enter your content here...'
        });
    </script>
@endsection
