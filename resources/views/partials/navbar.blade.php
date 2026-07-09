<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="{{ route('home') }}" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 text-white text-uppercase" style="font-family: 'Playfair Display', serif; font-size: 1.8rem; letter-spacing: 1px;">
                    Grand<span style="color: var(--green);">Hotel</span>
                </h1>
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row gx-0 bg-white d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-envelope me-2" style="color: var(--green);"></i>
                        <p class="mb-0">info@grandhotel.com</p>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2">
                        <i class="fa fa-phone-alt me-2" style="color: var(--green);"></i>
                        <p class="mb-0">+012 345 6789</p>
                    </div>
                </div>
                <div class="col-lg-5 px-5 text-end">
                    <div class="d-inline-flex align-items-center py-2">
                        <a class="me-3" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="me-3" href=""><i class="fab fa-twitter"></i></a>
                        <a class="me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a class="me-3" href=""><i class="fab fa-instagram"></i></a>
                        <a class="" href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                <a href="{{ route('home') }}" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 text-white text-uppercase" style="font-family: 'Playfair Display', serif;">Grand<span style="color: var(--green);">Hotel</span></h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                        <a href="{{ route('services.index') }}" class="nav-item nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">Services</a>
                        <a href="{{ route('rooms') }}" class="nav-item nav-link {{ request()->routeIs('rooms') ? 'active' : '' }}">Rooms</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{ route('booking') }}" class="dropdown-item">Booking</a>
                                <a href="{{ route('team') }}" class="dropdown-item">Our Team</a>
                                <a href="{{ route('testimonials') }}" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>
                        <a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                    </div>
                    
                    @if (Route::has('login'))
                        <div class="ms-auto p-4 p-lg-0 d-flex align-items-center">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block" style="display: block !important; border:none; height:100%; display:flex !important; align-items:center;">Dashboard<i class="fa fa-user ms-3"></i></a>
                            @else
                                <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
                                @endif
                                <a href="{{ route('booking') }}" class="btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block" style="display: block !important; border:none; height:100%; display:flex !important; align-items:center; font-weight: 800;">BOOK NOW<i class="fa fa-arrow-right ms-3"></i></a>
                            @endauth
                        </div>
                    @endif
                </div>
            </nav>
        </div>
    </div>
</div>