@extends('layouts.services_layout')

@section('title', 'About Us')

@section('content')

{{-- ── Hero Carousel (Full size) ── --}}
@php $height = '520px'; @endphp
@include('partials.hero_carousel')

<div style="background: var(--bg-soft); padding-bottom: 80px;">
    {{-- ── Minimalist Breadcrumb ── --}}
    <div style="padding: 20px 0; border-bottom: 1px solid #eaeaeb; background: white; margin-bottom: 60px;">
        <div class="container" style="max-width: 1200px;">
            <div style="font-size: 0.8rem; letter-spacing: 1px; text-transform: uppercase; font-weight: 500;">
                <a href="{{ route('home') }}" style="color: var(--text-muted); text-decoration: none;">Home</a>
                <span style="margin: 0 10px; color: #ccc;">/</span>
                <span style="color: var(--green);">About</span>
            </div>
        </div>
    </div>

<div class="container detail-container">

    {{-- ── Intro ── --}}
    <div class="res-grid-about" style="display:grid; grid-template-columns:1fr 1fr; gap:3rem; align-items:center; margin-bottom:3rem;">
        <div>
            <h2 style="font-family:'Playfair Display',serif; font-size:28px; color:var(--text); margin-bottom:1rem;">
                Welcome to <span class="text-green">Grand Hotel</span>
            </h2>
            <p style="font-size:14px; color:var(--text-muted); line-height:1.85; margin-bottom:1.25rem;">
                For over 15 years, Grand Hotel has been the preferred destination for discerning travellers seeking luxury, comfort, and personalised service. Nestled in the heart of the city, we combine timeless elegance with modern conveniences to create an experience unlike any other.
            </p>
            <p style="font-size:14px; color:var(--text-muted); line-height:1.85;">
                Our world-class facilities, award-winning restaurant, rejuvenating spa, and dedicated team of professionals ensure that every stay is memorable. We take pride in our attention to detail and our commitment to exceeding our guests' expectations at every turn.
            </p>
        </div>
        <div class="gallery-grid" style="gap:10px;">
            <div class="gallery-item"><img src="{{ asset('img/about-1.jpg') }}" style="height:160px;" onerror="this.src='https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&q=80'"></div>
            <div class="gallery-item"><img src="{{ asset('img/about-2.jpg') }}" style="height:160px;" onerror="this.src='https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=400&q=80'"></div>
            <div class="gallery-item"><img src="{{ asset('img/about-3.jpg') }}" style="height:160px;" onerror="this.src='https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=400&q=80'"></div>
            <div class="gallery-item"><img src="{{ asset('img/about-4.jpg') }}" style="height:160px;" onerror="this.src='https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=400&q=80'"></div>
            <div class="gallery-item" style="grid-column:span 2;"><img src="{{ asset('img/carousel-1.jpg') }}" style="height:160px; object-fit:cover;" onerror="this.src='https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=600&q=80'"></div>
        </div>
    </div>

    {{-- ── Stats ── --}}
    <div class="section-block">
        <h2 class="section-heading">By The Numbers</h2>
        <div class="timings-bar">
            <div class="timing-item">
                <span class="timing-label">Luxury Rooms</span>
                <span class="timing-val">{{ $stats['rooms'] }}+</span>
            </div>
            <div class="timing-item">
                <span class="timing-label">Team Members</span>
                <span class="timing-val">{{ $stats['staff'] }}+</span>
            </div>
            <div class="timing-item">
                <span class="timing-label">Happy Guests</span>
                <span class="timing-val">{{ number_format($stats['clients']) }}+</span>
            </div>
            <div class="timing-item">
                <span class="timing-label">Years of Service</span>
                <span class="timing-val">{{ $stats['years'] }}+</span>
            </div>
        </div>
    </div>

    {{-- ── Why Choose Us ── --}}
    <div class="section-block">
        <h2 class="section-heading">Why Choose Grand Hotel</h2>
        <div class="sections-grid">
            <div class="offer-card">
                <h4 class="offer-card-title">🏆 Award-Winning Service</h4>
                <ul class="offer-list">
                    <li><span class="dot"></span>Best Luxury Hotel 2023</li>
                    <li><span class="dot"></span>TripAdvisor Travellers' Choice</li>
                    <li><span class="dot"></span>5-Star Guest Rating consistently</li>
                    <li><span class="dot"></span>Certified Green Hotel</li>
                </ul>
            </div>
            <div class="offer-card">
                <h4 class="offer-card-title">✨ Premium Amenities</h4>
                <ul class="offer-list">
                    <li><span class="dot"></span>Rooftop Swimming Pool</li>
                    <li><span class="dot"></span>Full-Service Spa & Wellness</li>
                    <li><span class="dot"></span>Award-Winning Restaurant</li>
                    <li><span class="dot"></span>State-of-the-art Fitness Centre</li>
                </ul>
            </div>
            <div class="offer-card">
                <h4 class="offer-card-title">🎯 Guest Focused</h4>
                <ul class="offer-list">
                    <li><span class="dot"></span>24/7 Front Desk & Concierge</li>
                    <li><span class="dot"></span>Airport Transfers Available</li>
                    <li><span class="dot"></span>Personalised Room Service</li>
                    <li><span class="dot"></span>Special Occasion Arrangements</li>
                </ul>
            </div>
            <div class="offer-card">
                <h4 class="offer-card-title">📍 Prime Location</h4>
                <ul class="offer-list">
                    <li><span class="dot"></span>Heart of the city</li>
                    <li><span class="dot"></span>5 minutes from airport</li>
                    <li><span class="dot"></span>Near business districts</li>
                    <li><span class="dot"></span>Easy transport access</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- ── CTA ── --}}
    <div class="footer-cta">
        <div class="footer-cta-text">
            <p>Ready to experience unparalleled luxury and hospitality?</p>
            <strong>Book your stay today with exclusive member benefits</strong>
        </div>
        <a href="{{ route('booking') }}" class="btn-primary">Book Now</a>
    </div>
</div>

@endsection
