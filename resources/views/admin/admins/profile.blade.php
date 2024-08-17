@extends('admin.layouts.master')
@section('title', 'My Profile')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">My Profile</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">My Profile</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-xl-4">

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

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ route('admin.admins.update', $admin->id) }}"
                                    class="row g-3 needs-validation" novalidate method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="col-12">
                                        <label for="inputNumber" class="form-label">Profile Image</label>
                                        <input class="form-control" name="image" type="file"
                                            accept="image/jpeg,image/png,image/jpg,image/gif">
                                        <div class="invalid-feedback">Please upload your product image.</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Your Name</label>
                                        <input type="text" name="name" value="{{ $admin->name }}"
                                            class="form-control" id="yourName" required>
                                        <div class="invalid-feedback">Please, enter your name!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Your Email</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="email" value="{{ $admin->email }}" name="email"
                                                class="form-control" id="yourUsername" required>
                                            <div class="invalid-feedback">Please, enter your email!</div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-dark">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>
                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" name="name" id="" value="{{ $admin->name }}" hidden>
                                    <input type="text" name="email" id="" value="{{ $admin->email }}" hidden>

                                    <!-- Current Password -->
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="password" name="old_password" class="form-control"
                                                id="currentPassword" required>
                                        </div>
                                    </div>

                                    <!-- New Password -->
                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="password" name="password" class="form-control" id="newPassword"
                                                required>
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="row mb-3">
                                        <label for="confirmPassword" class="col-md-4 col-lg-3 col-form-label">Confirm
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="confirmPassword" required>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form>
                                <!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
