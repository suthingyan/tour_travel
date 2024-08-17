@extends('admin.layouts.master')
@section('title', 'Edit Category')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title"> <a href="{{ route('admin.categories.index') }}" class="btn btn-dark">All Categories</a></h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Categories</li>
                <li class="breadcrumb-item active">Edit {{ $category->name }}</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Edit Category</h5>

                    <!-- No Labels Form -->
                    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}"
                        class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <label for="inputNumber" class="col-sm-2 col-form-label text-dark">Package Image</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="image" type="file">
                            <div class="invalid-feedback">Please upload your product image.</div>
                        </div>
                        <div class="col-sm-5">
                            <img alt="{{ $category->name }}" class="image-thumbnail w-100"
                                src="{{ asset('images/categories/' . $category->image) }}">
                        </div>
                        <div class="col-md-12 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Categor Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}"
                                id="name" required>
                            <div class="invalid-feedback">Please enter your category name.</div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark">Update</button>
                        </div>
                    </form><!-- End No Labels Form -->
                </div>
            </div>
        </div>
    </section>
@endsection
