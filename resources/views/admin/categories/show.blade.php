@extends('admin.layouts.master')
@section('title', 'Category')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title"> <a href="{{ route('admin.categories.index') }}" class="btn btn-dark">All Categories</a></h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Categories</li>
                <li class="breadcrumb-item active">{{ $category->name }}</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">{{ $category->name }}</h5>

                    <!-- No Labels Form -->
                    <form class="row g-3 needs-validation" novalidate>
                        @csrf
                        <div class="col-sm-5">
                            <img alt="{{ $category->name }}" class="image-thumbnail w-100"
                                src="{{ asset('images/categories/' . $category->image) }}">
                        </div>
                        <div class="col-md-12 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Categor Name</label>
                            <input type="text" class="form-control" name="name" readonly value="{{ $category->name }}"
                                id="name" required>
                            <div class="invalid-feedback">Please enter your category name.</div>
                        </div>
                    </form><!-- End No Labels Form -->
                </div>
            </div>
        </div>
    </section>
@endsection
