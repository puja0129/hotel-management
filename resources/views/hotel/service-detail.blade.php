@extends('layouts.services_layout')

@section('title', $service->title)

@section('content')

{{-- ── Service Image Mapping ── --}}
@php
$serviceImages = [
    'fa-spa'           => [
        'hero' => 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=1200&q=85',
        'gallery' => [
            ['url' => 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=500&q=80', 'caption' => 'Relaxing Spa'],
            ['url' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=500&q=80', 'caption' => 'Aromatherapy'],
            ['url' => 'https://images.unsplash.com/photo-1600334089648-b0d9d3028eb2?w=500&q=80', 'caption' => 'Thermal Pool'],
            ['url' => 'https://images.unsplash.com/photo-1540555700478-4be289fbec6d?w=500&q=80', 'caption' => 'Hot Stone Massage'],
            ['url' => 'https://images.unsplash.com/photo-1519823551278-64ac92734fb1?w=500&q=80', 'caption' => 'Spa Suite'],
            ['url' => 'https://images.unsplash.com/photo-1596178060671-7a80dc8059ea?w=500&q=80', 'caption' => 'Wellness Center'],
        ]
    ],
    'fa-utensils'      => [
        'hero' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1200&q=85',
        'gallery' => [
            ['url' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=500&q=80', 'caption' => 'Fine Dining'],
            ['url' => 'https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?w=500&q=80', 'caption' => 'Gourmet Cuisine'],
            ['url' => 'https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c?w=500&q=80', 'caption' => 'Chef\'s Special'],
            ['url' => 'https://images.unsplash.com/photo-1525648199074-bee30ba3d027?w=500&q=80', 'caption' => 'Breakfast Buffet'],
            ['url' => 'https://images.unsplash.com/photo-1514933651103-005eec06c04b?w=500&q=80', 'caption' => 'Hotel Bar'],
            ['url' => 'https://images.unsplash.com/photo-1559339352-11d035aa65de?w=500&q=80', 'caption' => 'Private Dining'],
        ]
    ],
    'fa-swimming-pool' => [
        'hero' => 'https://images.unsplash.com/photo-1581057403206-455476a6d655?w=1200&q=85',
        'gallery' => [
            ['url' => 'https://images.unsplash.com/photo-1581057403206-455476a6d655?w=500&q=80', 'caption' => 'Infinity Pool'],
            ['url' => 'https://images.unsplash.com/photo-1572331165267-854da2b10ccc?w=500&q=80', 'caption' => 'Pool Lounge'],
            ['url' => 'https://images.unsplash.com/photo-1600334089648-b0d9d3028eb2?w=500&q=80', 'caption' => 'Indoor Pool'],
            ['url' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=500&q=80', 'caption' => 'Resort View'],
            ['url' => 'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=500&q=80', 'caption' => 'Evening Ambience'],
            ['url' => 'https://images.unsplash.com/photo-1542314831-c6a4d14b8ba0?w=500&q=80', 'caption' => 'Pool Bar'],
        ]
    ],
    'fa-dumbbell'      => [
        'hero' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=1200&q=85',
        'gallery' => [
            ['url' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=500&q=80', 'caption' => 'Modern Gym'],
            ['url' => 'https://images.unsplash.com/photo-1540497077202-7c8a3999166f?w=500&q=80', 'caption' => 'Fitness Center'],
            ['url' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=500&q=80', 'caption' => 'Training Area'],
            ['url' => 'https://images.unsplash.com/photo-1576678927484-cc907957088c?w=500&q=80', 'caption' => 'Cardio Zone'],
            ['url' => 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=500&q=80', 'caption' => 'Recovery Spa'],
            ['url' => 'https://images.unsplash.com/photo-1600334089648-b0d9d3028eb2?w=500&q=80', 'caption' => 'Wellness Pool'],
        ]
    ],
];

$defaultImages = [
    'hero' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1200&q=85',
    'gallery' => [
        ['url' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=500&q=80', 'caption' => 'Luxury Resort'],
        ['url' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=500&q=80', 'caption' => 'Premium Suite'],
        ['url' => 'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=500&q=80', 'caption' => 'Evening View'],
        ['url' => 'https://images.unsplash.com/photo-1542314831-c6a4d14b8ba0?w=500&q=80', 'caption' => 'Grand Lobby'],
        ['url' => 'https://images.unsplash.com/photo-1551882547-ff40c0d13c11?w=500&q=80', 'caption' => 'Conference Room'],
        ['url' => 'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=500&q=80', 'caption' => 'Hotel Exterior'],
    ]
];

$imgData = $serviceImages[$service->icon] ?? $defaultImages;
$heroImg = $imgData['hero'];
$galleryImgs = $imgData['gallery'];
@endphp

{{-- ── Hero Carousel (Full size) ── --}}
<div id="serviceHeroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner" style="height: 520px;">
        <div class="carousel-item active" style="height: 100%;">
            <img src="{{ $heroImg }}" class="d-block w-100" style="height: 100%; object-fit: cover; filter: brightness(0.6);" alt="{{ $service->title }}">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="top: 0; bottom: 0;">
                <span style="background: rgba(26,127,75,0.8); padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.5rem; color: white;">Hotel Service</span>
                <h1 style="font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; margin-bottom: 1rem; color: white; text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">{{ $service->title }}</h1>
                <div style="font-size: 0.8rem; letter-spacing: 1px; text-transform: uppercase;">
                    <a href="{{ route('home') }}" style="color: rgba(255,255,255,0.7); text-decoration: none;">Home</a>
                    <span style="margin: 0 10px; color: rgba(255,255,255,0.3);">/</span>
                    <a href="{{ route('services.index') }}" style="color: rgba(255,255,255,0.7); text-decoration: none;">Services</a>
                    <span style="margin: 0 10px; color: rgba(255,255,255,0.3);">/</span>
                    <span style="color: var(--green);">{{ $service->title }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="background: var(--bg-soft); padding-bottom: 80px;">
    {{-- ── Minimalist Breadcrumb Area (Already has breadcrumbs in hero, so I'll keep it clean) ── --}}
    <div style="height: 60px;"></div>

<div class="container detail-container">

    {{-- ── Tagline / Description ── --}}
    <div class="tagline-box">
        <p>{{ $service->short_description }}</p>
    </div>

    {{-- ── Service Info Cards ── --}}
    <div class="section-block">
        <h2 class="section-heading">About This Service</h2>
        <div class="sections-grid">
            <div class="offer-card" style="grid-column: span 2;">
                <div style="display: flex; gap: 1.5rem; align-items: flex-start; flex-wrap: wrap;">
                    {{-- Icon ── --}}
                    @if($service->icon)
                    <div style="flex-shrink:0; width:80px; height:80px; border-radius:16px; background:var(--green-light); display:flex; align-items:center; justify-content:center;">
                        <i class="fa {{ $service->icon }}" style="font-size: 32px; color: var(--green);"></i>
                    </div>
                    @endif
                    <div style="flex:1;">
                        <h3 style="font-family:'Playfair Display',serif; font-size:22px; color:var(--text); margin-bottom:0.75rem;">{{ $service->title }}</h3>
                        <p style="font-size:14px; color:var(--text-muted); line-height:1.8;">
                            Experience our premium {{ strtolower($service->title) }} at Grand Hotel. We believe in providing top-tier amenities that cater to all your needs. Our dedicated staff ensures that every interaction provides unmatched comfort and luxury. Whether you are travelling for business or leisure, our {{ strtolower($service->title) }} service is designed to exceed your expectations.
                        </p>
                        <div style="margin-top:1.25rem; display:flex; flex-wrap:wrap; gap:10px;">
                            <span class="highlight-tag">✓ Professional Staff</span>
                            <span class="highlight-tag">✓ Available 24/7</span>
                            <span class="highlight-tag">✓ Premium Quality</span>
                            <span class="highlight-tag">✓ Guest Focused</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Photo Gallery ── --}}
    <div class="section-block">
        <h2 class="section-heading">Photo Gallery</h2>
        <div class="gallery-grid">
            @foreach($galleryImgs as $gImg)
            <div class="gallery-item">
                <img src="{{ $gImg['url'] }}" alt="{{ $gImg['caption'] }}">
                <div class="gallery-caption">{{ $gImg['caption'] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ── Highlights ── --}}
    <div class="section-block">
        <h2 class="section-heading">Why Choose This Service</h2>
        <div class="highlights-wrap">
            <span class="highlight-tag">Free for Hotel Guests</span>
            <span class="highlight-tag">Expert Staff</span>
            <span class="highlight-tag">World-Class Quality</span>
            <span class="highlight-tag">Personalized Experience</span>
            <span class="highlight-tag">Available 24/7</span>
            <span class="highlight-tag">Premium Facilities</span>
            <span class="highlight-tag">Satisfaction Guaranteed</span>
        </div>
    </div>

    {{-- ── Timings ── --}}
    <div class="section-block">
        <h2 class="section-heading">Quick Info</h2>
        <div class="timings-bar">
            <div class="timing-item">
                <span class="timing-label">Availability</span>
                <span class="timing-val">Daily</span>
            </div>
            <div class="timing-item">
                <span class="timing-label">Hours</span>
                <span class="timing-val">24 / 7</span>
            </div>
            <div class="timing-item">
                <span class="timing-label">For Guests</span>
                <span class="timing-val">Included</span>
            </div>
            <div class="timing-item">
                <span class="timing-label">Staff</span>
                <span class="timing-val">Certified</span>
            </div>
        </div>
    </div>

    {{-- ── CTA Footer ── --}}
    <div class="footer-cta">
        <div class="footer-cta-text">
            <p>Interested in this service? Contact us or make a reservation today.</p>
            <strong>Available exclusively for hotel guests</strong>
        </div>
        <a href="{{ route('contact') }}" class="btn-primary">Contact Us</a>
    </div>

    {{-- ── Other Services ── --}}
    @php $otherServices = \App\Models\HotelService::where('id', '!=', $service->id)->take(3)->get(); @endphp
    @if($otherServices->isNotEmpty())
    <div class="section-block">
        <h2 class="section-heading">Other Services</h2>
        <div class="other-services-grid">
            @foreach($otherServices as $idx => $other)
            @php
                $otherFallback = [
                    'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&q=80',
                    'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=400&q=80',
                    'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=400&q=80',
                ];
                $otherImgMap = [
                    'fa-spa' => 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=400&q=80',
                    'fa-utensils' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=400&q=80',
                    'fa-swimming-pool' => 'https://images.unsplash.com/photo-1581057403206-455476a6d655?w=400&q=80',
                    'fa-dumbbell' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=400&q=80',
                    'fa-wifi' => 'https://images.unsplash.com/photo-1596394516093-501ba68a0ba6?w=400&q=80',
                    'fa-concierge-bell' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&q=80',
                    'fa-car' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=400&q=80',
                    'fa-coffee' => 'https://images.unsplash.com/photo-1525648199074-bee30ba3d027?w=400&q=80',
                ];
                $otherImg = $otherImgMap[$other->icon] ?? $otherFallback[$idx % count($otherFallback)];
            @endphp
            <a href="{{ route('service.detail', $other->id) }}" class="other-card">
                <img src="{{ $otherImg }}" alt="{{ $other->title }}">
                <div class="other-card-body">
                    <span class="other-tag">Hotel Service</span>
                    <h4>{{ $other->title }}</h4>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</div>
</div>

@endsection
