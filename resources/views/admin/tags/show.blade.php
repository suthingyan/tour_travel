@extends('admin.layouts.master')
@section('title', 'Tag')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title"> <a href="{{ route('admin.tags.index') }}" class="btn btn-dark">All Tags</a></h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Tags</li>
                <li class="breadcrumb-item active">{{ $tag->name }}</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">{{ $tag->name }}</h5>

                    <!-- No Labels Form -->
                    <form class="row g-3 needs-validation" novalidate>
                        @csrf
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Tag Name</label>
                            <input type="text" class="form-control" name="name" readonly value="{{ $tag->name }}"
                                id="name" required>
                            <div class="invalid-feedback">Please enter your Tag name.</div>
                        </div>
                    </form><!-- End No Labels Form -->
                </div>
            </div>
        </div>
    </section>
@endsection
