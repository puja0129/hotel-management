<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hotel Services') — Grand Hotel</title>
    <!-- Favicon -->
    <link href="{{ asset('img/logo.png') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600&family=Inter:wght@400;500;700;900&family=Oswald:wght@600;700&family=Heebo:wght@700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/services.css') }}?v={{ filemtime(public_path('css/services.css')) }}">
    @stack('styles')
</head>
<body>

{{-- ── Navbar ── --}}
<nav class="navbar">
    <div class="navbar-inner">
        <a href="{{ route('home') }}" class="brand" style="display: flex; align-items: center;">
            <img src="{{ asset('img/logo.png') }}" alt="Grand Hotel Logo" style="height: 75px; object-fit: contain; filter: drop-shadow(0px 4px 6px rgba(0,0,0,0.15)); margin: -10px 0;">
        </a>
        <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle menu" style="position: absolute; right: 1.25rem; top: 12px; z-index: 9999;" onclick="document.getElementById('navLinks').classList.toggle('show');">
            <i class="fa fa-bars"></i>
        </button>
        <ul class="nav-links" id="navLinks">
            <div class="nav-center-group">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                <li><a href="{{ route('services.index') }}" class="{{ request()->routeIs('services.*') ? 'active' : '' }}">Services</a></li>
                <li><a href="{{ route('rooms') }}" class="{{ request()->routeIs('rooms') ? 'active' : '' }}">Rooms</a></li>
                <li><a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a></li>

                {{-- Pages Dropdown --}}
                <li class="nav-item" style="position: relative; display: inline-block;" id="pagesNavItem">
                    <a href="#" class="pages-toggle {{ request()->routeIs('booking') || request()->routeIs('team') || request()->routeIs('testimonials') ? 'active' : '' }}" id="pagesDropdown" style="display: flex; align-items: center; gap: 0.4rem; cursor: pointer; color: rgba(255,255,255,0.85);">
                        Pages <i class="fa fa-angle-down" style="font-size: 0.75rem; transition: transform .2s;" id="pagesChevron"></i>
                    </a>
                    <div id="pagesMenu" style="display: none; position: absolute; top: calc(100% + 8px); left: 0; background: white; min-width: 180px; border-radius: 10px; box-shadow: 0 8px 30px rgba(0,0,0,.12); overflow: hidden; z-index: 1000; border-top: 3px solid #1a7f4b;">
                        <a href="{{ route('booking') }}" style="display: flex; align-items: center; gap: 10px; padding: 11px 18px; color: #333; text-decoration: none; border-bottom: 1px solid #f0f0f0; font-size: 0.9rem; transition: background .15s;" onmouseover="this.style.background='#f6fdf9'" onmouseout="this.style.background='transparent'">
                            <i class="fa fa-calendar-alt" style="color: #1a7f4b; width: 16px;"></i> Booking
                        </a>
                        <a href="{{ route('team') }}" style="display: flex; align-items: center; gap: 10px; padding: 11px 18px; color: #333; text-decoration: none; border-bottom: 1px solid #f0f0f0; font-size: 0.9rem; transition: background .15s;" onmouseover="this.style.background='#f6fdf9'" onmouseout="this.style.background='transparent'">
                            <i class="fa fa-users" style="color: #1a7f4b; width: 16px;"></i> Our Team
                        </a>
                        <a href="{{ route('testimonials') }}" style="display: flex; align-items: center; gap: 10px; padding: 11px 18px; color: #333; text-decoration: none; font-size: 0.9rem; transition: background .15s;" onmouseover="this.style.background='#f6fdf9'" onmouseout="this.style.background='transparent'">
                            <i class="fa fa-comment-alt" style="color: #1a7f4b; width: 16px;"></i> Testimonials
                        </a>
                    </div>
                </li>

                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
            </div>


            <div class="nav-right-group">
                @auth
                    {{-- Profile Dropdown --}}
                    <li class="nav-item" style="position: relative; display: inline-block;">
                        <a href="#" id="profileDropdown" style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 6px 14px; border-radius: 50px; border: 2px solid {{ Auth::user()->isAdmin() ? '#e74c3c' : '#bbf7d0' }}; color: {{ Auth::user()->isAdmin() ? '#e74c3c' : '#bbf7d0' }}; font-weight: 600; font-size: 0.88rem; transition: all .2s;" onmouseover="this.style.background='{{ Auth::user()->isAdmin() ? '#e74c3c' : '#bbf7d0' }}'; this.style.color='{{ Auth::user()->isAdmin() ? 'white' : '#0a1612' }}';" onmouseout="this.style.background='transparent'; this.style.color='{{ Auth::user()->isAdmin() ? '#e74c3c' : '#bbf7d0' }}';">
                            <i class="fa fa-user-circle"></i>
                            {{ Auth::user()->name }}
                            @if(Auth::user()->isAdmin())
                                <span style="font-size: 0.65rem; background: #e74c3c; color: white; padding: 1px 5px; border-radius: 4px; margin-left: 2px;">ADMIN</span>
                            @endif
                            <i class="fa fa-angle-down" style="font-size: 0.75rem;"></i>
                        </a>
                        <div id="profileMenu" style="display: none; position: absolute; top: calc(100% + 8px); right: 0; background: white; min-width: 200px; border-radius: 10px; box-shadow: 0 8px 30px rgba(0,0,0,.12); overflow: hidden; z-index: 1000; border-top: 3px solid {{ Auth::user()->isAdmin() ? '#e74c3c' : '#1a7f4b' }};">
                            {{-- Header --}}
                            <div style="padding: 12px 18px; background: {{ Auth::user()->isAdmin() ? '#fff5f5' : '#f6fdf9' }}; border-bottom: 1px solid #eee;">
                                <div style="font-weight: 700; color: #333; font-size: 0.9rem;">{{ Auth::user()->name }}</div>
                                <div style="font-size: 0.75rem; color: #666;">{{ Auth::user()->email }}</div>
                                <div style="margin-top: 4px;">
                                    @if(Auth::user()->isAdmin())
                                        <span style="font-size: 0.7rem; background: #e74c3c; color: white; padding: 2px 8px; border-radius: 20px; font-weight: 600;">👑 Administrator</span>
                                    @else
                                        <span style="font-size: 0.7rem; background: #1a7f4b; color: white; padding: 2px 8px; border-radius: 20px; font-weight: 600;">👤 Guest</span>
                                    @endif
                                </div>
                            </div>
                            {{-- Menu Items --}}
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" style="display: flex; align-items: center; gap: 10px; padding: 11px 18px; color: #333; text-decoration: none; border-bottom: 1px solid #f0f0f0; font-size: 0.9rem;" onmouseover="this.style.background='#fff5f5'" onmouseout="this.style.background='transparent'">
                                    <i class="fa fa-tachometer-alt" style="color: #e74c3c; width: 16px;"></i> Admin Dashboard
                                </a>
                            @else
                                <a href="{{ route('dashboard') }}" style="display: flex; align-items: center; gap: 10px; padding: 11px 18px; color: #333; text-decoration: none; border-bottom: 1px solid #f0f0f0; font-size: 0.9rem;" onmouseover="this.style.background='#f6fdf9'" onmouseout="this.style.background='transparent'">
                                    <i class="fa fa-th-large" style="color: #1a7f4b; width: 16px;"></i> My Dashboard
                                </a>
                            @endif
                            <a href="{{ route('profile.edit') }}" style="display: flex; align-items: center; gap: 10px; padding: 11px 18px; color: #333; text-decoration: none; border-bottom: 1px solid #f0f0f0; font-size: 0.9rem;" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='transparent'">
                                <i class="fa fa-cog" style="color: #888; width: 16px;"></i> Settings
                            </a>
                            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                @csrf
                                <button type="submit" style="width: 100%; text-align: left; background: none; border: none; padding: 11px 18px; color: #dc3545; cursor: pointer; font-size: 0.9rem; display: flex; align-items: center; gap: 10px;" onmouseover="this.style.background='#fff5f5'" onmouseout="this.style.background='transparent'">
                                    <i class="fa fa-sign-out-alt" style="width: 16px;"></i> Logout
                                </button>
                            </form>
                        </div>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a></li>
                    <li><a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}">Register</a></li>
                @endauth
                <li><a href="{{ route('booking') }}" class="btn-book">Book Now</a></li>
            </div>
        </ul>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Pages Dropdown
        const pagesDropdown = document.getElementById('pagesDropdown');
        const pagesMenu = document.getElementById('pagesMenu');
        const pagesChevron = document.getElementById('pagesChevron');

        if (pagesDropdown && pagesMenu) {
            pagesDropdown.addEventListener('click', function(e) {
                e.preventDefault();
                const isOpen = pagesMenu.style.display !== 'none';
                pagesMenu.style.display = isOpen ? 'none' : 'block';
                if (pagesChevron) pagesChevron.style.transform = isOpen ? 'rotate(0deg)' : 'rotate(180deg)';
            });

            document.addEventListener('click', function(e) {
                if (!pagesDropdown.contains(e.target) && !pagesMenu.contains(e.target)) {
                    pagesMenu.style.display = 'none';
                    if (pagesChevron) pagesChevron.style.transform = 'rotate(0deg)';
                }
            });
        }

        // Profile Dropdown
        const profileDropdown = document.getElementById('profileDropdown');
        const profileMenu = document.getElementById('profileMenu');
        
        if (profileDropdown && profileMenu) {
            profileDropdown.addEventListener('click', function(e) {
                e.preventDefault();
                profileMenu.style.display = profileMenu.style.display === 'none' ? 'block' : 'none';
            });
            
            document.addEventListener('click', function(e) {
                if (!profileDropdown.contains(e.target) && !profileMenu.contains(e.target)) {
                    profileMenu.style.display = 'none';
                }
            });
        }
    });
</script>

{{-- ── Page Content ── --}}
<main>
    @yield('content')
</main>

{{-- ── Footer ── --}}
<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-col" style="text-align: center;">
            <div class="brand" style="margin-bottom:1.5rem; display: flex; align-items: center; justify-content: center;">
                <img src="{{ asset('img/logo.png') }}" alt="Grand Hotel Logo" style="height: 65px; object-fit: contain; filter: drop-shadow(0px 4px 6px rgba(0,0,0,0.1));">
            </div>
            <p style="font-size: 1.05rem;">Luxury hospitality redefined.<br>Your perfect stay awaits.</p>
        </div>
        <div class="footer-col">
            <h4>Services</h4>
            <ul>
                <li><a href="{{ route('services.show', 'rooms') }}"><i class="fa fa-angle-right" style="font-size: 12px; margin-right: 4px; color: var(--green);"></i> Rooms & Apartments</a></li>
                <li><a href="{{ route('services.show', 'food') }}"><i class="fa fa-angle-right" style="font-size: 12px; margin-right: 4px; color: var(--green);"></i> Food & Restaurant</a></li>
                <li><a href="{{ route('services.show', 'spa') }}"><i class="fa fa-angle-right" style="font-size: 12px; margin-right: 4px; color: var(--green);"></i> Spa & Fitness</a></li>
                <li><a href="{{ route('services.show', 'sports') }}"><i class="fa fa-angle-right" style="font-size: 12px; margin-right: 4px; color: var(--green);"></i> Sports & Gaming</a></li>
                <li><a href="{{ route('services.show', 'events') }}"><i class="fa fa-angle-right" style="font-size: 12px; margin-right: 4px; color: var(--green);"></i> Events & Parties</a></li>
                <li><a href="{{ route('services.show', 'gym') }}"><i class="fa fa-angle-right" style="font-size: 12px; margin-right: 4px; color: var(--green);"></i> GYM & Yoga</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>Pages</h4>
            <ul>
                <li><a href="{{ route('home') }}"><i class="fa fa-angle-right" style="font-size: 12px; margin-right: 4px; color: var(--green);"></i> Home</a></li>
                <li><a href="{{ route('about') }}"><i class="fa fa-angle-right" style="font-size: 12px; margin-right: 4px; color: var(--green);"></i> About Us</a></li>
                <li><a href="{{ route('rooms') }}"><i class="fa fa-angle-right" style="font-size: 12px; margin-right: 4px; color: var(--green);"></i> Rooms</a></li>
                <li><a href="{{ route('gallery') }}"><i class="fa fa-angle-right" style="font-size: 12px; margin-right: 4px; color: var(--green);"></i> Gallery</a></li>
                <li><a href="{{ route('contact') }}"><i class="fa fa-angle-right" style="font-size: 12px; margin-right: 4px; color: var(--green);"></i> Contact Us</a></li>
                <li><a href="{{ route('booking') }}"><i class="fa fa-angle-right" style="font-size: 12px; margin-right: 4px; color: var(--green);"></i> Booking</a></li>
                <li><a href="{{ route('team') }}"><i class="fa fa-angle-right" style="font-size: 12px; margin-right: 4px; color: var(--green);"></i> Our Team</a></li>
                <li><a href="{{ route('testimonials') }}"><i class="fa fa-angle-right" style="font-size: 12px; margin-right: 4px; color: var(--green);"></i> Testimonials</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>Contact</h4>
            <ul>
                <li>📍 123 Luxury Lane, Ahmedabad</li>
                <li>📞 +91 79 1234 5678</li>
                <li>✉️ info@grandhotel.com</li>
                <li>⏰ Front Desk 24/7</li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© {{ date('Y') }} Grand Hotel. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/validation.js') }}"></script>
<script src="{{ asset('js/services.js') }}"></script>
@stack('scripts')
</body>
</html>
