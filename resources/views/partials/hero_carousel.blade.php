{{-- ── Hero Carousel Shared Partial ── --}}
@php
    $useDynamicCarousels = isset($carousels) && method_exists($carousels, 'count') && $carousels->count() > 0;
@endphp

@if($useDynamicCarousels)
<div id="homeCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
    <div class="carousel-inner" style="height: {{ $height ?? '520px' }};">
        @foreach($carousels as $carousel)
            @php
                $img = $carousel->image;
                if ($img && str_starts_with($img, 'http')) {
                    $imgUrl = $img;
                } elseif ($img && str_starts_with($img, 'img/')) {
                    $imgUrl = asset($img);
                } elseif ($img) {
                    $imgUrl = asset('storage/' . $img);
                } else {
                    $imgUrl = asset('img/carousel-1.jpg');
                }

                $btn1Href = $carousel->button1_link;
                if ($btn1Href && !str_starts_with($btn1Href, 'http') && !str_starts_with($btn1Href, '/')) {
                    $btn1Href = '/' . ltrim($btn1Href, '/');
                }
                $btn2Href = $carousel->button2_link;
                if ($btn2Href && !str_starts_with($btn2Href, 'http') && !str_starts_with($btn2Href, '/')) {
                    $btn2Href = '/' . ltrim($btn2Href, '/');
                }
            @endphp

            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="height: 100%;">
                <img src="{{ $imgUrl }}" class="d-block w-100" style="height: 100%; object-fit: cover; filter: brightness(0.7);" alt="{{ $carousel->title }}">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="top: 0; bottom: 0;">
                    @if($carousel->subtitle)
                        <span class="hero-tag" style="background: rgba(26,127,75,0.8); padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 1rem; color: white;">{{ $carousel->subtitle }}</span>
                    @endif
                    <h1 class="hero-title" style="font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; margin-bottom: 1.5rem; color: white; text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">{{ $carousel->title }}</h1>

                    <div class="res-header-btns" style="display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
                        @if($carousel->button1_text && $btn1Href)
                            <a href="{{ $btn1Href }}" class="btn-primary" style="padding:12px 32px; text-align:center;">{{ $carousel->button1_text }}</a>
                        @endif
                        @if($carousel->button2_text && $btn2Href)
                            <a href="{{ $btn2Href }}" style="background:#fff; color:var(--green); padding:12px 32px; border-radius:8px; font-size:14px; font-weight:500; transition:background .15s; text-align:center;">{{ $carousel->button2_text }}</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Carousel Controls --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true" style="width: 3rem; height: 3rem; background-color: rgba(26,127,75,0.8); border-radius: 50%; background-size: 50%;"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true" style="width: 3rem; height: 3rem; background-color: rgba(26,127,75,0.8); border-radius: 50%; background-size: 50%;"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@else
<div id="homeCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
    <div class="carousel-inner" style="height: {{ $height ?? '520px' }};">
        {{-- Slide 1: Rooms --}}
        <div class="carousel-item active" style="height: 100%;">
            <img src="{{ asset('img/carousel-1.jpg') }}" class="d-block w-100" style="height: 100%; object-fit: cover; filter: brightness(0.7);" alt="Luxury Rooms">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="top: 0; bottom: 0;">
                <span class="hero-tag" style="background: rgba(26,127,75,0.8); padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 1rem; color: white;">Luxury Living</span>
                <h1 class="hero-title" style="font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; margin-bottom: 1.5rem; color: white; text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">Discover A Brand Luxurious Hotel</h1>
                <p style="color: rgba(255,255,255,0.9); font-size: 16px; margin-bottom: 2rem; max-width: 560px; text-shadow: 1px 1px 4px rgba(0,0,0,0.5);">
                    Experience world-class hospitality with breathtaking views, premium rooms, and unforgettable amenities.
                </p>
                <div class="res-header-btns" style="display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
                    <a href="{{ route('rooms') }}" class="btn-primary" style="padding:12px 32px; text-align:center;">Explore Rooms</a>
                    <a href="{{ route('booking') }}" style="background:#fff; color:var(--green); padding:12px 32px; border-radius:8px; font-size:14px; font-weight:500; transition:background .15s; text-align:center;">Book A Room</a>
                </div>
            </div>
        </div>
        
        {{-- Slide 2: Food & Restaurant --}}
        <div class="carousel-item" style="height: 100%;">
            <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&q=80&w=1600" class="d-block w-100" style="height: 100%; object-fit: cover; filter: brightness(0.6);" alt="Gourmet Dining">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="top: 0; bottom: 0;">
                <span class="hero-tag" style="background: rgba(26,127,75,0.8); padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 1rem; color: white;">Gourmet Dining</span>
                <h1 class="hero-title" style="font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; margin-bottom: 1.5rem; color: white; text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">Exquisite Culinary Journey</h1>
                <p style="color: rgba(255,255,255,0.9); font-size: 16px; margin-bottom: 2rem; max-width: 560px; text-shadow: 1px 1px 4px rgba(0,0,0,0.5);">
                    Indulge your senses with our world-class chefs preparing the finest dishes from around the globe.
                </p>
                <div class="res-header-btns" style="display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
                    <a href="{{ route('services.show', 'food') }}" class="btn-primary" style="padding:12px 32px; text-align:center;">View Menu</a>
                </div>
            </div>
        </div>

        {{-- Slide 3: Gym & Yoga --}}
        <div class="carousel-item" style="height: 100%;">
            <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&q=80&w=1600" class="d-block w-100" style="height: 100%; object-fit: cover; filter: brightness(0.65);" alt="Gym & Yoga">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="top: 0; bottom: 0;">
                <span class="hero-tag" style="background: rgba(26,127,75,0.8); padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 1rem; color: white;">Health & Wellness</span>
                <h1 class="hero-title" style="font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; margin-bottom: 1.5rem; color: white; text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">State of the Art Fitness Center</h1>
                <p style="color: rgba(255,255,255,0.9); font-size: 16px; margin-bottom: 2rem; max-width: 560px; text-shadow: 1px 1px 4px rgba(0,0,0,0.5);">
                    Maintain your health goals with our fully equipped modern gym and tranquil yoga studio.
                </p>
                <div class="res-header-btns" style="display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
                    <a href="{{ route('services.show', 'gym') }}" class="btn-primary" style="padding:12px 32px; text-align:center;">Explore Gym</a>
                </div>
            </div>
        </div>

        {{-- Slide 4: Sports & Gaming --}}
        <div class="carousel-item" style="height: 100%;">
            <img src="https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&q=80&w=1600" class="d-block w-100" style="height: 100%; object-fit: cover; filter: brightness(0.6);" alt="Sports & Gaming">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="top: 0; bottom: 0;">
                <span class="hero-tag" style="background: rgba(26,127,75,0.8); padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 1rem; color: white;">Entertainment</span>
                <h1 class="hero-title" style="font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; margin-bottom: 1.5rem; color: white; text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">Premium Sports & Gaming Lounge</h1>
                <p style="color: rgba(255,255,255,0.9); font-size: 16px; margin-bottom: 2rem; max-width: 560px; text-shadow: 1px 1px 4px rgba(0,0,0,0.5);">
                    Unwind and play! Enjoy arcade machines, billiards, and a dedicated indoor sports facility.
                </p>
                <div class="res-header-btns" style="display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
                    <a href="{{ route('services.show', 'sports') }}" class="btn-primary" style="padding:12px 32px; text-align:center;">Explore Gaming</a>
                </div>
            </div>
        </div>

        {{-- Slide 5: Events & Celebrations --}}
        <div class="carousel-item" style="height: 100%;">
            <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&q=80&w=1600" class="d-block w-100" style="height: 100%; object-fit: cover; filter: brightness(0.65);" alt="Events & Parties">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="top: 0; bottom: 0;">
                <span class="hero-tag" style="background: rgba(26,127,75,0.8); padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 1rem; color: white;">Celebrations</span>
                <h1 class="hero-title" style="font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; margin-bottom: 1.5rem; color: white; text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">Unforgettable Events & Parties</h1>
                <p style="color: rgba(255,255,255,0.9); font-size: 16px; margin-bottom: 2rem; max-width: 560px; text-shadow: 1px 1px 4px rgba(0,0,0,0.5);">
                    Host the perfect wedding, corporate gala, or private celebration in our magnificent banquet halls.
                </p>
                <div class="res-header-btns" style="display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
                    <a href="{{ route('services.show', 'events') }}" class="btn-primary" style="padding:12px 32px; text-align:center;">Book An Event</a>
                </div>
            </div>
        </div>
        
        {{-- Slide 6: Premium Getaway --}}
        <div class="carousel-item" style="height: 100%;">
            <img src="{{ asset('img/carousel-2.jpg') }}" class="d-block w-100" style="height: 100%; object-fit: cover; filter: brightness(0.7);" alt="Premium Getaway">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="top: 0; bottom: 0;">
                <span class="hero-tag" style="background: rgba(26,127,75,0.8); padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 1rem; color: white;">Premium Experience</span>
                <h1 class="hero-title" style="font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; margin-bottom: 1.5rem; color: white; text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">Your Perfect Getaway Awaits</h1>
                <p style="color: rgba(255,255,255,0.9); font-size: 16px; margin-bottom: 2rem; max-width: 560px; text-shadow: 1px 1px 4px rgba(0,0,0,0.5);">
                    Indulge in our exquisite dining, relaxing spa, and state-of-the-art facilities designed for your ultimate comfort.
                </p>
                <div class="res-header-btns" style="display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
                    <a href="{{ route('services.index') }}" class="btn-primary" style="padding:12px 32px; text-align:center;">Our Services</a>
                    <a href="{{ route('gallery') }}" style="background:#fff; color:var(--green); padding:12px 32px; border-radius:8px; font-size:14px; font-weight:500; transition:background .15s; text-align:center;">View Gallery</a>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Carousel Controls --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true" style="width: 3rem; height: 3rem; background-color: rgba(26,127,75,0.8); border-radius: 50%; background-size: 50%;"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true" style="width: 3rem; height: 3rem; background-color: rgba(26,127,75,0.8); border-radius: 50%; background-size: 50%;"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endif

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myCarousel = document.querySelector('#homeCarousel');
        if (myCarousel && typeof bootstrap !== 'undefined') {
            // Only initialize if not already initialized
            var carouselInstance = bootstrap.Carousel.getInstance(myCarousel);
            if (!carouselInstance) {
                var carousel = new bootstrap.Carousel(myCarousel, {
                    interval: 4000,
                    pause: false, // Don't pause on hover
                    ride: 'carousel'
                });
                carousel.cycle(); // Force start scrolling
            }
        }
    });
</script>
@endpush
