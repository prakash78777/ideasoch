<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Find Your Business - IdeaSoch</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f9fd;
            color: #082b52;
        }


        .video-bg::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgb(0 0 0 / 55%);
    z-index: 2;
}

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


        i.bi.bi-list {

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

        /* ================= HERO ================= */

        .hero {
            background: linear-gradient(110deg,
                    #063b72,
                    #0877e9);

            padding: 52px 0;
            color: white;
        }

        .hero-inner {
            width: 1180px;
            max-width: 94%;
            margin: auto;
        }

        .hero h1 {
            margin: 0 0 10px;
            font-size: 42px;
            font-weight: 800;
        }

        .hero p {
            margin: 0;
            font-size: 16px;
            opacity: .95;
        }

        /* ================= FIND SECTION ================= */

        .find-wrapper {
            width: 1180px;
            max-width: 94%;
            margin: 40px auto 70px;
        }

        .find-box {
            background: white;
            border: 1px solid #dbe6f0;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(30, 70, 110, .08);
        }

        .find-grid {
            display: grid;
            grid-template-columns: 1.4fr .8fr;
            gap: 35px;
            align-items: stretch;
        }

        /* ================= FORM ================= */

        .form-area h2 {
            margin: 0 0 6px;
            font-size: 28px;
            color: #092d55;
        }

        .form-area>p {
            margin: 0 0 25px;
            color: #66809c;
            font-size: 14px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 17px;
        }

        .field label {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: 700;
            color: #143b66;
        }

        .field select {
            width: 100%;
            height: 46px;
            border: 1px solid #ccdbea;
            border-radius: 8px;
            background: #fff;
            padding: 0 13px;
            color: #23496e;
            font-size: 14px;
            outline: none;
        }

        .field select:focus {
            border-color: #0875ed;
        }

        .full-field {
            margin-top: 17px;
            width: 50%;
        }

        .find-button {
            width: 100%;
            height: 48px;
            margin-top: 22px;

            border: none;
            border-radius: 8px;

            background: #0875ed;
            color: white;

            font-size: 15px;
            font-weight: 700;

            cursor: pointer;
        }

        .find-button:hover {
            background: #0566cf;
        }

        .find-button i {
            margin-left: 7px;
        }

        /* ================= RIGHT INFO ================= */

        .info-area {
            background: #eef7ff;
            border-radius: 14px;
            padding: 25px;
        }

        .illustration {
            height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .illustration i {
            font-size: 110px;
            color: #0875ed;
        }

        .info-area h3 {
            margin: 5px 0 18px;
            font-size: 18px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 14px 0;
            font-size: 14px;
            color: #264c70;
        }

        .info-item i {
            color: #19a96b;
            font-size: 18px;
        }



        /* Find Business Hero Section */
.findbiz-hero {
    position: relative;
    min-height: 380px;
    display: flex;
    align-items: center;
    overflow: hidden;
    background: #102b4e;
    color: #fff;
}

.findbiz-video-bg {
    position: absolute;
    inset: 0;
    z-index: 0;
    overflow: hidden;
}

.findbiz-video-bg video {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.findbiz-video-bg::after {
    content: "";
    position: absolute;
    inset: 0;
      background: rgb(0 0 0 / 42%);
}

.findbiz-hero-content {
    position: relative;
    z-index: 1;
    width: 100%;
    padding: 40px 6.5%;
}

.findbiz-hero-content h1 {
      color: #3b80ff;
    font-size: 42px;
    font-weight: 800;
    margin: 0 0 14px;
}

.findbiz-hero-content p {
    color: #fff;
    font-size: 17px;
    margin: 0;
}

.findbiz-video-bg video {
   object-position: 50% 0%;

}



        @media (max-width: 1299px) {
            ul.navbar-nav.ms-auto.mb-2.mb-lg-0.align-items-lg-center {
                gap: 0px !important;
            }

            .nav-item a {
                color: #092d55;
                font-size: 12px;
                font-weight: 600;
            }
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 991px) {

            .nav-links {
                gap: 10px;
            }

            .nav-links a:not(.signup-btn):not(.login-btn) {
                display: none;
            }

            .find-grid {
                grid-template-columns: 1fr;
            }

            .full-field {
                width: 100%;
            }

            .mobile-bottom {
                display: flex;
            }

            ul.navbar-nav.ms-auto.mb-2.mb-lg-0.align-items-lg-center {
                gap: 0px !important;

            }

        }

        @media (max-width: 768px) {
    .findbiz-hero-content h1 {
        font-size: 30px;
    }

    .findbiz-hero-content p {
        font-size: 15px;
    }
}

        @media (max-width: 555px) {

            .form-grid {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 30px;
            }

            .find-box {
                padding: 20px;
            }

                .findbiz-hero-content h1 {
                font-size: 20px;
        margin: 0px;
                margin-bottom: 9px;
    }
        

        .findbiz-hero {
    position: relative;
    min-height: auto;
    display: flex;
    align-items: center;
    overflow: hidden;
    background: #102b4e;
    color: #fff;
}
.form-area h2 {
    margin: 0 0 6px;
    font-size: 18px;
    color: #092d55;
    font-weight: 600;
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




<section class="findbiz-hero">
    <div class="findbiz-video-bg">
        <video autoplay muted loop playsinline preload="auto"
            poster="{{ asset('storage/businesses/video-poster.png') }}">
            <source src="{{ asset('storage/businesses/digital-marketing.mp4') }}" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
    </div>

    <div class="findbiz-hero-content">
        <h1>Find Your Business</h1>

        <p>
            अपनी जानकारी के अनुसार सही और आपके लिए suitable Business Idea खोजें
        </p>
    </div>
</section>


    <!-- ================= HERO ================= -->

    {{-- <section class="hero">

      

    </section> --}}


    <!-- ================= FIND BUSINESS ================= -->

    <main class="find-wrapper">

        <div class="find-box">

            <div class="find-grid">

                <!-- ================= FORM ================= -->

                <div class="form-area">

                    <h2>
                        Find Your Business
                    </h2>

                    <p>
                        अपनी जानकारी भरें और आपके लिए सही Business Ideas खोजें
                    </p>


                    <!--
                    IMPORTANT:

                    Button press karne ke baad directly
                    /businesses par jayega.

                    Filters URL ke through bheje jayenge.
                    -->

                    <form id="findBusinessForm">

                        <div class="form-grid">

                            <!-- Budget -->

                            <div class="field">

                                <label>
                                    Budget
                                </label>

                                <select name="budget">

                                    <option value="">
                                        Select Budget
                                    </option>

                                    <option value="10000">
                                        ₹10,000 - ₹50,000
                                    </option>

                                    <option value="50000">
                                        ₹50,000 - ₹1,00,000
                                    </option>

                                    <option value="100000">
                                        ₹1,00,000 - ₹5,00,000
                                    </option>

                                    <option value="500000">
                                        ₹5,00,000 - ₹10,00,000
                                    </option>

                                    <option value="1000000">
                                        ₹10,00,000+
                                    </option>

                                </select>

                            </div>


                            <!-- Location -->

                            <div class="field">
                                <label>Location</label>

                                <select name="location">
                                    <option value="">All Locations</option>

                                    <option value="arunachal-pradesh">Arunachal Pradesh</option>
                                    <option value="assam">Assam</option>
                                    <option value="bihar">Bihar</option>
                                    <option value="chhattisgarh">Chhattisgarh</option>
                                    <option value="goa">Goa</option>
                                    <option value="gujarat">Gujarat</option>
                                    <option value="haryana">Haryana</option>
                                    <option value="himachal-pradesh">Himachal Pradesh</option>
                                    <option value="jharkhand">Jharkhand</option>
                                    <option value="karnataka">Karnataka</option>
                                    <option value="kerala">Kerala</option>
                                    <option value="madhya-pradesh">Madhya Pradesh</option>
                                    <option value="maharashtra">Maharashtra</option>
                                    <option value="manipur">Manipur</option>
                                    <option value="meghalaya">Meghalaya</option>
                                    <option value="mizoram">Mizoram</option>
                                    <option value="nagaland">Nagaland</option>
                                    <option value="odisha">Odisha</option>
                                    <option value="punjab">Punjab</option>
                                    <option value="rajasthan">Rajasthan</option>
                                    <option value="sikkim">Sikkim</option>
                                    <option value="tamil-nadu">Tamil Nadu</option>
                                    <option value="telangana">Telangana</option>
                                    <option value="tripura">Tripura</option>
                                    <option value="uttar-pradesh">Uttar Pradesh</option>
                                    <option value="uttarakhand">Uttarakhand</option>
                                    <option value="west-bengal">West Bengal</option>
                                </select>
                            </div>


                            <!-- Business Type -->

                            <div class="field">
                                <label>Business Type</label>

                                <select name="type">
                                    <option value="">All Business Types</option>

                                    <option value="food-restaurant">Food & Restaurant</option>
                                    <option value="retail">Retail Business</option>
                                    <option value="online">Online Business</option>
                                    <option value="service">Service Business</option>
                                    <option value="agriculture">Agriculture</option>
                                    <option value="manufacturing">Manufacturing</option>
                                    <option value="health-wellness">Health & Wellness</option>
                                    <option value="real-estate">Real Estate</option>
                                    <option value="education">Education</option>
                                    <option value="technology">Technology</option>
                                    <option value="franchise">Franchise</option>
                                    <option value="home-business">Home Business</option>
                                    <option value="beauty-salon">Beauty & Salon</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>


                            <!-- Experience -->

                            <div class="field">

                                <label>
                                    Experience
                                </label>

                                <select name="experience">

                                    <option value="">
                                        Select Experience
                                    </option>

                                    <option value="fresher">
                                        Fresher
                                    </option>

                                    <option value="beginner">
                                        Beginner
                                    </option>

                                    <option value="experienced">
                                        Experienced
                                    </option>

                                </select>

                            </div>


                            <!-- Time -->

                            <div class="field">

                                <label>
                                    Time
                                </label>

                                <select name="time">

                                    <option value="">
                                        Select Time
                                    </option>

                                    <option value="full_time">
                                        Full Time
                                    </option>

                                    <option value="part_time">
                                        Part Time
                                    </option>

                                    <option value="weekend">
                                        Weekend
                                    </option>

                                </select>

                            </div>


                            <!-- Expected Income -->

                            <div class="field">

                                <label>
                                    Expected Income
                                </label>

                                <select name="income">

                                    <option value="">
                                        Select Income
                                    </option>

                                    <option value="20000">
                                        ₹20,000 - ₹50,000
                                    </option>

                                    <option value="50000">
                                        ₹50,000 - ₹1,00,000
                                    </option>

                                    <option value="100000">
                                        ₹1,00,000+
                                    </option>

                                </select>

                            </div>

                        </div>


                        <!-- Number of People -->

                        <div class="field full-field">

                            <label>
                                Number of People
                            </label>

                            <select name="people">

                                <option value="">
                                    Select
                                </option>

                                <option value="1-2">
                                    1-2
                                </option>

                                <option value="3-5">
                                    3-5
                                </option>

                                <option value="5+">
                                    5-10
                                </option>

                                <option value="5+">
                                    10-20
                                </option>

                                <option value="5+">
                                    20-30
                                </option>

                                <option value="5+">
                                    30+
                                </option>

                            </select>

                        </div>


                        <!-- FIND BUTTON -->

                        <button type="submit" class="find-button">
                            Find My Business
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>

                    </form>

                </div>


                <!-- ================= RIGHT SIDE ================= -->

                <div class="info-area">

                    <div class="illustration">

                        <img src="{{ asset('business-images/us.png') }}" alt="IdeaSoch">

                    </div>

                    <h3>
                        आपको मिलेगा:
                    </h3>

                    <div class="info-item">
                        <i class="fa-solid fa-circle-check"></i>
                        Personalized Business Ideas
                    </div>

                    <div class="info-item">
                        <i class="fa-solid fa-circle-check"></i>
                        Investment Details
                    </div>

                    <div class="info-item">
                        <i class="fa-solid fa-circle-check"></i>
                        Expected Profit
                    </div>

                    <div class="info-item">
                        <i class="fa-solid fa-circle-check"></i>
                        Step by Step Guide
                    </div>

                </div>

            </div>

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






    <script>
        document.getElementById('findBusinessForm').addEventListener('submit', function (e) {

    e.preventDefault();

    const form = this;

    const budget = form.querySelector('[name="budget"]').value;
    const location = form.querySelector('[name="location"]').value;
    const type = form.querySelector('[name="type"]').value;
    const experience = form.querySelector('[name="experience"]').value;
    const time = form.querySelector('[name="time"]').value;
    const income = form.querySelector('[name="income"]').value;
    const people = form.querySelector('[name="people"]').value;

    // Validation
    if (!budget ||
        !location ||
        !type ||
        !experience ||
        !time ||
        !income ||
        !people) {

        alert('Please fill all fields first.');
        return;
    }

    // Create URL
    const params = new URLSearchParams();

    params.set('budget', budget);
    params.set('location', location);
    params.set('type', type);
    params.set('experience', experience);
    params.set('time', time);
    params.set('income', income);
    params.set('people', people);

    // Go to Business Ideas page
    window.location.href =
        "{{ route('businesses') }}?" + params.toString();

});
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>