<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - {{ $title ?? "Login" }}</title>

	    <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('adminAssets/img/favicon.png') }}">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('adminAssets/css/bootstrap.min.css') }}">

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('adminAssets/plugins/fontawesome/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('adminAssets/plugins/fontawesome/css/all.min.css') }}">

        <!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{ asset('adminAssets/css/feathericon.min.css') }}">

        <!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('adminAssets/css/custom.css') }}">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    </head>
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left" >
							<img class="img-fluid" src="{{ asset("adminAssets/img/logo.png") }}" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>

								<!-- Form -->
								<form action="{{ route("login.check") }}" method="POST">
                                    @csrf
									<div class="mb-3">
										<input class="form-control" name="email" type="email" placeholder="example@gmail.com" autocomplete="off">
									</div>
									<div class="mb-3">
										<input class="form-control" type="password" name="password" placeholder="Password" autocomplete="off">
									</div>
									<div class="mb-3">
										<button class="btn w-100" type="submit" style="background-color: #0a0b0d;color:#fac157">Login</button>
									</div>
								</form>
								<!-- /Form -->

							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        @if (session("success"))
        <script>
            $(document).ready(function() {
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true,
                    "positionClass": "toast-bottom-right",
                    "timeOut": 10000
                }
                toastr.success("{{ session('success') }}");
            });
        </script>
        @endif

        @if (session("error"))
        <script>
            $(document).ready(function() {
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true,
                    "positionClass": "toast-bottom-right",
                    "timeOut": 10000
                }
                toastr.error("{{ session('error') }}");
            });
        </script>
        @endif

        @if (session("errors"))
        <script>
            $(document).ready(function() {
                @foreach($errors->all() as $error)
                toastr.options = {
                    "closeButton" : true,
                    "progressBar" : true,
                    "positionClass": "toast-bottom-right",
                    "timeOut": 10000
                }
                toastr.error("{{ $error }}");
                @endforeach
            });
        </script>
        @endif

		<!-- Bootstrap Core JS -->
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

		<!-- Custom JS -->
		<script src="{{ asset('assets/js/script.js') }}"></script>

    </body>
</html>
