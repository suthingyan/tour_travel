@extends('admin.layouts.master')
@section('title', 'Tags')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All Tags</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Tags</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div>
                <a href={{ route('admin.tags.create') }} class="btn btn-dark mb-3">Create</a>
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
                                                    <th> Name </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tags as $c)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $c->name }}</td>
                                                        <td> <a href="{{ route('admin.tags.edit', $c->id) }}"
                                                                class="btn  btn-sm btn-info">Edit</a>
                                                            <a href="{{ route('admin.tags.show', $c->id) }}"
                                                                class="btn btn-sm btn-primary">Show</a>
                                                            <form action="{{ route('admin.tags.destroy', $c->id) }}"
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
