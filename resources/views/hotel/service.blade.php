@extends('layouts.services_layout')

@section('title', 'Our Services')

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
                <span style="color: var(--green);">Services</span>
            </div>
        </div>
    </div>

{{-- ── Service Image Mapping ── --}}
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

<section class="services-section">
    {{-- Section Header --}}
    <div class="services-intro wow fadeInUp" data-wow-duration="0.8s">
        <span class="services-intro__label">What We Offer</span>
        <h2 class="services-intro__title">World-Class <span class="text-green">Services</span></h2>
        <p class="services-intro__desc">Indulge in our curated collection of premium hotel services designed to make your stay unforgettable.</p>
        <div class="services-intro__divider"></div>
    </div>

    {{-- Services Grid --}}
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
                <span class="svc-card__link">
                    Explore Service
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </span>
            </div>
        </a>
        @endforeach
    </div>
</section>
</div>

@endsection