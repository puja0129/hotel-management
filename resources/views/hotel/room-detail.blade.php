@extends('layouts.services_layout')

@section('content')
    <!-- Full-Width Hero Carousel -->
    <div id="roomHeroCarousel" class="carousel slide" data-bs-ride="carousel">
        {{-- Indicators --}}
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#roomHeroCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#roomHeroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#roomHeroCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner" style="height: 520px;">
            {{-- Slide 1: Primary Room Image --}}
            <div class="carousel-item active" style="height: 100%;">
                <img src="{{ str_starts_with($room->image, 'http') ? $room->image : asset('img/' . $room->image) }}" class="d-block w-100" style="height: 100%; object-fit: cover; filter: brightness(0.6);" alt="{{ $room->name }}">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="top: 0; bottom: 0;">
                    <span style="background: rgba(26,127,75,0.8); padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.5rem; color: white;">Luxury Suite</span>
                    <h1 style="font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; margin-bottom: 1rem; color: white; text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">{{ $room->name }}</h1>
                    <div style="font-size: 0.8rem; letter-spacing: 1px; text-transform: uppercase;">
                        <a href="{{ route('home') }}" style="color: rgba(255,255,255,0.7); text-decoration: none;">Home</a>
                        <span style="margin: 0 10px; color: rgba(255,255,255,0.3);">/</span>
                        <a href="{{ route('rooms') }}" style="color: rgba(255,255,255,0.7); text-decoration: none;">Rooms</a>
                        <span style="margin: 0 10px; color: rgba(255,255,255,0.3);">/</span>
                        <span style="color: var(--green);">{{ $room->name }}</span>
                    </div>
                </div>
            </div>

            {{-- Slide 2: Luxury Interior --}}
            <div class="carousel-item" style="height: 100%;">
                <img src="{{ asset('img/carousel-1.jpg') }}" class="d-block w-100" style="height: 100%; object-fit: cover; filter: brightness(0.6);" alt="Interior View">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="top: 0; bottom: 0;">
                    <span style="background: rgba(26,127,75,0.8); padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.5rem; color: white;">Premium Comfort</span>
                    <h1 style="font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; margin-bottom: 1rem; color: white; text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">Unmatched Luxury</h1>
                </div>
            </div>

            {{-- Slide 3: Amenities View --}}
            <div class="carousel-item" style="height: 100%;">
                <img src="{{ asset('img/carousel-2.jpg') }}" class="d-block w-100" style="height: 100%; object-fit: cover; filter: brightness(0.6);" alt="Bathroom View">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="top: 0; bottom: 0;">
                    <span style="background: rgba(26,127,75,0.8); padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.5rem; color: white;">Signature Stay</span>
                    <h1 style="font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; margin-bottom: 1rem; color: white; text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">Exceptional Detail</h1>
                </div>
            </div>
        </div>

        {{-- Controls --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#roomHeroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="width: 3rem; height: 3rem; background-color: rgba(26,127,75,0.8); border-radius: 50%; background-size: 40%;"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#roomHeroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="width: 3rem; height: 3rem; background-color: rgba(26,127,75,0.8); border-radius: 50%; background-size: 40%;"></span>
        </button>
    </div>

    <!-- Main Content Area (Ivory/Soft BG) -->
    <div style="background: var(--bg-soft); padding: 80px 0;">
        <div class="container" style="max-width: 1200px;">
            <div class="row g-5">
                
                {{-- LEFT: Room Content --}}
                <div class="col-lg-8">
                    <!-- Room Info Card -->
                    <div style="background: white; border: 1px solid #eaeaeb; padding: 40px; margin-bottom: 30px; box-shadow: 0 5px 15px rgba(0,0,0,0.02);">
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h2 style="font-family: 'Playfair Display', serif; font-size: 2.2rem; color: var(--text); margin-bottom: 10px;">{{ $room->name }}</h2>
                                <div style="display: flex; gap: 4px;">
                                    @for($i=1; $i<=$room->stars; $i++)
                                        <i class="fa fa-star" style="color: var(--gold); font-size: 0.9rem;"></i>
                                    @endfor
                                </div>
                            </div>
                            <div class="text-end">
                                <h3 style="font-family: 'Playfair Display', serif; font-weight: 500; font-size: 2rem; color: var(--text); margin: 0;">₹{{ number_format($room->price, 2) }}</h3>
                                <p style="color: var(--text-muted); font-size: 0.85rem; margin: 0;">per night</p>
                            </div>
                        </div>

                        <div class="row g-4 mb-4">
                            <div class="col-md-4">
                                <div style="background: #fafafa; padding: 20px; border-left: 2px solid var(--green); display: flex; align-items: center; gap: 15px;">
                                    <div style="width: 35px; height: 35px; background: var(--green-light); color: var(--green); display: flex; align-items: center; justify-content: center; border-radius: 50%; flex-shrink: 0;">
                                        <i class="fa fa-bed" style="font-size: 0.85rem;"></i>
                                    </div>
                                    <p style="font-size: 0.95rem; color: var(--text); margin: 0; font-weight: 600;">{{ $room->bed_count }} Bed(s)</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div style="background: #fafafa; padding: 20px; border-left: 2px solid #ccc; display: flex; align-items: center; gap: 15px;">
                                    <div style="width: 35px; height: 35px; background: #f0f0f0; color: var(--text-muted); display: flex; align-items: center; justify-content: center; border-radius: 50%; flex-shrink: 0;">
                                        <i class="fa fa-bath" style="font-size: 0.85rem;"></i>
                                    </div>
                                    <p style="font-size: 0.95rem; color: var(--text); margin: 0; font-weight: 600;">{{ $room->bath_count }} Bath(s)</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div style="background: #fafafa; padding: 20px; border-left: 2px solid {{ $room->wifi ? 'var(--green)' : '#e74c3c' }}; display: flex; align-items: center; gap: 15px;">
                                    <div style="width: 35px; height: 35px; background: {{ $room->wifi ? 'var(--green-light)' : '#fdecea' }}; color: {{ $room->wifi ? 'var(--green)' : '#e74c3c' }}; display: flex; align-items: center; justify-content: center; border-radius: 50%; flex-shrink: 0;">
                                        <i class="fa {{ $room->wifi ? 'fa-wifi' : 'fa-times' }}" style="font-size: 0.85rem;"></i>
                                    </div>
                                    <p style="font-size: 0.95rem; color: var(--text); margin: 0; font-weight: 600;">{{ $room->wifi ? 'Free Wifi' : 'No Wifi' }}</p>
                                </div>
                            </div>
                        </div>

                        <div style="border-top: 1px solid #f5f5f5; padding-top: 30px;">
                            <h4 style="font-family: 'Playfair Display', serif; font-size: 1.4rem; color: var(--text); margin-bottom: 15px;">Description</h4>
                            <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.8; margin-bottom: 25px;">{{ $room->description }}</p>
                            
                            <div style="background: #f6fdf9; border-left: 3px solid var(--green); padding: 20px;">
                                <p style="color: var(--text); font-style: italic; margin: 0; font-size: 0.95rem;">"Book this luxurious suite today to experience world-class hospitality, unparalleled comfort, and prime amenities exclusively offered at Grand Hotel."</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT: Booking Card --}}
                <div class="col-lg-4">
                    <div style="background: white; border: 1px solid #eaeaeb; position: sticky; top: 100px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); overflow: hidden;">
                        <div style="padding: 25px; background: #fafafa; border-bottom: 1px solid #f5f5f5; text-align: center;">
                            <h4 style="font-family: 'Playfair Display', serif; font-size: 1.5rem; color: var(--text); margin: 0;">Book Your Stay</h4>
                        </div>
                        
                        <div style="padding: 30px;">
                            <form action="{{ route('booking.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="room_id" value="{{ $room->id }}">
                                
                                <div class="mb-4">
                                    <label style="display: block; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); margin-bottom: 8px; font-weight: 600;">Check-In Date</label>
                                    <div style="position: relative;">
                                        <input type="date" name="check_in" required style="width: 100%; padding: 12px 15px; border: 1px solid #eaeaeb; font-size: 0.9rem; outline: none; transition: all 0.3s; background: #fafafa;" onfocus="this.style.borderColor='var(--green)'; this.style.background='white'">
                                        <i class="fa fa-calendar" style="position: absolute; right: 15px; top: 15px; color: var(--green); pointer-events: none;"></i>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label style="display: block; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); margin-bottom: 8px; font-weight: 600;">Check-Out Date</label>
                                    <div style="position: relative;">
                                        <input type="date" name="check_out" required style="width: 100%; padding: 12px 15px; border: 1px solid #eaeaeb; font-size: 0.9rem; outline: none; transition: all 0.3s; background: #fafafa;" onfocus="this.style.borderColor='var(--green)'; this.style.background='white'">
                                        <i class="fa fa-calendar" style="position: absolute; right: 15px; top: 15px; color: #e74c3c; pointer-events: none;"></i>
                                    </div>
                                </div>

                                <div class="row g-3 mb-4">
                                    <div class="col-6">
                                        <label style="display: block; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); margin-bottom: 8px; font-weight: 600;">Adults</label>
                                        <select name="adults" style="width: 100%; padding: 12px 15px; border: 1px solid #eaeaeb; font-size: 0.9rem; outline: none; background: #fafafa;">
                                            <option value="1">1 Adult</option>
                                            <option value="2">2 Adults</option>
                                            <option value="3">3 Adults</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label style="display: block; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); margin-bottom: 8px; font-weight: 600;">Children</label>
                                        <select name="children" style="width: 100%; padding: 12px 15px; border: 1px solid #eaeaeb; font-size: 0.9rem; outline: none; background: #fafafa;">
                                            <option value="0">0 Child</option>
                                            <option value="1">1 Child</option>
                                            <option value="2">2 Children</option>
                                        </select>
                                    </div>
                                </div>

                                <div style="margin-top: 35px;">
                                    @auth
                                        <button type="submit" style="width: 100%; background: var(--text); color: white; border: none; padding: 16px; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 2px; font-weight: 600; cursor: pointer; transition: all 0.3s;" onmouseover="this.style.background='var(--green)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.background='var(--text)'; this.style.transform='translateY(0)'">
                                            Proceed to Book
                                        </button>
                                    @else
                                        <a href="{{ route('login') }}" style="display: block; width: 100%; background: var(--text); color: white; text-align: center; text-decoration: none; padding: 16px; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 2px; font-weight: 600; transition: all 0.3s;" onmouseover="this.style.background='var(--green)'" onmouseout="this.style.background='var(--text)'">
                                            Login to Book
                                        </a>
                                    @endauth
                                </div>
                            </form>
                            
                            <div style="margin-top: 25px; text-align: center; padding-top: 20px; border-top: 1px solid #f5f5f5;">
                                <p style="color: var(--text-muted); font-size: 0.75rem; margin: 0;"><i class="fa fa-shield-alt me-1" style="color: var(--green);"></i> Best price guaranteed on direct bookings.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
