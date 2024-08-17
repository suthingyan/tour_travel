@extends('admin.layouts.master')
@section('title', 'Edit Tag')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title"> <a href="{{ route('admin.tags.index') }}" class="btn btn-dark">All Tags</a></h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Tags</li>
                <li class="breadcrumb-item active">Edit {{ $tag->name }}</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Edit Tag</h5>

                    <!-- No Labels Form -->
                    <form method="POST" action="{{ route('admin.tags.update', $tag->id) }}"
                        class="row g-3 needs-validation" novalidate>
                        @method('PATCH')
                        @csrf
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Tag Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $tag->name }}"
                                id="name" required>
                            <div class="invalid-feedback">Please enter your tag name.</div>
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
