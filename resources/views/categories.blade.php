<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Business Categories - IdeaSoch</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

           <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


                 <link rel="stylesheet" href="{{ asset('css/home.css') }}">


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f9fd;
            color: #102a56;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

       .footerb a:hover {
    color: #ffffff !important;
}

        /* =========================
           NAVBAR
        ========================= */
  
        /* ================= NAVBAR ================= */

.mobile-bottom {
  display: none;
}


.mobile-bottom p {
  justify-content: center;
  font-size: 16px;
  font-weight: 700;
  color: #000;
  text-decoration: none;
  margin-bottom: 0px;
}


i.bi.bi-list{

    font-size: 25px;
    font-weight: 700;
    color: #000;
}

.navbar-toggler {
    color: #000 !important;
    border: none !important;
}

.nav-item a {
    color: #092d55;
    font-size: 14px;
    font-weight: 600;
}


ul.navbar-nav.ms-auto.mb-2.mb-lg-0.align-items-lg-center {
    gap: 18px !important;
}

.sticky-top {
    background-color: white;
}

.nav-item a {
    color: #092d55;
    font-size: 14px;
    font-weight: 600;
}

.navbar-light .navbar-nav .nav-link {
    color: #092d55;
}
        /* =========================
           HERO
        ========================= */

        .hero {
            background: linear-gradient(
                110deg,
                #224987,
                #326be1
            );

            color: white;
            padding: 55px 7%;
        }

        .hero-inner {
            max-width: 1150px;
            margin: auto;
        }

        .hero-label {
            font-size: 13px;
            margin-bottom: 16px;
            opacity: .95;
        }

        .hero h1 {
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .hero p {
            max-width: 720px;
            font-size: 16px;
            line-height: 1.7;
        }

        /* =========================
           MAIN
        ========================= */

.container {
    /* max-width: 1150px; */
    margin: 0px auto;
    padding: 0 20px;
    margin-bottom: 20px;
}

        .page-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .page-header h2 {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 9px;
        }

        .page-header p {
            color: #718096;
            font-size: 14px;
        }

        /* =========================
           CATEGORY GRID
        ========================= */

        .category-grid {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 18px;
        }

        .category-card {
            background: #ffffff;

            border: 1px solid #dce6f0;

            border-radius: 10px;

            padding: 25px 18px;

            text-align: center;

            min-height: 155px;

            transition:
                transform .2s ease,
                box-shadow .2s ease,
                border-color .2s ease;

            cursor: pointer;
        }

        .category-card:hover {
            transform: translateY(-4px);

            border-color: #4b83ed;

            box-shadow:
                0 10px 25px rgba(30, 75, 130, .12);
        }

        .category-icon {
            width: 54px;
            height: 54px;

            margin: 0 auto 13px;

            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 26px;
        }

        .category-name {
            font-size: 13px;
            font-weight: 700;

            margin-bottom: 7px;

            color: #102a56;
        }

        .category-count {
            font-size: 11px;
            color: #7a899d;
        }

        .category-count strong {
            color: #416fbd;
        }

        /* =========================
           INFO BOX
        ========================= */

        .info-box {
            margin-top: 35px;

            background: linear-gradient(
                110deg,
                #e9fff8,
                #eef8ff
            );

            border: 1px solid #d4ece7;

            border-radius: 10px;

            padding: 20px 25px;

            text-align: center;
        }

        .info-box h3 {
            font-size: 17px;
            margin-bottom: 7px;
        }

        .info-box p {
            color: #5e7189;
            font-size: 13px;
            line-height: 1.6;
        }

        /* =========================
           FOOTER
        ========================= */

    
        .copyright {
            max-width: 1150px;
            margin: 30px auto 0;

            padding-top: 18px;

            border-top: 1px solid rgba(255,255,255,.12);

            text-align: center;

            color: #71849b;

            font-size: 11px;
        }


         @media(max-width: 1299px) {
        .nav-item a {
    color: #092d55;
    font-size: 12px;
    font-weight: 600;
}

ul.navbar-nav.ms-auto.mb-2.mb-lg-0.align-items-lg-center {
    gap: 0px !important;
}

         }

        /* =========================
           TABLET
        ========================= */

        @media(max-width: 991px) {

            .nav-links {
                gap: 12px;
                font-size: 11px;
            }

            .category-grid {
                grid-template-columns:
                    repeat(3, 1fr);
            }

                .mobile-bottom {
        display: flex;
    }

        }

        /* =========================
           MOBILE
        ========================= */

        @media(max-width: 650px) {

            .navbar {
                padding: 0 18px;
            }

            .nav-links {
                display: none;
            }

            .hero {
                padding: 40px 20px;
            }

            .hero h1 {
                font-size: 30px;
            }

            .hero p {
                font-size: 14px;
            }

            .category-grid {
                grid-template-columns:
                    repeat(2, 1fr);

                gap: 12px;
            }

            .category-card {
                min-height: 140px;
                padding: 20px 10px;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }

        }

        @media(max-width: 420px) {

            .category-grid {
                grid-template-columns: 1fr 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>


<!-- =========================
     NAVBAR
========================= -->

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


<!-- =========================
     HERO
========================= -->

<section class="hero">

    <div class="hero-inner">

        <div class="hero-label">
            💡 IdeaSoch Business Categories
        </div>

        <h1>
            Business Categories
        </h1>

        <p>
            अपनी रुचि और बजट के अनुसार
            सही business category चुनें और
            business ideas explore करें।
        </p>

    </div>

</section>


<!-- =========================
     MAIN
========================= -->

<main class="container">


    <div class="page-header">

        <h2 class="pt-3">
            Business Categories
        </h2>

        <p>
            अपनी पसंद के अनुसार Category चुनें
            और उससे जुड़े सभी Business Ideas देखें।
        </p>

    </div>


    <!-- CATEGORY GRID -->

    <div class="category-grid">


        @foreach($categories as $category)

            <a
                href="{{ route('businesses', [
                    'category' => $category['name']
                ]) }}"
                class="category-card"
            >


                <div
                    class="category-icon"
                    style="
                        background: {{ $category['color'] }};
                        color: {{ $category['icon_color'] }};
                    "
                >

                    {{ $category['icon'] }}

                </div>


                <div class="category-name">

                    {{ $category['name'] }}

                </div>


                <div class="category-count">

                    <strong>
                        {{ $category['count'] }}
                    </strong>

                    {{ $category['count'] == 1 ? 'idea' : 'ideas' }}

                </div>


            </a>

        @endforeach


    </div>


    <!-- INFO -->

    <div class="info-box">

        <h3>
            💡 Find the Right Business for You
        </h3>

        <p>
            किसी भी category पर click करके
            उससे जुड़े सभी business ideas देखें।
            आप investment और अन्य filters का भी
            उपयोग कर सकते हैं।
        </p>

    </div>


</main>


<!-- =========================
     FOOTER
========================= -->


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