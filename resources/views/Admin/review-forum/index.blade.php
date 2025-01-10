@extends("Admin.layouts.app")

@section("content")


    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
           @if(session("admin_id"))
           <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">{{ $title }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('service.management') }}">{{ $title }}</a>
                        </li>
                        <li class="breadcrumb-item active">Reviews</li>
                    </ul>
                </div>
            </div>
        </div>
           @endif
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>Review Count : {{ $reviews->count() }}</h5>
                                <a href="{{ route('add.reviews') }}" class="btn text-light fw-bold btn-rounded btn-info ">
                                    <i class="fa-solid fa-plus"></i> Add Reviews
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
                                                <th>Client  Name</th>
                                                <th>Message</th>
                                                <th>Twitter</th>
                                                <th>Instagram</th>
                                                <th>Tiktok</th>
                                                <th>Reddit</th>
                                                <th>Gamejolt</th>
                                                <th>Discord</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reviews as $review)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ucfirst($review->name) }}</td>
                                                    <td>{{ Str::limit($review->review, 50, '...') }}</td>
                                                    <td>
                                                        @if($review->twitter)
                                                        <a href="{{ $review->twitter }}">Twitter</a>
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($review->instagram)
                                                        <a href="{{ $review->instagram }}">Instagram</a>
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($review->tiktok)
                                                        <a href="{{ $review->tiktok }}">Tiktok</a>
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($review->reddit)
                                                        <a href="{{ $review->reddit }}">Reddit</a>
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($review->gamejolt)
                                                        <a href="{{ $review->gamejolt }}">GameJolt</a>
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($review->discord)
                                                        <a href="{{ $review->discord }}">Discord</a>
                                                        @else
                                                        -
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($review->status == 1)
                                                            <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-danger">Close</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{--  Edit Service  --}}
                                                        <a href="{{ route('edit.review', ['id' => $review->id]) }}"
                                                            class="btn btn-success fw-bold btn-sm ">
                                                            <i class="fa-solid fa-pen-square"></i> Edit Reviews
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
                                                                            {{ $review->name }}
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
                                                                        <a href="{{ route('update.review', ['id' => $review->id]) }}"
                                                                            class="btn btn-danger">Yes!</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--  End  --}}

                                                        {{--  Delete   --}}
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
                                                                            {{ $review->name }}
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
                                                                        <a href="{{ route('delete.review', ['id' => $review->id]) }}"
                                                                            class="btn btn-danger">Yes!</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         {{-- Delete Modal End --}}
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
