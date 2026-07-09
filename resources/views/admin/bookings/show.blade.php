@extends('layouts.admin_layout', ['title' => 'Booking Details', 'headerTitle' => 'Booking Details'])

@section('admin_content')
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-4 border-bottom">
                <div>
                    <h1 class="h2 mb-1">Booking Invoice</h1>
                    <span class="text-muted small">Booking #{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fa fa-arrow-left me-1"></i> Back to Bookings
                    </a>
                    @if($booking->payment_status === 'paid')
                        <a href="#" onclick="window.print()" class="btn btn-sm btn-outline-dark">
                            <i class="fa fa-print me-1"></i> Print Invoice
                        </a>
                    @endif
                </div>
            </div>

            <div class="row g-4" id="invoice-content">

                <!-- LEFT: Booking & Room Details -->
                <div class="col-lg-8">

                    <!-- Customer Info Card -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-primary text-white py-3">
                            <h5 class="mb-0 fw-bold"><i class="fa fa-user me-2"></i>Guest Information</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <p class="text-muted small mb-1 text-uppercase fw-bold">Full Name</p>
                                    <p class="fw-bold fs-5 mb-0">{{ $booking->user->name }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-muted small mb-1 text-uppercase fw-bold">Email Address</p>
                                    <p class="fw-bold fs-5 mb-0">{{ $booking->user->email }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-muted small mb-1 text-uppercase fw-bold">Adults</p>
                                    <p class="fw-bold mb-0"><i class="fa fa-user me-1 text-primary"></i> {{ $booking->adults }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-muted small mb-1 text-uppercase fw-bold">Children</p>
                                    <p class="fw-bold mb-0"><i class="fa fa-child me-1 text-warning"></i> {{ $booking->children }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Room Details Card -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-dark text-white py-3">
                            <h5 class="mb-0 fw-bold"><i class="fa fa-bed me-2"></i>Room Details</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex gap-4 align-items-start flex-wrap">
                                <img src="{{ str_starts_with($booking->room->image, 'http') ? $booking->room->image : asset('storage/' . $booking->room->image) }}"
                                     onerror="this.src='{{ asset('img/' . $booking->room->image) }}'"
                                     alt="{{ $booking->room->name }}"
                                     class="img-thumbnail rounded-3"
                                     style="width:180px; height:130px; object-fit:cover;">
                                <div class="flex-grow-1">
                                    <h4 class="fw-bold mb-2">{{ $booking->room->name }}</h4>
                                    <div class="d-flex gap-2 mb-3 flex-wrap">
                                        <span class="badge bg-secondary"><i class="fa fa-bed me-1"></i> {{ $booking->room->bed_count }} Bed(s)</span>
                                        <span class="badge bg-secondary"><i class="fa fa-bath me-1"></i> {{ $booking->room->bath_count }} Bath(s)</span>
                                        @if($booking->room->wifi)
                                            <span class="badge bg-info text-dark"><i class="fa fa-wifi me-1"></i> Free Wi-Fi</span>
                                        @endif
                                        <span class="badge bg-warning text-dark">
                                            {{ $booking->room->stars }}★
                                        </span>
                                    </div>
                                    <p class="text-muted small mb-0">{{ Str::limit($booking->room->description, 150) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stay Details -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-success text-white py-3">
                            <h5 class="mb-0 fw-bold"><i class="fa fa-calendar-alt me-2"></i>Stay Details</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-4 text-center">
                                <div class="col-4">
                                    <p class="text-muted small text-uppercase fw-bold mb-1">Check-In</p>
                                    <p class="fw-bold fs-5 mb-0 text-success">{{ \Carbon\Carbon::parse($booking->check_in)->format('M d, Y') }}</p>
                                    <small class="text-muted">After 2:00 PM</small>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted small text-uppercase fw-bold mb-1">Duration</p>
                                    <p class="fw-bold fs-2 mb-0 text-primary">{{ $booking->nights }}</p>
                                    <small class="text-muted">Night(s)</small>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted small text-uppercase fw-bold mb-1">Check-Out</p>
                                    <p class="fw-bold fs-5 mb-0 text-danger">{{ \Carbon\Carbon::parse($booking->check_out)->format('M d, Y') }}</p>
                                    <small class="text-muted">Before 11:00 AM</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- RIGHT: Payment Summary -->
                <div class="col-lg-4">

                    <!-- Payment Status Card -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header py-3 {{ $booking->payment_status === 'paid' ? 'bg-success' : 'bg-warning' }} text-{{ $booking->payment_status === 'paid' ? 'white' : 'dark' }}">
                            <h5 class="mb-0 fw-bold"><i class="fa fa-credit-card me-2"></i>Payment Summary</h5>
                        </div>
                        <div class="card-body p-4">
                            <!-- Price Breakdown -->
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Room Rate</span>
                                <span class="fw-bold">₹{{ number_format($booking->room->price, 2) }}/night</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Nights</span>
                                <span class="fw-bold">× {{ $booking->nights }}</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="fw-bold fs-5">Total Paid</span>
                                <span class="fw-bold fs-5 text-success">₹{{ number_format($booking->total_price, 2) }}</span>
                            </div>

                            <!-- Status Badges -->
                            <div class="d-flex flex-column gap-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted">Payment Status</span>
                                    @if($booking->payment_status === 'paid')
                                        <span class="badge bg-success fs-6">✔ Paid</span>
                                    @else
                                        <span class="badge bg-warning text-dark fs-6">⏳ Unpaid</span>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted">Booking Status</span>
                                    @if($booking->status === 'confirmed')
                                        <span class="badge bg-primary fs-6">Confirmed</span>
                                    @elseif($booking->status === 'pending')
                                        <span class="badge bg-warning text-dark fs-6">Pending</span>
                                    @else
                                        <span class="badge bg-danger fs-6">Cancelled</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Transaction Details -->
                    @if($booking->stripe_payment_intent)
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white py-3 border-bottom">
                            <h6 class="mb-0 fw-bold text-muted"><i class="fa fa-receipt me-2"></i>Transaction Details</h6>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-muted small mb-1 text-uppercase fw-bold">Transaction ID</p>
                            <p class="font-monospace small text-break mb-3">{{ $booking->stripe_payment_intent }}</p>
                            @if($booking->stripe_session_id)
                                <p class="text-muted small mb-1 text-uppercase fw-bold">Session ID</p>
                                <p class="font-monospace small text-break mb-0">{{ $booking->stripe_session_id }}</p>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Quick Actions -->
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-white py-3 border-bottom">
                            <h6 class="mb-0 fw-bold"><i class="fa fa-bolt me-2"></i>Quick Actions</h6>
                        </div>
                        <div class="card-body p-3 d-grid gap-2">
                            <form action="{{ route('admin.bookings.status', $booking) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select mb-2" onchange="this.form.submit()">
                                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>⏳ Set Pending</option>
                                    <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>✅ Confirm Booking</option>
                                    <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>❌ Cancel Booking</option>
                                </select>
                            </form>
                            <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fa fa-list me-1"></i> Back to All Bookings
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        @endsection
