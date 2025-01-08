@php
use App\Models\Admin;

use App\Models\websetting;

$company_info = websetting::find(1);

$admin = admin::where("id",session("admin_id"))->first();

@endphp

<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="{{ route("admin.dashboard") }}" class="logo">
            <h1 class="admin-header-css">{{ $company_info->company_name }}</h1>
        </a>
        <a href="index.html" class="logo logo-small">
            <h1 class="admin-header-css-small">{{ $company_info->company_name }}</h1>
        </a>
    </div>
    <!-- /Logo -->

    @unless(Route::is("profile"))
    <a href="javascript:void(0);" class="" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
    </a>
    @endunless


    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Right Menu -->
    <ul class="nav user-menu">



        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img"><img class="rounded-circle"
                        src="{{ asset('adminAssets/img/profiles/avatar-01.jpg') }}" width="31"
                        alt="Ryan Taylor"></span>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="{{ asset("adminAssets/img/profiles/avatar-01.jpg") }}" alt="User Image"
                            class="avatar-img rounded-circle">
                    </div>
                    <div class="user-text">
                        <h6>{{ $admin->name }}</h6>
                        <p class="text-muted mb-0">{{ $admin->email }}</p>
                    </div>
                </div>
                <a class="dropdown-item" href="{{ route("admin.profile") }}">My Profile</a>

            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
            </div>
        </li>
        <!-- /User Menu -->

    </ul>
    <!-- /Header Right Menu -->

</div>

<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
         <h4 class="fw-bold text-danger">Are you sure you want to log out?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <a href="{{ route("logout") }}" class="btn btn-danger">Logout</a>
        </div>
      </div>
    </div>
  </div>
<!-- /Header -->
