<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - IdeaSoch</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">



 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f8fc;
            color: #092d52;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* ================= NAVBAR ================= */
                
.navbar-light .navbar-nav .nav-link {
     color: #092d55;
}

        /* ================= HERO ================= */

        .hero {
            background: linear-gradient(
                120deg,
                #24498e,
                #3d6fe8
            );

            color: white;
            padding: 55px 0;
        }

        .hero-inner {
            width: 1180px;
            max-width: calc(100% - 40px);
            margin: auto;
        }

        .hero-small {
            font-size: 14px;
            margin-bottom: 20px;
            opacity: .95;
        }

        .hero h1 {
            font-size: 30px;
            margin-bottom: 0px;
            font-weight: 800;
        }

        .hero p {
            font-size: 17px;
            line-height: 1.7;
            max-width: 750px;
        }


        /* ================= MAIN ================= */

        .main {
            width: 1180px;
            max-width: calc(100% - 40px);
            margin: 55px auto 70px;
        }

        .dashboard-layout {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 25px;
        }


        /* ================= SIDEBAR ================= */

        .sidebar {
            background: white;
            border: 1px solid #dce6f1;
            border-radius: 12px;
            overflow: hidden;
            height: fit-content;
        }

        .profile-box {
            padding: 25px 18px;
            text-align: center;
            border-bottom: 1px solid #e5edf5;
        }

        .profile-icon {
            width: 62px;
            height: 62px;
            margin: auto auto 12px;

            border-radius: 50%;

            background: #eef5ff;
            color: #2563eb;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 28px;
        }

        .profile-box h3 {
            font-size: 15px;
            color: #092d52;
        }

        .profile-box p {
            margin-top: 5px;
            color: #7890aa;
            font-size: 12px;
        }

        .sidebar-menu {
            padding: 10px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 13px;

            padding: 13px 12px;
            margin-bottom: 3px;

            border-radius: 7px;

            font-size: 13px;
            font-weight: 600;

            color: #34506e;
        }

        .sidebar-menu a i {
            width: 18px;
            color: #2563eb;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: #edf4ff;
            color: #2563eb;
        }

        .sidebar-menu .logout {
            color: #555;
        }

        .sidebar-menu .logout i {
            color: #555;
        }


        /* ================= CONTENT ================= */

        .dashboard-content {
            min-width: 0;
        }

        .welcome {
            margin-bottom: 22px;
        }

        .welcome h2 {
            font-size: 28px;
            color: #092d52;
            margin-bottom: 7px;
        }

        .welcome p {
            color: #7b8fa7;
            font-size: 14px;
        }


        /* ================= STAT CARDS ================= */

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border: 1px solid #dce6f1;
            border-radius: 10px;
            padding: 22px;
        }

        .stat-icon {
            width: 38px;
            height: 38px;

            background: #edf4ff;
            color: #2563eb;

            border-radius: 7px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 13px;
        }

        .stat-card h4 {
            font-size: 12px;
            color: #71869f;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .stat-card .number {
            font-size: 25px;
            font-weight: 800;
            color: #092d52;
        }


        /* ================= ACTIVITY ================= */

        .activity-card {
            background: white;
            border: 1px solid #dce6f1;
            border-radius: 10px;
            padding: 25px;
        }

        .activity-card h3 {
            font-size: 18px;
            margin-bottom: 20px;
            color: #092d52;
        }

        .activity {
            display: flex;
            align-items: center;
            gap: 14px;

            padding: 15px 0;
            border-bottom: 1px solid #edf1f5;
        }

        .activity:last-child {
            border-bottom: 0;
        }

        .activity-icon {
            width: 38px;
            height: 38px;

            flex-shrink: 0;

            background: #eef5ff;
            color: #2563eb;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .activity-text {
            flex: 1;
        }

        .activity-text strong {
            display: block;
            color: #092d52;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .activity-text span {
            color: #8999aa;
            font-size: 11px;
        }


        /* ================= SMART BOX ================= */

        .smart-box {
            margin-top: 25px;

            background: linear-gradient(
                100deg,
                #e9fff8,
                #effbff
            );

            border: 1px solid #c9eee3;
            border-radius: 10px;

            padding: 20px;
            text-align: center;
        }

        .smart-box h3 {
            color: #092d52;
            font-size: 16px;
            margin-bottom: 7px;
        }

        .smart-box p {
            color: #66829a;
            font-size: 13px;
        }


        /* ================= FOOTER ================= */
 .footerb a:hover {
    color: #f5f6f7;
}
        /* ================= RESPONSIVE ================= */
    
        @media(max-width: 900px) {

            .nav-links {
                gap: 10px;
            }

            .nav-links a {
                font-size: 11px;
            }

            .dashboard-layout {
                grid-template-columns: 1fr;
            }

            .sidebar {
                width: 100%;
            }

            .sidebar-menu {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
            }

            .stats {
                grid-template-columns: repeat(3, 1fr);
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media(max-width: 600px) {

            .navbar {
                height: auto;
                padding: 15px 0;
            }

            .navbar-inner {
                flex-direction: column;
                gap: 15px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero h1 {
                font-size: 32px;
            }

            .hero p {
                font-size: 14px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .sidebar-menu {
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
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#ideaSochNavbar"
            aria-controls="ideaSochNavbar"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
            {{-- <i class="bi bi-list"></i> --}}
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
                        <a class="btn btn-outline-primary btn-sm px-3 my-1"
                           href="{{ route('login') }}">
                            Login
                        </a>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-primary btn-sm px-3 my-1"
                           href="{{ route('register') }}">
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

        <div class="hero-small">
            <i class="fa-solid fa-user"></i>
            IdeaSoch User Dashboard
        </div>

        <h1>
            User Dashboard
        </h1>

        <p>
            अपने saved business ideas, compare list और activity को
            एक ही जगह से manage करें।
        </p>

    </div>

</section>


<!-- ================= MAIN ================= -->

<main class="main">

    <div class="dashboard-layout">


        <!-- ================= SIDEBAR ================= -->

        <aside class="sidebar">

            <div class="profile-box">

                <div class="profile-icon">
                    <i class="fa-solid fa-user"></i>
                </div>

                <h3>{{ $user->name }}</h3>
<p>{{ $user->email }}</p>

            </div>


            <div class="sidebar-menu">

                <a href="{{ url('/dashboard') }}" class="active">
                    <i class="fa-solid fa-house"></i>
                    Dashboard
                </a>

                <a href="{{ url('/my-ideas') }}">
                    <i class="fa-regular fa-bookmark"></i>
                    My Saved Ideas
                </a>

                <a href="{{ url('/compare') }}">
                    <i class="fa-solid fa-scale-balanced"></i>
                    Compare Ideas
                </a>

<a href="{{ route('profile') }}">My Profile</a>

<a href="{{ route('settings') }}">Settings</a>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="logout" style="
        display: flex;
        align-items: center;
        gap: 13px;
        width: 100%;
        padding: 13px 12px;
        margin-bottom: 3px;
        border: 0;
        border-radius: 7px;
        background: transparent;
        font-size: 13px;
        font-weight: 600;
        color: #555;
        text-align: left;
        cursor: pointer;
    ">
        <i class="fa-solid fa-right-from-bracket"></i>
        Logout
    </button>
</form>


            </div>

        </aside>


        <!-- ================= DASHBOARD CONTENT ================= -->

        <section class="dashboard-content">


            <div class="welcome">

                <h2>
                   Hello, {{ $user->name }}!
                </h2>

                <p>
                    Here's your business journey
                </p>

            </div>


            <!-- ================= STATS ================= -->

            <div class="stats">


                <div class="stat-card">

                    <div class="stat-icon">
                        <i class="fa-regular fa-bookmark"></i>
                    </div>

                    <h4>
                        Saved Ideas
                    </h4>

                    <div class="number">
                       {{ $savedIdeasCount }}
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-icon">
                        <i class="fa-solid fa-scale-balanced"></i>
                    </div>

                    <h4>
                        Compare List
                    </h4>

                    <div class="number">
                       {{ $compareCount ?? 0 }}
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-icon">
                        <i class="fa-solid fa-eye"></i>
                    </div>

                    <h4>
                        Total Views
                    </h4>

                    <div class="number">
                      {{ $totalViews ?? 0 }}
                    </div>

                </div>

            </div>


            <!-- ================= RECENT ACTIVITY ================= -->

            <div class="activity-card">

                <h3>
                    Recent Activity
                </h3>


@forelse($savedIdeas as $savedIdea)
    @if($savedIdea->business)
        <div class="activity">
            <div class="activity-icon">
                <i class="fa-regular fa-bookmark"></i>
            </div>

            <div class="activity-text">
                <strong>
                    You saved {{ $savedIdea->business->name }}
                </strong>

                <span>
                    {{ $savedIdea->created_at?->diffForHumans() }}
                </span>
            </div>

            <a
                href="{{ route('business.show', $savedIdea->business->id) }}"
                class="view-btn"
            >
                View Details
            </a>
        </div>
    @endif
@empty
    <p style="color:#7890aa;">
        आपने अभी तक कोई Business Idea save नहीं किया है।
    </p>
@endforelse

            </div>


            <!-- ================= SMART BOX ================= -->

            <div class="smart-box">

                <h3>
                    💡 Smart Business Dashboard
                </h3>

                <p>
                    यहाँ आप अपना profile, saved ideas,
                    compare list और business activity manage कर सकते हैं।
                </p>

            </div>


        </section>

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
            <img src="{{ asset('storage/businesses/business -Ideas.jpg') }}"
                 alt="Business Ideas">
            <p>Business Ideas</p>
        </a>
    </div>

    <div class="mobile-item">
        <a href="{{ route('my.ideas') }}">
            <img src="{{ asset('storage/businesses/my-ideas.jpg') }}"
                 alt="My Ideas">
            <p>My Ideas</p>
        </a>
    </div>

    <div class="mobile-item">
        <a href="{{ route('login') }}">
            <img src="{{ asset('storage/businesses/login.jpg') }}"
                 alt="Login">
            <p>Login</p>
        </a>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>