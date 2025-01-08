@extends("Admin.layouts.app")

@section("content")


<style>
    body {
        background-color: #f4f5f7;
    }

    .profile-header {
        padding: 30px;
        background-color: white;
        border-radius: 10px 0px 0px 0px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .profile-image img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
    }

    .profile-user-info {
        margin-left: 30px;
    }

    .profile-user-info h4 {
        font-size: 24px;
        font-weight: bold;
    }

    .profile-user-info h6 {
        font-size: 14px;
        color: gray;
    }

    .profile-btn {
        margin-left: auto;
    }

    .btn-primary {
        background-color: #fac157;
        border-color: #fac157;
        padding: 10px 20px;
    }

    .about-text {
        margin-top: 10px;
        font-size: 14px;
        color: gray;
    }

    .card {
        margin-top: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .card-body h5 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .nav-tabs-solid {
        margin-bottom: 20px;
    }

    .nav-tabs-solid .nav-link.active {
        background-color: #007bff;
        color: white;
    }

    .nav-link.active{
        background-color: #fac157 !important;
        border-color: #fac157 !important;
    }

    .tab-content .row p {
        margin-bottom: 5px;
    }

    .modal .modal-body input {
        margin-bottom: 10px;
    }
</style>


<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">{{$title}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("admin.dashboard")}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="container-fluid">
            <!-- Profile Section -->
            <div class="profile-header d-flex">
                <div class="profile-image">
                    <a href="#">
                        <img class="rounded-circle" alt="User Image" src="{{asset("adminAssets/img/profiles/avatar-01.jpg")}}">
                    </a>
                </div>
                <div class="profile-user-info mt-3">
                    <h4 class="user-name mb-0">{{ucfirst($adminDetails->name)}}</h4>
                    <h6 class="text-muted">{{$adminDetails->email}}</h6>
                </div>
            </div>

            <!-- Profile Menu -->
            <div class="profile-menu  shadow" style="border-radius: 0px 0px 10px 10px;">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#edit_tab">Edit Profile</a>
                    </li>
                </ul>
            </div>

            <!-- Tab Content -->
            <div class="tab-content profile-tab-cont">
                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="per_details_tab">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between">
                                <span>Personal Details</span>
                            </h5>
                            <div class="row">
                                <p class="col-sm-2 text-muted">Name</p>
                                <p class="col-sm-10">{{ucfirst($adminDetails->name)}}</p>
                            </div>
                            <div class="row">
                                <p class="col-sm-2 text-muted">Email</p>
                                <p class="col-sm-10">{{$adminDetails->email}}</p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /Personal Details Tab -->

                <!-- Change Password Tab -->
                <div id="password_tab" class="tab-pane fade">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Change Password</h5>
                            <form action="{{route("admin.password.update")}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="mb-2">New Password</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="mb-2">Confirm Password</label>
                                            <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                                            <span class="fw-bold text-danger" id="alertConfirm" style="display: none;">Confirm password doesn't match</span>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit" id="btn-disabled">Save Changes</button>
                            </form>
                            {{-- Script For Checking If the Confirm Password or not  --}}
                            <script>
                                $(document).ready(function{
                                    $confirmPassword = $("#confirm_password").val();
                                    $password = $("#password").val();

                                    if ($confirmPassword != $password) {
                                        $("#btn-disable").prop('disabled', true);
                                        $("#alertConfirm").show();
                                    } else {
                                        $("#btn-disable").prop('disabled', false);
                                    }

                                })
                            </script>
                            {{-- End --}}
                        </div>
                    </div>
                </div>
                {{-- End --}}

                {{-- Edit Tab --}}
                <div id="edit_tab" class="tab-pane fade">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Profile</h5>
                            <form action="{{route("admin.profile.edit")}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="mb-2">Name</label>
                                            <input type="text" value="{{ucfirst($adminDetails->name)}}" name="name"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="mb-2">Email</label>
                                            <input type="email" value="{{$adminDetails->email}}" name="email"  class="form-control">
                                            <span class="fw-bold text-danger" id="alertConfirm" style="display: none;">Confirm password doesn't match</span>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit" id="btn-disabled">Edit Now</button>
                            </form>

                        </div>
                    </div>
                </div>
                {{-- End --}}
            </div>

        </div>

    </div>
</div>
<!-- /Page Wrapper -->



@endsection
