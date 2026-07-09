@extends('layouts.admin_layout', ['title' => 'Amenity Form', 'headerTitle' => 'Amenity Form'])

@section('admin_content')
            <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div>
                    <h1 class="h2 mb-1">{{ isset($amenity) ? 'Edit Amenity' : 'Add New Amenity' }}</h1>
                    <small class="text-muted">Manage hotel amenities like food, gym, sports & games</small>
                </div>
                <a href="{{ route('admin.amenities.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="fa fa-arrow-left me-1"></i> Back
                </a>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                </div>
            @endif

            <form action="{{ isset($amenity) ? route('admin.amenities.update', $amenity) : route('admin.amenities.store') }}" method="POST">
                @csrf
                @if(isset($amenity)) @method('PUT') @endif

                <div class="row g-4">
                    <!-- Left Column -->
                    <div class="col-lg-8">
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white py-3">
                                <h5 class="mb-0 fw-bold">Amenity Information</h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Amenity Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                           value="{{ old('name', $amenity->name ?? '') }}"
                                           placeholder="e.g., Rooftop Swimming Pool, Buffet Dinner, Badminton Court">
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold">Category <span class="text-danger">*</span></label>
                                    <div class="row g-2">
                                        @php
                                            $cats = [
                                                'food'   => ['label' => 'Food & Dining',        'emoji' => '🍽️', 'color' => 'warning'],
                                                'gym'    => ['label' => 'Fitness & Gym',         'emoji' => '🏋️', 'color' => 'danger'],
                                                'sports' => ['label' => 'Sports',                'emoji' => '⚽', 'color' => 'success'],
                                                'games'  => ['label' => 'Games & Entertainment', 'emoji' => '🎮', 'color' => 'primary'],
                                                'spa'    => ['label' => 'Spa & Wellness',        'emoji' => '💆', 'color' => 'info'],
                                                'other'  => ['label' => 'Other',                 'emoji' => '🏨', 'color' => 'secondary'],
                                            ];
                                            $currentCat = old('category', $amenity->category ?? '');
                                        @endphp
                                        @foreach($cats as $key => $cat)
                                        <div class="col-4 col-md-4">
                                            <input type="radio" class="btn-check" name="category" id="cat_{{ $key }}" value="{{ $key }}"
                                                   {{ $currentCat === $key ? 'checked' : '' }} required>
                                            <label class="btn btn-outline-{{ $cat['color'] }} w-100 py-3 d-flex flex-column align-items-center gap-1" for="cat_{{ $key }}">
                                                <span class="fs-3">{{ $cat['emoji'] }}</span>
                                                <span class="small fw-bold">{{ $cat['label'] }}</span>
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                    @error('category')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-0">
                                    <label class="form-label fw-bold">Description</label>
                                    <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror"
                                              placeholder="Describe this amenity — facilities, rules, highlights...">{{ old('description', $amenity->description ?? '') }}</textarea>
                                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-lg-4">
                        <!-- Icon & Pricing Card -->
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white py-3">
                                <h5 class="mb-0 fw-bold">Icon & Pricing</h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Emoji Icon</label>
                                    <input type="text" name="icon" class="form-control form-control-lg text-center @error('icon') is-invalid @enderror"
                                           value="{{ old('icon', $amenity->icon ?? '🏨') }}"
                                           placeholder="🍽️ or 🏋️ or ⚽"
                                           style="font-size: 2rem; height: 65px;">
                                    <small class="text-muted">Paste an emoji or icon class</small>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold text-success">Price (₹)</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light text-success fw-bold">₹</span>
                                        <input type="number" step="0.01" min="0" name="price"
                                               class="form-control @error('price') is-invalid @enderror"
                                               value="{{ old('price', $amenity->price ?? 0) }}"
                                               placeholder="0 = Free / Included">
                                    </div>
                                    <small class="text-muted">Enter 0 if included in room rate</small>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold">Operating Timings</label>
                                    <input type="text" name="timings" class="form-control"
                                           value="{{ old('timings', $amenity->timings ?? '') }}"
                                           placeholder="e.g., 6:00 AM – 10:00 PM">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold">Capacity (persons)</label>
                                    <input type="number" name="capacity" min="1" class="form-control"
                                           value="{{ old('capacity', $amenity->capacity ?? '') }}"
                                           placeholder="Leave blank if unlimited">
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                           id="availSwitch" name="is_available" value="1"
                                           {{ old('is_available', $amenity->is_available ?? true) ? 'checked' : '' }}
                                           style="transform: scale(1.3);">
                                    <label class="form-check-label fw-bold ms-2" for="availSwitch">Currently Available</label>
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold">
                                <i class="fa fa-save me-2"></i> {{ isset($amenity) ? 'Update Amenity' : 'Add Amenity' }}
                            </button>
                            <a href="{{ route('admin.amenities.index') }}" class="btn btn-light text-muted fw-bold">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        @endsection
