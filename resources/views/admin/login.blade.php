
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - IdeaSoch</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #05294b, #0877e9);
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: #fff;
            padding: 38px;
            border-radius: 18px;
            box-shadow: 0 20px 55px rgba(0,0,0,.2);
        }

        .logo {
            text-align: center;
            font-size: 30px;
            font-weight: 800;
            color: #092d55;
        }

        .logo span {
            color: #00bd91;
        }

        h2 {
            margin: 25px 0 8px;
            text-align: center;
            color: #092d55;
        }

        .subtitle {
            text-align: center;
            color: #718096;
            font-size: 14px;
            margin-bottom: 30px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #334155;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            height: 46px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 0 13px;
            font-size: 14px;
            margin-bottom: 20px;
        }

        input:focus {
            outline: none;
            border-color: #0877e9;
        }

        button {
            width: 100%;
            height: 48px;
            background: #0877e9;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
        }

        button:hover {
            background: #0563c5;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 18px;
        }
    </style>
</head>

<body>

    <div class="login-card">

        <div class="logo">Idea<span>Soch</span></div>

        <h2>Admin Login</h2>
        <p class="subtitle">Sign in to access your admin dashboard</p>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <label>Email Address</label>
            <input type="email"
                   name="email"
                   value="{{ old('email') }}"
                   placeholder="Enter admin email"
                   autocomplete="username"
                   required>

            <label>Password</label>
            <input type="password"
                   name="password"
                   placeholder="Enter password"
                   autocomplete="current-password"
                   required>

            <button type="submit">Sign In</button>
        </form>

    </div>

</body>
</html>
