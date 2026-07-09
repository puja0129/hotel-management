@extends('layouts.services_layout')

@section('title', 'Guest Reviews')

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
                <span style="color: var(--green);">Reviews</span>
            </div>
        </div>
    </div>

<section class="services-section">
    <div style="text-align:center; margin-bottom:2.5rem;">
        <p style="font-size:12px; color:var(--green); text-transform:uppercase; letter-spacing:1px; margin-bottom:.5rem;">Testimonials</p>
        <h2 style="font-family:'Playfair Display',serif; font-size:32px; color:var(--text);">Our Guests <span class="text-green">Love Us</span></h2>
    </div>

    <div class="services-grid">
        @if(isset($testimonials) && $testimonials->count())
            @foreach($testimonials as $t)
            @php
                $img = $t->image;
                if ($img && str_starts_with($img, 'http')) {
                    $imgUrl = $img;
                } elseif ($img && str_starts_with($img, 'img/')) {
                    $imgUrl = asset($img);
                } elseif ($img) {
                    $imgUrl = asset('storage/' . $img);
                } else {
                    $imgUrl = '';
                }
            @endphp
            <div class="service-card" style="cursor:default;">
                <div class="card-body" style="padding:1.5rem;">
                    <div style="font-size:20px; color:var(--green); margin-bottom:.75rem;">⭐⭐⭐⭐⭐</div>
                    <p style="font-size:14px; color:var(--text-muted); line-height:1.7; margin-bottom:1.25rem; font-style:italic;">
                        "{{ $t->comment }}"
                    </p>
                    <div style="display:flex; align-items:center; gap:12px; padding-top:.75rem; border-top:1px solid var(--border);">
                        @if($imgUrl)
                            <img src="{{ $imgUrl }}" alt="{{ $t->client_name }}" style="width:42px; height:42px; border-radius:50%; object-fit:cover; border:1px solid var(--border);">
                        @else
                            <div style="width:42px; height:42px; border-radius:50%; background:var(--green-light); display:flex; align-items:center; justify-content:center; font-size:16px; font-weight:600; color:var(--green); flex-shrink:0;">
                                {{ substr($t->client_name, 0, 1) }}
                            </div>
                        @endif
                        <div>
                            <div style="font-size:14px; font-weight:500; color:var(--text);">{{ $t->client_name }}</div>
                            <div style="font-size:12px; color:var(--text-muted);">{{ $t->profession ?? 'Guest' }}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            @php
            $reviews = [
                ['name'=>'Arjun Mehta', 'city'=>'Mumbai', 'rating'=>5, 'text'=>'An absolutely stunning hotel. The service was impeccable, the rooms were spotless, and the food was extraordinary. I will definitely be returning for my next visit to Ahmedabad.'],
                ['name'=>'Priya Sharma', 'city'=>'Delhi', 'rating'=>5, 'text'=>'Grand Hotel exceeded all my expectations. The spa was divine, the staff was incredibly attentive, and the view from my room was breathtaking. Truly a five-star experience.'],
                ['name'=>'Rohan Patel', 'city'=>'Surat', 'rating'=>5, 'text'=>'Perfect for our anniversary trip. The hotel arranged beautiful room decorations and a private dinner. Every little detail was taken care of with such warmth and professionalism.'],
                ['name'=>'Sneha Joshi', 'city'=>'Pune', 'rating'=>5, 'text'=>'Had an amazing corporate stay here. The conference facilities are top-notch, and the business team was very cooperative. The breakfast buffet is the best I have had in any hotel.'],
                ['name'=>'Karan Desai', 'city'=>'Rajkot', 'rating'=>5, 'text'=>'The gym and swimming pool facilities are incredible. Very comfortable beds, fast WiFi, and excellent room service. Will be recommending Grand Hotel to all my friends and family.'],
                ['name'=>'Meera Singh', 'city'=>'Ahmedabad', 'rating'=>5, 'text'=>'We celebrated our wedding reception here and it was magical. The banquet hall was decorated beautifully, the food was delicious, and the coordination team was exceptional throughout.'],
            ];
            @endphp
            @foreach($reviews as $review)
        <div class="service-card" style="cursor:default;">
            <div class="card-body" style="padding:1.5rem;">
                <div style="font-size:20px; color:var(--green); margin-bottom:.75rem;">
                    @for($i=1; $i<=$review['rating']; $i++)⭐@endfor
                </div>
                <p style="font-size:14px; color:var(--text-muted); line-height:1.7; margin-bottom:1.25rem; font-style:italic;">
                    "{{ $review['text'] }}"
                </p>
                <div style="display:flex; align-items:center; gap:12px; padding-top:.75rem; border-top:1px solid var(--border);">
                    <div style="width:42px; height:42px; border-radius:50%; background:var(--green-light); display:flex; align-items:center; justify-content:center; font-size:16px; font-weight:600; color:var(--green); flex-shrink:0;">
                        {{ substr($review['name'], 0, 1) }}
                    </div>
                    <div>
                        <div style="font-size:14px; font-weight:500; color:var(--text);">{{ $review['name'] }}</div>
                        <div style="font-size:12px; color:var(--text-muted);">{{ $review['city'] }}</div>
                    </div>
                </div>
            </div>
        </div>
            @endforeach
        @endif
    </div>

    {{-- ── Rating Summary ── --}}
    <div style="margin-top:3rem;">
        <div class="timings-bar">
            <div class="timing-item">
                <span class="timing-label">Overall Rating</span>
                <span class="timing-val">4.9 / 5.0</span>
            </div>
            <div class="timing-item">
                <span class="timing-label">Cleanliness</span>
                <span class="timing-val">⭐⭐⭐⭐⭐</span>
            </div>
            <div class="timing-item">
                <span class="timing-label">Service</span>
                <span class="timing-val">⭐⭐⭐⭐⭐</span>
            </div>
            <div class="timing-item">
                <span class="timing-label">Value</span>
                <span class="timing-val">⭐⭐⭐⭐⭐</span>
            </div>
        </div>
    </div>

</section>
</div>

@endsection
