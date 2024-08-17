@extends('admin.layouts.master')
@section('title', 'Payments')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All Payments</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>


                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Payments</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div>
                <a href={{ route('admin.payments.create') }} class="btn btn-dark mb-3">Create</a>
            </div>
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
                                                    <th> Payment Name </th>
                                                    <th> Phone Number </th>
                                                    <th> Owner Name </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($payments as $p)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $p->payment_name }}</td>

                                                        <td>{{ $p->phone_no }}</td>
                                                        <td>{{ $p->owner_name }}</td>
                                                        <td> <a href="{{ route('admin.payments.edit', $p->id) }}"
                                                                class="btn btn-sm mt-1  btn-info">Edit</a>
                                                            <a href="{{ route('admin.payments.show', $p->id) }}"
                                                                class="btn btn-sm mt-1  btn-primary">Show</a>
                                                            <form action="{{ route('admin.payments.destroy', $p->id) }}"
                                                                class="d-inline" method="POST">
                                                                @method('DELETE')@csrf
                                                                <input type="submit" value="Delete"
                                                                    class="btn btn-sm mt-1 btn-danger">
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
