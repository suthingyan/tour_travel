@extends('admin.layouts.master')
@section('title', 'Edit Package')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All Packages</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>


                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Packages</li>
                <li class="breadcrumb-item active">Edit {{ $package->name }}</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')

    <section class="section dashboard">
        <div class="row">
            <div>
                <a href="{{ route('admin.packages.index') }}" class="btn btn-dark mb-3">All packages</a>
            </div>
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Edit Product</h5>

                    <form method="POST" class="row g-3 needs-validation" novalidate
                        action="{{ route('admin.packages.update', $package->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <label for="inputNumber" class="col-sm-2 col-form-label text-dark">Package Image</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="image" type="file"
                                accept="image/jpeg,image/png,image/jpg,image/gif">
                            <div class="invalid-feedback">Please upload your product image.</div>
                        </div>
                        <div class="col-sm-5">
                            <img alt="{{ $package->name }}" class="image-thumbnail w-100"
                                src="{{ asset('images/packages/' . $package->image) }}">
                        </div>

                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Package Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $package->name }}"
                                id="name" required>
                            <div class="invalid-feedback">Please enter your product name.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Package Duration</label>
                            <input type="text" class="form-control" name="time" value="{{ $package->time }}"
                                id="name" required>
                            <div class="invalid-feedback">Please enter your product name.</div>
                        </div>
                        <div class="col-md-12 mb-3 input-group has-validation">
                            <span class="input-group-text">MMK</span>
                            <input type="number" name="price" value="{{ $package->price }}" class="form-control"
                                required>
                            <span class="input-group-text">.00</span>
                            <div class="invalid-feedback">Please enter your price.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Package Tag</label>
                            <select name="tag_id" id="inputState" class="form-select">
                                @foreach ($tags as $tag)
                                    <option {{ $tag->id == $package->tag_id ? 'selected' : '' }}
                                        value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please enter your price.</div>

                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Package Destination</label>
                            <select name="category_id" id="inputState" class="form-select">
                                @foreach ($categories as $category)
                                    <option {{ $category->id == $package->category_id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please enter your price.</div>

                        </div>
                        <textarea name="description" >{{ $package->description }}</textarea>
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
