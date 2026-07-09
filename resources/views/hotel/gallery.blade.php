@extends('layouts.services_layout')

@section('title', 'Our Gallery')

@push('styles')
<style>
    /* Hero Section */
   
    .gallery-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    /* Filter Menu */
    .filter-menu {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;
        margin: 40px 0 30px;
    }
    .filter-btn {
        background: transparent;
        border: 2px solid #1a7f4b;
        color: #1a7f4b;
        padding: 8px 24px;
        border-radius: 30px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.85rem;
    }
    .filter-btn:hover, .filter-btn.active {
        background: #1a7f4b;
        color: white;
        box-shadow: 0 4px 15px rgba(26, 127, 75, 0.3);
    }

    /* Gallery Grid */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 25px;
        padding-bottom: 60px;
    }
    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        aspect-ratio: 4/3;
        transition: transform 0.4s ease, opacity 0.4s ease;
    }
    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
    }
    
    /* Overlay & Text Animations */
    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0) 60%);
        display: flex;
        align-items: flex-end;
        padding: 25px;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.4s ease;
    }
    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }
    .gallery-item:hover img {
        transform: scale(1.1);
    }
    .gallery-title {
        color: white;
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        font-weight: 600;
        transform: translateY(20px);
        transition: transform 0.4s cubic-bezier(0.25, 1, 0.5, 1);
    }
    .gallery-item:hover .gallery-title {
        transform: translateY(0);
    }

    /* JS Hiding/Showing Class */
    .gallery-item.hide {
        display: none;
    }
</style>
@endpush

@section('content')
    {{-- ── Hero Carousel (Full size) ── --}}
    @php $height = '520px'; @endphp
    @include('partials.hero_carousel')

    <div style="background: var(--bg-soft); padding-bottom: 80px;">
        {{-- ── Minimalist Breadcrumb ── --}}
        <div style="padding: 20px 0; border-bottom: 1px solid #eaeaeb; background: white; margin-bottom: 60px;">
            <div class="container" style="max-width: 1200px;">
                <div style="font-size: 0.8rem; letter-spacing: 1px; text-transform: uppercase; font-weight: 500;">
                    <a href="{{ route('home') }}" style="color: var(--text-muted); text-decoration: none;">Home</a>
                    <span style="margin: 0 10px; color: #ccc;">/</span>
                    <span style="color: var(--green);">Gallery</span>
                </div>
            </div>
        </div>

    {{-- Gallery Content --}}
    <div class="container">
        
        {{-- Filters --}}
        <div class="filter-menu">
            <button class="filter-btn active" data-filter="all">All Photos</button>
            <button class="filter-btn" data-filter="rooms">Rooms</button>
            <button class="filter-btn" data-filter="dining">Food & Dining</button>
            <button class="filter-btn" data-filter="wellness">Gym & Spa</button>
            <button class="filter-btn" data-filter="others">Others</button>
        </div>

        {{-- Image Grid --}}
        <div class="gallery-grid" id="galleryGrid">
            @foreach($galleryItems as $item)
                <div class="gallery-item" data-category="{{ $item['category'] }}">
                    <img src="{{ $item['url'] }}" alt="{{ $item['title'] }}" loading="lazy">
                    <div class="gallery-overlay">
                        <div class="gallery-title">{{ $item['title'] }}</div>
                    </div>
                </div>
            @endforeach
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                filterBtns.forEach(b => b.classList.remove('active'));
                // Add active class to clicked button
                this.classList.add('active');

                const filterValue = this.getAttribute('data-filter');

                // Filter logic
                galleryItems.forEach(item => {
                    // Slight animation out
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.95)';
                    
                    setTimeout(() => {
                        if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                            item.classList.remove('hide');
                            // Small delay for staggered reflow animation
                            setTimeout(() => {
                                item.style.opacity = '1';
                                item.style.transform = 'scale(1)';
                            }, 50);
                        } else {
                            item.classList.add('hide');
                        }
                    }, 300); // Wait for fade out to complete before hiding
                });
            });
        });
    });
</script>
@endpush
