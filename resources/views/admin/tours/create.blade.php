@extends('admin.layouts.master')
@section('title', 'Create Package')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All Tours Guide</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Tour</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')

    <section class="section dashboard">
        <div class="row">
            <div>
                <a href="{{ route('admin.guides.index') }}" class="btn btn-dark mb-3">All Tour Guide</a>
            </div>
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Create New Product</h5>

                    <form method="POST" class="row g-3 needs-validation" novalidate
                        action="{{ route('admin.guides.store') }}" enctype="multipart/form-data">
                        @csrf
                        <label for="inputNumber" class="col-sm-2 col-form-label">Guide Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="image" type="file"
                                accept="image/jpeg,image/png,image/jpg,image/gif" required>
                            <div class="invalid-feedback">Please upload your guide image.</div>
                        </div>
                        <div class="col-md-12 mb-3 input-group has-validation">
                            <input type="text" class="form-control" name="name" placeholder="Your Guide Name"
                                id="name" required>
                            <div class="invalid-feedback">Please enter your guide name.</div>
                        </div>
                        <div class="col-md-12 mb-3 input-group has-validation">
                            <input type="text" class="form-control" name="phone_no" placeholder="Your Guide Phone No"
                                id="name" required>
                            <div class="invalid-feedback">Please enter your guide phone no.</div>
                        </div>
                        <div class="col-md-12 mb-3 input-group has-validation">
                            <input type="text" class="form-control" name="facebook_link"
                                placeholder="Your Guide Facebook Link" id="name" required>
                            <div class="invalid-feedback">Please enter your guide facebook link.</div>
                        </div>
                        <div class="col-md-12 mb-3 input-group has-validation">
                            <input type="text" class="form-control" name="twitter_link"
                                placeholder="Your Guide Twitter Link" id="name" required>
                            <div class="invalid-feedback">Please enter your guide twitter link.</div>
                        </div>
                        <div class="col-md-12 mb-3 input-group has-validation">
                            <input type="text" class="form-control" name="instagram_link"
                                placeholder="Your Guide Instagram Link" id="name" required>
                            <div class="invalid-feedback">Please enter your guide instagram link.</div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark">Create</button>
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
            placeholder: 'Enter your product description here ...'
        });
    </script>
@endsection
