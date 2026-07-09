@extends('layouts.admin_layout', ['title' => 'Manage Bookings', 'headerTitle' => 'Manage Bookings'])

@section('admin_content')
                <div class="admin-page-title">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-calendar-check me-3 text-primary fs-4"></i>
                        <span>Bookings Management</span>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="admin-card mt-4 shadow-sm border-0 rounded-4 overflow-hidden">
                    <div class="admin-card-header bg-white py-3 px-4 border-bottom d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold text-dark">All Bookings <span class="badge bg-primary-subtle text-primary ms-2 fs-6 fw-normal" style="font-size: 0.75rem !important;">{{ $bookings->total() }} Total</span></h5>
                    </div>
                    <div class="admin-card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light contrast-bg">
                                    <tr>
                                        <th class="ps-4 py-3 text-uppercase text-muted small fw-bold">Guest Detail</th>
                                        <th class="py-3 text-uppercase text-muted small fw-bold">Room</th>
                                        <th class="py-3 text-uppercase text-muted small fw-bold">Stay Dates</th>
                                        <th class="py-3 text-uppercase text-muted small fw-bold">Amount</th>
                                        <th class="py-3 text-uppercase text-muted small fw-bold">Payment</th>
                                        <th class="py-3 text-uppercase text-muted small fw-bold">Status</th>
                                        <th class="pe-4 py-3 text-uppercase text-muted small fw-bold text-end">Action</th>
                                    </tr>
                                </thead>
                        <tbody>
                            @forelse($bookings as $booking)
                                <tr>
                                    <td class="ps-4 py-3">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; font-weight: bold; border: 1px solid rgba(26, 127, 75, 0.1);">
                                                {{ substr($booking->user->name ?? 'G', 0, 1) }}
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold text-dark">{{ $booking->user->name ?? 'Guest' }}</h6>
                                                <small class="text-muted">#{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3">
                                        <span class="fw-bold text-dark">{{ $booking->room->name ?? 'N/A' }}</span>
                                    </td>
                                    <td class="py-3">
                                        <div class="text-dark small"><i class="fa fa-calendar-check text-success me-1"></i> {{ \Carbon\Carbon::parse($booking->check_in)->format('d M y') }}</div>
                                        <div class="text-dark small"><i class="fa fa-calendar-times text-danger me-1"></i> {{ \Carbon\Carbon::parse($booking->check_out)->format('d M y') }}</div>
                                    </td>
                                    <td class="py-3">
                                        <span class="fw-bold fs-6 text-dark">₹{{ number_format($booking->total_price, 2) }}</span>
                                    </td>
                                    <td class="py-3">
                                        @if($booking->payment_status == 'paid')
                                            <span class="badge bg-success-subtle text-success py-2 px-3 rounded-pill border border-success border-opacity-25" style="font-weight: 600;"><i class="fa fa-check-circle me-1"></i> Paid</span>
                                        @else
                                            <span class="badge bg-warning-subtle text-warning-emphasis py-2 px-3 rounded-pill border border-warning border-opacity-25" style="font-weight: 600;"><i class="fa fa-clock me-1"></i> Unpaid</span>
                                        @endif
                                    </td>
                                    <td class="py-3">
                                        <span class="badge bg-{{ $booking->status === 'confirmed' ? 'primary' : ($booking->status === 'cancelled' ? 'danger' : 'secondary') }}-subtle text-{{ $booking->status === 'confirmed' ? 'primary' : ($booking->status === 'cancelled' ? 'danger' : 'secondary') }} py-2 px-3 rounded-pill border border-{{ $booking->status === 'confirmed' ? 'primary' : ($booking->status === 'cancelled' ? 'danger' : 'secondary') }} border-opacity-25" style="font-weight: 600;">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </td>
                                    <td class="pe-4 py-3 text-end">
                                        <div class="d-flex gap-2 justify-content-end align-items-center">
                                            <a href="{{ route('admin.bookings.show', $booking) }}" class="btn btn-sm btn-outline-primary border-light-subtle shadow-sm bg-white" title="Invoice">
                                                <i class="fa fa-file-invoice"></i>
                                            </a>
                                            <form action="{{ route('admin.bookings.status', $booking) }}" method="POST" class="d-inline-flex shadow-sm rounded">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" class="form-select form-select-sm border-light-subtle" style="width: 110px; font-size: 12px;" onchange="this.form.submit()">
                                                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                                    <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                </select>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center text-muted py-4">No bookings found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
