@extends('layouts.services_layout')

@section('title', 'Booking Invoice preview')

@section('content')
    <section class="detail-hero" style="height: 280px;">
        <img src="{{ asset('img/carousel-1.jpg') }}" class="detail-hero-img" alt="Invoice Preview">
        <div class="detail-hero-overlay" style="padding-bottom: 2rem;">
            <div class="container text-center">
                <span class="hero-tag">My Bookings</span>
                <h1 class="hero-title">Invoice Preview</h1>
            </div>
        </div>
    </section>

    <div class="container py-5">
        <!-- Header Actions -->
        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
            <div>
                <h3 class="mb-1 fw-bold">Booking #{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</h3>
                <span class="text-muted"><i class="fa fa-calendar-check me-1"></i> Placed on {{ $booking->created_at->format('M d, Y') }}</span>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary rounded-pill px-4">
                    <i class="fa fa-arrow-left me-1"></i> Dashboard
                </a>
                @if($booking->payment_status === 'paid' || $booking->status === 'confirmed')
                    <!-- Direct Print -->
                    <button onclick="window.print()" class="btn btn-outline-dark rounded-pill px-4" title="Print Invoice">
                        <i class="fa fa-print me-1"></i> Print
                    </button>
                    <!-- PDF Download via DomPDF HTML trick -->
                    <a href="{{ route('booking.invoice.pdf', $booking->id) }}" class="btn btn-primary rounded-pill px-4 shadow-sm" title="Download PDF Invoice">
                        <i class="fa fa-download me-1"></i> Download PDF
                    </a>
                @endif
            </div>
        </div>

        <div class="row g-4" id="invoice-content">
            <!-- LEFT: Booking Details -->
            <div class="col-lg-8">
                <!-- Room Details -->
                <div class="card shadow-sm border-0 mb-4 rounded-4 overflow-hidden">
                    <div class="card-header bg-light py-3 border-bottom-0">
                        <h5 class="mb-0 fw-bold text-dark"><i class="fa fa-bed text-primary me-2"></i> Reserved Room</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex gap-4 align-items-start flex-wrap flex-md-nowrap">
                            <img src="{{ str_starts_with($booking->room->image, 'http') ? $booking->room->image : asset('storage/' . $booking->room->image) }}"
                                 onerror="this.src='{{ asset('img/' . $booking->room->image) }}'"
                                 alt="{{ $booking->room->name }}"
                                 class="img-fluid rounded-3 shadow-sm"
                                 style="width:200px; height:140px; object-fit:cover;">
                            <div class="flex-grow-1">
                                <h4 class="fw-bold mb-2">{{ $booking->room->name }}</h4>
                                <div class="d-flex gap-2 mb-3 flex-wrap">
                                    <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-pill"><i class="fa fa-bed me-1"></i> {{ $booking->room->bed_count }} Bed(s)</span>
                                    <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-pill"><i class="fa fa-bath me-1"></i> {{ $booking->room->bath_count }} Bath(s)</span>
                                    <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-pill"><i class="fa fa-user me-1"></i> {{ $booking->adults }} Adult(s)</span>
                                    @if($booking->children > 0)
                                        <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-pill"><i class="fa fa-child me-1"></i> {{ $booking->children }} Child(ren)</span>
                                    @endif
                                </div>
                                <p class="text-muted small mb-0">{{ Str::limit($booking->room->description, 120) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stay Details -->
                <div class="card shadow-sm border-0 mb-4 rounded-4 overflow-hidden">
                    <div class="card-header bg-light py-3 border-bottom-0">
                        <h5 class="mb-0 fw-bold text-dark"><i class="fa fa-calendar-alt text-primary me-2"></i> Itinerary Overview</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-4 text-center position-relative">
                            <div class="col-sm-5 z-1">
                                <p class="text-muted small text-uppercase fw-bold mb-1">Check-In</p>
                                <p class="fw-bold fs-4 mb-0 text-dark">{{ \Carbon\Carbon::parse($booking->check_in)->format('d M, Y') }}</p>
                                <small class="text-muted">From 2:00 PM</small>
                            </div>
                            <div class="col-sm-2 d-flex flex-column justify-content-center align-items-center z-1">
                                <span class="badge bg-primary rounded-pill px-3 py-2 shadow-sm my-2 my-sm-0">
                                    {{ $booking->nights }} Night(s)
                                </span>
                            </div>
                            <div class="col-sm-5 z-1">
                                <p class="text-muted small text-uppercase fw-bold mb-1">Check-Out</p>
                                <p class="fw-bold fs-4 mb-0 text-dark">{{ \Carbon\Carbon::parse($booking->check_out)->format('d M, Y') }}</p>
                                <small class="text-muted">Until 11:00 AM</small>
                            </div>
                            <!-- Connecting line for desktop -->
                            <div class="position-absolute top-50 start-50 translate-middle w-75 border-top border-2 border-dashed border-secondary opacity-25 d-none d-sm-block" style="z-index: 0"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT: Payment Summary -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden sticky-lg-top" style="top: 100px; z-index: 10;">
                    <div class="card-header py-3 bg-light border-bottom-0">
                        <h5 class="mb-0 fw-bold text-dark"><i class="fa fa-receipt text-primary me-2"></i> Summary & Payment</h5>
                    </div>
                    <div class="card-body p-4 bg-white">
                        <!-- Guest Info -->
                        <div class="mb-4 pb-3 border-bottom">
                            <p class="text-muted small text-uppercase fw-bold mb-2">Billed To</p>
                            <p class="fw-bold mb-0">{{ $booking->user->name }}</p>
                            <p class="text-muted small mb-0">{{ $booking->user->email }}</p>
                        </div>

                        <!-- Price Breakdown -->
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Room Rate (per night)</span>
                            <span class="fw-bold text-dark">₹{{ number_format($booking->room->price, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3 text-muted">
                            <span class="small">Number of Nights</span>
                            <span class="small">× {{ $booking->nights }}</span>
                        </div>
                        
                        <div class="p-3 bg-light rounded-3 mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold fs-5 text-dark">Grand Total</span>
                                <span class="fw-bold fs-4 text-primary">₹{{ number_format($booking->total_price, 2) }}</span>
                            </div>
                        </div>

                        <!-- Status Alert -->
                        @if($booking->payment_status === 'paid')
                            <div class="alert alert-success d-flex align-items-center border-0 mb-0 shadow-sm" role="alert">
                                <i class="fa fa-check-circle fa-2x me-3"></i>
                                <div>
                                    <h6 class="alert-heading fw-bold mb-1">Payment Successful</h6>
                                    <small>Your booking is fully paid and confirmed.</small>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-warning d-flex align-items-center border-0 mb-3 shadow-sm" role="alert">
                                <i class="fa fa-exclamation-circle fa-2x me-3 text-warning-emphasis"></i>
                                <div>
                                    <h6 class="alert-heading fw-bold mb-1 text-warning-emphasis">Payment Pending</h6>
                                    <small class="text-warning-emphasis">Complete payment to secure.</small>
                                </div>
                            </div>
                            <a href="{{ route('payment.checkout', $booking->id) }}" class="btn btn-primary w-100 rounded-pill py-2 shadow-sm fw-bold">
                                <i class="fa fa-credit-card me-1"></i> Proceed to Checkout
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
