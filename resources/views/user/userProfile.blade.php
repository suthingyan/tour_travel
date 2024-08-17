@extends('user.master')
@section('success')
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endsection
@section('content')
    <div class="untree_co-section" style="padding-bottom: 15rem;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 text-center pt-5">
                    <div class="card">
                        <div class="offer_1li1 text-white fw-bold card-header">
                            Edit Profile
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('updateProfile', auth()->user()->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    @if (auth()->user()->image == null)
                                        <center><img src="{{ asset('user/assets/images/userProfile.png') }}"
                                                class="w-25 h-25" alt="User Profile"></center>
                                    @else
                                        <img src="{{ asset('images/users/' . auth()->user()->image) }}" class="w-25 h-25"
                                            alt="{{ auth()->user()->name }}">
                                    @endif
                                    <input type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/gif">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ auth()->user()->name }}" id="name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ auth()->user()->email }}" id="email">
                                </div>
                                <button type="submit" class="button px-3" style="border: unset">Update Profile</a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 text-center pt-5">
                    <div class="card">
                        <div class="card-header offer_1li1 text-white fw-bold">
                            Change Password
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('changePwd', auth()->user()->id) }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="old_password" class="form-label">Old Password</label>
                                    <input type="password" name="old_password"
                                        class="form-control @error('old_password') is-invalid @enderror" id="old_password">
                                    @error('old_password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" name="new_password"
                                        class="form-control @error('new_password') is-invalid @enderror" id="new_password">
                                    @error('new_password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                    <input type="password" name="new_password_confirmation" class="form-control"
                                        id="new_password_confirmation">
                                </div>
                                <button type="submit" class="button px-3" style="border: unset">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-lg-12 col-md-12 text-center">
                <div class="card pb-5">
                    <div class="card-header offer_1li1 text-white fw-bold">
                        Your Order Lists
                    </div>
                    <div class="card-body mb-5 pb-5">
                        <table class="table display" style="width:100%" id="datatable">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Order Number </th>
                                    <th> Product Name </th>
                                    <th> Qty & Price </th>
                                    <th> Total Price </th>
                                    <th> Total Qty </th>
                                    <th> Order Date </th>
                                    <th> Note </th>
                                    <th> Status </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $o)
                                    <tr class="align-middle">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $o->order_no }}</td>
                                        <td>
                                            @foreach ($o->package_ids as $index => $product)
                                                {{ $product->name }} ({{ $product->name }})
                                                @if ($index < count($o->package_ids) - 1)
                                                    <hr class="text-primary border-2">
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($o->package_ids as $index => $product)
                                                {{ $o->package_quantities[$index] }} x MMK
                                                {{ number_format($o->package_prices[$index], 2) }}
                                                @if ($index < count($o->package_ids) - 1)
                                                    <hr class="text-primary border-2">
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>MMK {{ $o->total_amt }}</td>
                                        <td>{{ $o->total_qty }}</td>
                                        <td>{{ $o->created_at->format('Y-m-d H:i:s') }}</td>
                                        <td>{{ $o->note }}</td>
                                        <td
                                            class="{{ $o->status == 'Pending' ? 'text-warning' : 'text-success' }} fw-bold">
                                            {{ $o->status }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
