@extends('layouts.services_layout')

@section('title', 'Our Team')

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
                <span style="color: var(--green);">Team</span>
            </div>
        </div>
    </div>

<section class="services-section">
    <div style="text-align:center; margin-bottom:2.5rem;">
        <p style="font-size:12px; color:var(--green); text-transform:uppercase; letter-spacing:1px; margin-bottom:.5rem;">The People Behind The Magic</p>
        <h2 style="font-family:'Playfair Display',serif; font-size:32px; color:var(--text);">Meet The <span class="text-green">Professionals</span></h2>
    </div>
    <div class="services-grid">
        @foreach($team as $member)
        @php
            $img = $member->image;
            if ($img && str_starts_with($img, 'http')) {
                $imgUrl = $img;
            } elseif ($img && str_starts_with($img, 'img/')) {
                $imgUrl = asset($img);
            } elseif ($img && str_starts_with($img, 'team-')) {
                $imgUrl = asset('img/' . $img);
            } elseif ($img) {
                $imgUrl = asset('storage/' . $img);
            } else {
                $imgUrl = 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&q=80';
            }
        @endphp
        <div class="service-card" style="text-align:center; overflow:visible;">
            <div style="padding:2rem 1.5rem 1.5rem;">
                <img src="{{ $imgUrl }}"
                     onerror="this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&q=80'"
                     style="width:100px; height:100px; border-radius:50%; object-fit:cover; margin:0 auto 1.25rem; display:block; border:3px solid var(--green-light);">
                <h4 style="font-size:16px; font-weight:500; color:var(--text); margin-bottom:4px;">{{ $member->name }}</h4>
                <p style="font-size:13px; color:var(--green); margin-bottom:.75rem;">{{ $member->designation }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>
</div>

@endsection
