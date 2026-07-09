@extends('layouts.guest')

@section('content')
<style>
    .auth-title {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: #1a4d2e;
        font-size: 2.1rem;
        margin-bottom: 6px;
        line-height: 1.2;
    }
    .auth-subtitle {
        color: #8aab8e;
        font-size: 0.9rem;
        margin-bottom: 32px;
    }
    .divider-line {
        border: none;
        border-top: 1.5px solid #e5ede7;
        margin: 24px 0;
    }
</style>

<h2 class="auth-title">Welcome Back</h2>
<p class="auth-subtitle">Sign in to continue your luxury journey.</p>

<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('login') }}" data-validate="true">
    @csrf

    <div class="form-group-custom">
        <label class="form-label">Email Address</label>
        <input type="email" name="email" value="{{ old('email') }}" required autofocus
               class="form-control" placeholder="your@email.com">
        @error('email')<p style="color:#c0392b; font-size:0.8rem; margin-top:5px;">{{ $message }}</p>@enderror
    </div>

    <div class="form-group-custom">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:7px;">
            <label class="form-label" style="margin-bottom:0;">Password</label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
            @endif
        </div>
        <div style="position:relative;">
            <input type="password" name="password" id="password_field" required
                   class="form-control" placeholder="••••••••" style="padding-right:48px;">
            <button type="button" onclick="togglePass()"
                    style="position:absolute; right:14px; top:50%; transform:translateY(-50%);
                           background:none; border:none; color:#739b78; cursor:pointer; font-size:1rem; padding:0;">
                <i class="fas fa-eye" id="eye_icon"></i>
            </button>
        </div>
        @error('password')<p style="color:#c0392b; font-size:0.8rem; margin-top:5px;">{{ $message }}</p>@enderror
    </div>

    <button type="submit" class="btn-primary-auth">
        <i class="fas fa-sign-in-alt" style="margin-right:8px;"></i> Sign In
    </button>
</form>

<hr class="divider-line">

<div class="auth-footer-link">
    Don't have an account? <a href="{{ route('register') }}">Create one free</a>
</div>

<!-- Demo Credentials Box -->
<div style="margin-top: 20px;">

    <!-- Section Label -->
    <div style="display:flex; align-items:center; gap:10px; margin-bottom:14px;">
        <div style="flex:1; height:1px; background:linear-gradient(to right, transparent, #c8dece);"></div>
        <span style="font-size:0.7rem; font-weight:700; letter-spacing:2px; text-transform:uppercase; color:#a0bba5; white-space:nowrap;">
            <i class="fas fa-key" style="margin-right:4px;"></i> Test Accounts
        </span>
        <div style="flex:1; height:1px; background:linear-gradient(to left, transparent, #c8dece);"></div>
    </div>

    <!-- Admin Credentials -->
    <div onclick="fillCredentials('admin@gmail.com','admin@123')"
         style="background:#fff; border:2px solid #1a4d2e22; border-radius:16px;
                padding:16px 18px; margin-bottom:10px; cursor:pointer;
                transition:all 0.25s ease; position:relative;"
         onmouseover="this.style.borderColor='#1a4d2e66'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 24px rgba(26,77,46,0.12)';"
         onmouseout="this.style.borderColor='#1a4d2e22'; this.style.transform=''; this.style.boxShadow='';">

        <!-- Header -->
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:12px;">
            <div style="display:flex; align-items:center; gap:9px;">
                <div style="width:32px; height:32px; border-radius:10px;
                            background:linear-gradient(135deg,#1a4d2e,#2d7a4f);
                            display:flex; align-items:center; justify-content:center;
                            box-shadow:0 4px 10px rgba(26,77,46,0.3);">
                    <i class="fas fa-user-shield" style="color:#fff; font-size:0.8rem;"></i>
                </div>
                <div>
                    <div style="font-size:0.8rem; font-weight:800; color:#1a4d2e; letter-spacing:0.5px;">Admin Account</div>
                    <div style="font-size:0.65rem; color:#90b595; font-weight:500;">Full access · All permissions</div>
                </div>
            </div>
            <span style="font-size:0.62rem; font-weight:700; letter-spacing:1px; color:#fff;
                         background:linear-gradient(135deg,#1a4d2e,#2d7a4f);
                         padding:3px 10px; border-radius:20px;">
                CLICK TO LOGIN
            </span>
        </div>

        <!-- Credential Rows -->
        <div style="background:#f4faf6; border-radius:10px; padding:10px 14px; display:flex; flex-direction:column; gap:8px;">
            <div style="display:flex; align-items:center; gap:10px;">
                <div style="width:24px; height:24px; background:#e0f0e6; border-radius:7px;
                            display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                    <i class="fas fa-envelope" style="font-size:0.65rem; color:#1a4d2e;"></i>
                </div>
                <div>
                    <div style="font-size:0.62rem; color:#a0bba5; font-weight:600; text-transform:uppercase; letter-spacing:1px;">Login ID</div>
                    <div style="font-size:0.9rem; font-weight:700; color:#1a4d2e; font-family:'Outfit',monospace;">admin@gmail.com</div>
                </div>
            </div>
            <div style="height:1px; background:#d8eddf;"></div>
            <div style="display:flex; align-items:center; gap:10px;">
                <div style="width:24px; height:24px; background:#e0f0e6; border-radius:7px;
                            display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                    <i class="fas fa-lock" style="font-size:0.65rem; color:#1a4d2e;"></i>
                </div>
                <div>
                    <div style="font-size:0.62rem; color:#a0bba5; font-weight:600; text-transform:uppercase; letter-spacing:1px;">Password</div>
                    <div style="font-size:0.9rem; font-weight:700; color:#1a4d2e; font-family:'Outfit',monospace; letter-spacing:1px;">admin@123</div>
                </div>
            </div>
        </div>
    </div>

    <!-- User Credentials -->
    <div onclick="fillCredentials('user@gmail.com','user@123')"
         style="background:#fff; border:2px solid #4f6f5222; border-radius:16px;
                padding:16px 18px; cursor:pointer;
                transition:all 0.25s ease; position:relative;"
         onmouseover="this.style.borderColor='#4f6f5266'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 24px rgba(79,111,82,0.12)';"
         onmouseout="this.style.borderColor='#4f6f5222'; this.style.transform=''; this.style.boxShadow='';">

        <!-- Header -->
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:12px;">
            <div style="display:flex; align-items:center; gap:9px;">
                <div style="width:32px; height:32px; border-radius:10px;
                            background:linear-gradient(135deg,#4f6f52,#739b78);
                            display:flex; align-items:center; justify-content:center;
                            box-shadow:0 4px 10px rgba(79,111,82,0.3);">
                    <i class="fas fa-user" style="color:#fff; font-size:0.8rem;"></i>
                </div>
                <div>
                    <div style="font-size:0.8rem; font-weight:800; color:#4f6f52; letter-spacing:0.5px;">User Account</div>
                    <div style="font-size:0.65rem; color:#90b595; font-weight:500;">Guest access · Booking only</div>
                </div>
            </div>
            <span style="font-size:0.62rem; font-weight:700; letter-spacing:1px; color:#fff;
                         background:linear-gradient(135deg,#4f6f52,#739b78);
                         padding:3px 10px; border-radius:20px;">
                CLICK TO LOGIN
            </span>
        </div>

        <!-- Credential Rows -->
        <div style="background:#f4faf6; border-radius:10px; padding:10px 14px; display:flex; flex-direction:column; gap:8px;">
            <div style="display:flex; align-items:center; gap:10px;">
                <div style="width:24px; height:24px; background:#e0f0e6; border-radius:7px;
                            display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                    <i class="fas fa-envelope" style="font-size:0.65rem; color:#4f6f52;"></i>
                </div>
                <div>
                    <div style="font-size:0.62rem; color:#a0bba5; font-weight:600; text-transform:uppercase; letter-spacing:1px;">Login ID</div>
                    <div style="font-size:0.9rem; font-weight:700; color:#4f6f52; font-family:'Outfit',monospace;">user@gmail.com</div>
                </div>
            </div>
            <div style="height:1px; background:#d8eddf;"></div>
            <div style="display:flex; align-items:center; gap:10px;">
                <div style="width:24px; height:24px; background:#e0f0e6; border-radius:7px;
                            display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                    <i class="fas fa-lock" style="font-size:0.65rem; color:#4f6f52;"></i>
                </div>
                <div>
                    <div style="font-size:0.62rem; color:#a0bba5; font-weight:600; text-transform:uppercase; letter-spacing:1px;">Password</div>
                    <div style="font-size:0.9rem; font-weight:700; color:#4f6f52; font-family:'Outfit',monospace; letter-spacing:1px;">user@123</div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
function togglePass() {
    const f = document.getElementById('password_field');
    const i = document.getElementById('eye_icon');
    if (f.type === 'password') { f.type = 'text'; i.classList.replace('fa-eye','fa-eye-slash'); }
    else { f.type = 'password'; i.classList.replace('fa-eye-slash','fa-eye'); }
}

function fillCredentials(email, password) {
    document.querySelector('input[name="email"]').value = email;
    document.getElementById('password_field').value = password;
    // Brief flash feedback
    const fields = document.querySelectorAll('.form-control');
    fields.forEach(f => {
        f.style.transition = 'border-color 0.3s, background 0.3s';
        f.style.borderColor = '#2d7a4f';
        f.style.background = '#edf7f0';
        setTimeout(() => { f.style.borderColor = ''; f.style.background = ''; }, 800);
    });
}
</script>
@endsection
