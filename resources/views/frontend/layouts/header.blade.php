@if(Route::is("service.details"))

<style>
    .header{
        background-color: black"
    }

</style>
<header id="header" class="header-detail d-flex align-items-center fixed-top" >
    <div class="container-fluid navbar-css container-xl position-relative d-flex align-items-center justify-content-between onscrolled-css">

        <a href="{{ route("index") }}" class="logo d-flex align-items-center me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">{{ ucfirst($websetting->company_name) }}</h1>
            <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Home<br></a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <!-- Right -->
        <div class="text-light fw-bold">
            <a href="{{ $websetting->facebook }}" class="me-4 text-reset">
             <i class="fa-brands fa-facebook"></i>
            </a>

            <a href="{{ $websetting->instagram }}" class="me-4 text-reset">
            <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="{{ $websetting->linkedin }}" class="me-4 text-reset">
            <i class="fab fa-linkedin"></i>
            </a>
        </div>
        <!-- Right -->
        </div>
</header>
@else
<header id="header" class="header d-flex align-items-center fixed-top" >
    <div class="container-fluid navbar-css container-xl position-relative d-flex align-items-center justify-content-between onscrolled-css">

        <a href="{{ route("index") }}" class="logo d-flex align-items-center me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">{{ ucfirst($websetting->company_name) }}</h1>
            <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Home<br></a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <!-- Right -->
        <div class="text-light fw-bold">
            <a href="{{ $websetting->facebook }}" class="me-4 text-reset">
             <i class="fa-brands fa-facebook"></i>
            </a>

            <a href="{{ $websetting->instagram }}" class="me-4 text-reset">
            <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="{{ $websetting->linkedin }}" class="me-4 text-reset">
            <i class="fab fa-linkedin"></i>
            </a>
        </div>
        <!-- Right -->
        </div>
</header>
@endif
