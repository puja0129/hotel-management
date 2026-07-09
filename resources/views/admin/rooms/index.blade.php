@extends('layouts.admin_layout', ['title' => 'Manage Rooms', 'headerTitle' => 'Manage Rooms'])

@section('admin_content')
                <div class="admin-page-title">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-bed me-3 text-primary fs-4"></i>
                        <span>Rooms Management</span>
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
                        <h5 class="mb-0 fw-bold text-dark">All Rooms <span class="badge bg-primary-subtle text-primary ms-2 fs-6 fw-normal" style="font-size: 0.75rem !important;">{{ $rooms->count() }} Total</span></h5>
                        <a href="{{ route('admin.rooms.create') }}" class="btn btn-sm btn-primary shadow-sm">
                            <i class="fa fa-plus-circle me-1"></i> Add New Room
                        </a>
                    </div>
                    <div class="admin-card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light contrast-bg">
                                    <tr>
                                        <th class="ps-4 py-3 text-uppercase text-muted small fw-bold">Room Detail</th>
                                        <th class="py-3 text-uppercase text-muted small fw-bold">Price / Night</th>
                                        <th class="py-3 text-uppercase text-muted small fw-bold">Capacity</th>
                                        <th class="py-3 text-uppercase text-muted small fw-bold">Live Status</th>
                                        <th class="pe-4 py-3 text-uppercase text-muted small fw-bold text-end">Actions</th>
                                    </tr>
                                </thead>
                        <tbody>
                            @forelse($rooms as $room)
                                    <td class="ps-4 py-3">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <img src="{{ str_starts_with($room->image, 'http') ? $room->image : asset('storage/' . $room->image) }}" onerror="this.src='{{ asset('img/' . $room->image) }}'" alt="{{ $room->name }}" class="rounded-3 shadow-sm" style="width: 70px; height: 50px; object-fit: cover; border: 1px solid #eee;">
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold text-dark">{{ $room->name }}</h6>
                                                <small class="text-muted">ID: #{{ str_pad($room->id, 4, '0', STR_PAD_LEFT) }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 fw-bold text-dark">₹{{ number_format($room->price, 2) }}</td>
                                    <td class="py-3">
                                        <div class="d-flex gap-2">
                                            <span class="badge bg-light text-dark border py-2 px-3 fw-normal" style="font-size: 13px;"><i class="fa fa-bed me-1 text-primary"></i> {{ $room->bed_count }}</span>
                                            <span class="badge bg-light text-dark border py-2 px-3 fw-normal" style="font-size: 13px;"><i class="fa fa-bath me-1 text-primary"></i> {{ $room->bath_count }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3">
                                        @if($room->is_available)
                                            <span class="badge bg-success-subtle text-success py-2 px-3 rounded-pill border border-success border-opacity-25" style="font-weight: 600;"><i class="fa fa-check-circle me-1"></i> Available</span>
                                        @else
                                            <span class="badge bg-danger-subtle text-danger py-2 px-3 rounded-pill border border-danger border-opacity-25" style="font-weight: 600;"><i class="fa fa-times-circle me-1"></i> Booked</span>
                                        @endif
                                    </td>
                                    <td class="pe-4 py-3 text-end">
                                        <div class="d-flex gap-2 justify-content-end">
                                            <a href="{{ route('admin.rooms.show', $room) }}" class="btn btn-sm btn-outline-primary border-light-subtle shadow-sm bg-white" title="View"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('admin.rooms.edit', $room) }}" class="btn btn-sm btn-outline-primary border-light-subtle shadow-sm bg-white" title="Edit"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this room?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger border-light-subtle shadow-sm bg-white" title="Delete"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">No rooms found. Add your first room!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
