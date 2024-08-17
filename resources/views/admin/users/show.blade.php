@extends('admin.layouts.master')
@section('title', 'User')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title"> <a href="{{ route('admin.users.index') }}" class="btn btn-dark">All Users</a>
        </h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">{{ $user->name }}</li>
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
                            src="{{ asset($user->image ? 'images/users/' . $user->image : 'images/user_default.webp') }}"
                            alt="{{ $user->name }}">
                        <h2>{{ $user->name }}</h2>
                        <h3>{{ $user->email }}</h3>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
