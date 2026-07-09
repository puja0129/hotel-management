@extends('layouts.services_layout')

@section('title', 'Explore Our Services')

@section('content')

{{-- ── Hero Carousel ── --}}
@php $height = '380px'; @endphp
@include('partials.hero_carousel')

{{-- ── Services Grid ── --}}
<section class="services-section">
    <div class="services-grid">
        @foreach($services as $service)
        <a href="{{ route('services.show', $service->slug) }}" class="service-card">

            {{-- Card Cover Image --}}
            <div class="card-img-wrap">
                <img
                    src="{{ $service->card_image }}"
                    alt="{{ $service->name }}"
                    loading="lazy"
                    class="card-img"
                    onerror="this.src='https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&q=80'"
                >
                <div class="card-img-overlay">
                    <span class="card-tag">{{ $service->tag }}</span>
                </div>
            </div>

            {{-- Card Body --}}
            <div class="card-body">
                <div class="card-icon-row">
                    @if($service->icon_svg)
                        <div class="icon-box">
                            {!! $service->icon_svg !!}
                        </div>
                    @endif
                    <h3 class="card-title">{{ $service->name }}</h3>
                </div>
                <p class="card-desc">{{ Str::limit($service->tagline, 90) }}</p>

                {{-- Timing quick-preview --}}
                @if($service->timings->isNotEmpty())
                <div class="card-timing">
                    <span class="timing-pill">
                        {{ $service->timings->first()->label }}:
                        {{ $service->timings->first()->value }}
                    </span>
                </div>
                @endif

                <span class="card-arrow">Explore service →</span>
            </div>
        </a>
        @endforeach
    </div>
</section>

@endsection
