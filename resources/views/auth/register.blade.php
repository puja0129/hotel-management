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

<h2 class="auth-title">Create Account</h2>
<p class="auth-subtitle">Join us and experience luxury hospitality.</p>

<form method="POST" action="{{ route('register') }}" data-validate="true">
    @csrf

    <div class="form-group-custom">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required autofocus
               class="form-control" placeholder="Ex: John Smith">
        @error('name')<p style="color:#c0392b; font-size:0.8rem; margin-top:5px;">{{ $message }}</p>@enderror
    </div>

    <div class="form-group-custom">
        <label class="form-label">Email Address</label>
        <input type="email" name="email" value="{{ old('email') }}" required
               class="form-control" placeholder="guest@grandoasis.com">
        @error('email')<p style="color:#c0392b; font-size:0.8rem; margin-top:5px;">{{ $message }}</p>@enderror
    </div>

    <div class="row g-2">
        <div class="col-6">
            <div class="form-group-custom">
                <label class="form-label">Password</label>
                <input type="password" name="password" id="reg_password" required
                       class="form-control" placeholder="••••••••" oninput="checkStrength(this.value)">
                <div class="password-strength">
                    <div class="password-strength-bar" id="strength_bar"></div>
                </div>
                @error('password')<p style="color:#c0392b; font-size:0.8rem; margin-top:5px;">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group-custom">
                <label class="form-label">Confirm</label>
                <input type="password" name="password_confirmation" required
                       class="form-control" placeholder="••••••••">
            </div>
        </div>
    </div>

    <button type="submit" class="btn-primary-auth">
        <i class="fas fa-user-plus" style="margin-right:8px;"></i> Register as Guest
    </button>
</form>

<hr class="divider-line">

<div class="auth-footer-link">
    Already a member? <a href="{{ route('login') }}">Sign In</a>
</div>

<script>
function checkStrength(val) {
    const bar = document.getElementById('strength_bar');
    let score = 0;
    if (val.length >= 8) score++;
    if (/[A-Z]/.test(val)) score++;
    if (/[0-9]/.test(val)) score++;
    if (/[^A-Za-z0-9]/.test(val)) score++;
    const colors = ['', '#e74c3c', '#e67e22', '#f1c40f', '#2ecc71'];
    const widths = ['0%', '25%', '50%', '75%', '100%'];
    bar.style.width = widths[score];
    bar.style.background = colors[score];
}
</script>
@endsection
