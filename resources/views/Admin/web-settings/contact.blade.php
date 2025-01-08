@extends('Admin.layouts.app')

@section('content')

<style>
        .img-thumbnail-circle {
        width: 100px; /* Set desired size */
        height: 100px; /* Set desired size */
        border-radius: 50%; /* Makes the image a circle */
        object-fit: cover; /* Ensures the image scales proportionally */
        border: 2px solid #ccc; /* Optional: Add a border */
    }

</style>

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">{{ $title }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('web.settings') }}">{{ $title }}</a>
                            </li>
                            <li class="breadcrumb-item active">Querries</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

         <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>Querries Count : {{ $querries->count() }}</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($querries as $querry )
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $querry->name }}</td>
                                                    <td>{{ $querry->email }}</td>
                                                    <td>{{ $querry->subject }}</td>
                                                    <td>{{ Str::limit($querry->message,100, '...') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection
