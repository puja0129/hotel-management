@extends('layouts.admin_layout', ['title' => 'Room Details', 'headerTitle' => 'Room Details'])

@section('admin_content')
                <!-- Header -->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
                    <div>
                        <h1 class="h2 mb-1">{{ $room->name }}</h1>
                        <p class="text-muted mb-0">Room ID: #{{ str_pad($room->id, 5, '0', STR_PAD_LEFT) }}</p>
                    </div>
                    <div class="btn-toolbar mb-2 mb-md-0 gap-2">
                        <a href="{{ route('admin.rooms.index') }}" class="btn btn-sm btn-light border text-muted fw-bold">
                            <i class="fa fa-arrow-left me-1"></i> Back to Rooms
                        </a>
                        <a href="{{ route('admin.rooms.edit', $room) }}" class="btn btn-sm btn-primary fw-bold shadow-sm">
                            <i class="fa fa-edit me-1"></i> Edit Room
                        </a>
                    </div>
                </div>

                <div class="row g-4 mb-5">
                    <!-- Image Column -->
                    <div class="col-lg-7">
                        <div class="card shadow-sm border-0 h-100 overflow-hidden rounded-4">
                            <img src="{{ str_starts_with($room->image, 'http') ? $room->image : asset('storage/' . $room->image) }}" 
                                 onerror="this.src='{{ asset('img/' . $room->image) }}'" 
                                 alt="{{ $room->name }}" 
                                 class="card-img-top w-100 h-100" 
                                 style="object-fit: cover; min-height: 400px; max-height: 500px;">
                            
                            <!-- Badges overlapping image -->
                            <div class="position-absolute top-0 end-0 p-4">
                                @if($room->is_available)
                                    <span class="badge bg-success shadow fs-6 py-2 px-3 rounded-pill">
                                        <i class="fa fa-check-circle me-1"></i> Currently Available
                                    </span>
                                @else
                                    <span class="badge bg-danger shadow fs-6 py-2 px-3 rounded-pill">
                                        <i class="fa fa-times-circle me-1"></i> Currently Booked
                                    </span>
                                @endif
                            </div>
                            <div class="position-absolute bottom-0 start-0 p-4 w-100" style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                                <h3 class="text-white mb-0 fw-bold">₹{{ number_format($room->price, 2) }} <span class="fs-6 fw-normal text-light">/ night</span></h3>
                            </div>
                        </div>
                    </div>

                    <!-- Details Column -->
                    <div class="col-lg-5">
                        <div class="card shadow-sm border-0 h-100 rounded-4">
                            <div class="card-body p-5">
                                <h4 class="fw-bold mb-4 text-primary border-bottom pb-2">Room Details</h4>
                                
                                <div class="row g-4 mb-4">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="bg-light rounded-circle p-3 me-3 text-secondary">
                                                <i class="fa fa-bed fa-lg"></i>
                                            </div>
                                            <div>
                                                <p class="text-muted small mb-0 text-uppercase fw-bold">Bedrooms</p>
                                                <h5 class="mb-0 fw-bold">{{ $room->bed_count }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="bg-light rounded-circle p-3 me-3 text-secondary">
                                                <i class="fa fa-bath fa-lg"></i>
                                            </div>
                                            <div>
                                                <p class="text-muted small mb-0 text-uppercase fw-bold">Bathrooms</p>
                                                <h5 class="mb-0 fw-bold">{{ $room->bath_count }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="bg-light rounded-circle p-3 me-3 text-secondary">
                                                <i class="fa fa-star text-warning fa-lg"></i>
                                            </div>
                                            <div>
                                                <p class="text-muted small mb-0 text-uppercase fw-bold">Class</p>
                                                <h5 class="mb-0 fw-bold">{{ $room->stars }} Star{{ $room->stars > 1 ? 's' : '' }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="bg-light rounded-circle p-3 me-3 {{ $room->wifi ? 'text-primary' : 'text-danger' }}">
                                                <i class="fa {{ $room->wifi ? 'fa-wifi' : 'fa-ban' }} fa-lg"></i>
                                            </div>
                                            <div>
                                                <p class="text-muted small mb-0 text-uppercase fw-bold">Wi-Fi</p>
                                                <h5 class="mb-0 fw-bold {{ $room->wifi ? 'text-success' : 'text-danger' }}">
                                                    {{ $room->wifi ? 'Included' : 'Not Included' }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h5 class="fw-bold mb-3 mt-5">Description</h5>
                                <div class="bg-light p-4 rounded-3 text-secondary lh-lg">
                                    {!! nl2br(e($room->description)) !!}
                                </div>

                                <div class="mt-5 d-flex gap-2">
                                     <a href="{{ route('admin.rooms.edit', $room) }}" class="btn btn-primary px-4 fw-bold">Edit Details</a>
                                     <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this room entirely?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger px-4 fw-bold">Delete Room</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endsection
