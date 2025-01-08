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
                            <li class="breadcrumb-item"><a href="{{ route('service.management') }}">{{ $title }}</a>
                            </li>
                            <li class="breadcrumb-item active">Projects</li>
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
                                <h5>Projects Count : {{ $project->count() }}</h5>
                                <a href="{{ route('add.projects') }}" class="btn text-light fw-bold btn-rounded btn-info ">
                                    <i class="fa-solid fa-plus"></i> Add Project
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
                                                <th>Niche</th>
                                                <th>Project Name</th>
                                                <th>Project Image</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($project as $projects )
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $projects->niche->name }}</td>
                                                    <td>{{ $projects->name }}</td>
                                                    <td>
                                                        @foreach ($projects->projectImages->take(1) as $images )
                                                               <img src="{{ asset('project/projectImages/'.$images->project_images) }}" class="img-thumbnail-circle" alt="">
                                                        @endforeach
                                                    </td>
                                                    <td>{{ Str::limit($projects->description,100, '...') }}</td>
                                                    <td>
                                                        @if($projects->status == 1)
                                                            <span class="badge bg-success">Active</span>
                                                         @else
                                                         <span class="badge bg-danger">Closed</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                      {{-- Edit --}}
                                                        <a href="{{ route("edit.project",['id'=>$projects->id]) }}" class="btn btn-success btn-sm">
                                                        <i class="fa-solid fa-pen-square"></i> Edit
                                                        </a>
                                                      {{-- End --}}

                                                      {{-- Project Detail --}}
                                                        {{-- <a href="" class="btn btn-info btn-dark btn-sm">
                                                            <i class="fa-solid fa-info"></i> View Details
                                                            </a> --}}
                                                      {{-- End --}}

                                                        {{-- Update Niche --}}

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
                                                                                    {{ $projects->name }}
                                                                                </h1>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body text-danger fw-bold text-center">
                                                                                <h5>Are you sure you want to update this project?
                                                                                </h5>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                                <a href="{{ route("update.project",['id'=>$projects->id]) }}"
                                                                                    class="btn btn-danger">Yes!</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        {{--  End  --}}

                                                    {{-- Delete Niche --}}

                                                            <button type="button" class="btn btn-danger fw-bold btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal1{{ $loop->iteration }}">
                                                            <i class="fa-solid fa-trash"></i> Delete Project
                                                            </button>


                                                            <div class="modal fade" id="exampleModal1{{ $loop->iteration }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                            {{ $projects->name }}
                                                                        </h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body text-danger fw-bold text-center">
                                                                        <h5>Are you sure you want to delete this project?
                                                                        </h5>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <a href="{{ route("delete.project",['id'=>$projects->id]) }}"
                                                                            class="btn btn-danger">Yes!</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    {{-- End --}}
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
