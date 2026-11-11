<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Compare Business Ideas - IdeaSoch</title>

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
            background: #f4f8fc;
            color: #102a56;
        }


        a {
            text-decoration: none;
            color: inherit;
        }


        /* =========================
           NAVBAR
        ========================= */
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

            padding: 50px 7%;
        }


        .hero-inner {
            max-width: 1150px;

            margin: auto;
        }


        .hero-label {
            font-size: 13px;

            margin-bottom: 15px;
        }


        .hero h1 {
            font-size: 40px;

            font-weight: 800;

            margin-bottom: 10px;
        }


        .hero p {
            font-size: 15px;

            line-height: 1.7;

            max-width: 700px;
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


       .footerb a:hover {
    color: #ffffff !important;
}


        .page-heading {
            margin-bottom: 25px;
        }


        .page-heading h2 {
            font-size: 27px;

            font-weight: 800;

            margin-bottom: 7px;
        }


        .page-heading p {
            color: #718096;

            font-size: 13px;
        }


        /* =========================
           COMPARE BOX
        ========================= */

        .compare-wrapper {

            background: white;

            border: 1px solid #dce6f0;

            border-radius: 10px;

            overflow: hidden;

            box-shadow:
                0 5px 18px rgba(25, 60, 100, .06);
        }


        .compare-table {

            width: 100%;

            border-collapse: collapse;

            table-layout: fixed;
        }


        .compare-table th,
        .compare-table td {

            border-right: 1px solid #dce6f0;

            border-bottom: 1px solid #dce6f0;

            padding: 17px 15px;

            vertical-align: middle;
        }


        .compare-table th:last-child,
        .compare-table td:last-child {
            border-right: none;
        }


        .compare-table tr:last-child td {
            border-bottom: none;
        }


        /* =========================
           LABEL COLUMN
        ========================= */

        .label-column {

            width: 190px;

            background: #fbfdff;

            font-size: 13px;

            font-weight: 700;

            color: #18345f;

            text-align: left;
        }


        /* =========================
           BUSINESS COLUMN
        ========================= */

        .business-column {

            text-align: center;

            width: 33.33%;
        }


        .business-image {

            width: 130px;

            height: 85px;

            margin: 0 auto 12px;

            border-radius: 8px;

            overflow: hidden;

            border: 1px solid #dce6f0;

            background: #eef4fa;
        }


        .business-image img {

            width: 100%;

            height: 100%;

            object-fit: cover;

            display: block;
        }


        .business-name {

            font-size: 15px;

            font-weight: 800;

            color: #102a56;

            margin-bottom: 7px;
        }


        .business-category {

            display: inline-block;

            background: #e9f3ff;

            color: #1267d7;

            border-radius: 20px;

            padding: 5px 10px;

            font-size: 10px;

            font-weight: 700;
        }


        .remove-btn {

            display: inline-block;

            margin-top: 10px;

            color: #e53935;

            font-size: 11px;

            font-weight: 700;
        }


        .remove-btn:hover {
            text-decoration: underline;
        }


        /* =========================
           VALUE
        ========================= */

        .value {

            font-size: 13px;

            font-weight: 600;

            color: #28476e;

            text-align: center;
        }


        .green {
            color: #1e9d59;
        }


        .medium {
            color: #d58b00;
        }


        .low {
            color: #15945a;
        }


        /* =========================
           BUTTON AREA
        ========================= */

        .compare-actions {

            padding: 25px;

            text-align: center;

            background: #ffffff;

            border-top: 1px solid #dce6f0;
        }


        .compare-now {

            border: none;

            background: #0869e8;

            color: white;

            padding: 13px 45px;

            border-radius: 7px;

            font-size: 13px;

            font-weight: 700;

            cursor: pointer;

            transition: .2s;
        }


        .compare-now:hover {
            background: #0058ca;
        }


        /* =========================
           EMPTY STATE
        ========================= */

        .empty-state {

            background: white;

            border: 1px solid #dce6f0;

            border-radius: 10px;

            padding: 70px 25px;

            text-align: center;
        }


        .empty-icon {

            font-size: 45px;

            margin-bottom: 15px;
        }


        .empty-state h2 {

            font-size: 22px;

            margin-bottom: 8px;
        }


        .empty-state p {

            color: #718096;

            font-size: 13px;

            margin-bottom: 20px;
        }


        .browse-btn {

            display: inline-block;

            background: #0869e8;

            color: white;

            padding: 12px 25px;

            border-radius: 7px;

            font-size: 13px;

            font-weight: 700;
        }


        /* =========================
           INFO BOX
        ========================= */

        .info-box {

            margin-top: 25px;

            background: linear-gradient(
                110deg,
                #e8fff7,
                #edf8ff
            );

            border: 1px solid #d4ece7;

            border-radius: 10px;

            padding: 18px 22px;

            text-align: center;
        }


        .info-box h3 {

            font-size: 16px;

            margin-bottom: 6px;
        }


        .info-box p {

            color: #5d7188;

            font-size: 12px;

            line-height: 1.6;
        }


        /* =========================
           FOOTER
        ========================= */

      

        /* =========================
           MOBILE
        ========================= */

        @media(max-width: 800px) {

            .nav-links {
                display: none;
            }


            .hero {
                padding: 40px 20px;
            }


            .hero h1 {
                font-size: 30px;
            }


            .compare-wrapper {
                overflow-x: auto;
            }


            .compare-table {
                min-width: 700px;
            }


            .container {
                margin-top: 30px;
            }


            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }

        }


        @media(max-width: 500px) {

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
            ⚖️ IdeaSoch Business Comparison
        </div>

        <h1>
            Compare Business Ideas
        </h1>

        <p>
            दो या तीन business ideas को compare करें
            और investment, income, risk और startup
            requirements के आधार पर सही business चुनें।
        </p>

    </div>

</section>


<!-- =========================
     MAIN
========================= -->

<main class="container">


    <div class="page-heading">

        <h2 class="pt-4">
            Compare Business Ideas
        </h2>

        <p>
            Selected business ideas की details
            side-by-side compare करें।
        </p>

    </div>


    @if($businesses->count() > 0)


        <div class="compare-wrapper">

            <table class="compare-table">


                <!-- =====================
                     BUSINESS HEADER
                ====================== -->

                <tr>

                    <th class="label-column">
                        Business
                    </th>


                    @foreach($businesses as $business)

                        <th class="business-column">


                            <div class="business-image">

                                @php

                                    $imageKeywordMap = [

                                        'Food & Restaurant'
                                            => 'restaurant,food',

                                        'Retail Business'
                                            => 'shop,retail',

                                        'Online Business'
                                            => 'computer,online,business',

                                        'Service Business'
                                            => 'service,business',

                                        'Agriculture'
                                            => 'farming,agriculture',

                                        'Manufacturing'
                                            => 'factory,manufacturing',

                                        'Health & Wellness'
                                            => 'health,fitness',

                                        'Real Estate'
                                            => 'realestate,building',

                                        'Education'
                                            => 'education,school',

                                        'Technology'
                                            => 'technology,computer',

                                        'Franchise'
                                            => 'store,shop',

                                        'Home Business'
                                            => 'home,business',

                                        'Beauty & Salon'
                                            => 'salon,beauty',

                                        'Others'
                                            => 'business,office',

                                    ];

                                    $keyword =
                                        $imageKeywordMap[
                                            $business->category
                                        ]
                                        ?? 'business,office';

                                    $imageUrl =
                                        "https://loremflickr.com/600/400/{$keyword}?lock={$business->id}";

                                @endphp


                                <img
        src="{{ asset('storage/businesses/' . basename($business->image ?? 'general.jpg')) }}"
        alt="{{ $business->name }}"
        loading="lazy"
        onerror="this.onerror=null; this.src='{{ asset('storage/businesses/general.jpg') }}';"
    >
                            </div>


                            <div class="business-name">

                                {{ $business->name }}

                            </div>


                            <div class="business-category">

                                {{ $business->category }}

                            </div>


                            <a
                                href="{{ route('compare') }}"
                                class="remove-btn"
                            >
                                ✕ Remove
                            </a>


                        </th>

                    @endforeach


                </tr>


                <!-- =====================
                     INVESTMENT
                ====================== -->

                <tr>

                    <td class="label-column">
                        Investment
                    </td>


                    @foreach($businesses as $business)

                        <td class="value">

                            ₹{{ number_format($business->investment_min) }}

                            -

                            ₹{{ number_format($business->investment_max) }}

                        </td>

                    @endforeach

                </tr>


                <!-- =====================
                     MONTHLY EXPENSE
                ====================== -->

                <tr>

                    <td class="label-column">
                        Monthly Expense
                    </td>


                    @foreach($businesses as $business)

                        <td class="value">

                            ₹{{ number_format(round($business->investment_min * 0.20)) }}

                            -

                            ₹{{ number_format(round($business->investment_max * 0.40)) }}

                        </td>

                    @endforeach

                </tr>


                <!-- =====================
                     EXPECTED INCOME
                ====================== -->

                <tr>

                    <td class="label-column">
                        Expected Income
                    </td>


                    @foreach($businesses as $business)

                        <td class="value green">

                            {{ $business->profit ?: '₹15K+' }}

                        </td>

                    @endforeach

                </tr>


                <!-- =====================
                     DIFFICULTY
                ====================== -->

                <tr>

                    <td class="label-column">
                        Difficulty
                    </td>


                    @foreach($businesses as $business)

                        <td class="value">

                            @if($business->investment_max <= 50000)

                                Easy

                            @elseif($business->investment_max <= 500000)

                                Medium

                            @else

                                Hard

                            @endif

                        </td>

                    @endforeach

                </tr>


                <!-- =====================
                     RISK LEVEL
                ====================== -->

                <tr>

                    <td class="label-column">
                        Risk Level
                    </td>


                    @foreach($businesses as $business)

                        <td class="value">

                            @if($business->investment_max <= 50000)

                                <span class="low">
                                    Low
                                </span>

                            @elseif($business->investment_max <= 500000)

                                <span class="medium">
                                    Medium
                                </span>

                            @else

                                <span style="color:#e05b5b;">
                                    High
                                </span>

                            @endif

                        </td>

                    @endforeach

                </tr>


                <!-- =====================
                     TIME TO START
                ====================== -->

                <tr>

                    <td class="label-column">
                        Time to Start
                    </td>


                    @foreach($businesses as $business)

                        <td class="value">

                            @if($business->investment_max <= 50000)

                                1 - 2 Months

                            @elseif($business->investment_max <= 500000)

                                2 - 3 Months

                            @else

                                3 - 6 Months

                            @endif

                        </td>

                    @endforeach

                </tr>


                <!-- =====================
                     VIEW DETAILS
                ====================== -->

                <tr>

                    <td class="label-column">
                        Details
                    </td>


                    @foreach($businesses as $business)

                        <td class="value">

                            <a
                                href="{{ route('business.show', $business) }}"
                                style="
                                    color:#0869e8;
                                    font-weight:700;
                                "
                            >
                                View Details →
                            </a>

                        </td>

                    @endforeach

                </tr>


            </table>



<div class="compare-actions">
    <button
        type="button"
        class="compare-now"
        id="compareNowBtn">
        Compare Now
    </button>
</div>


        </div>


    @else


        <!-- =====================
             EMPTY STATE
        ====================== -->

        <div class="empty-state">

            <div class="empty-icon">
                ⚖️
            </div>

            <h2>
                Compare Business Ideas
            </h2>

            <p>
                अभी कोई business idea select नहीं किया गया है।
                Business Ideas page पर जाकर 2 या 3 ideas select करें।
            </p>

            <a
                href="{{ route('businesses') }}"
                class="browse-btn"
            >
                Browse Business Ideas →
            </a>

        </div>


    @endif


    <!-- =========================
         INFO
    ========================= -->

    <div class="info-box">

        <h3>
            💡 Smart Business Comparison
        </h3>

        <p>
            आप 2 या 3 business ideas की investment,
            expected income, difficulty, risk level और
            startup time की तुलना करके अपने लिए बेहतर
            business idea चुन सकते हैं।
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






<script>
document.addEventListener('DOMContentLoaded', function () {
    const compareBtn = document.getElementById('compareNowBtn');

    if (!compareBtn) return;

    compareBtn.addEventListener('click', function () {
        const comparisonTable = document.querySelector(
            '.compare-table, .comparison-table, table'
        );

        if (comparisonTable) {
            comparisonTable.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });

            comparisonTable.style.outline = '2px solid #2563eb';

            setTimeout(function () {
                comparisonTable.style.outline = '';
            }, 1500);
        } else {
            alert('Comparison table not found.');
        }
    });
});
</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>