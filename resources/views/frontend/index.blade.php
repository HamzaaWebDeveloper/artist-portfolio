@extends('frontend.layouts.app')


@section('content')
<style>
    .modal-content {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
}

.modal-header .btn-close {
    background-color: #ccc;
    border-radius: 50%;
    opacity: 0.8;
}

.carousel-inner img {
    transition: transform 0.5s ease-in-out;
}

.carousel-inner img:hover {
    transform: scale(1.05);
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    padding: 10px;
}

/* Ensure the modal appears on top without disturbing other elements */


.portfolio-item {
    position: relative;
    z-index: 1; /* Ensure portfolio items have lower z-index */
}


.service-icon {
        width: 40px; /* Icon size */
        height: 40px;
        object-fit: contain;

        display: block;
        margin: 10 auto 10px;
    }

    .icon {
        text-align: center; /* Center the icon in its container */
    }

    .service-name{
        font-family: "Ysabeau", sans-serif;
    }



.button {
  display: flex;
  align-items: center;
  padding: 12px 15px;
  border-radius: 50px;
  border: none;
  overflow: hidden;
  background-color: #000000;
  color: #fff;
}

.btn-width{
    width: 9rem;
}

.button-text {
  transform: translateX(15px);
  font-size: 1.5em;
  font-weight: 700;
  transition-duration: 0.3s;
}

.iconer {
  transform: translateY(35px);
  transition-duration: 0.3s;
}

.button:hover .button-text {
  transform: translateX(0px);
}

.button:hover .iconer {
  transform: translateY(0px);
}



</style>
    <main class="main">

<!-- Hero Section -->
<section id="hero" class="hero section dark-background">
    <div id="particles-js"></div> <!-- Particle.js Background -->

    <!-- Hero Content Section -->
    <div class="container text-center">
        <div class="hero-content">
            <h2 class="hero-title">{{ ucfirst($websetting->tagline) }} <span>.</span></h2>
            <p class="hero-description">Explore new worlds, where the adventure never stops.</p>

        </div>
    </div>
</section>

<!-- /Hero Section -->



        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title about-css" style="padding: 10px">
                <h2>Story</h2>
                <p class="tagline">Where every tale begins</p>
            </div><!-- End Section Title -->

            <div class="container mb">
                <p class="story">{{ $websetting->Story }}</p>
            </div>

        </section><!-- /About Section -->


        <!-- Services Section -->
        <section id="services" class="services section" style="position: relative; overflow: hidden;">

            <!-- Section Title -->
            <div class="container section-title-services" data-aos="fade-up">
                <h2>Services</h2>
                <p>Creative solutions, exceptional results.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    @if($services->isNotEmpty())
                        @foreach ($services->where("status","==","1") as $service)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item position-relative">
                                <!-- Icon Section -->
                                <div class="icon">
                                    <img src="{{ asset('Service/icons/' . $service->icon) }}" alt="{{ $service->name }} icon" class="service-icon">
                                </div>
                                <!-- Service Details -->
                                <a href="" class="stretched-link">
                                    <h3 class="service-name">{{ ucfirst($service->name) }}</h3>
                                </a>
                                <p>{{ ucfirst(Str::limit($service->description, 200, '...')) }}</p>

                                <a href="{{ route("service.details",['id'=>$service->id]) }}" class="btn button mt-3 mx-auto btn-width btn-sm">
                                    <p class="button-text">Read More</p> <p class="iconer"><svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path></svg></p>
                                </a>
                            </div>
                        </div><!-- End Service Item -->
                        @endforeach
                    @else
                    <h3 class="fw-bold text-dark text-center">Will Update the Service Soon</h3>
                    @endif

                </div>

            </div>

        </section><!-- /Services Section -->

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">

            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; overflow: hidden;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" style="width: 100%; height: 100%;">
                    <path fill="#000000" fill-opacity="1" d="M0,32L80,58.7C160,85,320,139,480,181.3C640,224,800,256,960,261.3C1120,267,1280,245,1360,234.7L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
                </svg>
            </div>
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Portfolio</h2>
                <p>"Our work, your inspiration.</p>
            </div><!-- End Section Title -->

            <div class="container">
        @if($niches->isNotEmpty())
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <!-- Dynamic Filters -->
            <ul class="portfolio-filters  isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                @foreach($niches->where("status","==","1") as $niche)
                    <li data-filter=".filter-{{ $niche->id }}">{{ $niche->name }}</li>
                @endforeach
            </ul><!-- End Portfolio Filters -->

            <!-- Portfolio Items -->
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                @foreach($portfolio->where("status","==","1") as $project)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $project->niche->id }}">
                        @foreach ($project->projectImages->take(1) as $images)
                            <img src="{{ asset('project/projectImages/'.$images->project_images) }}" class="img-thumbnail-circle" style="object-fit: cover; width: 100%; height: 100%;" alt="">
                        @endforeach
                        <div class="portfolio-info">
                            <h4>{{ $project->name }}</h4>
                            <p>{{ Str::limit($project->description, 100, '...') }}</p>

                            <!-- Modal trigger button with dynamic ID -->
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#projectModal{{ $project->id }}" class="preview-link">
                                <i class="bi bi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div><!-- End Portfolio Container -->
        </div>
        @else
        <h3 class="fw-bold text-dark text-center">Will Update the Service Soon</h3>
        @endif
            </div>

            <!-- Modal Template (Repeat dynamically for each project) -->
            @foreach($portfolio as $project)
                <div class="modal fade" id="projectModal{{ $project->id }}" tabindex="-1" aria-labelledby="projectModalLabel{{ $project->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content border-0">
                            <div class="row g-0">
                                <!-- Text Section (Left) -->
                                <div class="col-md-5 d-flex flex-column justify-content-between bg-white p-4">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title fw-bold" id="projectModalLabel{{ $project->id }}">{{ $project->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-muted">{{ $project->description }}</p>
                                    </div>
                                </div>

                                <!-- Image Section (Right) -->
                                <div class="col-md-7 position-relative bg-dark">
                                    <div id="carouselProject{{ $project->id }}" class="carousel slide h-100" data-bs-ride="carousel">
                                        <div class="carousel-inner h-100">
                                            @foreach ($project->projectImages as $key => $image)
                                            <div class="carousel-item @if($key === 0) active @endif h-100">
                                                <img src="{{ asset('project/projectImages/' . $image->project_images) }}" class="img-fluid rounded" style="object-fit: cover; width: 100%; height: 100%; margin: auto;" alt="Project Image">
                                            </div>
                                            @endforeach
                                        </div>
                                        <!-- Carousel Controls -->
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselProject{{ $project->id }}" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselProject{{ $project->id }}" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>


        <!-- /Portfolio Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 align-items-center justify-content-between">

                    <div class="col-lg-5">
                        <img src="assets/img/stats-img.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="col-lg-6">

                        <h3 class="fw-bold fs-2 mb-3">Voluptatem dignissimos provident quasi</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua. Duis aute irure dolor in reprehenderit
                        </p>

                        <div class="row gy-4">

                            <div class="col-lg-6">
                                <div class="stats-item d-flex">
                                    <i class="bi bi-emoji-smile flex-shrink-0"></i>
                                    <div>
                                        <span data-purecounter-start="0" data-purecounter-end="232"
                                            data-purecounter-duration="1" class="purecounter"></span>
                                        <p><strong>Happy Clients</strong> <span>consequuntur quae</span></p>
                                    </div>
                                </div>
                            </div><!-- End Stats Item -->

                            <div class="col-lg-6">
                                <div class="stats-item d-flex">
                                    <i class="bi bi-journal-richtext flex-shrink-0"></i>
                                    <div>
                                        <span data-purecounter-start="0" data-purecounter-end="521"
                                            data-purecounter-duration="1" class="purecounter"></span>
                                        <p><strong>Projects</strong> <span>adipisci atque cum quia aut</span></p>
                                    </div>
                                </div>
                            </div><!-- End Stats Item -->

                            <div class="col-lg-6">
                                <div class="stats-item d-flex">
                                    <i class="bi bi-headset flex-shrink-0"></i>
                                    <div>
                                        <span data-purecounter-start="0" data-purecounter-end="1453"
                                            data-purecounter-duration="1" class="purecounter"></span>
                                        <p><strong>Hours Of Support</strong> <span>aut commodi quaerat</span></p>
                                    </div>
                                </div>
                            </div><!-- End Stats Item -->

                            <div class="col-lg-6">
                                <div class="stats-item d-flex">
                                    <i class="bi bi-people flex-shrink-0"></i>
                                    <div>
                                        <span data-purecounter-start="0" data-purecounter-end="32"
                                            data-purecounter-duration="1" class="purecounter"></span>
                                        <p><strong>Hard Workers</strong> <span>rerum asperiores dolor</span></p>
                                    </div>
                                </div>
                            </div><!-- End Stats Item -->

                        </div>

                    </div>

                </div>

            </div>

        </section><!-- /Stats Section -->

        {{--  <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section dark-background">

            <img src="assets/img/testimonials-bg.jpg" class="testimonials-bg" alt="">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                        rhoncus.
                                        Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at
                                        semper.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                        cillum eram
                                        malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim
                                        culpa.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem
                                        veniam duis
                                        minim tempor labore quem eram duis noster aute amet eram fore quis sint
                                        minim.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                        fugiat minim
                                        velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore
                                        labore illum
                                        veniam.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img"
                                    alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                        noster veniam enim
                                        culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore
                                        nisi cillum
                                        quid.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Testimonials Section -->  --}}


        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>Let’s create something together.</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
                    <iframe style="border:0; width: 100%; height: 270px;"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
                        frameborder="0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- End Google Maps -->

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Address</h3>
                                <p>{{ $websetting->address }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>{{ $websetting->phone_number }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>{{ $websetting->email }}</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                    <div class="col-lg-8">
                        <form action="{{ route("contact.save") }}" method="post" class="" data-aos="fade-up"
                            data-aos-delay="200">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">

                                    <button type="submit" class="button">Send Message</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    const isotopeContainer = document.querySelector('.isotope-container');
    const iso = new Isotope(isotopeContainer, {
        itemSelector: '.isotope-item',
        layoutMode: 'masonry',
    });

    // Filter functionality
    const filters = document.querySelectorAll('.portfolio-filters li');
    filters.forEach(filter => {
        filter.addEventListener('click', function () {
            filters.forEach(f => f.classList.remove('filter-active'));
            this.classList.add('filter-active');
            const filterValue = this.getAttribute('data-filter');
            iso.arrange({ filter: filterValue });
        });
    });

    // Refresh Isotope on modal close
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        modal.addEventListener('hidden.bs.modal', function () {
            iso.layout();
        });
    });
});


// Add class when About section is in the viewport
window.addEventListener("scroll", function() {
    const aboutSection = document.querySelector(".about");
    const aboutPosition = aboutSection.getBoundingClientRect();

    // If the About section is in the viewport
    if (aboutPosition.top <= window.innerHeight && aboutPosition.bottom >= 0) {
        aboutSection.classList.add("active");
    } else {
        aboutSection.classList.remove("active"); // Optionally, remove animation when out of view
    }
});

window.addEventListener("scroll", function() {
    const portfolioSection = document.querySelector(".portfolio");
    const portfolioPosition = portfolioSection.getBoundingClientRect();

    // If the Portfolio section is in the viewport
    if (portfolioPosition.top <= window.innerHeight && portfolioPosition.bottom >= 0) {
        // Add the active class to trigger the animation
        portfolioSection.classList.add('active');
    } else {
        // Optionally, remove the active class if the section is out of view
        portfolioSection.classList.remove('active');
    }
});



    </script>
@endsection
