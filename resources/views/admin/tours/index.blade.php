@extends('admin.layouts.master')
@section('title', 'Tours')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All Tours Guide</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>

                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Tours Guide</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div>
                <a href={{ route('admin.guides.create') }} class="btn btn-dark mb-3">Create</a>
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
                                        <table class="table table-striped" style="width:100%" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th> No </th>
                                                    <th> Name </th>
                                                    <th> Image </th>
                                                    <th> Phone Number </th>
                                                    <th> Facebook </th>
                                                    <th> Twitter </th>
                                                    <th> Instagram </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tours as $t)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $t->name }}</td>
                                                        <td>
                                                            <img alt="{{ $t->name }}" src="{{ asset('images/tours/'.$t->image) }}">
                                                        </td>
                                                        <td>{{ $t->phone_no }}</td>

                                                        <td>{!! $t->facebook_link !!}</td>
                                                        <td>{!! $t->twitter_link !!}</td>
                                                        <td>{{ $t->instagram_link }}</td>
                                                        <td> <a href="{{ route('admin.guides.edit', $t->id) }}"
                                                                class="btn btn-sm mt-1  btn-info">Edit</a>
                                                            <a href="{{ route('admin.guides.show', $t->id) }}"
                                                                class="btn btn-sm mt-1  btn-primary">Show</a>
                                                            <form action="{{ route('admin.guides.destroy', $t->id) }}"
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
