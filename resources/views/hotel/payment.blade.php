@extends('layouts.services_layout')

@section('title', 'Secure Checkout')

@section('content')
    <!-- Checkout Hero Carousel -->
    <div id="checkoutHeroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" style="height: 400px;">
            <div class="carousel-item active" style="height: 100%;">
                <img src="{{ asset('img/carousel-1.jpg') }}" class="d-block w-100" style="height: 100%; object-fit: cover; filter: brightness(0.6);" alt="Grand Hotel">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="top: 0; bottom: 0;">
                    <span style="background: rgba(26,127,75,0.8); padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.5rem; color: white;">Booking Process</span>
                    <h1 style="font-family: 'Playfair Display', serif; font-size: 32px; font-weight: 700; margin-bottom: 1rem; color: white;">Secure Checkout</h1>
                    <div style="font-size: 0.8rem; letter-spacing: 1px; text-transform: uppercase;">
                        <a href="{{ route('home') }}" style="color: rgba(255,255,255,0.7); text-decoration: none;">Home</a>
                        <span style="margin: 0 10px; color: rgba(255,255,255,0.3);">/</span>
                        <span style="color: var(--green);">Payment</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Area (Ivory/Soft BG) -->
    <div style="background: var(--bg-soft); padding: 80px 0;">
        <div class="container" style="max-width: 1200px;">
            <div class="row g-5">
                
                {{-- LEFT: Payment Content --}}
                <div class="col-lg-7">
                    <!-- Summary Card (Dashboard Style: White, Bordered) -->
                    <div style="background: white; border: 1px solid #eaeaeb; padding: 40px; margin-bottom: 30px;">
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h4 style="font-family: 'Playfair Display', serif; font-size: 1.6rem; color: var(--text); margin-bottom: 5px;">Reservation Summary</h4>
                                <p style="color: var(--text-muted); font-size: 0.85rem; margin: 0;">Reference: <span style="font-weight: 600; color: var(--text);">#BKG-{{ \Carbon\Carbon::parse($booking->created_at ?? now())->format('Y') }}-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</span></p>
                            </div>
                            <div class="text-end">
                                <span style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1.5px; font-weight: 600; color: var(--green); background: #f6fdf9; border: 1px solid #eeffee; padding: 6px 15px; border-radius: 50px;">
                                    <i class="fa fa-circle" style="font-size: 6px; vertical-align: middle; margin-right: 4px; position: relative; top: -1px;"></i> Confirmed
                                </span>
                            </div>
                        </div>

                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div style="background: #fafafa; padding: 20px; border-left: 2px solid var(--green);">
                                    <p style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; color: #a0a0a0; margin-bottom: 5px;">Room Selected</p>
                                    <p style="font-size: 1.05rem; color: var(--text); margin: 0; font-weight: 600;">{{ $booking->room->name ?? 'Luxury Room' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="background: #fafafa; padding: 20px; border-left: 2px solid #ccc;">
                                    <p style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; color: #a0a0a0; margin-bottom: 5px;">Stay Details</p>
                                    <p style="font-size: 1.05rem; color: var(--text); margin: 0; font-weight: 600;">{{ $booking->nights }} Nights • {{ $booking->adults + $booking->children }} Guests</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div style="background: white; border: 1px solid #f5f5f5; padding: 20px;">
                                    <p style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; color: #a0a0a0; margin-bottom: 5px;">Check-In</p>
                                    <p style="color: var(--text); margin: 0; font-weight: 600;">{{ \Carbon\Carbon::parse($booking->check_in)->format('d M, Y') }}</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div style="background: white; border: 1px solid #f5f5f5; padding: 20px;">
                                    <p style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; color: #a0a0a0; margin-bottom: 5px;">Check-Out</p>
                                    <p style="color: var(--text); margin: 0; font-weight: 600;">{{ \Carbon\Carbon::parse($booking->check_out)->format('d M, Y') }}</p>
                                </div>
                            </div>
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 25px; border-top: 1px solid #f5f5f5;">
                            <div>
                                <p style="font-weight: 600; color: var(--text); margin: 0;">Total Investment</p>
                                <p style="color: var(--text-muted); font-size: 0.8rem; margin: 0;">Inclusive of all institutional taxes</p>
                            </div>
                            <div class="text-end">
                                <h3 style="font-family: 'Playfair Display', serif; font-weight: 500; font-size: 2.2rem; color: var(--text); margin: 0;">₹{{ number_format($booking->total_price, 2) }}</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Form Card (Dashboard Style: White, Bordered) -->
                    <div style="background: white; border: 1px solid #eaeaeb; overflow: hidden;">
                        <div style="padding: 25px 40px; background: #fafafa; border-bottom: 1px solid #f5f5f5; display: flex; align-items: center; gap: 15px;">
                            <div style="width: 40px; height: 40px; background: var(--green-light); color: var(--green); display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                                <i class="fa fa-lock"></i>
                            </div>
                            <div>
                                <h5 style="color: var(--text); font-size: 1.1rem; font-weight: 600; margin: 0;">Payment Details</h5>
                                <p style="color: var(--text-muted); font-size: 0.75rem; margin: 0;">Secure encrypted transaction</p>
                            </div>
                        </div>
                        <div style="padding: 40px;">
                            <form action="{{ route('payment.success') }}" method="GET">
                                <input type="hidden" name="session_id" value="{{ $dummySessionId ?? 'dummy_session' }}">
                                
                                <div class="mb-4">
                                    <label style="display: block; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); margin-bottom: 8px; font-weight: 600;">Cardholder Name</label>
                                    <input type="text" name="card_name" value="{{ auth()->user()->name ?? '' }}" required style="width: 100%; padding: 12px 15px; border: 1px solid #eaeaeb; font-size: 0.95rem; outline: none; transition: border-color 0.3s;" onfocus="this.style.borderColor='var(--green)'" onblur="this.style.borderColor='#eaeaeb'">
                                </div>

                                <div class="mb-4">
                                    <label style="display: block; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); margin-bottom: 8px; font-weight: 600;">Card Number</label>
                                    <div style="display: flex;">
                                        <input type="text" name="card_number" placeholder="0000 0000 0000 0000" required style="flex: 1; padding: 12px 15px; border: 1px solid #eaeaeb; border-right: none; font-size: 0.95rem; outline: none; letter-spacing: 1px;" onfocus="this.style.borderColor='var(--green)'" onblur="this.style.borderColor='#eaeaeb'">
                                        <span style="background: white; border: 1px solid #eaeaeb; padding: 12px 15px; color: #ccc;"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>

                                <div class="row g-4 mb-5">
                                    <div class="col-md-6">
                                        <label style="display: block; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); margin-bottom: 8px; font-weight: 600;">Expiration</label>
                                        <input type="text" name="card_expiry" placeholder="MM/YY" required style="width: 100%; padding: 12px 15px; border: 1px solid #eaeaeb; font-size: 0.95rem; outline: none;" onfocus="this.style.borderColor='var(--green)'" onblur="this.style.borderColor='#eaeaeb'">
                                    </div>
                                    <div class="col-md-6">
                                        <label style="display: block; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); margin-bottom: 8px; font-weight: 600;">CVC / CVV</label>
                                        <input type="text" name="card_cvv" placeholder="123" required style="width: 100%; padding: 12px 15px; border: 1px solid #eaeaeb; font-size: 0.95rem; outline: none;" onfocus="this.style.borderColor='var(--green)'" onblur="this.style.borderColor='#eaeaeb'">
                                    </div>
                                </div>

                                <div style="display: flex; flex-direction: column; gap: 15px;">
                                    <button type="submit" style="background: var(--text); color: white; border: none; padding: 15px; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 2px; font-weight: 500; cursor: pointer; transition: background 0.3s;" onmouseover="this.style.background='var(--green)'" onmouseout="this.style.background='var(--text)'">
                                        Complete Reservation
                                    </button>
                                    <a href="{{ route('dashboard') }}" style="color: var(--text-muted); text-decoration: none; font-size: 0.85rem; text-align: center; font-weight: 500; transition: color 0.3s;" onmouseover="this.style.color='var(--text)'" onmouseout="this.style.color='var(--text-muted)'">
                                        <i class="fa fa-arrow-left me-2"></i> Return to dashboard
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- RIGHT: Sidebar --}}
                <div class="col-lg-5">
                    <div style="background: white; border: 1px solid #eaeaeb; height: 100%;">
                        <div style="padding: 50px 40px; border-bottom: 1px solid #f5f5f5; text-align: center;">
                            <h4 style="font-family: 'Playfair Display', serif; font-size: 1.6rem; color: var(--text); margin-bottom: 0;">Your Premium Benefits</h4>
                        </div>
                        
                        <div style="padding: 40px;">
                            <div style="display: flex; flex-direction: column; gap: 30px;">
                                @php
                                    $benefits = [
                                        ['icon' => 'fa-check', 'title' => 'Instant Confirmation', 'desc' => 'Your room is locked immediately upon payment.'],
                                        ['icon' => 'fa-utensils', 'title' => 'Signature Dining', 'desc' => 'Priority seating at our rooftop restaurant.'],
                                        ['icon' => 'fa-spa', 'title' => 'Wellness Access', 'desc' => 'Complimentary 30-min sauna session included.'],
                                        ['icon' => 'fa-car', 'title' => 'Airport Pickup', 'desc' => 'Limo service available (on request).'],
                                        ['icon' => 'fa-concierge-bell', 'title' => '24/7 Butler', 'desc' => 'Personal concierge just a call away.'],
                                    ];
                                @endphp

                                @foreach($benefits as $b)
                                <div style="display: flex; gap: 20px;">
                                    <div style="width: 35px; height: 35px; border: 1px solid #f5f5f5; background: #fafafa; color: var(--text); display: flex; align-items: center; justify-content: center; border-radius: 50%; flex-shrink: 0;">
                                        <i class="fa {{ $b['icon'] }}" style="font-size: 0.8rem;"></i>
                                    </div>
                                    <div>
                                        <h6 style="font-weight: 600; color: var(--text); margin-bottom: 3px; font-size: 0.95rem;">{{ $b['title'] }}</h6>
                                        <p style="color: var(--text-muted); font-size: 0.8rem; line-height: 1.5; margin: 0;">{{ $b['desc'] }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div style="margin-top: 50px; padding: 40px 30px; background: var(--text); text-align: center;">
                                <h5 style="color: var(--green-light); margin-bottom: 10px; font-weight: 600;">Secure Transaction</h5>
                                <p style="color: rgba(255,255,255,0.7); font-size: 0.8rem; line-height: 1.6; margin-bottom: 25px;">Your data is protected by industry-standard SSL encryption technology.</p>
                                
                                <div style="display: flex; justify-content: center; gap: 20px; color: white;">
                                    <i class="fab fa-cc-visa fa-2x"></i>
                                    <i class="fab fa-cc-mastercard fa-2x"></i>
                                    <i class="fab fa-cc-amex fa-2x"></i>
                                </div>
                            </div>
                        </div>

                        <div style="padding: 25px; text-align: center; border-top: 1px solid #f5f5f5; background: #fafafa;">
                            <p style="color: var(--text-muted); font-size: 0.8rem; margin: 0;">Need assistance? <span style="color: var(--text); font-weight: 600;">+91 79 1234 5678</span></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
