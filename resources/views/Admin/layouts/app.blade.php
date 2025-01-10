<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:type" content="website">
    <title>{{ ucfirst($websettings->company_name) }} - {{ $title }}</title>

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

    {{--  Data Table Css  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    {{--  End  --}}

    {{--  Summer Note Css  --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    {{--  End  --}}
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        @if(!session("admin_id"))
        <!-- If no admin_id in session, only display the content -->
        @yield('reviews')  <!-- Or you can add some default content here if needed -->
    @else
        <!-- For routes with admin_id in session, show the full layout with header and sidebar -->
        @include('Admin.layouts.header')
        @include('Admin.layouts.sidebar')
        @yield('content')
    @endif


    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @include('Admin.layouts.toastr')

    {{--  Datatable Js  --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    {{--  End  --}}

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('adminAssets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('adminAssets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('adminAssets/js/script.js') }}"></script>

    {{--  Summernote Js  --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    {{--  End  --}}

</body>

</html>
