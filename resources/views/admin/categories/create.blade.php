@extends('admin.layouts.master')
@section('title', 'Create Category')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title"> <a href="{{ route('admin.categories.index') }}" class="btn btn-dark">All Categories</a>
        </h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Categories</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Create New Category</h5>

                    <!-- No Labels Form -->
                    <form method="POST" action="{{ route('admin.categories.store') }}" class="row g-3 needs-validation"
                        novalidate enctype="multipart/form-data">
                        @csrf
                        <label for="inputNumber" class="col-sm-2 col-form-label">Package Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="image" type="file"
                                accept="image/jpeg,image/png,image/jpg,image/gif" required>
                            <div class="invalid-feedback">Please upload your product image.</div>
                        </div>
                        <div class="col-md-12 input-group has-validation">
                            <input type="text" class="form-control" name="name" placeholder="Your Category Name"
                                id="name" required>
                            <div class="invalid-feedback">Please enter your category name.</div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark">Create</button>
                        </div>
                    </form><!-- End No Labels Form -->
                </div>
            </div>
        </div>
    </section>
@endsection
