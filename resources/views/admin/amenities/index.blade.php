@extends('layouts.admin_layout', ['title' => 'Hotel Amenities', 'headerTitle' => 'Hotel Amenities'])

@section('admin_content')
            <div class="admin-page-title">
                <span>Hotel Amenities</span>
                <a href="{{ route('admin.amenities.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus me-1"></i> Add Amenity
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Category Summary Cards --}}
            <div class="row g-3 mb-4">
                @php
                    $categories = [
                        'food'   => ['label' => 'Food & Dining',       'icon' => '🍽️', 'color' => 'warning'],
                        'gym'    => ['label' => 'Fitness & Gym',        'icon' => '🏋️', 'color' => 'danger'],
                        'sports' => ['label' => 'Sports',               'icon' => '⚽', 'color' => 'success'],
                        'games'  => ['label' => 'Games & Entertainment','icon' => '🎮', 'color' => 'primary'],
                        'spa'    => ['label' => 'Spa & Wellness',       'icon' => '💆', 'color' => 'info'],
                        'other'  => ['label' => 'Other',                'icon' => '🏨', 'color' => 'secondary'],
                    ];
                    $counts = $amenities->groupBy('category')->map->count();
                @endphp
                @foreach($categories as $key => $cat)
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body py-3">
                            <div class="fs-2 mb-1">{{ $cat['icon'] }}</div>
                            <div class="fw-bold fs-4 text-{{ $cat['color'] }}">{{ $counts[$key] ?? 0 }}</div>
                            <small class="text-muted">{{ $cat['label'] }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Main Table --}}
            <div class="admin-card">
                <div class="admin-card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-3">Icon</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Timings</th>
                                    <th>Capacity</th>
                                    <th>Status</th>
                                    <th class="text-end pe-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($amenities as $amenity)
                                    <tr>
                                        <td class="ps-3">
                                            <span class="fs-3">{{ $amenity->icon }}</span>
                                        </td>
                                        <td>
                                            <div class="fw-bold">{{ $amenity->name }}</div>
                                            @if($amenity->description)
                                                <small class="text-muted">{{ Str::limit($amenity->description, 60) }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $amenity->category_color }} text-{{ in_array($amenity->category, ['food','gym']) ? 'white' : 'white' }}">
                                                {{ $amenity->category_label }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($amenity->price > 0)
                                                <span class="fw-bold text-success">₹{{ number_format($amenity->price, 0) }}</span>
                                            @else
                                                <span class="badge bg-success">Free</span>
                                            @endif
                                        </td>
                                        <td class="text-muted small">{{ $amenity->timings ?? '—' }}</td>
                                        <td class="text-muted">{{ $amenity->capacity ? $amenity->capacity . ' pax' : '—' }}</td>
                                        <td>
                                            @if($amenity->is_available)
                                                <span class="badge bg-success">Available</span>
                                            @else
                                                <span class="badge bg-danger">Unavailable</span>
                                            @endif
                                        </td>
                                        <td class="text-end pe-3">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('admin.amenities.edit', $amenity) }}" class="btn btn-outline-primary">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('admin.amenities.destroy', $amenity) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this amenity?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger" style="border-radius: 0 4px 4px 0;">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-5 text-muted">
                                            <i class="fa fa-concierge-bell fa-3x mb-3 d-block opacity-25"></i>
                                            No amenities found. <a href="{{ route('admin.amenities.create') }}">Add the first one!</a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $amenities->links() }}
            </div>
        @endsection
