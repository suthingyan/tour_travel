@extends('admin.layouts.master')
@section('title', 'Edit Category')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All Admins</h3>
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
            <div>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-dark mb-3">All Categories</a>
            </div>
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Edit Category</h5>

                    <!-- No Labels Form -->
                    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}"
                        class="row g-3 needs-validation" novalidate>
                        @method('PATCH')
                        @csrf
                        <div class="col-md-12 input-group has-validation">
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
