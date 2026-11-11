
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | IdeaSoch</title>
    <meta name="description" content="Discover IdeaSoch, a platform to explore business ideas and entrepreneurial opportunities.">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />


    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <style>
        :root {
            --navy: #082f60;
            --blue: #0877e9;
            --green: #00bd91;
            --light: #f3f7ff;
        }

        body {
            margin: 0;
            color: #17304f;
            font-family: Arial, sans-serif;
            background: #fff;
        }

        .about-hero {
            padding: 30px 10px;
            color: white;
            background: linear-gradient(120deg, #082f60, #0877e9);
            overflow: hidden;
        }

        .hero-label {
            display: inline-block;
            padding: 8px 14px;
            margin-bottom: 20px;
            color: #b9ffe9;
            background: #ffffff18;
            border: 1px solid #ffffff30;
            border-radius: 30px;
        }

        .about-hero h1 {
            max-width: 750px;
            font-size: clamp(36px, 5vw, 58px);
            font-weight: 800;
            line-height: 1.15;
                font-size: 30px;
        }

        .about-hero h1 span {
                color: #dfe5ed;
        }

        .about-hero p {
            max-width: 650px;
            color: #e0edff;
            font-size: 17px;
            line-height: 1.8;
        }

        .main-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 14px 23px;
            color: white;
            background: var(--blue);
            border-radius: 9px;
            text-decoration: none;
            font-weight: 700;
        }

        .about-hero .main-btn {
            color: #082f60;
            background: #50edc3;
        }

        /* .section {
            padding: 75px 20px;
        } */

        .section-title {
            margin-bottom: 16px;
            color: var(--navy);
            font-size: clamp(28px, 4vw, 38px);
            font-weight: 600;
            font-size: 20px;
        }

    .section-text {
    color: #64748b;
    font-size: 14px;
    line-height: 36px;
}

        .feature-card {
            height: 100%;
            padding: 30px;
            background: white;
            border: 1px solid #e3ebf6;
            border-radius: 18px;
            box-shadow: 0 10px 30px #12345a0a;
            transition: transform .25s, box-shadow .25s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 35px #12345a15;
        }

        .feature-icon {
            display: grid;
            width: 58px;
            height: 58px;
            margin-bottom: 20px;
            place-items: center;
            color: #0877e9;
            background: #e9f2ff;
            border-radius: 15px;
            font-size: 28px;
        }

        .feature-card h3 {
            color: var(--navy);
            font-size: 21px;
            font-weight: 750;
        }

        .values-section {
            background: var(--light);
        }

        .cta {
            padding: 55px 25px;
            color: white;
            text-align: center;
            background: linear-gradient(120deg, #082f60, #0877e9);
            border-radius: 22px;
        }

        .cta h2 {
            font-weight: 800;
        }

        .cta p {
            color: #dbeafe;
            line-height: 1.8;
        }

        @media (max-width: 576px) {
            .about-hero {
                padding: 65px 20px;
            }

            .section {
                padding: 50px 18px;
            }

            .feature-card {
                padding: 23px;
            }
        }
    </style>
</head>
<body>


    
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




    <!-- HERO -->
    <section class="about-hero">
        <div class="container">
            <span class="hero-label">💡 About IdeaSoch</span>

            <h1>
                Your Ideas Can Build
                <span>Your Future.</span>
            </h1>

            <p class="mt-4">
                Every successful business starts with an idea.
                IdeaSoch helps you discover business opportunities,
                explore investment options and take the next step
                toward your entrepreneurial goals.
            </p>

            <a href="{{ url('/businesses') }}" class="main-btn">
                Explore Business Ideas →
            </a>
        </div>
    </section>

    <!-- ABOUT -->
    <section class="section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="text-primary fw-bold">WHO WE ARE</span>
                    <h2 class="section-title mt-3">
                        Helping You Discover Your Next Business Idea
                    </h2>
                    <p class="section-text">
                        IdeaSoch is a business ideas discovery platform
                        designed for people who want to explore
                        entrepreneurship. Whether you are just starting
                        out or looking for your next opportunity, you can
                        browse ideas across different categories and
                        investment ranges.
                    </p>
                    <p class="section-text">
                        Our goal is to make exploring business
                        opportunities simpler and help you begin your
                        research with greater clarity.
                    </p>
                </div>

                <div class="col-lg-6">
                    <div class="feature-card">
                        <div class="feature-icon">💡</div>
                        <h3>A Place for Ideas</h3>
                        <p class="section-text mb-0">
                            Explore opportunities in food, retail,
                            education, technology, services and more.
                            Compare investment ranges and learn about
                            different business models before making
                            your decision.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MISSION AND VISION -->
    <section class="section values-section">
        <div class="container">
            <div class="text-center mb-5">
                <span class="text-primary fw-bold">WHAT DRIVES US</span>
                <h2 class="section-title mt-3">Our Mission & Vision</h2>
                <p class="section-text">
                    Helping people move from inspiration to informed action.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">🎯</div>
                        <h3>Our Mission</h3>
                        <p class="section-text mb-0">
                            To make business ideas easier to discover
                            and explore, giving aspiring entrepreneurs
                            a useful starting point for their research
                            and planning.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">🚀</div>
                        <h3>Our Vision</h3>
                        <p class="section-text mb-0">
                            To become a helpful destination for people
                            seeking inspiration, understanding business
                            opportunities and working toward their goals.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WHY IDEASOCH -->
    <section class="section">
        <div class="container">
            <div class="text-center mb-5">
                <span class="text-primary fw-bold">WHY IDEASOCH</span>
                <h2 class="section-title mt-3">Explore With Confidence</h2>
                <p class="section-text">
                    Tools to help you begin exploring business opportunities.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">🔎</div>
                        <h3>Discover Ideas</h3>
                        <p class="section-text mb-0">
                            Browse business opportunities across
                            multiple categories and industries.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">💰</div>
                        <h3>Explore Budgets</h3>
                        <p class="section-text mb-0">
                            Review listed investment ranges to help
                            identify ideas worth researching further.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">📚</div>
                        <h3>Learn & Plan</h3>
                        <p class="section-text mb-0">
                            Use business idea information as a starting
                            point for your own research and planning.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
<!-- FOUNDER SECTION -->
<section class="founder-section">
    <div class="founder-container">

    
        <div class="founder-content">
            <span class="founder-label">MEET OUR FOUNDER</span>

            <h2>Our Founder</h2>

            <h5>Ramlal Narwani</h5>

            <div class="founder-line"></div>

            <p>
                IdeaSoch was created with a vision to help aspiring
                entrepreneurs discover business ideas and explore
                opportunities for building their future.
            </p>

            <p>
                Our goal is to make business discovery simpler by
                bringing business ideas, investment ranges, and
                useful information together on one platform.
            </p>

          
        </div>


         <div class="founder-image">
     
             <img src="{{ asset('storage/businesses/directorc.png') }}"
        alt="IdeaSoch Founder"
                loading="lazy">
        </div>

    </div>
</section>





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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
