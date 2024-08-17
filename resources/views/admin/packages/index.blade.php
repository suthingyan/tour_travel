@extends('admin.layouts.master')
@section('title', 'Packages')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All Packages</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>

                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Packages</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div>
                <a href={{ route('admin.packages.create') }} class="btn btn-dark mb-3">Create</a>
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
                                                    <th> Duration </th>
                                                    <th> Image </th>
                                                    <th> Name </th>
                                                    <th> Desctiption </th>
                                                    <th> Price </th>
                                                    <th> Tag Name </th>
                                                    <th> Category Name </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($packages as $p)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $p->time }}</td>
                                                        <td>
                                                            <img alt="{{ $p->name }}"
                                                                src="{{ asset('images/packages/' . $p->image) }}">
                                                        </td>
                                                        <td>{{ $p->name }}</td>

                                                        <td>{!! $p->description !!}</td>
                                                        <td>{{ $p->price }}</td>
                                                        <td>{{ $p->tag->name }}</td>
                                                        <td>{{ $p->category->name }}</td>
                                                        <td> <a href="{{ route('admin.packages.edit', $p->id) }}"
                                                                class="btn btn-sm mt-1  btn-info">Edit</a>
                                                            <a href="{{ route('admin.packages.show', $p->id) }}"
                                                                class="btn btn-sm mt-1  btn-primary">Show</a>
                                                            <form action="{{ route('admin.packages.destroy', $p->id) }}"
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
