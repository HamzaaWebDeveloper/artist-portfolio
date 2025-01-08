@extends('Admin.layouts.app')

@section('content')

<style>
    /* For circular thumbnails */
    .img-thumbnail-circle {
        width: 100px; /* Set desired size */
        height: 100px; /* Set desired size */
        border-radius: 50%; /* Makes the image a circle */
        object-fit: cover; /* Ensures the image scales proportionally */
        border: 2px solid #ccc; /* Optional: Add a border */
    }

    /* For circular icons */
    .img-icon-circle {
        width: 80px; /* Set desired size */
        height: 80px; /* Set desired size */
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
                            <li class="breadcrumb-item"><a href="{{ route('service.management') }}">{{ $title }}</a>
                            </li>
                            <li class="breadcrumb-item active">Services</li>
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
                                <h5>Service Count : {{ $services->count() }}</h5>
                                <a href="{{ route('add.service') }}" class="btn text-light fw-bold btn-rounded btn-info ">
                                    <i class="fa-solid fa-plus"></i> Add Service
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Service Name</th>
                                                <th>Service Image</th>
                                                <th>Service Icon</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($services as $service)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $service->name }}</td>
                                                    <td>
                                                        <img src="{{ asset('Service/thumbnails/' . $service->image) }}" alt="Thumbnail" class="img-thumbnail-circle">
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('Service/icons/' . $service->icon) }}" alt="Icon" class="img-icon-circle">
                                                    </td>

                                                    <td>{{ Str::limit($service->description, 30, '...') }}</td>

                                                    <td>
                                                        @if ($service->status == 1)
                                                            <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-danger">Close</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{--  Edit Service  --}}
                                                        <a href="{{ route('edit.service', ['id' => $service->id]) }}"
                                                            class="btn btn-success fw-bold btn-sm ">
                                                            <i class="fa-solid fa-pen-square"></i> Edit Service
                                                        </a>
                                                        {{--  End  --}}


                                                        {{--  Update Service  --}}
                                                        <button type="button" class="btn btn-primary fw-bold btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal{{ $loop->iteration }}">
                                                            <i class="fa-solid fa-toggle-on"></i> Update Status
                                                        </button>


                                                        <div class="modal fade" id="exampleModal{{ $loop->iteration }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                            {{ $service->name }}
                                                                        </h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body text-danger fw-bold text-center">
                                                                        <h5>Are you sure you want to update this service?
                                                                        </h5>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <a href="{{ route('update.service', ['id' => $service->id]) }}"
                                                                            class="btn btn-danger">Yes!</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--  End  --}}

                                                        {{--  Delete Service  --}}
                                                        <button type="button" class="btn btn-danger fw-bold btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal1{{ $loop->iteration }}">
                                                            <i class="fa-solid fa-trash"></i> Delete
                                                        </button>


                                                        <div class="modal fade" id="exampleModal1{{ $loop->iteration }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                            {{ $service->name }}
                                                                        </h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body text-danger fw-bold text-center">
                                                                        <h5>Are you sure you want to delete this service?
                                                                        </h5>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <a href="{{ route('delete.service', ['id' => $service->id]) }}"
                                                                            class="btn btn-danger">Yes!</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- Delete Modal End   --}}
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
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection
