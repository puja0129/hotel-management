<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('img/logo.png') }}" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <style>
            :root {
                --forest:   #1a4d2e;
                --forest2:  #143d24;
                --mint:     #4f6f52;
                --sage:     #739b78;
                --cream:    #f0f7f2;
                --gold:     #c9a84c;
            }

            *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

            body, html {
                height: 100%;
                font-family: 'Outfit', sans-serif;
                overflow-x: hidden;
                background: var(--forest2);
            }

            /* ── Animated Background ── */
            .auth-bg {
                min-height: 100vh;
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 40px 20px;
                background: linear-gradient(135deg, #0d2b1a 0%, #1a4d2e 40%, #143d24 70%, #0a2015 100%);
                overflow: hidden;
            }

            /* Decorative blobs */
            .blob {
                position: absolute;
                border-radius: 50%;
                filter: blur(80px);
                opacity: 0.25;
                animation: floatBlob 10s ease-in-out infinite alternate;
            }
            .blob-1 {
                width: 500px; height: 500px;
                background: radial-gradient(circle, #2d7a4f, #1a4d2e);
                top: -150px; left: -150px;
                animation-duration: 12s;
            }
            .blob-2 {
                width: 400px; height: 400px;
                background: radial-gradient(circle, #c9a84c55, #4f6f52);
                bottom: -100px; right: -100px;
                animation-duration: 9s;
                animation-delay: -4s;
            }
            .blob-3 {
                width: 300px; height: 300px;
                background: radial-gradient(circle, #739b78, #1a4d2e);
                top: 50%; right: 15%;
                animation-duration: 15s;
                animation-delay: -7s;
            }
            @keyframes floatBlob {
                from { transform: translate(0, 0) scale(1); }
                to   { transform: translate(40px, 30px) scale(1.08); }
            }

            /* Grid pattern overlay */
            .auth-bg::before {
                content: '';
                position: absolute;
                inset: 0;
                background-image:
                    linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
                background-size: 50px 50px;
                pointer-events: none;
            }

            /* Floating leaf decorations */
            .leaf-deco {
                position: absolute;
                opacity: 0.07;
                font-size: 120px;
                color: #fff;
                animation: leafFloat 8s ease-in-out infinite alternate;
            }
            .leaf-1 { top: 8%; left: 5%; animation-delay: 0s; }
            .leaf-2 { bottom: 10%; right: 6%; animation-delay: -3s; font-size: 90px; }
            @keyframes leafFloat {
                from { transform: rotate(-10deg) translateY(0); }
                to   { transform: rotate(10deg) translateY(-20px); }
            }

            /* ── Card ── */
            .auth-card {
                position: relative;
                z-index: 10;
                width: 100%;
                max-width: 480px;
                background: rgba(255, 255, 255, 0.97);
                border-radius: 28px;
                padding: 52px 48px 44px;
                box-shadow:
                    0 40px 80px rgba(0,0,0,0.35),
                    0 0 0 1px rgba(255,255,255,0.15),
                    inset 0 1px 0 rgba(255,255,255,0.8);
                backdrop-filter: blur(20px);
                animation: cardIn 0.7s cubic-bezier(0.22, 1, 0.36, 1) both;
            }
            @keyframes cardIn {
                from { opacity: 0; transform: translateY(30px) scale(0.97); }
                to   { opacity: 1; transform: translateY(0) scale(1); }
            }

            /* Card top accent bar */
            .auth-card::before {
                content: '';
                position: absolute;
                top: 0; left: 48px; right: 48px;
                height: 3px;
                background: linear-gradient(90deg, var(--forest), var(--gold), var(--forest));
                border-radius: 0 0 4px 4px;
            }

            /* ── Branding inside card ── */
            .card-brand {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 28px;
            }
            .card-brand-icon {
                width: 40px; height: 40px;
                background: linear-gradient(135deg, var(--forest), var(--mint));
                border-radius: 10px;
                display: flex; align-items: center; justify-content: center;
                color: #fff;
                font-size: 1rem;
                flex-shrink: 0;
                box-shadow: 0 4px 12px rgba(26,77,46,0.35);
            }
            .card-brand-text {
                font-size: 0.72rem;
                font-weight: 700;
                letter-spacing: 2px;
                text-transform: uppercase;
                color: var(--forest);
                line-height: 1.2;
            }
            .card-brand-sub {
                font-size: 0.65rem;
                color: var(--sage);
                font-weight: 400;
                letter-spacing: 1px;
            }

            /* Bottom hotel watermark badge */
            .hotel-badge {
                position: absolute;
                bottom: -18px;
                left: 50%;
                transform: translateX(-50%);
                background: linear-gradient(135deg, var(--forest), var(--mint));
                color: rgba(255,255,255,0.7);
                font-size: 0.65rem;
                letter-spacing: 2px;
                text-transform: uppercase;
                padding: 5px 20px;
                border-radius: 20px;
                white-space: nowrap;
                font-weight: 600;
                box-shadow: 0 4px 14px rgba(0,0,0,0.25);
            }

            /* ── Form Elements (shared) ── */
            .form-group-custom { margin-bottom: 18px; }
            .form-label {
                font-size: 0.72rem;
                text-transform: uppercase;
                letter-spacing: 1.2px;
                color: var(--mint);
                margin-bottom: 7px;
                display: block;
                font-weight: 600;
            }
            .form-control {
                background: #f6faf7 !important;
                border: 1.5px solid #cde8d4;
                border-radius: 12px;
                color: #222 !important;
                padding: 13px 16px;
                font-size: 0.93rem;
                width: 100%;
                font-family: 'Outfit', sans-serif;
                box-shadow: none !important;
                transition: all 0.3s ease;
            }
            .form-control:focus {
                border-color: var(--forest);
                box-shadow: 0 0 0 3px rgba(26,77,46,0.1) !important;
                outline: none;
                background: #fff !important;
            }
            .form-control::placeholder { color: #b0ccb6; }
            input:-webkit-autofill {
                -webkit-box-shadow: 0 0 0px 1000px #f6faf7 inset !important;
                -webkit-text-fill-color: #222 !important;
            }

            .btn-primary-auth {
                background: linear-gradient(135deg, var(--forest), #2d7a4f);
                border-radius: 14px;
                padding: 15px;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 2px;
                border: none;
                color: #fff;
                width: 100%;
                margin-top: 10px;
                font-size: 0.85rem;
                cursor: pointer;
                box-shadow: 0 8px 28px rgba(26,77,46,0.35);
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }
            .btn-primary-auth::after {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(135deg, rgba(255,255,255,0.1), transparent);
                border-radius: inherit;
            }
            .btn-primary-auth:hover {
                transform: translateY(-2px);
                box-shadow: 0 14px 38px rgba(26,77,46,0.45);
                filter: brightness(1.06);
            }
            .btn-primary-auth:active { transform: translateY(0); }

            .auth-footer-link {
                margin-top: 24px;
                font-size: 0.87rem;
                color: #999;
                text-align: center;
            }
            .auth-footer-link a {
                color: var(--forest);
                font-weight: 700;
                text-decoration: none;
                margin-left: 4px;
            }
            .auth-footer-link a:hover { text-decoration: underline; }

            .forgot-link {
                font-size: 0.8rem;
                color: var(--sage);
                text-decoration: none;
                font-weight: 500;
                transition: color 0.2s;
            }
            .forgot-link:hover { color: var(--forest); text-decoration: underline; }

            .password-strength {
                height: 3px;
                border-radius: 4px;
                background: #e5e5e5;
                margin-top: 8px;
                overflow: hidden;
            }
            .password-strength-bar {
                height: 100%;
                border-radius: 4px;
                width: 0%;
                transition: width 0.3s, background 0.3s;
            }

            @media (max-width: 540px) {
                .auth-card { padding: 40px 24px 36px; }
                .auth-card::before { left: 24px; right: 24px; }
            }
        </style>
    </head>
    <body>
        <div class="auth-bg">
            <!-- Animated blobs -->
            <div class="blob blob-1"></div>
            <div class="blob blob-2"></div>
            <div class="blob blob-3"></div>

            <!-- Leaf decorations -->
            <div class="leaf-deco leaf-1"><i class="fas fa-leaf"></i></div>
            <div class="leaf-deco leaf-2"><i class="fas fa-seedling"></i></div>

            <!-- Auth Card -->
            <div class="auth-card">
                <!-- Brand -->
                <div class="card-brand">
                    <div class="card-brand-icon"><i class="fas fa-leaf"></i></div>
                    <div>
                        <div class="card-brand-text">Grand Oasis Hotel</div>
                        <div class="card-brand-sub">Experience Nature's Luxury</div>
                    </div>
                </div>

                @yield('content')

                <div class="hotel-badge">✦ Grand Oasis Hotel ✦</div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="{{ asset('js/validation.js') }}"></script>
    </body>
</html>
