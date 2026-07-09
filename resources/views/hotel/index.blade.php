@extends('layouts.services_layout')

@section('title', 'Home')

@section('content')

{{-- ── Hero Carousel ── --}}
@php $height = '520px'; @endphp
@include('partials.hero_carousel')

{{-- ── Quick Booking Bar ── --}}
@auth
<div style="background:var(--bg-soft); border-bottom:1px solid var(--border); padding: 1.5rem 1.25rem;">
    <div class="container">
        <form action="{{ route('booking.store') }}" method="POST" data-validate="true">
            @csrf
            <div class="res-grid-about" style="display:grid; grid-template-columns: repeat(4,1fr) auto; gap:12px; align-items:end;">
                <div>
                    <label style="font-size:11px; color:var(--text-muted); text-transform:uppercase; letter-spacing:.5px; display:block; margin-bottom:5px;">Check In</label>
                    <input type="date" name="check_in" style="width:100%; border:1px solid var(--border); border-radius:8px; padding:9px 12px; font-size:14px;" required>
                </div>
                <div>
                    <label style="font-size:11px; color:var(--text-muted); text-transform:uppercase; letter-spacing:.5px; display:block; margin-bottom:5px;">Check Out</label>
                    <input type="date" name="check_out" style="width:100%; border:1px solid var(--border); border-radius:8px; padding:9px 12px; font-size:14px;" required>
                </div>
                <div>
                    <label style="font-size:11px; color:var(--text-muted); text-transform:uppercase; letter-spacing:.5px; display:block; margin-bottom:5px;">Adults</label>
                    <select name="adults" style="width:100%; border:1px solid var(--border); border-radius:8px; padding:9px 12px; font-size:14px;">
                        <option value="1">1 Adult</option>
                        <option value="2">2 Adults</option>
                        <option value="3">3 Adults</option>
                    </select>
                </div>
                <div>
                    <label style="font-size:11px; color:var(--text-muted); text-transform:uppercase; letter-spacing:.5px; display:block; margin-bottom:5px;">Room</label>
                    <select name="room_id" style="width:100%; border:1px solid var(--border); border-radius:8px; padding:9px 12px; font-size:14px;" required>
                        <option value="">Select Room</option>
                        @foreach(\App\Models\Room::where('is_available', true)->get() as $r)
                        <option value="{{ $r->id }}">{{ $r->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn-primary" style="padding:10px 24px; white-space:nowrap; cursor:pointer; border:none;">Book Now</button>
            </div>
        </form>
    </div>
</div>
@endauth

{{-- ── Featured Rooms ── --}}
<section class="services-section">
    <div style="text-align:center; margin-bottom:2.5rem;">
        <p style="font-size:12px; color:var(--green); text-transform:uppercase; letter-spacing:1px; margin-bottom:.5rem;">Accommodation</p>
        <h2 style="font-family:'Playfair Display',serif; font-size:32px; color:var(--text);">Explore Our <span class="text-green">Rooms</span></h2>
    </div>
    <div class="services-grid">
        @foreach($rooms->take(6) as $room)
        <div class="service-card">
            <div class="card-img-wrap">
                <img class="card-img"
                     src="{{ str_starts_with($room->image, 'http') ? $room->image : asset('storage/' . $room->image) }}"
                     onerror="this.src='https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=600&q=80'"
                     alt="{{ $room->name }}"
                     loading="lazy">
                <div class="card-img-overlay">
                    <span class="card-tag">₹{{ number_format($room->price) }}/Night</span>
                </div>
            </div>
            <div class="card-body">
                <div class="card-icon-row">
                    <div class="icon-box">
                        <svg viewBox="0 0 24 24"><path d="M7 14c1.66 0 3-1.34 3-3S8.66 8 7 8s-3 1.34-3 3 1.34 3 3 3zm12-7H11v8H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z"/></svg>
                    </div>
                    <span class="card-title">{{ $room->name }}</span>
                </div>
                <div style="display:flex; gap:12px; font-size:12px; color:var(--text-muted);">
                    <span>🛏 {{ $room->bed_count }} Bed</span>
                    <span>🛁 {{ $room->bath_count }} Bath</span>
                    @if($room->wifi)<span>📶 Wifi</span>@endif
                </div>
                <p class="card-desc">{{ Str::limit($room->description, 80) }}</p>
                <div style="display:flex; gap:8px; margin-top:auto; padding-top:8px;">
                    <a href="{{ route('room.detail', $room->id) }}" class="btn-primary" style="flex:1; text-align:center; padding:8px 12px; font-size:13px;">View Detail</a>
                    <a href="{{ route('booking') }}?room_id={{ $room->id }}" style="flex:1; border:1px solid var(--green); color:var(--green); border-radius:8px; text-align:center; padding:8px 12px; font-size:13px; font-weight:500;">Book Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div style="text-align:center; margin-top:2rem;">
        <a href="{{ route('rooms') }}" class="btn-primary" style="padding:12px 32px;">View All Rooms</a>
    </div>
</section>

{{-- ── About Strip ── --}}
<div style="background:var(--bg-soft); border-top:1px solid var(--border); border-bottom:1px solid var(--border); padding:3rem 1.25rem;">
    <div class="container res-grid-about" style="display:grid; grid-template-columns: 1fr 1fr; gap:3rem; align-items:center;">
        <div>
            <p style="font-size:12px; color:var(--green); text-transform:uppercase; letter-spacing:1px; margin-bottom:.5rem;">About Us</p>
            <h2 style="font-family:'Playfair Display',serif; font-size:28px; color:var(--text); margin-bottom:1rem;">Welcome to <span class="text-green">Grand Hotel</span></h2>
            <p style="font-size:14px; color:var(--text-muted); line-height:1.8; margin-bottom:1.5rem;">
                Experience unparalleled luxury at Grand Hotel — where world-class amenities, breathtaking views, and personalized service combine to create memories that last a lifetime. Nestled in the heart of the city, we've been the preferred destination for discerning travelers for over 15 years.
            </p>
            <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:12px; margin-bottom:1.5rem;">
                <div class="timing-item">
                    <span class="timing-label">Luxury Rooms</span>
                    <span class="timing-val">{{ $rooms->count() }}+</span>
                </div>
                <div class="timing-item">
                    <span class="timing-label">Years of Excellence</span>
                    <span class="timing-val">15+</span>
                </div>
                <div class="timing-item">
                    <span class="timing-label">Happy Guests</span>
                    <span class="timing-val">1200+</span>
                </div>
            </div>
            <a href="{{ route('about') }}" class="btn-primary" style="padding:10px 28px;">About Us</a>
        </div>
        <div class="gallery-grid" style="gap:10px;">
            <div class="gallery-item"><img src="{{ asset('img/about-1.jpg') }}" style="height:150px;" onerror="this.src='https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&q=80'"></div>
            <div class="gallery-item"><img src="{{ asset('img/about-2.jpg') }}" style="height:150px;" onerror="this.src='https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=400&q=80'"></div>
            <div class="gallery-item"><img src="{{ asset('img/about-3.jpg') }}" style="height:150px;" onerror="this.src='https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=400&q=80'"></div>
            <div class="gallery-item"><img src="{{ asset('img/about-4.jpg') }}" style="height:150px;" onerror="this.src='https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=400&q=80'"></div>
            <div class="gallery-item" style="grid-column:span 2;"><img src="{{ asset('img/carousel-1.jpg') }}" style="height:150px; object-fit:cover;" onerror="this.src='https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=600&q=80'"></div>
        </div>
    </div>
</div>

{{-- ── Services Preview ── --}}
@php
$serviceImages = [
    'fa-spa'           => 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=600&q=80',
    'fa-utensils'      => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=600&q=80',
    'fa-swimming-pool' => 'https://images.unsplash.com/photo-1581057403206-455476a6d655?w=600&q=80',
    'fa-dumbbell'      => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=600&q=80',
    'fa-wifi'          => 'https://images.unsplash.com/photo-1596394516093-501ba68a0ba6?w=600&q=80',
    'fa-concierge-bell'=> 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=600&q=80',
    'fa-car'           => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=600&q=80',
    'fa-glass-cheers'  => 'https://images.unsplash.com/photo-1514933651103-005eec06c04b?w=600&q=80',
    'fa-bed'           => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=600&q=80',
    'fa-baby'          => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=600&q=80',
    'fa-broom'         => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=600&q=80',
    'fa-shuttle-van'   => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=600&q=80',
    'fa-coffee'        => 'https://images.unsplash.com/photo-1525648199074-bee30ba3d027?w=600&q=80',
    'fa-cocktail'      => 'https://images.unsplash.com/photo-1514933651103-005eec06c04b?w=600&q=80',
    'fa-hot-tub'       => 'https://images.unsplash.com/photo-1600334089648-b0d9d3028eb2?w=600&q=80',
];
$fallbackImages = [
    'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=600&q=80',
    'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=600&q=80',
    'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=600&q=80',
    'https://images.unsplash.com/photo-1542314831-c6a4d14b8ba0?w=600&q=80',
    'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=600&q=80',
    'https://images.unsplash.com/photo-1551882547-ff40c0d13c11?w=600&q=80',
];
@endphp

<section class="services-section" style="padding-top:3rem;">
    <div class="services-intro wow fadeInUp" data-wow-duration="0.8s" style="margin-bottom:2.5rem;">
        <span class="services-intro__label">What We Offer</span>
        <h2 class="services-intro__title">Our <span class="text-green">Services</span></h2>
        <div class="services-intro__divider"></div>
        <p class="services-intro__desc mt-3">Indulge in our curated collection of premium hotel services designed to make your stay unforgettable.</p>
    </div>

    <div class="services-grid-v2">
        @foreach($services as $index => $service)
        @php
            $imgUrl = $serviceImages[$service->icon] ?? $fallbackImages[$index % count($fallbackImages)];
        @endphp
        <a href="{{ route('service.detail', $service->id) }}" class="svc-card wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="{{ ($index % 3) * 0.15 }}s">
            {{-- Card Image --}}
            <div class="svc-card__img-wrap">
                <img src="{{ $imgUrl }}" alt="{{ $service->title }}" class="svc-card__img" loading="lazy">
                <div class="svc-card__img-overlay"></div>
                <div class="svc-card__icon-badge">
                    <i class="fa {{ $service->icon }}"></i>
                </div>
            </div>
            {{-- Card Content --}}
            <div class="svc-card__body">
                <h3 class="svc-card__title">{{ $service->title }}</h3>
                <p class="svc-card__desc">{{ Str::limit($service->short_description, 90) }}</p>
                <div style="display:flex; gap:10px; margin-top:1.25rem;">
                    <span class="btn btn-outline-success" style="flex:1; border:1px solid var(--green); color:var(--green); background:transparent; border-radius:8px; padding:8px 0; font-size:13px; font-weight:600; text-align:center; transition:all .3s;">Explore service →</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    <div style="text-align:center; margin-top:3rem;">
        <a href="{{ route('services.index') }}" class="btn-primary" style="padding:12px 32px; border-radius:8px; display:inline-block;">View All Services</a>
    </div>
</section>


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myCarousel = document.querySelector('#homeCarousel');
        if (myCarousel && typeof bootstrap !== 'undefined') {
            var carousel = new bootstrap.Carousel(myCarousel, {
                interval: 4000,
                pause: false, // Don't pause on hover
                ride: 'carousel'
            });
            carousel.cycle(); // Force start scrolling
        }
    });
</script>
@endpush

@endsection