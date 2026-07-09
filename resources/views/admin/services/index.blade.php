@extends('layouts.admin_layout', ['title' => 'Manage Services', 'headerTitle' => 'Manage Services'])

@section('admin_content')
                <div class="admin-page-title">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-concierge-bell me-3 text-primary fs-4"></i>
                        <span>Services Management</span>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="admin-card mt-4 shadow-sm border-0 rounded-4 overflow-hidden">
                    <div class="admin-card-header bg-white py-3 px-4 border-bottom d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold text-dark">All Services <span class="badge bg-primary-subtle text-primary ms-2 fs-6 fw-normal" style="font-size: 0.75rem !important;">{{ $services->total() }} Total</span></h5>
                        <a href="{{ route('admin.services.create') }}" class="btn btn-sm btn-primary shadow-sm">
                            <i class="fa fa-plus-circle me-1"></i> Add New Service
                        </a>
                    </div>
                    <div class="admin-card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light contrast-bg">
                                    <tr>
                                        <th class="ps-4 py-3 text-uppercase text-muted small fw-bold" style="width: 80px;">Icon</th>
                                        <th class="py-3 text-uppercase text-muted small fw-bold">Service Title</th>
                                        <th class="py-3 text-uppercase text-muted small fw-bold">Short Description</th>
                                        <th class="pe-4 py-3 text-uppercase text-muted small fw-bold text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($services as $service)
                                        <tr>
                                            <td class="ps-4 py-3">
                                                <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; border: 1px solid rgba(26, 127, 75, 0.1);">
                                                    <i class="fa {{ $service->icon }} fs-5"></i>
                                                </div>
                                            </td>
                                            <td class="py-3">
                                                <div class="fw-bold text-dark fs-6">{{ $service->title }}</div>
                                            </td>
                                            <td class="py-3">
                                                <div class="text-muted small lh-base" style="max-width: 400px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; white-space: normal;">
                                                    {{ $service->short_description }}
                                                </div>
                                            </td>
                                            <td class="pe-4 py-3 text-end">
                                                <div class="d-flex gap-2 justify-content-end">
                                                    <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-outline-primary border-light-subtle shadow-sm bg-white" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('admin.services.destroy', $service->id) }}" onsubmit="return confirm('Are you sure you want to delete this service?');" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger border-light-subtle shadow-sm bg-white" title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-5 text-muted">
                                                <div class="mb-3">
                                                    <i class="fa fa-concierge-bell fa-3x text-light"></i>
                                                </div>
                                                <h5 class="fw-bold">No services found</h5>
                                                <p>Start by creating a new service for the hotel.</p>
                                                <a href="{{ route('admin.services.create') }}" class="btn btn-primary mt-2">
                                                    Add First Service
                                                </a>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 pt-3 pb-3">
                        <div class="d-flex justify-content-end">
                            {{ $services->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            @endsection
