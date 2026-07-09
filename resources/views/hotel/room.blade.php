@extends('layouts.services_layout')

@section('title', 'Our Rooms')

@section('content')

{{-- ── Hero Carousel (Full size like homepage) ── --}}
@php $height = '520px'; @endphp
@include('partials.hero_carousel')

<div style="background: var(--bg-soft); padding-bottom: 80px;">
    {{-- ── Minimalist Breadcrumb ── --}}
    <div style="padding: 20px 0; border-bottom: 1px solid #eaeaeb; background: white; margin-bottom: 60px;">
        <div class="container" style="max-width: 1200px;">
            <div style="font-size: 0.8rem; letter-spacing: 1px; text-transform: uppercase; font-weight: 500;">
                <a href="{{ route('home') }}" style="color: var(--text-muted); text-decoration: none;">Home</a>
                <span style="margin: 0 10px; color: #ccc;">/</span>
                <span style="color: var(--green);">Rooms</span>
            </div>
        </div>
    </div>

    {{-- ── Rooms Grid Section ── --}}
    <div class="container" style="max-width: 1200px;">
        <div style="text-align: center; margin-bottom: 50px;">
            <p style="font-size: 0.8rem; letter-spacing: 4px; text-transform: uppercase; color: var(--green); margin-bottom: 10px; font-weight: 600;">Accommodation</p>
            <h2 style="font-family: 'Playfair Display', serif; font-size: 2.8rem; color: var(--text); font-weight: 500;">Explore Our <span style="color: var(--green); font-style: italic;">Rooms</span></h2>
            <div style="width: 60px; height: 2px; background: var(--green); margin: 20px auto;"></div>
        </div>

        <div class="row g-4">
            @forelse($rooms as $room)
            <div class="col-lg-4 col-md-6">
                <div style="background: white; border: 1px solid #eaeaeb; transition: all 0.3s; height: 100%; display: flex; flex-direction: column;" onmouseover="this.style.borderColor='var(--green)'; this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.05)'" onmouseout="this.style.borderColor='#eaeaeb'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                    {{-- Image Carousel Wrap --}}
                    <div id="roomCarousel-{{ $room->id }}" class="carousel slide" data-bs-ride="carousel" style="height: 240px; overflow: hidden;">
                        <div class="carousel-inner" style="height: 100%;">
                            {{-- Slide 1: Main Photo --}}
                            <div class="carousel-item active" style="height: 100%;">
                                <img src="{{ str_starts_with($room->image, 'http') ? $room->image : asset('img/' . $room->image) }}"
                                     onerror="this.src='https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=600&q=80'"
                                     alt="{{ $room->name }}"
                                     style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            {{-- Slide 2: Luxury View --}}
                            <div class="carousel-item" style="height: 100%;">
                                <img src="{{ asset('img/carousel-1.jpg') }}"
                                     alt="Luxury Interior"
                                     style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            {{-- Slide 3: Amenities View --}}
                            <div class="carousel-item" style="height: 100%;">
                                <img src="{{ asset('img/carousel-2.jpg') }}"
                                     alt="Amenities"
                                     style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </div>
                        
                        {{-- Discrete Controls --}}
                        <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel-{{ $room->id }}" data-bs-slide="prev" style="width: 10%;">
                            <span class="carousel-control-prev-icon" aria-hidden="true" style="width: 1.5rem; height: 1.5rem; background-color: rgba(26,127,75,0.5); border-radius: 50%; background-size: 50%;"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel-{{ $room->id }}" data-bs-slide="next" style="width: 10%;">
                            <span class="carousel-control-next-icon" aria-hidden="true" style="width: 1.5rem; height: 1.5rem; background-color: rgba(26,127,75,0.5); border-radius: 50%; background-size: 50%;"></span>
                        </button>

                        <div style="position: absolute; top: 15px; right: 15px; z-index: 5;">
                            <span style="background: var(--green); color: white; padding: 4px 12px; font-size: 0.75rem; font-weight: 600; border-radius: 50px; box-shadow: 0 4px 10px rgba(26,127,75,0.3);">
                                ₹{{ number_format($room->price) }} / Night
                            </span>
                        </div>
                    </div>

                    {{-- Body --}}
                    <div style="padding: 30px; flex-grow: 1; display: flex; flex-direction: column;">
                        <div style="font-size: 0.7rem; color: var(--gold); margin-bottom: 10px; letter-spacing: 1px;">
                            @for($i=1; $i<=$room->stars; $i++)<i class="fas fa-star"></i>@endfor
                        </div>
                        
                        <h4 style="font-family: 'Playfair Display', serif; font-size: 1.4rem; color: var(--text); margin-bottom: 15px; font-weight: 500;">{{ $room->name }}</h4>
                        
                        <div style="display: flex; gap: 20px; font-size: 0.8rem; color: var(--text-muted); margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid #f5f5f5;">
                            <span><i class="fa fa-bed" style="color: var(--green); margin-right: 6px;"></i> {{ $room->bed_count }} Bed</span>
                            <span><i class="fa fa-bath" style="color: var(--green); margin-right: 6px;"></i> {{ $room->bath_count }} Bath</span>
                            @if($room->wifi)<span><i class="fa fa-wifi" style="color: var(--green); margin-right: 6px;"></i> Wifi</span>@endif
                        </div>

                        <p style="font-size: 0.9rem; color: var(--text-muted); line-height: 1.6; margin-bottom: 25px;">{{ Str::limit($room->description, 90) }}</p>
                        
                        <div style="margin-top: auto; display: flex; gap: 10px;">
                            <a href="{{ route('room.detail', $room->id) }}" style="flex: 1; text-align: center; border: 1px solid var(--text); color: var(--text); text-decoration: none; padding: 10px 0; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 600; transition: all 0.3s;" onmouseover="this.style.background='var(--text)'; this.style.color='white'" onmouseout="this.style.background='white'; this.style.color='var(--text)'">Details</a>
                            <a href="{{ route('booking') }}?room_id={{ $room->id }}" style="flex: 1; text-align: center; background: var(--green); color: white; text-decoration: none; padding: 10px 0; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 600; transition: all 0.3s;" onmouseover="this.style.background='var(--text)'" onmouseout="this.style.background='var(--green)'">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div style="text-align: center; padding: 100px 20px; grid-column: span 3; color: var(--text-muted);">
                <i class="fa fa-search" style="font-size: 3rem; color: #f0f0f0; margin-bottom: 20px;"></i>
                <h4 style="font-family: 'Playfair Display', serif;">No rooms available at the moment.</h4>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection