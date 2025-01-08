@extends("frontend.layouts.app")

@section("content")

<main class="main">

    <!-- Page Title -->
    <div class="page-title mt-5" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="detail-title">{{ ucfirst($services->name) }}</h1>
              <p class="mb-0 detail-text">{{ ucfirst($services->description) }}</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li class="detail-title"><a href="{{ route("index") }}">Home</a></li>
            <li class="current detail-title">{{ $services->name }}</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

      <div class="container">

        <div class="row gy-5">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">



            <div class="help-box d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-headset help-icon"></i>
              <h4>Have a Question?</h4>
              <p class="d-flex align-items-center mt-2 mb-0 "><i class="bi bi-telephone me-2"></i> <span class="detail-text">{{ $websetting->phone_number }}</span></p>
              <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a class="detail-text" href="mailto:{{ $websetting->email }}">{{ $websetting->email }}</a></p>
            </div>

          </div>

          <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
            <img src="{{ asset("Service/thumbnails/" . $services->image) }}" alt="" class="img-fluid services-img w-100">
            {!! $services->long_description !!}

          </div>

        </div>

      </div>

    </section><!-- /Service Details Section -->

  </main>

@endsection
