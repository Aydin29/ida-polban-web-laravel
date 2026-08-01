<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin IDA POLBAN</title>

    <link rel="icon" type="image/png" href="{{ asset('LOGOIDAHD.png') }}">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CDN (preflight disabled) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            corePlugins: { preflight: false }
        };
    </script>

    <style>
        /* ============================================================
               RESET & BASE
            ============================================================ */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f8fafc;
            color: #1f2937;
            min-height: 100vh;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #a7f3d0;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #34d399;
        }

        /* ============================================================
               APP LAYOUT
            ============================================================ */
        .app {
            display: flex;
            min-height: 100vh;
        }

        /* ============================================================
               SIDEBAR
            ============================================================ */
        .sidebar {
            width: 244px;
            min-width: 244px;
            background: linear-gradient(180deg, #0f766e 0%, #047857 100%);
            color: #fff;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 100;
            box-shadow: 4px 0 24px rgba(15, 118, 110, 0.12);
            transition: all 0.3s ease;
        }

        /* -- Hamburger toggle button for mobile -- */
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 12px;
            left: 12px;
            z-index: 110;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #059669;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 18px;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        }
        .sidebar-toggle:hover {
            background: #047857;
            transform: scale(1.05);
        }

        /* -- Sidebar overlay for mobile -- */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.5);
            z-index: 99;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .sidebar-overlay.active {
            opacity: 1;
        }

        /* -- Brand / Logo -- */
        .sidebar-brand {
            padding: 24px 20px 18px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            text-align: center;
        }

        .sidebar-brand .brand-icon {
            width: 86px;
            height: 86px;
            background: transparent;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
            overflow: hidden;
        }

        .sidebar-brand:hover .brand-icon {
            transform: scale(1.02);
        }

        .sidebar-brand h2 {
            font-size: 18px;
            font-weight: 700;
            margin: 0;
            letter-spacing: 0.5px;
        }

        .sidebar-brand p {
            font-size: 11px;
            opacity: 0.6;
            margin: 4px 0 0;
            font-weight: 300;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* -- Navigation -- */
        .sidebar-nav {
            flex: 1;
            padding: 16px 14px;
            overflow-y: auto;
        }

        .nav-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            opacity: 0.4;
            padding: 16px 12px 8px;
            font-weight: 600;
            display: block;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 16px;
            margin: 3px 0;
            border-radius: 12px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
            font-weight: 500;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            cursor: pointer;
        }

        .nav-item i {
            width: 22px;
            text-align: center;
            font-size: 16px;
            transition: all 0.25s ease;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            transform: translateX(4px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .nav-item:hover i {
            transform: scale(1.15);
        }

        .nav-item.active {
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .nav-item.active::before {
            content: '';
            position: absolute;
            left: -14px;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 24px;
            background: #6ee7b7;
            border-radius: 0 4px 4px 0;
            box-shadow: 0 0 12px rgba(110, 231, 183, 0.5);
        }

        /* -- Sidebar Footer -- */
        .sidebar-footer {
            padding: 16px 14px 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .user-card {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.06);
            transition: all 0.3s ease;
        }

        .user-card:hover {
            background: rgba(255, 255, 255, 0.12);
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, #34d399, #10b981);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .user-card:hover .user-avatar {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .user-info {
            flex: 1;
            min-width: 0;
        }

        .user-name {
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-role {
            font-size: 11px;
            opacity: 0.5;
        }

        .logout-btn {
            color: rgba(255, 255, 255, 0.5);
            transition: all 0.25s ease;
            font-size: 18px;
            padding: 6px;
            background: none;
            border: none;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }

        .logout-btn:hover {
            color: #fca5a5;
            transform: scale(1.15);
        }

        /* ============================================================
               MAIN CONTENT
            ============================================================ */
        .main-content {
            flex: 1;
            margin-left: 244px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* -- Top Header -- */
        .top-header {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(10px);
            padding: 18px 28px;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.02);
            position: sticky;
            top: 0;
            z-index: 50;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .page-title {
            font-size: 22px;
            font-weight: 700;
            color: #065f46;
            margin: 0;
            letter-spacing: -0.3px;
        }

        .page-description {
            font-size: 13px;
            color: #6b7280;
            margin: 4px 0 0;
            font-weight: 400;
        }

        .top-header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .top-header-date {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 2px;
            font-size: 12px;
            color: #6b7280;
            background: #f3f4f6;
            padding: 6px 14px;
            border-radius: 8px;
            transition: all 0.2s ease;
            min-width: 160px;
        }

        .top-header-date:hover {
            background: #e5e7eb;
        }

        .top-header-time {
            font-size: 13px;
            font-weight: 700;
            color: #374151;
            line-height: 1.1;
        }

        .top-header-calendar {
            font-size: 12px;
            font-weight: 500;
            color: #6b7280;
            line-height: 1.1;
            white-space: nowrap;
        }

        /* -- Content Wrapper -- */
        .content-wrapper {
            flex: 1;
            padding: 24px 28px 32px;
            animation: fadeIn 0.4s ease;
        }

        /* ============================================================
               COMPONENT STYLES
            ============================================================ */

        /* -- Panel / Card -- */
        .panel {
            background: #fff;
            border-radius: 14px;
            padding: 22px 24px;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.06);
            border: 1px solid #e5e7eb;
            transition: all 0.2s ease;
        }

        .panel:hover {
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
        }

        /* -- Stats Grid -- */
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: #fff;
            border-radius: 14px;
            padding: 22px 18px;
            text-align: center;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.06);
            border: 1px solid #e5e7eb;
            transition: all 0.2s ease;
            cursor: default;
            position: relative;
        }

        .stat-card:hover {
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
        }

        .stat-card h2 {
            font-size: 34px;
            font-weight: 800;
            margin: 0;
            color: #059669;
        }

        .stat-card p {
            font-size: 13px;
            color: #6b7280;
            margin: 6px 0 0;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* -- Table -- */
        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .table thead th {
            text-align: left;
            padding: 14px 16px;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6b7280;
            border-bottom: 2px solid #e5e7eb;
            background: #f9fafb;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 14px 16px;
            border-bottom: 1px solid #f3f4f6;
            color: #374151;
            vertical-align: middle;
            transition: background 0.2s ease;
        }

        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover td {
            background: #f8fafc;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        /* -- Badge -- */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            background: #d1fae5;
            color: #065f46;
            transition: all 0.2s ease;
        }

        .badge:hover {
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.08);
        }

        /* -- Buttons -- */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #059669;
            color: #fff;
            padding: 10px 22px;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.08);
            line-height: 1.4;
        }

        .btn:hover {
            background: #047857;
            box-shadow: 0 6px 16px rgba(15, 23, 42, 0.12);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn i {
            transition: transform 0.25s ease;
        }

        .btn:hover i {
            transform: scale(1.15);
        }

        .btn-secondary {
            background: #fff;
            color: #374151;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            border: 1px solid #d1d5db;
        }

        .btn-secondary:hover {
            background: #f8fafc;
            border-color: #9ca3af;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            color: #111827;
        }

        .btn-secondary:hover i {
            transform: scale(1.15);
        }

        .btn-danger {
            background: #fff;
            color: #dc2626;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            border: 1px solid #fecaca;
        }

        .btn-danger:hover {
            background: #fef2f2;
            border-color: #fca5a5;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.15);
            transform: translateY(-1px);
        }

        /* -- Form Fields -- */
        .panel label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin: 18px 0 6px;
        }

        .panel label:first-child {
            margin-top: 0;
        }

        .panel input[type="text"],
        .panel input[type="email"],
        .panel input[type="number"],
        .panel input[type="date"],
        .panel input[type="search"],
        .panel input[type="password"],
        .panel input[type="file"],
        .panel select,
        .panel textarea {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid #d1d5db;
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: #1f2937;
            background: #fff;
            outline: none;
            transition: all 0.25s ease;
        }

        .panel input:focus,
        .panel select:focus,
        .panel textarea:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.12);
        }

        .panel input:hover,
        .panel select:hover,
        .panel textarea:hover {
            border-color: #9ca3af;
        }

        .panel textarea {
            min-height: 100px;
            resize: vertical;
        }

        /* -- Success Alert -- */
        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
            animation: slideDown 0.4s ease;
        }

        .alert-success i {
            font-size: 18px;
        }

        .alert-success:hover {
            box-shadow: 0 4px 16px rgba(5, 150, 105, 0.1);
        }

        /* -- Pagination -- */
        .pagination {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .pagination a,
        .pagination span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s ease;
            border: 1px solid #e5e7eb;
            color: #374151;
            background: #fff;
        }

        .pagination a:hover {
            background: #f0fdf4;
            border-color: #10b981;
            color: #059669;
            transform: translateY(-2px);
        }

        .pagination .active span,
        .pagination .active a {
            background: #059669;
            border-color: #059669;
            color: #fff;
        }

        /* ============================================================
               ANIMATIONS
            ============================================================ */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* ============================================================
               RESPONSIVE
            ============================================================ */
        @media (max-width: 1024px) {
            .sidebar {
                width: 244px;
                min-width: 244px;
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .sidebar-toggle {
                display: flex;
            }
            .sidebar-overlay {
                display: block;
                pointer-events: none;
            }
            .sidebar-overlay.active {
                pointer-events: auto;
            }
            .main-content {
                margin-left: 0;
            }
            .top-header {
                padding-left: 60px;
            }
            .stats {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }
            .page-title {
                font-size: 20px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 280px;
                min-width: 280px;
            }

            .top-header {
                padding: 14px 16px 14px 56px;
            }

            .content-wrapper {
                padding: 18px;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .panel {
                overflow-x: auto;
            }

            .table {
                min-width: 640px;
            }

            .stat-card {
                padding: 18px 14px;
            }

            .stat-card h2 {
                font-size: 28px;
            }
        }

        @media (max-width: 480px) {
            .sidebar {
                width: 100%;
                min-width: 100%;
            }

            .content-wrapper {
                padding: 14px;
            }

            .panel {
                padding: 18px 16px;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .stat-card {
                padding: 16px 12px;
            }

            .stat-card h2 {
                font-size: 24px;
            }

            .top-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
                padding-left: 56px;
            }

            .top-header-right {
                width: 100%;
            }

            .top-header-date {
                align-items: flex-start;
                min-width: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar Hamburger Toggle (Mobile) -->
<button class="sidebar-toggle" id="sidebarToggle" onclick="toggleSidebar()" aria-label="Toggle sidebar">
    <i class="fas fa-bars" id="sidebarToggleIcon"></i>
</button>

<!-- Sidebar Overlay (Mobile) -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<div class="app">

    <!-- ===== SIDEBAR ===== -->
    <aside class="sidebar" id="sidebar">

        <!-- Brand -->
        <div class="sidebar-brand">
            <div class="brand-icon">
                <img src="{{ asset('LOGOIDAHD.png') }}" alt="Logo IDA POLBAN" style="width:100%; height:100%; object-fit:contain; border-radius:12px;">
            </div>
            <h2>IDA POLBAN</h2>
            <p>Admin Panel</p>
        </div>

        <!-- Navigation -->
        <nav class="sidebar-nav">
            <span class="nav-label">Main Menu</span>

            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-pie"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.anggota.index') }}" class="nav-item {{ request()->routeIs('admin.anggota.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                <span>Anggota</span>
            </a>

            <a href="{{ route('admin.struktur.index') }}" class="nav-item {{ request()->routeIs('admin.struktur.*') ? 'active' : '' }}">
                <i class="fas fa-sitemap"></i>
                <span>Struktur (Optional)</span>
            </a>

            <a href="{{ route('admin.galeri.index') }}" class="nav-item {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                <i class="fas fa-images"></i>
                <span>Galeri</span>
            </a>

            <a href="{{ route('admin.pendaftaran.index') }}" class="nav-item {{ request()->routeIs('admin.pendaftaran.*') ? 'active' : '' }}">
                <i class="fas fa-clipboard-list"></i>
                <span>Pendaftaran</span>
            </a>

            <a href="{{ route('admin.rekap.index') }}" class="nav-item {{ request()->routeIs('admin.rekap.*') ? 'active' : '' }}">
                <i class="fas fa-file-pdf"></i>
                <span>Rekap Anggota</span>
            </a>

            <span class="nav-label">Settings</span>

            <a href="{{ route('admin.wa-group.index') }}" class="nav-item {{ request()->routeIs('admin.wa-group.*') ? 'active' : '' }}">
                <i class="fab fa-whatsapp"></i>
                <span>Link Grup WA</span>
            </a>
        </nav>

        <!-- Footer -->
        <div class="sidebar-footer">
            <div class="user-card">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-info">
                    <div class="user-name">{{ Auth::user()->name ?? 'Admin' }}</div>
                    <div class="user-role">Administrator</div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn" title="Logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>

    </aside>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="main-content">

        <!-- Top Header -->
        <header class="top-header">
            <div>
                <h1 class="page-title">@yield('page-title')</h1>
                <p class="page-description">@yield('page-description')</p>
            </div>
            <div class="top-header-right">
<span class="top-header-date">
                    <span class="top-header-time" id="adminHeaderTime">--:--:--</span>
                    <span class="top-header-calendar" id="adminHeaderDate">--</span>
                    <span class="text-[10px] text-gray-400 font-medium mt-0.5">WIB</span>
                </span>
            </div>
        </header>

        <!-- Content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

    </main>

</div>

<script>
    function updateAdminHeaderDateTime() {
        const now = new Date();
        const timeFormatter = new Intl.DateTimeFormat('id-ID', {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false,
            timeZone: 'Asia/Jakarta'
        });
        const dateFormatter = new Intl.DateTimeFormat('id-ID', {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric',
            timeZone: 'Asia/Jakarta'
        });

        const timeElement = document.getElementById('adminHeaderTime');
        const dateElement = document.getElementById('adminHeaderDate');

        if (timeElement) {
            timeElement.textContent = timeFormatter.format(now);
        }

        if (dateElement) {
            dateElement.textContent = dateFormatter.format(now);
        }
    }

    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const icon = document.getElementById('sidebarToggleIcon');
        
        sidebar.classList.toggle('open');
        overlay.classList.toggle('active');
        
        if (sidebar.classList.contains('open')) {
            icon.className = 'fas fa-times';
        } else {
            icon.className = 'fas fa-bars';
        }
    }

    // Close sidebar when clicking a nav item on mobile
    document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('click', function() {
            if (window.innerWidth <= 1024) {
                toggleSidebar();
            }
        });
    });

    updateAdminHeaderDateTime();
    setInterval(updateAdminHeaderDateTime, 1000);
</script>

@yield('scripts')

</body>
</html>
