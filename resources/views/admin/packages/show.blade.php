@extends('admin.layouts.master')
@section('title', 'Package')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All Packages</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Packages</li>
                <li class="breadcrumb-item active">{{ $package->name }}</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')

    <section class="section dashboard">
        <div class="row">
            <div>
                <a href="{{ route('admin.packages.index') }}" class="btn btn-dark mb-3">All Packages</a>
            </div>
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">{{ $package->name }}</h5>

                    <form method="POST" class="row g-3 needs-validation" novalidate
                        action="{{ route('admin.packages.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-5">
                            <img alt="{{ $package->name }}" class="image-thumbnail w-100"
                                src="{{ asset('images/packages/' . $package->image) }}">
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Package Name</label>
                            <input readonly type="text" value="{{ $package->name }}" class="form-control" name="name"
                                placeholder="Your Product Name" id="name" required>
                            <div class="invalid-feedback">Please enter your product name.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Package Duration</label>
                            <input readonly type="text" value="{{ $package->time }}" class="form-control" name="time"
                                placeholder="Your Product Name" id="name" required>
                            <div class="invalid-feedback">Please enter your product name.</div>
                        </div>
                        <div class="col-md-12 mb-3 input-group has-validation">
                            <span class="input-group-text">MMK</span>
                            <input readonly type="number" value="{{ $package->price }}" name="price" class="form-control"
                                required>
                            <span class="input-group-text">.00</span>
                            <div class="invalid-feedback">Please enter your price.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Package Tag</label>
                            <select readonly name="tag_id" id="inputState" class="form-select">
                                <option>{{ $package->tag->name }}</option>
                            </select>
                            <div class="invalid-feedback">Please enter your price.</div>

                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Package Destination</label>
                            <select readonly name="category_id" id="inputState" class="form-select">
                                <option>{{ $package->category->name }}</option>
                            </select>
                            <div class="invalid-feedback">Please enter your price.</div>

                        </div>
                        <textarea name="description" id="mytextarea">{{ $package->description }}</textarea>
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
