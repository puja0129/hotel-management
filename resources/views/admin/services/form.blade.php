@extends('layouts.admin_layout', ['title' => 'Service Form', 'headerTitle' => 'Service Form'])

@section('admin_content')
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">{{ isset($service) ? 'Edit Service' : 'Add New Service' }}</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="{{ route('admin.services.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fa fa-arrow-left me-1"></i> Back to Services
                        </a>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body p-4 p-md-5">
                                <form action="{{ isset($service) ? route('admin.services.update', $service->id) : route('admin.services.store') }}" method="POST">
                                    @csrf
                                    @if(isset($service))
                                        @method('PUT')
                                    @endif

                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Service Title</label>
                                        <input type="text" name="title" class="form-control form-control-lg @error('title') is-invalid @enderror" value="{{ old('title', $service->title ?? '') }}" placeholder="e.g., Free High-Speed WiFi" required>
                                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Service Icon Class</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="fa fa-info-circle"></i></span>
                                            <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $service->icon ?? 'fa-star') }}" placeholder="e.g., fa-wifi" required>
                                        </div>
                                        <div class="form-text text-muted">Use FontAwesome classes (e.g., <code>fa-wifi</code>, <code>fa-swimming-pool</code>, <code>fa-spa</code>). <a href="https://fontawesome.com/icons" target="_blank">Browse icons</a>.</div>
                                        @error('icon')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Short Description</label>
                                        <textarea name="short_description" rows="3" class="form-control @error('short_description') is-invalid @enderror" placeholder="Describe the service..." required>{{ old('short_description', $service->short_description ?? '') }}</textarea>
                                        @error('short_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="d-grid mt-5">
                                        <button type="submit" class="btn btn-primary btn-lg fw-bold text-uppercase shadow-sm">
                                            <i class="fa fa-save me-2"></i> {{ isset($service) ? 'Update Service' : 'Publish Service' }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
