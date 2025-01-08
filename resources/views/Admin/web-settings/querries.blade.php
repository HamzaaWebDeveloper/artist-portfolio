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
                            <li class="breadcrumb-item"><a href="{{ route("contact.settings") }}">{{ $title }}</a>
                            </li>
                            <li class="breadcrumb-item active">Settings</li>
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
                                <h5>Edit Websettings Here </h5>
                            </div>
                        </div>
                        <div class="card-body">

                            <form method="post" action="{{ route("edit-contact-settings",['id'=>$contactSettings->id]) }}" >
                                @csrf
                                <div class="row">
                                   <div class="col-4 mt-2">
                                       <label for="" class="fw-bold">Company Name</label>
                                       <input type="text" name="company_name" class="form-control" value="{{ $contactSettings->company_name }}">
                                   </div>
                                   <div class="col-4 mt-2">
                                    <label for="" class="fw-bold">Address</label>
                                    <input type="text" name="address" class="form-control" value="{{ $contactSettings->address }}">
                                 </div>
                                <div class="col-4 mt-2">
                                    <label for="" class="fw-bold">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control" value="{{ $contactSettings->phone_number }}">
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="" class="fw-bold">Tagline</label>
                                    <input type="text" name="tagline" class="form-control" value="{{ $contactSettings->tagline }}">
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="" class="fw-bold">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $contactSettings->email }}">
                                </div>
                                <div class="col-4 mt-2">
                                 <label for="" class="fw-bold">instagram</label>
                                 <input type="url" name="instagram" class="form-control" value="{{ $contactSettings->instagram }}">
                                 </div>
                                <div class="col-4 mt-2">
                                    <label for="" class="fw-bold">LinkedIn</label>
                                    <input type="url" name="linkedin" class="form-control" value="{{ $contactSettings->linkedin }}">
                                </div>
                                <div class="col-4 mt-2">
                                    <label for="" class="fw-bold">Facebook</label>
                                    <input type="url" name="facebook" class="form-control" value="{{ $contactSettings->facebook }}">
                                </div>

                                <div class="col-12 mt-2">
                                    <label for="" class="fw-bold">Our Story</label>
                                     <textarea name="story" class="form-control" id=""  cols="30" rows="10" style="height: 140px !important;">{{ $contactSettings->Story }}</textarea>
                                </div>


                                </div>


                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-lg btn-rounded">Edit Settings</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->

@endsection
