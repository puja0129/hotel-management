@extends('layouts.services_layout')

@section('title', $service->name)

@section('content')

{{-- ── Hero Banner ── --}}
<section class="detail-hero">
    <img
        src="{{ $service->hero_image }}"
        alt="{{ $service->name }}"
        class="detail-hero-img"
        onerror="this.src='https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1200&q=85'"
    >
    <div class="detail-hero-overlay">
        <div class="container">
            <a href="{{ route('services.index') }}" class="back-btn">← Back to all services</a>
            <span class="hero-tag">{{ $service->tag }}</span>
            <h1 class="hero-title">{{ $service->name }}</h1>
        </div>
    </div>
</section>

{{-- ── Breadcrumb ── --}}
<div class="breadcrumb-bar">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <a href="{{ route('services.index') }}">Services</a>
        <span>/</span>
        <span>{{ $service->name }}</span>
    </div>
</div>

<div class="container detail-container">

    {{-- ── Tagline with Icon ── --}}
    <div class="svc-detail-tagline wow fadeInUp" data-wow-duration="0.6s">
        @if($service->icon_svg)
        <div class="svc-detail-tagline__icon">
            {!! $service->icon_svg !!}
        </div>
        @endif
        <div class="svc-detail-tagline__text">
            <h2>{{ $service->name }}</h2>
            <p>{{ $service->tagline }}</p>
        </div>
    </div>

    {{-- ── Photo Gallery ── --}}
    @if($service->galleries->isNotEmpty())
    <div class="section-block wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">
        <h2 class="section-heading-v2">
            <span class="section-heading-v2__icon"><i class="fa fa-camera"></i></span>
            Photo Gallery
        </h2>
        <div class="gallery-grid-v2">
            @foreach($service->galleries as $index => $photo)
            <div class="gallery-card {{ $index === 0 ? 'gallery-card--featured' : '' }}">
                <img
                    src="{{ $photo->image_url }}"
                    alt="{{ $photo->caption ?? $service->name }}"
                    loading="lazy"
                    onerror="this.src='https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&q=80'"
                >
                <div class="gallery-card__overlay">
                    @if($photo->caption)
                    <span class="gallery-card__caption">{{ $photo->caption }}</span>
                    @endif
                    <span class="gallery-card__zoom"><i class="fa fa-search-plus"></i></span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- ── What We Offer ── --}}
    @if($service->sections->isNotEmpty())
    <div class="section-block wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.15s">
        <h2 class="section-heading-v2">
            <span class="section-heading-v2__icon"><i class="fa fa-concierge-bell"></i></span>
            What We Offer
        </h2>
        <div class="carousel-container-v2">
            <button class="carousel-nav-v2 prev" onclick="scrollCarousel(this, -1)"><i class="fa fa-chevron-left"></i></button>
            <div class="offer-grid-v2 carousel-viewport-v2">
                @php
                    $offerIcons = ['fa-gem', 'fa-star', 'fa-shield-alt', 'fa-award', 'fa-crown', 'fa-heart'];
                    $offerColors = ['#0a4d3c', '#d4af37', '#2d6a4f', '#b5952f', '#0a4d3c', '#d4af37'];
                @endphp
                @foreach($service->sections as $sIdx => $section)
                <div class="offer-card-v2">
                    <div class="offer-card-v2__header">
                        <div class="offer-card-v2__icon" style="background: {{ $offerColors[$sIdx % count($offerColors)] }}15;">
                            <i class="fa {{ $offerIcons[$sIdx % count($offerIcons)] }}" style="color: {{ $offerColors[$sIdx % count($offerColors)] }};"></i>
                        </div>
                        <h4 class="offer-card-v2__title">{{ $section->title }}</h4>
                    </div>
                    <ul class="offer-list-v2">
                        @foreach($section->items as $item)
                        <li>
                            <span class="offer-list-v2__check"><i class="fa fa-check"></i></span>
                            {{ $item }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
            <button class="carousel-nav-v2 next" onclick="scrollCarousel(this, 1)"><i class="fa fa-chevron-right"></i></button>
        </div>
    </div>
    @endif

    {{-- ── Timings & Pricing ── --}}
    @if($service->timings->isNotEmpty())
    <div class="section-block wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">
        <h2 class="section-heading-v2">
            <span class="section-heading-v2__icon"><i class="fa fa-clock"></i></span>
            Timings & Pricing
        </h2>
        <div class="timings-grid-v2">
            @php
                $timingIcons = ['fa-sign-in-alt', 'fa-sign-out-alt', 'fa-bell-concierge', 'fa-tag', 'fa-calendar', 'fa-clock'];
            @endphp
            @foreach($service->timings as $tIdx => $timing)
            <div class="timing-card-v2">
                <div class="timing-card-v2__icon">
                    <i class="fa {{ $timingIcons[$tIdx % count($timingIcons)] }}"></i>
                </div>
                <span class="timing-card-v2__label">{{ $timing->label }}</span>
                <span class="timing-card-v2__value">{{ $timing->value }}</span>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- ── Highlights ── --}}
    @if($service->highlights->isNotEmpty())
    <div class="section-block wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.25s">
        <h2 class="section-heading-v2">
            <span class="section-heading-v2__icon"><i class="fa fa-star"></i></span>
            Highlights
        </h2>
        <div class="highlights-grid-v2">
            @foreach($service->highlights as $item)
            <div class="highlight-card-v2">
                <span class="highlight-card-v2__icon"><i class="fa fa-check-circle"></i></span>
                <span>{{ $item->highlight }}</span>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- ── Footer CTA ── --}}
    @if($service->footer)
    <div class="cta-banner-v2 wow fadeInUp" data-wow-duration="0.6s">
        <div class="cta-banner-v2__content">
            <div class="cta-banner-v2__text">
                <h3>{{ $service->footer->text }}</h3>
                <p class="cta-banner-v2__price">{{ $service->footer->price }}</p>
            </div>
            <a href="{{ $service->footer->cta_url }}" class="cta-banner-v2__btn">
                {{ $service->footer->cta_label }}
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
    </div>
    @endif

    {{-- ── Other Services ── --}}
    @if($otherServices->isNotEmpty())
    <div class="section-block wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.15s">
        <h2 class="section-heading-v2">
            <span class="section-heading-v2__icon"><i class="fa fa-th-large"></i></span>
            You May Also Like
        </h2>
        <div class="other-services-grid-v2">
            @foreach($otherServices as $other)
            <a href="{{ route('services.show', $other->slug) }}" class="other-card-v2">
                <div class="other-card-v2__img">
                    <img
                        src="{{ $other->card_image }}"
                        alt="{{ $other->name }}"
                        loading="lazy"
                        onerror="this.src='https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&q=80'"
                    >
                    <div class="other-card-v2__overlay">
                        <span class="other-card-v2__tag">{{ $other->tag }}</span>
                    </div>
                </div>
                <div class="other-card-v2__body">
                    <h4>{{ $other->name }}</h4>
                    <span class="other-card-v2__link">View Details <i class="fa fa-arrow-right"></i></span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif

</div>{{-- end container --}}

@push('scripts')
<script>
    function scrollCarousel(btn, direction) {
        const viewport = btn.parentElement.querySelector('.carousel-viewport-v2');
        const scrollAmount = viewport.offsetWidth * 0.8;
        viewport.scrollBy({
            left: direction * scrollAmount,
            behavior: 'smooth'
        });
    }
</script>
@endpush
@endsection
