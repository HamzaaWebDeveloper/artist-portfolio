<footer id="footer" class="footer dark-background">

    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="{{ route("index") }}" class="logo d-flex align-items-center">
                        <span class="sitename">{{ ucfirst($websetting->company_name) }}</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>{{ $websetting->address }}</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>{{ $websetting->phone_number }}</span></p>
                        <p><strong>Email:</strong> <span>{{ $websetting->email }}</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href="{{ $websetting->facebook }}"><i class="bi bi-facebook"></i></a>
                        <a href="{{ $websetting->instagram }}"><i class="bi bi-instagram"></i></a>
                        <a href="{{ $websetting->linkedin }}"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> Services</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> Terms of service</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        @foreach ($niches as $niche )
                        <li><i class="bi bi-chevron-right"></i> <a href="#portfolio">{{ $niche->name }}</a></li>
                        @endforeach
                        {{-- <li><i class="bi bi-chevron-right"></i> <a href="#"> Web Design</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> Web Development</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> Product Management</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> Marketing</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> Graphic Design</a></li> --}}
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                    <form action="{{ route("newsletter.subscribe") }}" method="post" class="">
                        @csrf
                        <div class="newsletter-form">
                            <input type="email" name="email">
                            <input type="submit"  value="Subscribe">
                            </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container copyright-css text-center">
            <p>© <span>2025</span> <strong class="px-1 sitename">{{ ucfirst($websetting->company_name) }}</strong> <span>All Rights Reserved</span>
            </p>

        </div>
    </div>

</footer>
