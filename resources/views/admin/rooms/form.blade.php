@extends('layouts.admin_layout', ['title' => 'Room Form', 'headerTitle' => 'Room Form'])

@section('admin_content')
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">{{ isset($room) ? 'Edit Room' : 'Add New Room' }}</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="{{ route('admin.rooms.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fa fa-arrow-left me-1"></i> Back to Rooms
                        </a>
                    </div>
                </div>

                <form action="{{ isset($room) ? route('admin.rooms.update', $room) : route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($room))
                        @method('PUT')
                    @endif

                    <div class="row g-4">
                        <!-- Left Column: Primary Details -->
                        <div class="col-lg-8">
                            <div class="card shadow-sm border-0 mb-4">
                                <div class="card-header bg-white py-3">
                                    <h5 class="mb-0 fw-bold">Primary Information</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Room Name</label>
                                        <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name', $room->name ?? '') }}" placeholder="e.g., Deluxe Ocean View Suite" required>
                                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Description</label>
                                        <textarea name="description" rows="6" class="form-control @error('description') is-invalid @enderror" placeholder="Describe the room features, view, and ambiance..." required>{{ old('description', $room->description ?? '') }}</textarea>
                                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="mb-0">
                                        <label class="form-label fw-bold">Room Image</label>
                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" {{ isset($room) ? '' : 'required' }}>
                                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        @if(isset($room) && $room->image)
                                            <div class="mt-3 p-3 bg-light rounded d-inline-block">
                                                <p class="small text-muted mb-2 fw-bold text-uppercase">Current Image</p>
                                                <img src="{{ str_starts_with($room->image, 'http') ? $room->image : asset('storage/' . $room->image) }}" onerror="this.src='{{ asset('img/' . $room->image) }}'" alt="Room" class="img-thumbnail rounded" style="height: 150px; object-fit: cover;">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Settings & Pricing -->
                        <div class="col-lg-4">
                            <!-- Pricing & Status Card -->
                            <div class="card shadow-sm border-0 mb-4">
                                <div class="card-header bg-white py-3">
                                    <h5 class="mb-0 fw-bold">Pricing & Availability</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="mb-4">
                                        <label class="form-label fw-bold text-success">Price per Night (₹)</label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-light text-success fw-bold">₹</span>
                                            <input type="number" step="0.01" name="price" class="form-control text-success fw-bold @error('price') is-invalid @enderror" value="{{ old('price', $room->price ?? '') }}" required>
                                        </div>
                                        @error('price')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Current Status</label>
                                        <select name="is_available" class="form-select form-select-lg @error('is_available') is-invalid @enderror">
                                            <option value="1" {{ old('is_available', $room->is_available ?? 1) == 1 ? 'selected' : '' }}>🟢 Available</option>
                                            <option value="0" {{ old('is_available', $room->is_available ?? 1) == 0 ? 'selected' : '' }}>🔴 Booked / Unavailable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Amenities Card -->
                            <div class="card shadow-sm border-0 mb-4">
                                <div class="card-header bg-white py-3">
                                    <h5 class="mb-0 fw-bold">Room Amenities</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-3 mb-4">
                                        <div class="col-6">
                                            <label class="form-label fw-bold text-muted small text-uppercase">Bedrooms</label>
                                            <input type="number" name="bed_count" class="form-control text-center @error('bed_count') is-invalid @enderror" value="{{ old('bed_count', $room->bed_count ?? 1) }}" required>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label fw-bold text-muted small text-uppercase">Bathrooms</label>
                                            <input type="number" name="bath_count" class="form-control text-center @error('bath_count') is-invalid @enderror" value="{{ old('bath_count', $room->bath_count ?? 1) }}" required>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label class="form-label fw-bold text-muted small text-uppercase">Quality Rating (1-5)</label>
                                            <div class="input-group">
                                                <input type="number" name="stars" min="1" max="5" class="form-control @error('stars') is-invalid @enderror" value="{{ old('stars', $room->stars ?? 5) }}" required>
                                                <span class="input-group-text text-warning"><i class="fa fa-star"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="text-muted">

                                    <div class="form-check form-switch pt-2">
                                        <input class="form-check-input form-check-input-lg cursor-pointer" type="checkbox" role="switch" id="wifiSwitch" name="wifi" value="1" {{ old('wifi', $room->wifi ?? true) ? 'checked' : '' }} style="transform: scale(1.3); margin-right: 10px;">
                                        <label class="form-check-label fw-bold ms-2 cursor-pointer" for="wifiSwitch">Complimentary Wi-Fi</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg fw-bold text-uppercase shadow-sm">
                                    <i class="fa fa-save me-2"></i> {{ isset($room) ? 'Update Room Detail' : 'Publish Room' }}
                                </button>
                                <a href="{{ route('admin.rooms.index') }}" class="btn btn-light text-muted fw-bold">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            @endsection
