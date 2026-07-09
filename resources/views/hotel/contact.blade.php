@extends('layouts.services_layout')

@section('title', 'Contact Us')

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
                <span style="color: var(--green);">Contact</span>
            </div>
        </div>
    </div>

<div class="container detail-container">

    @if(session('success'))
    <div style="background:var(--green-light); border:1px solid var(--green); border-radius:8px; padding:1rem 1.25rem; margin-bottom:1.5rem; color:var(--green); font-size:14px;">
        ✅ {{ session('success') }}
    </div>
    @endif

    <div class="res-grid-contact" style="display:grid; grid-template-columns:1fr 1.5fr; gap:3rem;">

        {{-- ── Contact Info ── --}}
        <div>
            <div class="section-block">
                <h2 class="section-heading">Our Information</h2>
                <div style="display:flex; flex-direction:column; gap:1rem;">
                    <div class="timing-item" style="text-align:left; padding:1rem 1.25rem;">
                        <span style="font-size:20px;">📍</span>
                        <div style="margin-top:6px;">
                            <span class="timing-label">Address</span>
                            <span class="timing-val" style="font-size:13px;">123 Luxury Lane, Ahmedabad, Gujarat 380001</span>
                        </div>
                    </div>
                    <div class="timing-item" style="text-align:left; padding:1rem 1.25rem;">
                        <span style="font-size:20px;">📞</span>
                        <div style="margin-top:6px;">
                            <span class="timing-label">Phone</span>
                            <span class="timing-val" style="font-size:13px;">+91 79 1234 5678</span>
                        </div>
                    </div>
                    <div class="timing-item" style="text-align:left; padding:1rem 1.25rem;">
                        <span style="font-size:20px;">✉️</span>
                        <div style="margin-top:6px;">
                            <span class="timing-label">Email</span>
                            <span class="timing-val" style="font-size:13px;">info@grandhotel.com</span>
                        </div>
                    </div>
                    <div class="timing-item" style="text-align:left; padding:1rem 1.25rem;">
                        <span style="font-size:20px;">⏰</span>
                        <div style="margin-top:6px;">
                            <span class="timing-label">Front Desk</span>
                            <span class="timing-val" style="font-size:13px;">Open 24 / 7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Contact Form ── --}}
        <div>
            <div class="section-block" style="background: #fff; padding: 30px; border-radius: 16px; box-shadow: 0 10px 40px rgba(0,0,0,0.04); border: 1px solid var(--border);">
                <h2 class="section-heading" style="border-bottom: none; margin-bottom: 24px; color: var(--text); font-size: 20px; text-transform: none; font-family: 'Playfair Display', serif;">Send Us A Message</h2>
                <form action="{{ route('contact.store') }}" method="POST" data-validate="true" style="display:flex; flex-direction:column; gap:20px;">
                    @csrf
                    <div class="res-grid-contact" style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                        <div>
                            <label style="font-size:13px; font-weight:500; color:var(--text); display:block; margin-bottom:8px;">Full Name</label>
                            <input type="text" name="name" placeholder="John Doe"
                                   value="{{ old('name') }}"
                                   style="width:100%; border:1.5px solid var(--border); border-radius:10px; padding:12px 16px; font-size:14px; outline:none; background: #fafafa; transition: all 0.2s;"
                                   onfocus="this.style.borderColor='var(--green)'; this.style.boxShadow='0 0 0 3px rgba(15, 110, 86, 0.1)';" onblur="this.style.borderColor='var(--border)'; this.style.boxShadow='none';"
                                   required>
                            @error('name')<p style="font-size:12px;color:#dc2626;margin-top:4px;"><i class="fa fa-exclamation-circle"></i> {{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label style="font-size:13px; font-weight:500; color:var(--text); display:block; margin-bottom:8px;">Email Address</label>
                            <input type="email" name="email" placeholder="john@example.com"
                                   value="{{ old('email') }}"
                                   style="width:100%; border:1.5px solid var(--border); border-radius:10px; padding:12px 16px; font-size:14px; outline:none; background: #fafafa; transition: all 0.2s;"
                                   onfocus="this.style.borderColor='var(--green)'; this.style.boxShadow='0 0 0 3px rgba(15, 110, 86, 0.1)';" onblur="this.style.borderColor='var(--border)'; this.style.boxShadow='none';"
                                   required>
                            @error('email')<p style="font-size:12px;color:#dc2626;margin-top:4px;"><i class="fa fa-exclamation-circle"></i> {{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div>
                        <label style="font-size:13px; font-weight:500; color:var(--text); display:block; margin-bottom:8px;">Subject</label>
                        <input type="text" name="subject" placeholder="How can we help you?"
                               value="{{ old('subject') }}"
                               style="width:100%; border:1.5px solid var(--border); border-radius:10px; padding:12px 16px; font-size:14px; outline:none; background: #fafafa; transition: all 0.2s;"
                               onfocus="this.style.borderColor='var(--green)'; this.style.boxShadow='0 0 0 3px rgba(15, 110, 86, 0.1)';" onblur="this.style.borderColor='var(--border)'; this.style.boxShadow='none';"
                               required>
                        @error('subject')<p style="font-size:12px;color:#dc2626;margin-top:4px;"><i class="fa fa-exclamation-circle"></i> {{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label style="font-size:13px; font-weight:500; color:var(--text); display:block; margin-bottom:8px;">Message</label>
                        <textarea name="message" rows="5" placeholder="Write your specific request or question here..."
                                  style="width:100%; border:1.5px solid var(--border); border-radius:10px; padding:12px 16px; font-size:14px; outline:none; resize:vertical; background: #fafafa; transition: all 0.2s;"
                                  onfocus="this.style.borderColor='var(--green)'; this.style.boxShadow='0 0 0 3px rgba(15, 110, 86, 0.1)';" onblur="this.style.borderColor='var(--border)'; this.style.boxShadow='none';"
                                  required>{{ old('message') }}</textarea>
                        @error('message')<p style="font-size:12px;color:#dc2626;margin-top:4px;"><i class="fa fa-exclamation-circle"></i> {{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="btn-primary" style="cursor:pointer; border:none; padding:14px 32px; align-self:flex-start; margin-top: 10px; border-radius: 10px; font-weight: 600; box-shadow: 0 4px 15px rgba(15, 110, 86, 0.2); transition: all 0.3s;" onmouseover="this.style.transform='translateY(-2px)';" onmouseout="this.style.transform='translateY(0)';">
                        <i class="fa fa-paper-plane" style="margin-right: 8px;"></i> Send Message
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
