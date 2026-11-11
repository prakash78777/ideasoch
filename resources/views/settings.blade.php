<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - IdeaSoch</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            color: #12315b;
            background: #f3f7fc;
        }

        a {
            text-decoration: none;
        }

        .navbar {
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: 16px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .logo {
            font-size: 27px;
            font-weight: 800;
            color: #0b1d36;
        }

        .logo span {
            color: #3867ed;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: #10284a;
            font-size: 13px;
            font-weight: 600;
        }

        .logout-form {
            display: inline;
            margin: 0;
        }

        .logout-btn {
            padding: 10px 18px;
            background: #fff;
            border: 1px solid #3867ed;
            color: #3867ed;
            border-radius: 8px;
            cursor: pointer;
        }

        .hero {
            padding: 42px 7%;
            color: white;
            background: linear-gradient(110deg, #284d91, #3867ed);
        }

        .hero h1 {
            font-size: 42px;
            margin: 18px 0;
        }

        .hero p {
            margin: 0;
            line-height: 1.8;
        }

        .main {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px 50px;
        }

        .settings-grid {
            display: grid;
            grid-template-columns: 260px 1fr;
            gap: 24px;
            align-items: start;
        }

        .settings-menu,
        .settings-card {
            background: #fff;
            border: 1px solid #dbe5f1;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 4px 14px rgba(20, 50, 90, .04);
        }

        .settings-menu h3 {
            margin-top: 0;
        }

        .menu-link {
            display: block;
            padding: 13px;
            margin-top: 7px;
            color: #12315b;
            border-radius: 8px;
            font-size: 14px;
        }

        .menu-link.active,
        .menu-link:hover {
            background: #edf4ff;
            color: #3867ed;
        }

        .settings-card h2 {
            margin-top: 0;
            font-size: 23px;
        }

        .muted {
            color: #64748b;
            line-height: 1.7;
            font-size: 14px;
        }

        .section-divider {
            border: 0;
            border-top: 1px solid #e2e8f0;
            margin: 25px 0;
        }

        .field {
            margin-top: 20px;
        }

        .field label {
            display: block;
            margin-bottom: 9px;
            font-weight: 600;
            font-size: 14px;
        }

        .field input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font: inherit;
            outline: none;
        }

        .field input:focus {
            border-color: #3867ed;
            box-shadow: 0 0 0 3px rgba(56, 103, 237, .12);
        }

        .btn {
            display: inline-block;
            padding: 13px 20px;
            border: 0;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-primary {
            background: #3867ed;
            color: #fff;
        }

        .btn-secondary {
            background: #fff;
            color: #12315b;
            border: 1px solid #cbd5e1;
        }

        .alert {
            padding: 13px 15px;
            border-radius: 8px;
            margin: 18px 0;
            font-size: 14px;
            line-height: 1.7;
        }

        .success {
            background: #dcfce7;
            color: #166534;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
        }

        .account-info {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 9px;
            padding: 15px;
            margin-top: 15px;
            font-size: 14px;
            overflow-wrap: anywhere;
        }

        .footer {
            background: #091c36;
            color: #d5deeb;
            padding: 35px 7%;
            text-align: center;
            font-size: 13px;
        }

        @media (max-width: 700px) {
            .navbar {
                padding: 16px 5%;
            }

            .nav-links {
                gap: 13px;
            }

            .hero {
                padding: 32px 5%;
            }

            .hero h1 {
                font-size: 32px;
            }

            .settings-grid {
                grid-template-columns: 1fr;
            }

            .settings-menu,
            .settings-card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<header class="navbar">
    <a href="{{ route('home') }}" class="logo">
        💡 Idea<span>Soch</span>
    </a>

    <nav class="nav-links">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('find.business') }}">Find Business</a>
        <a href="{{ route('businesses') }}">Business Ideas</a>
        <a href="{{ route('categories') }}">Categories</a>
        <a href="{{ route('ai.chat') }}">AI Chat</a>
        <a href="{{ route('compare') }}">Compare</a>
        <a href="{{ route('calculator') }}">Calculator</a>
        <a href="{{ route('my.ideas') }}">My Ideas</a>
        <a href="{{ route('dashboard') }}">Dashboard</a>

        @auth
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
        @endauth
    </nav>
</header>

<section class="hero">
    <small>⚙️ IdeaSoch User Account</small>
    <h1>Settings</h1>
    <p>अपनी account settings और security manage करें।</p>
</section>

<main class="main">

    <div class="settings-grid">

        <aside class="settings-menu">
            <h3>Account Settings</h3>

            <a href="{{ route('dashboard') }}" class="menu-link">
                🏠 Dashboard
            </a>

            <a href="{{ route('profile') }}" class="menu-link">
                👤 My Profile
            </a>

            <a href="{{ route('settings') }}" class="menu-link active">
                ⚙️ Settings
            </a>

            <a href="{{ route('my.ideas') }}" class="menu-link">
                🔖 My Saved Ideas
            </a>
        </aside>

        <section class="settings-card">

            <h2>Account Information</h2>
            <p class="muted">
                आपके अकाउंट की जानकारी।
            </p>

            @if(session('success'))
                <div class="alert success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert error">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert error">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="account-info">
                <strong>Full Name</strong><br>
                {{ $user->name }}
            </div>

            <div class="account-info">
                <strong>Email Address</strong><br>
                {{ $user->email }}
            </div>

            <hr class="section-divider">

            <h2>Change Password</h2>

            <p class="muted">
                अपने अकाउंट की सुरक्षा के लिए नया password सेट करें।
            </p>

            <form action="{{ route('settings.password') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="field">
                    <label for="current_password">Current Password</label>
                    <input
                        id="current_password"
                        name="current_password"
                        type="password"
                        autocomplete="current-password"
                        required
                    >
                </div>

                <div class="field">
                    <label for="password">New Password</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="new-password"
                        minlength="8"
                        required
                    >
                </div>

                <div class="field">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        autocomplete="new-password"
                        minlength="8"
                        required
                    >
                </div>

                <div style="margin-top:25px;">
                    <button type="submit" class="btn btn-primary">
                        Update Password
                    </button>

                    <a href="{{ route('dashboard') }}"
                       class="btn btn-secondary"
                       style="margin-left:8px;">
                        Back to Dashboard
                    </a>
                </div>
            </form>

        </section>

    </div>

</main>

<footer class="footer">
    <strong>IdeaSoch</strong>
    <p>Your practical platform for discovering business ideas and planning your business.</p>
    <p>© {{ date('Y') }} IdeaSoch.com — All Rights Reserved.</p>
</footer>

</body>
</html>