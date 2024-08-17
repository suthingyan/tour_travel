@extends('admin.layouts.master')
@section('title', 'Create Payment')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All Admins</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>


                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Payment</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')

    <section class="section dashboard">
        <div class="row">
            <div>
                <a href="{{ route('admin.payments.index') }}" class="btn btn-dark mb-3">All Payments</a>
            </div>
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Create New Payment</h5>

                    <form method="POST" class="row g-3 needs-validation" novalidate
                        action="{{ route('admin.payments.store') }}">
                        @csrf
                        <div class="col-md-12 mb-3 input-group has-validation">
                            <input type="text" class="form-control" name="payment_name" placeholder="Your Payment Name"
                                id="name" required>
                            <div class="invalid-feedback">Please enter your payment name.</div>
                        </div>
                        <div class="col-md-12 mb-3 input-group has-validation">
                            <input type="number" class="form-control" name="phone_no"
                                placeholder="Your Payment Phone Number" id="name" required>
                            <div class="invalid-feedback">Please enter your phone number.</div>
                        </div>
                        <div class="col-md-12 mb-3 input-group has-validation">
                            <input type="text" class="form-control" name="owner_name"
                                placeholder="Your Payment Owner Name" id="name" required>
                            <div class="invalid-feedback">Please enter your owner name.</div>
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
