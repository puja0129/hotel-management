@extends('layouts.services_layout')

@section('title', 'My Dashboard')

@section('content')
    <!-- Minimalist Page Header -->
    <section class="dashboard-hero" style="background: url('{{ asset('img/carousel-2.jpg') }}') center/cover no-repeat; height: 35vh; position: relative; display: flex; align-items: center; justify-content: center;">
        <div style="position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(10,34,20,0.4), rgba(10,34,20,0.8));"></div>
        <div style="position: relative; z-index: 10; text-align: center; color: white;">
            <p style="font-size: 0.8rem; letter-spacing: 4px; text-transform: uppercase; color: var(--green); margin-bottom: 10px; font-weight: 500;">Guest Portal</p>
            <h1 style="font-family: 'Playfair Display', serif; font-size: 3.5rem; font-weight: 500; margin: 0;">My Account</h1>
        </div>
    </section>

    <!-- Main Content Area -->
    <div style="background: var(--bg-soft); padding: 60px 0;">
        <div class="container" style="max-width: 1200px;">
            
            <div class="row g-5">
                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div style="background: white; border: 1px solid #eaeaeb; padding: 40px 30px; text-align: center; position: sticky; top: 100px;">
                        <div style="width: 80px; height: 80px; background: var(--green-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: var(--green); font-size: 2rem;">
                            <i class="fa fa-user"></i>
                        </div>
                        <h4 style="font-family: 'Playfair Display', serif; font-size: 1.4rem; color: var(--text); margin-bottom: 5px;">{{ Auth::user()->name }}</h4>
                        <p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 30px;">{{ Auth::user()->email }}</p>
                        
                        <div style="text-align: left; display: flex; flex-direction: column; gap: 15px;">
                            <a href="#" style="color: var(--text); text-decoration: none; font-size: 0.95rem; font-weight: 500; padding-bottom: 10px; border-bottom: 1px solid #eaeaeb; display: flex; justify-content: space-between;">
                                <span><i class="fa fa-list-alt me-2" style="color: var(--green);"></i> My Bookings</span>
                                <i class="fa fa-angle-right" style="color: #ccc;"></i>
                            </a>
                            <a href="{{ route('profile.edit') }}" style="color: var(--text-muted); text-decoration: none; font-size: 0.95rem; font-weight: 500; padding-bottom: 10px; border-bottom: 1px solid #eaeaeb; display: flex; justify-content: space-between; transition: color 0.3s;" onmouseover="this.style.color='var(--text)'" onmouseout="this.style.color='var(--text-muted)'">
                                <span><i class="fa fa-cog me-2"></i> Settings</span>
                                <i class="fa fa-angle-right" style="color: #ccc;"></i>
                            </a>
                            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                @csrf
                                <button type="submit" style="background: none; border: none; padding: 0; padding-bottom: 10px; color: var(--text-muted); font-size: 0.95rem; font-weight: 500; text-align: left; width: 100%; display: flex; justify-content: space-between; cursor: pointer; transition: color 0.3s;" onmouseover="this.style.color='#dc3545'" onmouseout="this.style.color='var(--text-muted)'">
                                    <span><i class="fa fa-sign-out-alt me-2"></i> Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Main Portal -->
                <div class="col-lg-9">
                    
                    <!-- Stats Overview (Minimal) -->
                    <div class="row g-4 mb-5">
                        <div class="col-md-4">
                            <div style="background: white; border: 1px solid #eaeaeb; padding: 30px;">
                                <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 2px; color: var(--text-muted); margin-bottom: 10px;">Total Stays</p>
                                <h2 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; color: var(--text); margin: 0; font-weight: 400;">
                                    {{ Auth::user()->bookings()->count() }}
                                </h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background: var(--green); border: 1px solid var(--green); padding: 30px; color: white;">
                                <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 2px; color: rgba(255,255,255,0.7); margin-bottom: 10px;">Confirmed Stay</p>
                                <h2 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; color: white; margin: 0; font-weight: 400;">
                                    {{ Auth::user()->bookings()->where('payment_status','paid')->count() }}
                                </h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background: white; border: 1px solid #eaeaeb; padding: 30px; position: relative;">
                                <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 2px; color: var(--text-muted); margin-bottom: 10px;">Pending Due</p>
                                <h2 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; color: var(--text); margin: 0; font-weight: 400;">
                                    {{ Auth::user()->bookings()->where('payment_status','unpaid')->count() }}
                                </h2>
                                @if(Auth::user()->bookings()->where('payment_status','unpaid')->count() > 0)
                                    <div style="position: absolute; top: 30px; right: 30px; width: 10px; height: 10px; background: #e74c3c; border-radius: 50%;"></div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Bookings Feed -->
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 25px; border-bottom: 1px solid #eaeaeb; padding-bottom: 15px;">
                        <h3 style="font-family: 'Playfair Display', serif; font-size: 1.8rem; color: var(--text); margin: 0; font-weight: 500;">Recent Reservations</h3>
                        <a href="{{ route('booking') }}" style="color: var(--green); text-decoration: none; font-size: 0.9rem; font-weight: 500; letter-spacing: 1px; text-transform: uppercase;">Make a Booking <i class="fa fa-arrow-right ms-1"></i></a>
                    </div>

                    @if(session('success'))
                        <div style="background: #f6fdf9; border: 1px solid #c3e6cb; color: #155724; padding: 15px 20px; font-size: 0.9rem; margin-bottom: 25px; display: flex; align-items: center; justify-content: space-between;">
                            <div><i class="fa fa-check me-2"></i> {{ session('success') }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" style="font-size: 12px; opacity: 0.5;"></button>
                        </div>
                    @endif

                    @php $bookings = Auth::user()->bookings()->with('room')->latest()->get(); @endphp

                    @if($bookings->isEmpty())
                        <div style="text-align: center; padding: 80px 20px; background: white; border: 1px solid #eaeaeb;">
                            <i class="fa fa-bed" style="font-size: 3rem; color: #ececed; margin-bottom: 20px;"></i>
                            <h4 style="font-family: 'Playfair Display', serif; font-size: 1.5rem; color: var(--text); margin-bottom: 10px;">No Reservations Found</h4>
                            <p style="color: var(--text-muted); font-size: 0.95rem; max-width: 400px; margin: 0 auto 30px;">You currently have no upcoming or past stays with us. Explore our luxury rooms and begin your journey.</p>
                            <a href="{{ route('rooms') }}" style="display: inline-block; background: var(--text); color: white; padding: 12px 30px; text-decoration: none; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 2px; transition: background 0.3s;" onmouseover="this.style.background='var(--green)'" onmouseout="this.style.background='var(--text)'">View Rooms</a>
                        </div>
                    @else
                        <div style="display: flex; flex-direction: column; gap: 20px;">
                            @foreach($bookings as $booking)
                            <div style="background: white; border: 1px solid #eaeaeb; display: flex; flex-direction: column; @if($loop->first) border-top: 3px solid var(--green); @endif">
                                <!-- Top Bar -->
                                <div style="padding: 15px 25px; border-bottom: 1px solid #f5f5f5; display: flex; justify-content: space-between; align-items: center; background: #fafafa;">
                                    <span style="font-size: 0.8rem; color: var(--text-muted); letter-spacing: 1px; font-weight: 500;">REF: BKG-{{ \Carbon\Carbon::parse($booking->created_at ?? now())->format('Y') }}-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</span>
                                    
                                    @php
                                        $statusConfig = [
                                            'confirmed' => ['color' => '#1a7f4b', 'text' => 'Confirmed'],
                                            'cancelled' => ['color' => '#dc3545', 'text' => 'Cancelled'],
                                            'pending' => ['color' => '#f39c12', 'text' => 'Pending']
                                        ][$booking->status] ?? ['color' => '#666', 'text' => $booking->status];
                                    @endphp
                                    <span style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1.5px; font-weight: 600; color: {{ $statusConfig['color'] }};">
                                        <i class="fa fa-circle" style="font-size: 6px; vertical-align: middle; margin-right: 4px; position: relative; top: -1px;"></i> {{ $statusConfig['text'] }}
                                    </span>
                                </div>
                                
                                <!-- Content -->
                                <div class="row g-0">
                                    <div class="col-md-8" style="padding: 30px 25px;">
                                        <h4 style="font-family: 'Playfair Display', serif; font-size: 1.4rem; color: var(--text); margin-bottom: 5px;">{{ $booking->room->name ?? 'Room Unavailable' }}</h4>
                                        <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 20px;">{{ $booking->adults }} Adult(s), {{ $booking->children }} Child(ren) • {{ $booking->nights }} Night(s)</p>
                                        
                                        <div style="display: flex; gap: 40px;">
                                            <div>
                                                <p style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; color: #a0a0a0; margin-bottom: 5px;">Check-In</p>
                                                <p style="font-size: 1.05rem; color: var(--text); margin: 0; font-weight: 500;">{{ \Carbon\Carbon::parse($booking->check_in)->format('d M, Y') }}</p>
                                            </div>
                                            <div>
                                                <p style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; color: #a0a0a0; margin-bottom: 5px;">Check-Out</p>
                                                <p style="font-size: 1.05rem; color: var(--text); margin: 0; font-weight: 500;">{{ \Carbon\Carbon::parse($booking->check_out)->format('d M, Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Action Side -->
                                    <div class="col-md-4" style="background: #fafafa; border-left: 1px solid #f5f5f5; padding: 30px 25px; display: flex; flex-direction: column; justify-content: center; align-items: flex-end; text-align: right;">
                                        <p style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); margin-bottom: 5px;">Total Amount</p>
                                        <h3 style="font-weight: 400; font-size: 1.8rem; color: var(--text); margin-bottom: 5px;">₹{{ number_format($booking->total_price, 2) }}</h3>
                                        
                                        @if($booking->payment_status === 'paid')
                                            <p style="font-size: 0.8rem; color: var(--green); margin-bottom: 20px;"><i class="fa fa-check"></i> Payment Completed</p>
                                        @else
                                            <p style="font-size: 0.8rem; color: #e74c3c; margin-bottom: 20px;"><i class="fa fa-exclamation-circle"></i> Payment Pending</p>
                                        @endif
                                        
                                        <div style="display: flex; gap: 10px;">
                                            @if($booking->payment_status === 'unpaid' && $booking->status !== 'cancelled')
                                                <a href="{{ route('payment.checkout', $booking->id) }}" style="background: var(--text); color: white; padding: 8px 20px; text-decoration: none; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; transition: background 0.3s;" onmouseover="this.style.background='var(--green)'" onmouseout="this.style.background='var(--text)'">Pay Now</a>
                                            @elseif($booking->payment_status === 'paid' || $booking->status === 'confirmed')
                                                <a href="{{ route('booking.invoice', $booking->id) }}" target="_blank" style="border: 1px solid #eaeaeb; background: white; color: var(--text); padding: 8px 15px; text-decoration: none; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s;" onmouseover="this.style.borderColor='var(--text)'" onmouseout="this.style.borderColor='#eaeaeb'"><i class="fa fa-print me-1"></i> Invoice</a>
                                            @endif
                                            
                                            @if($booking->status !== 'cancelled')
                                                <form method="POST" action="{{ route('booking.cancel', $booking->id) }}" onsubmit="return confirm('Cancel this reservation?')" style="margin: 0;">
                                                    @csrf @method('PATCH')
                                                    <button type="submit" style="border: 1px solid #eaeaeb; background: white; color: #dc3545; padding: 8px 15px; text-decoration: none; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s;" onmouseover="this.style.background='#dc3545'; this.style.color='white'; this.style.borderColor='#dc3545';" onmouseout="this.style.background='white'; this.style.color='#dc3545'; this.style.borderColor='#eaeaeb';"><i class="fa fa-times"></i></button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endif
                    
                </div>
            </div>
            
            <div style="text-align: center; margin-top: 60px; font-size: 0.8rem; color: #aaa; text-transform: uppercase; letter-spacing: 2px;">
                <p>&copy; {{ date('Y') }} Grand Hotel</p>
            </div>
        </div>
    </div>
@endsection
