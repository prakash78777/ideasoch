<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - IdeaSoch</title>

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
            gap: 22px;
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

        .hero small {
            font-size: 14px;
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
            max-width: 900px;
            margin: 45px auto;
            padding: 0 20px 50px;
        }

        .profile-card {
            background: #fff;
            border: 1px solid #dbe5f1;
            border-radius: 14px;
            padding: 32px;
            box-shadow: 0 4px 14px rgba(20, 50, 90, .04);
        }

        .profile-heading {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .muted {
            color: #64748b;
            line-height: 1.7;
        }

        .avatar {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            background: #edf4ff;
            color: #3867ed;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .alert {
            padding: 13px 15px;
            border-radius: 8px;
            margin: 20px 0;
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

        .field {
            margin-top: 22px;
        }

        .field label {
            display: block;
            margin-bottom: 9px;
            font-weight: 600;
            font-size: 14px;
        }

        .field input {
            display: block;
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

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 28px;
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
                gap: 14px;
            }

            .hero {
                padding: 32px 5%;
            }

            .hero h1 {
                font-size: 32px;
            }

            .profile-card {
                padding: 22px;
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
    <small>👤 IdeaSoch User Account</small>
    <h1>My Profile</h1>
    <p>अपनी account details यहाँ manage करें।</p>
</section>

<main class="main">
    <section class="profile-card">

        <div class="avatar">
            {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
        </div>

        <h2 class="profile-heading">Profile Information</h2>
        <p class="muted">अपना नाम और email address अपडेट करें।</p>

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

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="field">
                <label for="name">Full Name</label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name', $user->name) }}"
                    maxlength="100"
                    required
                >
            </div>

            <div class="field">
                <label for="email">Email Address</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email', $user->email) }}"
                    required
                >
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">
                    Update Profile
                </button>

                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    Back to Dashboard
                </a>
            </div>
        </form>

    </section>
</main>

<footer class="footer">
    <strong>IdeaSoch</strong>
    <p>Your practical platform for discovering business ideas and planning your business.</p>
    <p>© {{ date('Y') }} IdeaSoch.com — All Rights Reserved.</p>
</footer>

</body>
</html>
