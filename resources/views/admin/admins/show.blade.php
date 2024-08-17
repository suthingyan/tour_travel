@extends('admin.layouts.master')
@section('title', 'User')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title"> <a href="{{ route('admin.admins.index') }}" class="btn btn-dark">All Admins</a>
        </h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active">{{ $admin->name }}</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img class="rounded-circle" width="100px" height="100px"
                            src="{{ asset($admin->image ? 'images/admins/' . $admin->image : 'images/user_default.webp') }}"
                            alt="{{ $admin->name }}">
                        <h2>{{ $admin->name }}</h2>
                        <h3 class="text-success">{{ $admin->email }}</h3>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
