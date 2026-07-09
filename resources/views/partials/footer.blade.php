
<!-- Footer Start -->
@php
    $contactAddress = $settingsMap['contact_address'] ?? '123 Luxury Lane, Ahmedabad';
    $contactPhone = $settingsMap['contact_phone'] ?? '+91 79 1234 5678';
    $contactEmail = $settingsMap['contact_email'] ?? 'info@grandhotel.com';

    $socialTwitter = $settingsMap['social_twitter'] ?? '';
    $socialFacebook = $settingsMap['social_facebook'] ?? '';
    $socialYoutube = $settingsMap['social_youtube'] ?? '';
    $socialLinkedin = $settingsMap['social_linkedin'] ?? '';
@endphp

<div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
    <div class="container pb-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-4">
                <div class="rounded p-4" style="background: var(--green);">
                    <a href="{{ route('home') }}"><h1 class="text-white text-uppercase mb-3" style="font-family: 'Playfair Display', serif; font-size: 1.8rem;">Grand Hotel</h1></a>
                    <p class="text-white mb-0">
                        Experience the pinnacle of luxury at Grand Hotel. Where comfort meets elegance, and every stay becomes an unforgettable memory.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <h6 class="section-title text-start text-uppercase mb-4" style="color: var(--green);">Contact</h6>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3" style="color: var(--green);"></i>{{ $contactAddress }}</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3" style="color: var(--green);"></i>{{ $contactPhone }}</p>
                <p class="mb-2"><i class="fa fa-envelope me-3" style="color: var(--green);"></i>{{ $contactEmail }}</p>
                <div class="d-flex pt-2">
                    @if($socialTwitter)<a class="btn btn-outline-light btn-social" href="{{ $socialTwitter }}" target="_blank"><i class="fab fa-twitter"></i></a>@endif
                    @if($socialFacebook)<a class="btn btn-outline-light btn-social" href="{{ $socialFacebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>@endif
                    @if($socialYoutube)<a class="btn btn-outline-light btn-social" href="{{ $socialYoutube }}" target="_blank"><i class="fab fa-youtube"></i></a>@endif
                    @if($socialLinkedin)<a class="btn btn-outline-light btn-social" href="{{ $socialLinkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>@endif
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="row gy-5 g-4">
                    <div class="col-md-4">
                        <h6 class="section-title text-start text-uppercase mb-4" style="color: var(--green);">Company</h6>
                        <a class="btn btn-link" href="{{ route('about') }}">About Us</a>
                        <a class="btn btn-link" href="{{ route('contact') }}">Contact Us</a>
                        <a class="btn btn-link" href="{{ route('services.index') }}">Our Services</a>
                        <a class="btn btn-link" href="{{ route('rooms') }}">Our Rooms</a>
                    </div>
                    <div class="col-md-4">
                        <h6 class="section-title text-start text-uppercase mb-4" style="color: var(--green);">Services</h6>
                        <a class="btn btn-link" href="{{ route('services.show', 'food') }}">Food & Restaurant</a>
                        <a class="btn btn-link" href="{{ route('services.show', 'spa') }}">Spa & Fitness</a>
                        <a class="btn btn-link" href="{{ route('services.show', 'sports') }}">Sports & Gaming</a>
                        <a class="btn btn-link" href="{{ route('services.show', 'events') }}">Event & Party</a>
                        <a class="btn btn-link" href="{{ route('services.show', 'gym') }}">GYM & Yoga</a>
                    </div>
                    <div class="col-md-4">
                        <h6 class="section-title text-start text-uppercase mb-4" style="color: var(--green);">Pages</h6>
                        <a class="btn btn-link" href="{{ route('booking') }}">Booking</a>
                        <a class="btn btn-link" href="{{ route('team') }}">Our Team</a>
                        <a class="btn btn-link" href="{{ route('testimonials') }}">Testimonials</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; {{ date('Y') }} <a class="border-bottom" href="{{ route('home') }}" style="color: var(--green); text-decoration: none;">Grand Hotel</a>. All Rights Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('about') }}">About</a>
                        <a href="{{ route('contact') }}">Contact</a>
                        <a href="{{ route('rooms') }}">Rooms</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
