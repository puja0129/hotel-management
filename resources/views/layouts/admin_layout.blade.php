<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }} — Grand Hotel</title>
    <!-- Favicon -->
    <link href="{{ asset('img/logo.png') }}" rel="icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        :root {
            --admin-primary: #1a7f4b;
            --admin-primary-hover: #136239;
            --admin-bg: #eff3ef;
            --admin-sidebar-bg: #ffffff;
            --admin-sidebar-text: #475569;
            --admin-sidebar-active: #e2e8f0;
            --admin-topbar-bg: #ffffff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--admin-bg);
            color: #334155;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .admin-sidebar {
            width: 260px;
            background-color: var(--admin-sidebar-bg);
            border-right: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1040;
            box-shadow: 2px 0 8px rgba(0,0,0,0.02);
        }

        .admin-sidebar-header {
            height: 70px;
            padding: 0 20px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .admin-sidebar-header h4 {
            margin: 0;
            font-weight: 800;
            color: var(--admin-primary);
            font-size: 1.4rem;
            letter-spacing: -0.5px;
        }

        .admin-sidebar-nav {
            padding: 20px 12px;
            overflow-y: auto;
            flex-grow: 1;
        }

        .admin-nav-item {
            margin-bottom: 6px;
        }

        .admin-nav-link {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            color: var(--admin-sidebar-text);
            text-decoration: none;
            border-radius: 10px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .admin-nav-link i {
            width: 24px;
            margin-right: 10px;
            font-size: 1.1rem;
            text-align: center;
            color: #94a3b8;
            transition: color 0.2s ease;
        }

        .admin-nav-link:hover {
            background-color: #f8fafc;
            color: var(--admin-primary);
        }

        .admin-nav-link:hover i {
            color: var(--admin-primary);
        }

        .admin-nav-link.active {
            background-color: var(--admin-primary);
            color: white;
            box-shadow: 0 4px 6px -1px rgba(26, 127, 75, 0.2);
        }

        .admin-nav-link.active i {
            color: rgba(255,255,255,0.9);
        }

        /* Main Content Styling */
        .admin-main {
            flex-grow: 1;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        /* Topbar Styling */
        .admin-topbar {
            background-color: var(--admin-topbar-bg);
            height: 70px;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .admin-content {
            padding: 30px;
            flex-grow: 1;
        }

        .user-dropdown-toggle {
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 6px 14px 6px 6px;
            border-radius: 50px;
            border: 1px solid #e2e8f0;
            background: #fff;
            transition: all 0.2s;
        }

        .user-dropdown-toggle:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
        }

        .user-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: var(--admin-primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
        }
        
        /* Modern Table Adjustments */
        .table {
            --bs-table-bg: transparent;
        }
        .table > :not(caption) > * > * {
            padding: 1rem;
            border-bottom-color: #f1f5f9;
        }
        .table th {
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e2e8f0 !important;
        }
        .btn-sm {
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            font-weight: 500;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <div class="admin-sidebar-header">
            <h4><i class="fa fa-hotel me-2"></i>Grand<span style="color:#1e293b;">Hotel</span></h4>
        </div>
        <div class="admin-sidebar-nav">
            <div class="admin-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa fa-tachometer-alt"></i> Dashboard
                </a>
            </div>
            
            <div class="small fw-bold text-uppercase mt-4 mb-2 px-3" style="color: #94a3b8; font-size: 0.7rem; letter-spacing: 1px;">Management</div>
            
            <div class="admin-nav-item">
                <a href="{{ route('admin.bookings.index') }}" class="admin-nav-link {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
                    <i class="fa fa-calendar-check"></i> Bookings
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="{{ route('admin.rooms.index') }}" class="admin-nav-link {{ request()->routeIs('admin.rooms.*') ? 'active' : '' }}">
                    <i class="fa fa-bed"></i> Rooms
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="{{ route('admin.services.index') }}" class="admin-nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <i class="fa fa-concierge-bell"></i> Services
                </a>
            </div>
            <div class="admin-nav-item">
                <a href="{{ route('admin.amenities.index') }}" class="admin-nav-link {{ request()->routeIs('admin.amenities.*') ? 'active' : '' }}">
                    <i class="fa fa-star"></i> Amenities
                </a>
            </div>

            <div class="small fw-bold text-uppercase mt-4 mb-2 px-3" style="color: #94a3b8; font-size: 0.7rem; letter-spacing: 1px;">Website</div>

           

            <div class="small fw-bold text-uppercase mt-4 mb-2 px-3" style="color: #94a3b8; font-size: 0.7rem; letter-spacing: 1px;">Links</div>

            <div class="admin-nav-item">
                <a href="{{ route('home') }}" class="admin-nav-link" target="_blank">
                    <i class="fa fa-external-link-alt"></i> View Website
                </a>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="admin-main">
        <!-- Topbar -->
        <header class="admin-topbar">
            <div>
                <h5 class="mb-0 fw-bold" style="color: #0f172a;">{{ $headerTitle ?? 'Admin Panel' }}</h5>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="dropdown">
                    <div class="user-dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-avatar">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span class="fw-semibold text-dark fs-6" style="font-size: 0.9rem !important;">{{ Auth::user()->name }}</span>
                        <i class="fa fa-angle-down text-muted"></i>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0" style="border-radius: 12px; margin-top: 10px; min-width: 220px;">
                        <li class="px-3 py-2 border-bottom mb-1">
                            <span class="d-block fw-bold text-dark">{{ Auth::user()->name }}</span>
                            <span class="d-block small text-muted">{{ Auth::user()->email }}</span>
                        </li>
                        <li><a class="dropdown-item py-2" href="{{ route('profile.edit') }}"><i class="fa fa-cog me-2 text-secondary"></i> Settings</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item py-2 text-danger"><i class="fa fa-sign-out-alt me-2"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Dynamic Page Content -->
        <div class="admin-content">
            @yield('admin_content')
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/validation.js') }}"></script>
    @stack('scripts')
</body>
</html>
