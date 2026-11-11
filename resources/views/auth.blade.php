<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Login / Register - IdeaSoch
    </title>


    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">


    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />


    <link rel="stylesheet" href="{{ asset('css/home.css') }}" />

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: 'Inter', sans-serif;
            background: #f5f8fc;
            color: #102b55;
        }


        .google-icon{
            height: 30px;
        }

 .navbar-light .navbar-nav .nav-link {
    color: #102b55;
}


        /* ================= NAVBAR ================= */

    .nav-item a {
    color: rgb(9, 45, 85);
    font-size: 14px;
    font-weight: 600;
}




 .footerb a:hover {
    color: #f3f4f5;
}

        /* ================= HERO ================= */

        .hero {
            background: linear-gradient(
                115deg,
                #254e91,
                #3b6fe5
            );

            color: white;
            padding: 54px 20px 58px;
        }



        .hero-inner {
            max-width: 1080px;
            margin: auto;
        }


        .hero-badge {
            font-size: 14px;
            margin-bottom: 25px;
        }


        .hero-badge i {
            margin-right: 7px;
        }


        .hero h1 {
             font-size: 30px;
            line-height: 1.1;
            font-weight: 800;
            margin-bottom: 20px;
        }


        .hero p {
            font-size: 16px;
            line-height: 1.7;
            max-width: 680px;
        }


        /* ================= MAIN ================= */

        .main {
            max-width: 600px;
            margin: 55px auto 80px;
            padding: 0 20px;
        }


        .auth-card {
            background: white;
            border: 1px solid #dce5f0;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(15, 44, 80, .06);
            overflow: hidden;
        }


        /* ================= TABS ================= */

        .tabs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-bottom: 1px solid #e2e8f0;
        }


        .tab {
            text-decoration: none;
            text-align: center;
            padding: 17px;
            color: #60718b;
            font-size: 15px;
            font-weight: 600;
            background: #fff;
        }


        .tab.active {
            color: #1769e8;
            border-bottom: 3px solid #1769e8;
        }


        /* ================= FORM ================= */

        .form-area {
            padding: 34px;
        }


        .form-title {
            text-align: center;
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 7px;
            color: #102b55;
        }


        .form-subtitle {
            text-align: center;
            color: #71829a;
            font-size: 14px;
            margin-bottom: 28px;
        }


        .form-group {
            margin-bottom: 18px;
        }


        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: 600;
            color: #19365e;
        }


        .input-wrap {
            position: relative;
        }


        .input-wrap i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #7d8da3;
        }


        .input-wrap input {
            width: 100%;
            height: 46px;
            border: 1px solid #d6e0ec;
            border-radius: 7px;
            padding: 0 14px 0 40px;
            outline: none;
            font-family: inherit;
            font-size: 14px;
        }


        .input-wrap input:focus {
            border-color: #3570e8;
            box-shadow: 0 0 0 3px rgba(53,112,232,.10);
        }


        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 18px;
            font-size: 13px;
            color: #65758c;
        }


        .submit-btn {
            width: 100%;
            height: 46px;
            border: none;
            border-radius: 7px;
            background: #1769e8;
            color: white;
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }


        .submit-btn:hover {
            background: #075bd6;
        }


        /* ================= ERROR ================= */

        .alert {
            padding: 12px 14px;
            border-radius: 7px;
            margin-bottom: 18px;
            font-size: 13px;
        }


        .alert-error {
            background: #fff0f0;
            border: 1px solid #ffd1d1;
            color: #c62828;
        }


        .alert-success {
            background: #edfff5;
            border: 1px solid #c7f0d9;
            color: #16804b;
        }


        .error-text {
            color: #d32f2f;
            font-size: 12px;
            margin-top: 5px;
        }


        /* ================= DIVIDER ================= */

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 25px 0 18px;
            color: #8b98aa;
            font-size: 12px;
        }


        .divider::before,
        .divider::after {
            content: "";
            height: 1px;
            flex: 1;
            background: #e1e7ef;
        }


        /* ================= SOCIAL ================= */

        .social-buttons {
            display: grid;
            /* grid-template-columns: 1fr 1fr; */
            gap: 12px;
        }


        .social-btn {

            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;

            /* color: #19365e; */
            font-weight: 600;
            font-size: 13px;
           
        }


        .google {
            color: #4285f4;
        }


        .facebook {
            color: #1877f2;
        }


        /* ================= INFO ================= */

        .info-box {
            margin-top: 28px;
            background: linear-gradient(
                100deg,
                #e8fff7,
                #eefaff
            );

            border: 1px solid #cceee2;
            border-radius: 9px;
            padding: 20px;
            text-align: center;
        }


        .info-box h3 {
            font-size: 15px;
            margin-bottom: 7px;
        }


        .info-box p {
            font-size: 13px;
            color: #5f748f;
            line-height: 1.6;
        }


        /* ================= FOOTER ================= */

        .footer {
            background: #071b36;
            color: white;
            padding: 55px 20px 20px;
        }


        .footer-inner {
            max-width: 1080px;
            margin: auto;
        }


        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 50px;
            padding-bottom: 45px;
        }


        .footer h3 {
            font-size: 19px;
            margin-bottom: 15px;
        }


        .footer h3 span {
            color: #3976e9;
        }


        .footer h4 {
            font-size: 14px;
            margin-bottom: 15px;
        }


        .footer p,
        .footer a {
            display: block;
            color: #b9c6d9;
            text-decoration: none;
            font-size: 13px;
            line-height: 2;
        }


        .copyright {
            border-top: 1px solid rgba(255,255,255,.12);
            padding-top: 20px;
            text-align: center;
            color: #8092aa;
            font-size: 12px;
        }


        /* ================= MOBILE ================= */

        @media(max-width: 800px) {

            .nav-links {
                gap: 10px;
            }

            .nav-links a:not(.login-btn):not(.signup-btn) {
                display: none;
            }

            .hero h1 {
                font-size: 38px;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }


        @media(max-width: 550px) {

            .navbar-inner {
                padding: 0 14px;
            }

            .logo {
                font-size: 21px;
            }

            .login-btn,
            .signup-btn {
                padding: 8px 12px;
            }

            .hero {
                padding: 40px 18px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .main {
                margin-top: 30px;
            }

            .form-area {
                padding: 22px;
            }

            .social-buttons {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }
        }

    </style>

</head>


<body>


<!-- ================= NAVBAR ================= -->

    <nav class="navbar navbar-expand-lg navbar-light  sticky-top shadow-sm">
        <div class="container-fluid px-lg-5">

            {{-- Logo --}}
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <i class="fa-solid fa-lightbulb text-primary"></i>
                Idea<span class="successa">Soch</span>
            </a>

            {{-- Mobile Toggle Button --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#ideaSochNavbar"
                aria-controls="ideaSochNavbar" aria-expanded="false" aria-label="Toggle navigation">
                {{-- <span class="navbar-toggler-icon"></span> --}}
                <i class="bi bi-list"></i>
            </button>

            {{-- Navigation Links --}}
            <div class="collapse navbar-collapse" id="ideaSochNavbar">

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('find.business') }}">
                            Find Business
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('businesses') }}">
                            Business Ideas
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ai.chat') }}">AI Chat</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories') }}">
                            Categories
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('compare') }}">Compare</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('calculator') }}">Calculator</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('my.ideas') }}">My Ideas</a>
                    </li>

                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                Logout
                            </button>
                        </form>
                    </li>
                    @else
                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-outline-primary btn-sm px-3 my-1" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-primary btn-sm px-3 my-1" href="{{ route('register') }}">
                            Sign Up
                        </a>
                    </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>

<!-- ================= HERO ================= -->

<section class="hero">

    <div class="hero-inner">

        <div class="hero-badge">

            <i class="fa-solid fa-user"></i>

            IdeaSoch Account

        </div>


        <h1>
            Login / Register
        </h1>


        <p>
            अपने business ideas, saved ideas और personal activity
            को manage करने के लिए IdeaSoch account बनाएं।
        </p>

    </div>

</section>


<!-- ================= MAIN ================= -->

<main class="main">


    <div class="auth-card">


        <!-- TABS -->

        <div class="tabs">

            <a href="{{ route('login', ['tab' => 'login']) }}"
               class="tab {{ $tab === 'login' ? 'active' : '' }}">

                Login

            </a>


            <a href="{{ route('register', ['tab' => 'register']) }}"
               class="tab {{ $tab === 'register' ? 'active' : '' }}">

                Register

            </a>

        </div>


        <div class="form-area">


            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif


            @if(session('login_error'))

                <div class="alert alert-error">

                    {{ session('login_error') }}

                </div>

            @endif


            @if($errors->any())

                <div class="alert alert-error">

                    Please check the highlighted fields.

                </div>

            @endif


            @if($tab === 'register')


                <!-- ================= REGISTER ================= -->

                <h2 class="form-title">
                    Create Your Account
                </h2>

                <p class="form-subtitle">
                    IdeaSoch पर अपना free account बनाएं।
                </p>


           <form action="{{ route('register.submit') }}" method="POST">
    @csrf


                    <div class="form-group">

                        <label>
                            Full Name
                        </label>

                        <div class="input-wrap">

                            <i class="fa-solid fa-user"></i>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Your Name"
                                required
                            >

                        </div>


                        @error('name')

                            <div class="error-text">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="form-group">

                        <label>
                            Email
                        </label>

                        <div class="input-wrap">

                            <i class="fa-solid fa-envelope"></i>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="your@email.com"
                                required
                            >

                        </div>


                        @error('email')

                            <div class="error-text">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="form-group">

                        <label>
                            Password
                        </label>

                        <div class="input-wrap">

                            <i class="fa-solid fa-lock"></i>

                            <input
                                type="password"
                                name="password"
                                placeholder="Minimum 6 characters"
                                required
                            >

                        </div>


                        @error('password')

                            <div class="error-text">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="form-group">

                        <label>
                            Confirm Password
                        </label>

                        <div class="input-wrap">

                            <i class="fa-solid fa-lock"></i>

                            <input
                                type="password"
                                name="password_confirmation"
                                placeholder="Confirm your password"
                                required
                            >

                        </div>

                    </div>


                    <button type="submit"
                            class="submit-btn">

                        <i class="fa-solid fa-user-plus"></i>

                        Sign Up

                    </button>

                </form>


            @else


                <!-- ================= LOGIN ================= -->

                <h2 class="form-title">
                    Welcome Back
                </h2>

                <p class="form-subtitle">
                    अपने IdeaSoch account में login करें।
                </p>


                <form method="POST"
                      action="{{ route('login') }}">

                    @csrf


                    <div class="form-group">

                        <label>
                            Email
                        </label>

                        <div class="input-wrap">

                            <i class="fa-solid fa-envelope"></i>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="your@email.com"
                                required
                            >

                        </div>


                        @error('email')

                            <div class="error-text">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="form-group">

                        <label>
                            Password
                        </label>

                        <div class="input-wrap">

                            <i class="fa-solid fa-lock"></i>

                            <input
                                type="password"
                                name="password"
                                placeholder="Enter your password"
                                required
                            >

                        </div>


                        @error('password')

                            <div class="error-text">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <label class="remember">

                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                        >

                        Remember me

                    </label>


                    <button type="submit"
                            class="submit-btn">

                        <i class="fa-solid fa-right-to-bracket"></i>

                        Login

                    </button>

                </form>


            @endif


            <!-- SOCIAL -->

            <div class="divider">

                Or continue with

            </div>


            <div class="social-buttons">

                <div class="social-btn google">

                   <a href="{{ route('google.redirect') }}" class="social-btn">
    {{-- <i class="fa-brands fa-google"></i> --}}
     <img src="{{ asset('/storage/businesses/google.jpg') }}" alt="IdeaSoch" class="google-icon">
    Continue with Google
</a>

                </div>


                {{-- <div class="social-btn facebook">

                    <i class="fa-brands fa-facebook-f"></i>

                    Facebook

                </div> --}}

            </div>


        </div>

    </div>


    <!-- INFO -->

    <div class="info-box">

        <h3>

            <i class="fa-solid fa-lightbulb"></i>

            Smart Business Platform

        </h3>


        <p>

            User यहाँ से अपना account बना सकता है या login कर सकता है।
            Login के बाद saved ideas, compare list और dashboard manage कर सकता है।

        </p>

    </div>


</main>


<!-- ================= FOOTER ================= -->




    <footer>


        <div class="footer-container">


            <div class="container">
                <div class="row">

                    <div class="col-md-3 footerb">

                        <a href="{{ url('/') }}" class="logos">
                            <i class="fa-solid fa-lightbulb"></i>
                            Idea<span>Soch</span>
                        </a>


                        <div class="footer-column">


                            <h4 class="footer-title">Location</h4>
                            <a href="https://www.google.com/maps/place/REALTY+CHAMBER+(BHAWANA+ENTERPRISES)/@26.8474367,75.8129617,17z"
                                target="_blank">
                                REALTY CHAMBER (BHAWANA ENTERPRISES), Malviya Nagar, Jaipur
                            </a>
                        </div>



                    </div>




                    <div class="col-md-3 footerb">
                        <h5 class="sociala">Quick Links</h5>

                        <a href="{{ url('/') }}">Home</a>
                        <a href="{{ route('find.business') }}">Find Business</a>
                        <a href="{{ route('businesses') }}">Business Ideas</a>
                        <a href="{{ route('categories') }}">Categories</a>
                        <a href="{{ route('compare') }}">Compare</a>
                        <a href="{{ route('calculator') }}">Calculator</a>
                        <a href="{{ route('my.ideas') }}">My Ideas</a>
                    </div>

                    <div class="col-md-3 footerb">
                        <h5 class="sociala">Support</h5>

                        <a href="{{ url('/about') }}">About Us</a>
                        <a href="{{ route('ai.chat') }}">AI Chat</a>
                        <a href="{{ url('/reviews') }}">Reviews</a>
                        <a href="{{ url('/Contact') }}">Contact</a>
                        <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>
                        <a href="{{ url('/terms-and-conditions') }}">Terms &amp; Conditions</a>
                    </div>




                    <div class="col-md-3 footerb">
                        <h2 class="sociala">Follow us</h2>

                        <p class="footers">Mon – Sun 8:00 AM - 8:00 PM</p>
                        <a href="tel:+91-7599912345,">(+91) 98290 66382</a>
                        <a href="mailto:narwani1975@gmail.com">narwani1975@gmail.com</a>

                        <div class="social-icons">

                            <a href="#">
                                <i class="fab fa-linkedin-in fb-icon"></i></a>
                            <a href="#"> <i class="fab fa-instagram tr-icon"></i></a>
                            <a href="#"> <i class="fab fa-youtube yt-icon"></i></a>
                            <a href="#"> <i class="fab fa-facebook-f fb-icon"></i></a>

                        </div>


                    </div>


                </div>



    </footer>


    <div class="footer-bottom">
        © 2026 IdeaSoch.com — All Rights Reserved.
    </div>








    <div class="mobile-bottom">
        <div class="mobile-item">
            <a href="{{ route('businesses') }}">
                <img src="{{ asset('storage/businesses/business -Ideas.jpg') }}" alt="Business Ideas">
                <p>Business Ideas</p>
            </a>
        </div>

        <div class="mobile-item">
            <a href="{{ route('my.ideas') }}">
                <img src="{{ asset('storage/businesses/my-ideas.jpg') }}" alt="My Ideas">
                <p>My Ideas</p>
            </a>
        </div>

        <div class="mobile-item">
            <a href="{{ route('login') }}">
                <img src="{{ asset('storage/businesses/login.jpg') }}" alt="Login">
                <p>Login</p>
            </a>
        </div>
    </div>




    <div class="topHead leftHead d-flex gap-3 align-items-center">
        <a href="https://api.whatsapp.com/send?phone=919829066382&text=Hi-IdeaSoch." class="whatsappBtn" target="_blank"
            rel="noopener noreferrer" aria-label="Contact us on WhatsApp">

            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>


</body>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>