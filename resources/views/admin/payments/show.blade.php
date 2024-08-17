@extends('admin.layouts.master')
@section('title', 'Payment')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title"> <a href="{{ route('admin.payments.index') }}" class="btn btn-dark">All Payments</a>
        </h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>


                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Payment</li>
                <li class="breadcrumb-item active">{{ $payment->payment_name }}</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')

    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">{{ $payment->payment_name }}</h5>

                    <form method="POST" class="row g-3 needs-validation" novalidate
                        action="{{ route('admin.payments.store') }}">
                        @csrf
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Payment Name</label>
                            <input type="text" class="form-control" name="payment_name" readonly
                                value="{{ $payment->payment_name }}" placeholder="Your Payment Name" id="name"
                                required>
                            <div class="invalid-feedback">Please enter your payment name.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Phone Number</label>
                            <input type="number" class="form-control" name="phone_no" readonly
                                value="{{ $payment->phone_no }}" placeholder="Your Payment Phone Number" id="name"
                                required>
                            <div class="invalid-feedback">Please enter your phone number.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Owner Name</label>
                            <input type="text" class="form-control" name="owner_name" readonly
                                value="{{ $payment->owner_name }}" placeholder="Your Payment Owner Name" id="name"
                                required>
                            <div class="invalid-feedback">Please enter your owner name.</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
