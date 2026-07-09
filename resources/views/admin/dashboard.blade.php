@extends('layouts.admin_layout', ['title' => 'Admin Dashboard', 'headerTitle' => 'Admin Dashboard'])

@section('admin_content')

                <!-- KPI Cards -->
                <div class="row g-4 mb-4">
                    <div class="col-md-6 col-xl-3">
                        <div class="card shadow-sm border-0 bg-primary text-white h-100 rounded-4 overflow-hidden" style="position: relative;">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="text-white-50 text-uppercase fw-bold mb-2" style="letter-spacing:1px; font-size: 0.8rem;">Total Revenue</h6>
                                        <h2 class="mb-0 fw-bold">₹{{ number_format($stats['revenue'], 2) }}</h2>
                                    </div>
                                    <div class="bg-white bg-opacity-25 rounded p-2">
                                        <i class="fa fa-wallet fa-fw fa-lg"></i>
                                    </div>
                                </div>
                                <div class="mt-3 small text-white-50">
                                    <i class="fa fa-arrow-up text-white me-1"></i> +5.4% from last month
                                </div>
                            </div>
                            <div style="position: absolute; right: -20px; bottom: -20px; opacity: 0.1; transform: scale(3);">
                                <i class="fa fa-wallet"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-xl-3">
                        <div class="card shadow-sm border-0 bg-success text-white h-100 rounded-4 overflow-hidden" style="position: relative;">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="text-white-50 text-uppercase fw-bold mb-2" style="letter-spacing:1px; font-size: 0.8rem;">Total Bookings</h6>
                                        <h2 class="mb-0 fw-bold">{{ $stats['total_bookings'] }}</h2>
                                    </div>
                                    <div class="bg-white bg-opacity-25 rounded p-2">
                                        <i class="fa fa-calendar-check fa-fw fa-lg"></i>
                                    </div>
                                </div>
                                <div class="mt-3 small text-white-50">
                                    <i class="fa fa-arrow-up text-white me-1"></i> +12 new this week
                                </div>
                            </div>
                            <div style="position: absolute; right: -20px; bottom: -20px; opacity: 0.1; transform: scale(3);">
                                <i class="fa fa-calendar-check"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card shadow-sm border-0 bg-info text-white h-100 rounded-4 overflow-hidden" style="position: relative;">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="text-white-50 text-uppercase fw-bold mb-2" style="letter-spacing:1px; font-size: 0.8rem;">Available Rooms</h6>
                                        <h2 class="mb-0 fw-bold">{{ $stats['total_rooms'] }}</h2>
                                    </div>
                                    <div class="bg-white bg-opacity-25 rounded p-2">
                                        <i class="fa fa-bed fa-fw fa-lg"></i>
                                    </div>
                                </div>
                                <div class="mt-3 small text-white-50">
                                    <a href="{{ route('admin.rooms.index') }}" class="text-white text-decoration-none border-bottom border-white">Manage rooms</a>
                                </div>
                            </div>
                            <div style="position: absolute; right: -20px; bottom: -20px; opacity: 0.1; transform: scale(3);">
                                <i class="fa fa-bed"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card shadow-sm border-0 bg-warning text-dark h-100 rounded-4 overflow-hidden" style="position: relative;">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="text-dark text-opacity-75 text-uppercase fw-bold mb-2" style="letter-spacing:1px; font-size: 0.8rem;">Registered Users</h6>
                                        <h2 class="mb-0 fw-bold">{{ $stats['total_users'] }}</h2>
                                    </div>
                                    <div class="bg-dark bg-opacity-10 rounded p-2">
                                        <i class="fa fa-users fa-fw fa-lg"></i>
                                    </div>
                                </div>
                                <div class="mt-3 small text-dark text-opacity-75">
                                    <i class="fa fa-arrow-up text-dark me-1"></i> Active user base
                                </div>
                            </div>
                            <div style="position: absolute; right: -20px; bottom: -20px; opacity: 0.1; transform: scale(3);">
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Table -->
                <div class="admin-card mt-4">
                    <div class="admin-card-header d-flex justify-content-between align-items-center">
                        <span class="fs-5">Recent Bookings</span>
                        <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                    </div>
                    <div class="admin-card-body p-0">
                        <div class="table-responsive mt-3">
                            <table class="table table-hover align-middle mb-0 text-nowrap">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="ps-4 text-uppercase text-muted small fw-bold">Guest</th>
                                        <th class="text-uppercase text-muted small fw-bold">Room</th>
                                        <th class="text-uppercase text-muted small fw-bold">Dates</th>
                                        <th class="text-uppercase text-muted small fw-bold">Amount</th>
                                        <th class="text-uppercase text-muted small fw-bold">Payment</th>
                                        <th class="pe-4 text-uppercase text-muted small fw-bold text-end">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($stats['recent_bookings'] as $booking)
                                    <tr>
                                        <td class="ps-4 py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; font-weight: bold;">
                                                    {{ substr($booking->user->name ?? 'G', 0, 1) }}
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fw-bold text-dark">{{ $booking->user->name ?? 'Guest' }}</h6>
                                                    <small class="text-muted">{{ $booking->user->email ?? 'N/A' }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="fw-bold">{{ $booking->room->name ?? 'N/A' }}</span>
                                        </td>
                                        <td>
                                            <div class="text-dark small"><i class="fa fa-calendar-check text-success me-1"></i> {{ \Carbon\Carbon::parse($booking->check_in)->format('d M y') }}</div>
                                            <div class="text-dark small"><i class="fa fa-calendar-times text-danger me-1"></i> {{ \Carbon\Carbon::parse($booking->check_out)->format('d M y') }}</div>
                                        </td>
                                        <td>
                                            <span class="fw-bold fs-6">₹{{ number_format($booking->total_price, 2) }}</span>
                                        </td>
                                        <td>
                                            @if($booking->payment_status === 'paid')
                                                <span class="badge bg-success-subtle text-success py-2 px-3 rounded-pill border border-success border-opacity-25" style="font-weight: 600;"><i class="fa fa-check-circle me-1"></i> Paid</span>
                                            @else
                                                <span class="badge bg-warning-subtle text-warning-emphasis py-2 px-3 rounded-pill border border-warning border-opacity-25" style="font-weight: 600;"><i class="fa fa-clock me-1"></i> Unpaid</span>
                                            @endif
                                        </td>
                                        <td class="pe-4 text-end">
                                            <span class="badge bg-{{ $booking->status === 'confirmed' ? 'primary' : ($booking->status === 'cancelled' ? 'danger' : 'secondary') }}-subtle text-{{ $booking->status === 'confirmed' ? 'primary' : ($booking->status === 'cancelled' ? 'danger' : 'secondary') }} py-2 px-3 rounded-pill" style="font-weight: 600;">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5 text-muted">
                                            <div class="mb-3"><i class="fa fa-calendar-times fa-3x text-light"></i></div>
                                            <h5 class="fw-bold">No bookings found</h5>
                                            <p>When guests book rooms, they will appear here.</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
@endsection
