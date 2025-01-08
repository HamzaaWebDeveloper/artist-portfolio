@extends('Admin.layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <h3 class="page-title">{{ $title ?? '' }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('niches.management') }}">
                                    Niche Management
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                {{ $title ?? '' }}
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('niches.management') }}" class="btn btn-primary btn-lg btn-rounded">
                        <i class="fa-solid fa-arrow-left"></i>
                        Back
                    </a>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card customShadow">
                        <form action="{{ route("edit.store.niche",['id'=>$niche->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-12 mb-2">
                                        <label for="" class="fw-bold">Niche Name</label>
                                        <input type="text" name="name" class="form-control "
                                            placeholder="Enter Niche Name" value="{{ $niche->name }}">
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary btn-lg btn-rounded">
                                        Edit Niche
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    <!-- End -->

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection
