@extends('admin.layouts.master')
@section('title', 'Users')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All Users</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <section class="section">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-body">
                                        <!-- Table with stripped rows -->
                                        <table class="table display" style="width:100%" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th> No </th>
                                                    <th> Name </th>
                                                    <th> Photo </th>
                                                    <th> Email </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $u)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $u->name }}</td>
                                                        <td><img class="rounded-circle" width="50px" height="50px"
                                                                src="{{ asset($u->image ? 'images/users/' . $u->image : 'images/user_default.webp') }}"
                                                                alt="{{ $u->name }}"></td>
                                                        <td>{{ $u->email }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.users.show', $u->id) }}"
                                                                class="btn btn-sm btn-primary">Show</a>
                                                            <form action="{{ route('admin.users.destroy', $u->id) }}"
                                                                class="d-inline" method="POST">
                                                                @method('DELETE')@csrf
                                                                <input type="submit" value="Delete"
                                                                    class="btn btn-sm btn-danger">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- End Table with stripped rows -->

                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
@endsection
