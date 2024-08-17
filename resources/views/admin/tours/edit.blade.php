@extends('admin.layouts.master')
@section('title', 'Edit Package')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All Tours Guide</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Tour</li>
                <li class="breadcrumb-item active">Edit {{ $tour->name }}</li>
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

                    <h5 class="card-title">Edit Tour</h5>

                    <form method="POST" class="row g-3 needs-validation" novalidate
                        action="{{ route('admin.guides.update', $tour->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <label for="inputNumber" class="col-sm-2 col-form-label">Guide Image</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="image" type="file"
                                accept="image/jpeg,image/png,image/jpg,image/gif">
                            <div class="invalid-feedback">Please upload your product image.</div>
                        </div>
                        <div class="col-sm-5">
                            <img alt="{{ $tour->name }}" class="image-thumbnail w-100"
                                src="{{ asset('images/tours/' . $tour->image) }}">
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Guide Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $tour->name }}"
                                id="name" required>
                            <div class="invalid-feedback">Please enter your product name.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Phone No</label>
                            <input type="text" class="form-control" name="phone_no" value="{{ $tour->phone_no }}"
                                id="name" required>
                            <div class="invalid-feedback">Please enter your product name.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Facebook</label>
                            <input type="text" class="form-control" name="facebook_link"
                                value="{{ $tour->facebook_link }}" id="name" required>
                            <div class="invalid-feedback">Please enter your product name.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Twitter</label>
                            <input type="text" class="form-control" name="twitter_link" value="{{ $tour->twitter_link }}"
                                id="name" required>
                            <div class="invalid-feedback">Please enter your product name.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Instagram</label>
                            <input type="text" class="form-control" name="instagram_link"
                                value="{{ $tour->instagram_link }}" id="name" required>
                            <div class="invalid-feedback">Please enter your product name.</div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark">Update</button>
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
