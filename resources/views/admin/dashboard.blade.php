@extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title"> Dashboard </h3>
        {{-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Charts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chart-js</li>
            </ol>
        </nav> --}}
    </div>
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col-xxl-4 col-md-4">
            <div class="card info-card customers-card">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="card-body">
                            <h5 class="card-title">Total Categories</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bxs-customize"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $categories }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-md-4">
            <div class="card info-card revenue-card">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="card-body">
                            <h5 class="card-title">Total Packages</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bxs-shopping-bags"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $package }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-md-4">
            <div class="card info-card sales-card">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="card-body">
                            <h5 class="card-title">Total Payment Types</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ri-secure-payment-line"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $payments }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-4 col-md-4">
            <div class="card info-card customers-card">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-bounding-box"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $users }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-md-4">
            <div class="card info-card revenue-card">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="card-body">
                            <h5 class="card-title">Total Orders</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $orders }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
