@extends('admin.layouts.master')
@section('title', 'Create Admin')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All Admins</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>


                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Admins</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div>
                <a href="{{ route('admin.admins.index') }}" class="btn btn-dark mb-3">All Admins</a>
            </div>
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Create New Admin</h5>

                    <form action="{{ route('admin.admins.store') }}" class="row g-3 needs-validation" novalidate
                        method="POST">
                        @csrf
                        <div class="col-12">
                            <label for="yourName" class="form-label">Your Name</label>
                            <input type="text" name="name" class="form-control" id="yourName" required>
                            <div class="invalid-feedback">Please, enter your name!</div>
                        </div>
                        <div class="col-12">
                            <label for="yourUsername" class="form-label">Your Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="email" name="email" class="form-control" id="yourUsername" required>
                                <div class="invalid-feedback">Please, enter your email!</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="yourPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                            <div class="invalid-feedback">Please enter your password!</div>
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
