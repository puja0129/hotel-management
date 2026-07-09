@extends('layouts.services_layout')

@section('title', 'Book A Room')

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
                <span style="color: var(--green);">Reservation</span>
            </div>
        </div>
    </div>
    <div style="max-width: 900px; margin: 0 auto;">

        @if(session('success'))
            <div style="background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.4); border-radius: 12px; padding: 16px 20px; margin-bottom: 30px; color: var(--green-dark); font-size: 0.95rem; display: flex; align-items: center; gap: 12px; backdrop-filter: blur(8px);">
                <i class="fa fa-check-circle" style="color: var(--green); font-size: 1.2rem;"></i> {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div style="background: rgba(220, 38, 38, 0.05); border: 1px solid rgba(220, 38, 38, 0.2); border-radius: 12px; padding: 16px 20px; margin-bottom: 30px; color: #991b1b; font-size: 0.95rem; backdrop-filter: blur(8px);">
                <div style="display:flex; align-items:center; gap:8px; margin-bottom:8px; font-weight:600;"><i class="fa fa-exclamation-circle"></i> Please fix the following errors:</div>
                <ul style="margin-left:24px; color:#b91c1c;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <div style="background: white; border-radius: 30px; box-shadow: 0 30px 100px rgba(0,0,0,0.08); overflow: hidden; border: 1px solid rgba(0,0,0,0.03);">

            {{-- Card Header --}}
            <div style="padding: 50px 60px 40px; text-align: center; border-bottom: 1px solid rgba(0,0,0,0.05); background: #fcfbf9;">
                <h2 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; color: #1a1a1a; margin: 0; font-weight: 700;">Find Your Perfect Room</h2>
                <p style="color: #666; font-size: 1rem; margin: 10px 0 0;">Please select your preferred dates and guest details.</p>
            </div>

            {{-- Form --}}
            <div style="padding: 50px 60px;">
                <form action="{{ route('booking.store') }}" method="POST" data-validate="true">
                    @csrf
                    
                    <div style="margin-bottom: 50px;">
                        <div class="res-grid-booking" style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px;">
                            <div>
                                <label style="display: block; font-size: 0.9rem; font-weight: 700; color: #333; margin-bottom: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Arrival Date</label>
                                <div style="position: relative;">
                                    <i class="fa fa-calendar-alt" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: var(--green);"></i>
                                    <input type="date" name="check_in" value="{{ old('check_in') }}" required
                                        style="width: 100%; padding: 16px 16px 16px 50px; border: 2px solid #eee; border-radius: 15px; font-size: 1rem; outline: none; box-sizing: border-box; background: #fafafa; transition: all 0.3s; color: #444;"
                                        onfocus="this.style.borderColor='var(--green)'; this.style.background='white'; this.style.boxShadow='0 5px 15px rgba(26,127,75,0.05)';" onblur="this.style.borderColor='#eee'; this.style.background='#fafafa';">
                                </div>
                            </div>
                            <div>
                                <label style="display: block; font-size: 0.9rem; font-weight: 700; color: #333; margin-bottom: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Departure Date</label>
                                <div style="position: relative;">
                                    <i class="fa fa-calendar-alt" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: var(--green);"></i>
                                    <input type="date" name="check_out" value="{{ old('check_out') }}" required
                                        style="width: 100%; padding: 16px 16px 16px 50px; border: 2px solid #eee; border-radius: 15px; font-size: 1rem; outline: none; box-sizing: border-box; background: #fafafa; transition: all 0.3s; color: #444;"
                                        onfocus="this.style.borderColor='var(--green)'; this.style.background='white'; this.style.boxShadow='0 5px 15px rgba(26,127,75,0.05)';" onblur="this.style.borderColor='#eee'; this.style.background='#fafafa';">
                                </div>
                            </div>
                        </div>

                        <div class="res-grid-booking" style="display: grid; grid-template-columns: 1fr 1fr 2fr; gap: 30px;">
                            <div>
                                <label style="display: block; font-size: 0.9rem; font-weight: 700; color: #333; margin-bottom: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Adults</label>
                                <div style="position: relative;">
                                    <i class="fa fa-user" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: var(--green);"></i>
                                    <select name="adults" required
                                        style="width: 100%; padding: 16px 40px 16px 50px; border: 2px solid #eee; border-radius: 15px; font-size: 1rem; outline: none; box-sizing: border-box; background: #fafafa; transition: all 0.3s; cursor: pointer; appearance: none; color: #444;"
                                        onfocus="this.style.borderColor='var(--green)'; this.style.background='white'; this.style.boxShadow='0 5px 15px rgba(26,127,75,0.05)';" onblur="this.style.borderColor='#eee'; this.style.background='#fafafa';">
                                        <option value="1">1 Adult</option>
                                        <option value="2">2 Adults</option>
                                        <option value="3">3 Adults</option>
                                        <option value="4">4 Adults</option>
                                    </select>
                                    <i class="fa fa-chevron-down" style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); font-size: 12px; color: #999; pointer-events: none;"></i>
                                </div>
                            </div>
                            <div>
                                <label style="display: block; font-size: 0.9rem; font-weight: 700; color: #333; margin-bottom: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Children</label>
                                <div style="position: relative;">
                                    <i class="fa fa-child" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: var(--green);"></i>
                                    <select name="children"
                                        style="width: 100%; padding: 16px 40px 16px 50px; border: 2px solid #eee; border-radius: 15px; font-size: 1rem; outline: none; box-sizing: border-box; background: #fafafa; transition: all 0.3s; cursor: pointer; appearance: none; color: #444;"
                                        onfocus="this.style.borderColor='var(--green)'; this.style.background='white'; this.style.boxShadow='0 5px 15px rgba(26,127,75,0.05)';" onblur="this.style.borderColor='#eee'; this.style.background='#fafafa';">
                                        <option value="0">0 Children</option>
                                        <option value="1">1 Child</option>
                                        <option value="2">2 Children</option>
                                        <option value="3">3 Children</option>
                                    </select>
                                    <i class="fa fa-chevron-down" style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); font-size: 12px; color: #999; pointer-events: none;"></i>
                                </div>
                            </div>
                            <div>
                                <label style="display: block; font-size: 0.9rem; font-weight: 700; color: #333; margin-bottom: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Preferred Room</label>
                                <div style="position: relative;">
                                    <i class="fa fa-bed" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: var(--green);"></i>
                                    <select name="room_id" required
                                        style="width: 100%; padding: 16px 40px 16px 50px; border: 2px solid #eee; border-radius: 15px; font-size: 1rem; outline: none; box-sizing: border-box; background: #fafafa; transition: all 0.3s; cursor: pointer; appearance: none; color: #444;"
                                        onfocus="this.style.borderColor='var(--green)'; this.style.background='white'; this.style.boxShadow='0 5px 15px rgba(26,127,75,0.05)';" onblur="this.style.borderColor='#eee'; this.style.background='#fafafa';">
                                        <option value="">Select a Room Type</option>
                                        @foreach($rooms as $room)
                                            <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                                                {{ $room->name }} (₹{{ number_format($room->price, 2) }}/Night)
                                            </option>
                                        @endforeach
                                    </select>
                                    <i class="fa fa-chevron-down" style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); font-size: 12px; color: #999; pointer-events: none;"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                        style="width: 100%; padding: 22px; background: var(--green); color: white; font-size: 1.2rem; font-weight: 700; border: none; border-radius: 20px; cursor: pointer; letter-spacing: 1px; text-transform: uppercase; box-shadow: 0 15px 35px rgba(26,127,75,0.25); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); position: relative; overflow: hidden;"
                        onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 45px rgba(26,127,75,0.3)';"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 15px 35px rgba(26,127,75,0.25)';">
                        <i class="fa fa-calendar-check" style="margin-right: 12px;"></i> Confirm & Book Now
                    </button>
                </form>
            </div>
        </div>

        {{-- Info strip --}}
        <div class="res-grid-booking" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 30px; text-align: center;">
            <div style="background: rgba(255,255,255,0.7); border-radius: 16px; padding: 24px; border: 1px solid rgba(255,255,255,0.8); backdrop-filter: blur(10px);">
                <div style="width: 48px; height: 48px; background: var(--green-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;">
                    <i class="fa fa-shield-alt" style="color: var(--green); font-size: 1.2rem;"></i>
                </div>
                <h5 style="font-size: 1rem; color: var(--text); margin: 0 0 4px; font-weight: 600;">Secure Booking</h5>
                <p style="font-size: 0.85rem; color: var(--text-muted); margin: 0;">100% safe & encrypted</p>
            </div>
            <div style="background: rgba(255,255,255,0.7); border-radius: 16px; padding: 24px; border: 1px solid rgba(255,255,255,0.8); backdrop-filter: blur(10px);">
                <div style="width: 48px; height: 48px; background: var(--green-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;">
                    <i class="fa fa-headset" style="color: var(--green); font-size: 1.2rem;"></i>
                </div>
                <h5 style="font-size: 1rem; color: var(--text); margin: 0 0 4px; font-weight: 600;">24/7 Support</h5>
                <p style="font-size: 0.85rem; color: var(--text-muted); margin: 0;">We're always here to help</p>
            </div>
            <div style="background: rgba(255,255,255,0.7); border-radius: 16px; padding: 24px; border: 1px solid rgba(255,255,255,0.8); backdrop-filter: blur(10px);">
                <div style="width: 48px; height: 48px; background: var(--green-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;">
                    <i class="fa fa-envelope" style="color: var(--green); font-size: 1.2rem;"></i>
                </div>
                <h5 style="font-size: 1rem; color: var(--text); margin: 0 0 4px; font-weight: 600;">Instant Confirmation</h5>
                <p style="font-size: 0.85rem; color: var(--text-muted); margin: 0;">Sent directly to your email</p>
            </div>
        </div>

    </div>
</div>

@endsection