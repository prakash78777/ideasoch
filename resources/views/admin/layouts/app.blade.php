<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | IdeaSoch</title>
    <style>
        :root {
            --navy: #07345e;
            --navy-dark: #08294d;
            --blue: #0969f9;
            --bg: #f3f7fd;
            --text: #142a47;
            --muted: #71839c;
            --border: #e7edf5;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            color: var(--text);
            background: var(--bg);
        }

        a { text-decoration: none; }

        .admin-shell { min-height: 100vh; }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 100;
            width: 280px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            color: #fff;
            background: linear-gradient(180deg, #092e56, #063b68);
            transition: width .25s ease;
        }

        .brand {
            min-height: 74px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 25px;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }

        .brand-name {
            color: #fff;
            font-size: 27px;
            font-weight: 850;
            letter-spacing: -.8px;
        }

        .brand-name span { color: #00d69a; }

        .brand small {
            display: block;
            margin-top: 2px;
            color: #c2d2e6;
            font-size: 12px;
        }

        .sidebar-toggle {
            width: 38px;
            height: 38px;
            border: 0;
            border-radius: 12px;
            color: white;
            background: rgba(255,255,255,.08);
            cursor: pointer;
            font-size: 21px;
        }

        .nav-area { padding: 15px 17px; }

        .nav-heading {
            margin: 17px 10px 9px;
            color: #a9c2dc;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .7px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 13px;
            min-height: 44px;
            margin: 5px 0;
            padding: 11px 13px;
            border-radius: 11px;
            color: #e7f0fc;
            font-size: 14px;
            font-weight: 600;
            transition: .2s;
        }

        .nav-link:hover {
            color: white;
            background: rgba(255,255,255,.1);
        }

        .nav-link.active {
            color: white;
            background: linear-gradient(100deg, #0878ff, #1760e9);
            box-shadow: 0 7px 18px rgba(0,91,255,.25);
        }

        .nav-icon {
            width: 23px;
            text-align: center;
            font-size: 18px;
        }

        .nav-link.sub-link {
            min-height: 37px;
            margin-left: 20px;
            padding: 8px 10px;
            font-size: 13px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 15px 17px 18px;
            border-top: 1px solid rgba(255,255,255,.1);
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 12px;
            border-radius: 13px;
            background: rgba(0,0,0,.15);
            color: white;
            margin-bottom: 10px;
        }

        .avatar {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 50%;
            background: #0869f9;
            color: white;
            font-size: 18px;
            font-weight: 800;
        }

        .profile-name { font-size: 13px; font-weight: 750; }
        .profile-role { margin-top: 3px; color: #bfd1e5; font-size: 11px; }

        .logout-link {
            display: block;
            padding: 11px;
            text-align: center;
            border: 1px solid #ff4658;
            border-radius: 11px;
            color: #ff6370;
            font-size: 13px;
            font-weight: 750;
        }

        .logout-link:hover { background: rgba(255,70,88,.12); }

        .main-area {
            min-height: 100vh;
            margin-left: 280px;
            transition: margin-left .25s ease;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 50;
            min-height: 74px;
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 12px 30px;
            background: rgba(255,255,255,.96);
            border-bottom: 1px solid var(--border);
        }

        .mobile-menu {
            display: none;
            border: 0;
            background: #edf4ff;
            color: var(--navy);
            border-radius: 10px;
            width: 40px;
            height: 40px;
            font-size: 21px;
            cursor: pointer;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 12px;
            width: min(660px, 60%);
            height: 43px;
            padding: 0 16px;
            border: 1px solid #e3eaf4;
            border-radius: 25px;
            background: #f8faff;
            color: #304865;
        }

        .search-box span { font-size: 20px; }

        .search-box input {
            width: 100%;
            border: 0;
            outline: 0;
            background: transparent;
            color: var(--text);
            font-size: 13px;
        }

        .topbar-spacer { flex: 1; }

        .topbar-action {
            width: 41px;
            height: 41px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border: 0;
            border-radius: 50%;
            background: #f0f4fa;
            color: #183553;
            font-size: 19px;
            cursor: pointer;
        }

        .top-profile {
            display: flex;
            align-items: center;
            gap: 11px;
            white-space: nowrap;
        }

        .top-profile .avatar { width: 42px; height: 42px; }
        .top-profile strong { display: block; font-size: 13px; }
        .top-profile small { display: block; margin-top: 3px; color: var(--muted); font-size: 11px; }

        .page-content { padding: 24px 30px 35px; }

        .alert {
            margin-bottom: 18px;
            padding: 13px 16px;
            border-radius: 10px;
            background: #dcfce9;
            color: #087c48;
            font-size: 13px;
        }

        .alert-error {
            background: #fff0f0;
            color: #b42332;
        }

        body.sidebar-collapsed .sidebar { width: 88px; }
        body.sidebar-collapsed .main-area { margin-left: 88px; }
        body.sidebar-collapsed .brand { justify-content: center; padding: 12px; }
        body.sidebar-collapsed .brand-text,
        body.sidebar-collapsed .nav-heading,
        body.sidebar-collapsed .nav-label,
        body.sidebar-collapsed .profile-details,
        body.sidebar-collapsed .logout-text { display: none; }
        body.sidebar-collapsed .nav-link { justify-content: center; padding: 12px 5px; }
        body.sidebar-collapsed .nav-icon { width: auto; }
        body.sidebar-collapsed .admin-profile { justify-content: center; padding: 7px; }
        body.sidebar-collapsed .logout-link { font-size: 0; }
        body.sidebar-collapsed .logout-link::before { content: "⇥"; font-size: 20px; }

        @media (max-width: 1000px) {
            .sidebar { width: 245px; }
            .main-area { margin-left: 245px; }
            .topbar { padding: 12px 18px; gap: 12px; }
            .page-content { padding: 20px 18px; }
            .search-box { width: 45%; }
        }

        @media (max-width: 700px) {
            .sidebar { width: 280px; transform: translateX(-100%); }
            body.mobile-sidebar-open .sidebar { transform: translateX(0); }
            .main-area, body.sidebar-collapsed .main-area { margin-left: 0; }
            body.sidebar-collapsed .sidebar { width: 280px; }
            body.sidebar-collapsed .brand-text,
            body.sidebar-collapsed .nav-heading,
            body.sidebar-collapsed .nav-label,
            body.sidebar-collapsed .profile-details,
            body.sidebar-collapsed .logout-text { display: initial; }
            body.sidebar-collapsed .nav-link { justify-content: flex-start; padding: 11px 13px; }
            body.sidebar-collapsed .nav-icon { width: 23px; }
            .mobile-menu { display: block; flex-shrink: 0; }
            .search-box { width: 100%; }
            .topbar-action { display: none; }
            .top-profile .profile-details { display: none; }
            .top-profile .avatar { width: 37px; height: 37px; }
            .topbar { gap: 10px; padding: 10px 12px; }
            .page-content { padding: 16px 12px; }
        }
    </style>
    @stack('styles')
</head>
<body>
<div class="admin-shell">
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-text">
                <div class="brand-name">Idea<span>Soch</span></div>
                <small>Admin Panel</small>
            </div>
            <button type="button" class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle sidebar">☰</button>
        </div>

        <nav class="nav-area">
            <div class="nav-heading">MAIN</div>
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <span class="nav-icon">⌂</span><span class="nav-label">Dashboard</span>
            </a>

            <div class="nav-heading">BUSINESS</div>
            <a class="nav-link {{ request()->routeIs('admin.businesses*') ? 'active' : '' }}" href="{{ route('admin.businesses') }}">
                <span class="nav-icon">💡</span><span class="nav-label">Business Ideas</span>
            </a>
            <a class="nav-link sub-link" href="{{ route('admin.businesses.create') }}">
                <span class="nav-icon">＋</span><span class="nav-label">Add Idea</span>
            </a>
            <a class="nav-link sub-link" href="{{ route('admin.businesses') }}">
                <span class="nav-icon">▤</span><span class="nav-label">All Ideas</span>
            </a>
            <a class="nav-link {{ request()->routeIs('admin.categories') ? 'active' : '' }}" href="{{ route('admin.categories') }}">
                <span class="nav-icon">📁</span><span class="nav-label">Categories</span>
            </a>
            <a class="nav-link {{ request()->routeIs('admin.locations') ? 'active' : '' }}" href="{{ route('admin.locations') }}">
                <span class="nav-icon">📍</span><span class="nav-label">Locations</span>
            </a>
            <a class="nav-link {{ request()->routeIs('admin.budgets') ? 'active' : '' }}" href="{{ route('admin.budgets') }}">
                <span class="nav-icon">💰</span><span class="nav-label">Budgets</span>
            </a>

            <div class="nav-heading">USERS</div>
            <a class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}" href="{{ route('admin.users') }}">
                <span class="nav-icon">👥</span><span class="nav-label">Users</span>
            </a>

            <div class="nav-heading">WEBSITE</div>
            @if(Route::has('admin.ai-questions'))
                <a class="nav-link" href="{{ route('admin.ai-questions') }}">
                    <span class="nav-icon">🤖</span><span class="nav-label">AI Questions</span>
                </a>
            @endif
            @if(Route::has('admin.saved-ideas'))
                <a class="nav-link" href="{{ route('admin.saved-ideas') }}">
                    <span class="nav-icon">💗</span><span class="nav-label">Saved Ideas</span>
                </a>
            @endif
            @if(Route::has('admin.leads'))
                <a class="nav-link {{ request()->routeIs('admin.leads*') ? 'active' : '' }}" href="{{ route('admin.leads') }}">
                    <span class="nav-icon">📩</span><span class="nav-label">Contact / Leads</span>
                </a>
            @endif


            

@if(Route::has('admin.reviews.index'))
    <a class="nav-link {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}"
       href="{{ route('admin.reviews.index') }}">
        <span class="nav-icon">⭐</span>
        <span class="nav-label">Reviews</span>
    </a>
@endif



            @if(Route::has('admin.settings'))
                <a class="nav-link" href="{{ route('admin.settings') }}">
                    <span class="nav-icon">⚙️</span><span class="nav-label">Settings</span>
                </a>
            @endif
        </nav>

        <div class="sidebar-bottom">
            <div class="admin-profile">
                <div class="avatar">{{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}</div>
                <div class="profile-details">
                    <div class="profile-name">{{ auth()->user()->name ?? 'Administrator' }}</div>
                    <div class="profile-role">Administrator</div>
                </div>
            </div>

  <form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
        </div>
    </aside>

    <main class="main-area">
        <header class="topbar">
            <button type="button" class="mobile-menu" id="mobileMenu" aria-label="Open menu">☰</button>
            <label class="search-box">
                <span>⌕</span>
                <input type="search" id="adminSearch" placeholder="Search ideas, users, categories...">
            </label>
            <div class="topbar-spacer"></div>
            <button class="topbar-action" type="button" id="themeToggle" title="Toggle appearance">☼</button>
            <button class="topbar-action" type="button" title="Notifications">♟</button>
            <div class="top-profile">
                <div class="avatar">{{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}</div>
                <div class="profile-details">
                    <strong>{{ auth()->user()->name ?? 'Administrator' }}</strong>
                    <small>Administrator</small>
                </div>
                <span>⌄</span>
            </div>
        </header>

        <div class="page-content">
            @if(session('success'))
                <div class="alert">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <strong>Please check the following:</strong>
                    <ul style="margin-bottom:0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </main>
</div>

<script>
    document.getElementById('sidebarToggle')?.addEventListener('click', function () {
        document.body.classList.toggle('sidebar-collapsed');
    });

    document.getElementById('mobileMenu')?.addEventListener('click', function () {
        document.body.classList.toggle('mobile-sidebar-open');
    });

    document.getElementById('themeToggle')?.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');
        document.body.style.background = document.body.classList.contains('dark-mode') ? '#152238' : '#f3f7fd';
    });

    document.getElementById('adminSearch')?.addEventListener('keydown', function (event) {
        if (event.key === 'Enter' && this.value.trim()) {
            const query = encodeURIComponent(this.value.trim());
            window.location.href = @json(route('admin.businesses')) + '?search=' + query;
        }
    });
</script>
@stack('scripts')
</body>
</html>