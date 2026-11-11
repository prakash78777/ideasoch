<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"

          content="width=device-width, initial-scale=1.0">

    <title>

        {{ $business->name ?? 'Business Details' }} - IdeaSoch

    </title>

    <!-- Font Awesome -->

    <link

        rel="stylesheet"

        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"

    >


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

            color: #082b55;

        }

        a {

            text-decoration: none;

        }

        /* =========================

           NAVBAR

        ========================= */

     .navbar-light .navbar-nav .nav-link {
        color: #092d55;
}


.footerb a:hover {
    color: #0a58ca;
}

        /* =========================

           HERO

        ========================= */

        .hero {

background: linear-gradient(100deg, #063a78, #0868e8);

            padding: 42px 0;

        }

        .hero-inner {

            width: 1120px;

            max-width: calc(100% - 40px);

            margin: auto;

        }

        .back-link {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            color: #dbeeff;

            font-size: 13px;

            margin-bottom: 20px;

        }

        .back-link:hover {

            color: white;

        }

        .hero h1 {

            color: white;

            font-size: 30px;

            font-weight: 800;

            margin-bottom: 10px;

        }

        .hero-description {

            color: #e8f2ff;

            font-size: 15px;

            line-height: 1.6;

            max-width: 800px;

        }

        /* =========================

           MAIN

        ========================= */

        .main {

            width: 1120px;

            max-width: calc(100% - 40px);

            margin: 35px auto 70px;

        }

        .detail-layout {

            display: grid;

            grid-template-columns: 1fr 330px;

            gap: 25px;

            align-items: start;

        }

        /* =========================

           LEFT CONTENT

        ========================= */

        .detail-card {

            background: white;

            border: 1px solid #dce5ef;

            border-radius: 10px;

            overflow: hidden;

        }

        .business-image {

            width: 100%;

            height: auto;

            background: #e4edf6;

            display: flex;

            align-items: center;

            justify-content: center;
border-radius: 10px 10px 0 0;
            overflow: hidden;

        }

        .business-image img {

            width: 100%;

            height: 100%;

            object-fit: cover;

        }

        .business-image i {

            font-size: 80px;

            color: #7189a1;

        }



        .business-image .main-business-image {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
    object-position: center;
}




        .detail-content {

            padding: 28px;

        }

        .type-badge {

            display: inline-block;

            padding: 6px 12px;

            background: #eaf3ff;

            color: #0877ed;

            border-radius: 20px;

            font-size: 11px;

            font-weight: 700;

            margin-bottom: 12px;

        }

        .detail-content h2 {

            font-size: 16px;

            color: #082b55;

            margin-bottom: 15px;

        }

        .description {

            font-size: 14px;

            line-height: 1.8;

            color: #536b83;

        }

        /* =========================

           INFO GRID

        ========================= */

        .info-grid {

            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 15px;

            margin-top: 28px;

        }

        .info-box {

            border: 1px solid #dce5ef;

            background: #f8fbfe;

            border-radius: 8px;

            padding: 17px;

        }

        .info-icon {

            width: 35px;

            height: 35px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #eaf3ff;

            color: #0877ed;

            border-radius: 7px;

            margin-bottom: 10px;

        }

        .info-label {

            display: block;

            font-size: 11px;

            color: #8b9bad;

            margin-bottom: 5px;

        }

        .info-value {

            display: block;

            font-size: 14px;

            font-weight: 700;

            color: #26364d;

        }

        /* =========================

           RIGHT SIDEBAR

        ========================= */

        .sidebar {

            position: sticky;

            top: 20px;

        }

        .price-card {

            background: white;

            border: 1px solid #dce5ef;

            border-radius: 10px;

            padding: 23px;

            margin-bottom: 18px;

        }

        .price-card h3 {

            font-size: 18px;

            margin-bottom: 20px;

            color: #082b55;

        }

        .price-row {

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 13px 0;

            border-bottom: 1px solid #edf1f5;

        }

        .price-row:last-child {

            border-bottom: 0;

        }

        .price-label {

            font-size: 12px;

            color: #718096;

        }

        .price-value {

            font-size: 13px;

            font-weight: 700;

            color: #082b55;

        }

        .profit-value {

            color: #079455;

        }

        .start-btn {

            display: block;

            width: 100%;

            margin-top: 20px;

            padding: 13px;

            background: #0877ed;

            color: white;

            text-align: center;

            border-radius: 7px;

            font-size: 13px;

            font-weight: 700;

        }

        .start-btn:hover {

            background: #0566cf;

        }

        /* =========================

           QUICK INFO

        ========================= */

        .quick-card {

            background: white;

            border: 1px solid #dce5ef;

            border-radius: 10px;

            padding: 23px;

        }

        .quick-card h3 {

            font-size: 18px;

            margin-bottom: 17px;

        }

        .quick-item {

            display: flex;

            align-items: flex-start;

            gap: 12px;

            margin-bottom: 16px;

        }

        .quick-item:last-child {

            margin-bottom: 0;

        }

        .quick-item i {

            color: #0877ed;

            margin-top: 2px;

            width: 17px;

        }

        .quick-item div {

            flex: 1;

        }

        .quick-item strong {

            display: block;

            font-size: 12px;

            margin-bottom: 3px;

        }

        .quick-item span {

            display: block;

            font-size: 11px;

            color: #718096;

        }

        /* =========================

           HOW TO START

        ========================= */

        .section-card {

            background: white;

            border: 1px solid #dce5ef;

            border-radius: 10px;

            padding: 28px;

            margin-top: 25px;

        }

        .section-card h2 {

            font-size: 22px;

            color: #082b55;

            margin-bottom: 18px;

        }

        .steps {

            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 18px;

        }

        .step {

            border: 1px solid #e0e8f0;

            border-radius: 8px;

            padding: 20px;

            background: #f9fbfd;

        }

        .step-number {

            width: 34px;

            height: 34px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #0877ed;

            color: white;

            font-size: 13px;

            font-weight: 700;

            margin-bottom: 12px;

        }

        .step h4 {

            font-size: 14px;

            margin-bottom: 7px;

        }

        .step p {

            font-size: 11px;

            color: #718096;

            line-height: 1.6;

        }

        /* =========================

           FOOTER

        ========================= */

        .footer {

            background: #06182d;

            color: white;

            padding: 38px 0 20px;

        }

        .footer-inner {

            width: 1120px;

            max-width: calc(100% - 40px);

            margin: auto;

            display: grid;

            grid-template-columns: 2fr 1fr 1fr 1fr;

            gap: 50px;

        }

        .footer h3 {

            font-size: 17px;

            margin-bottom: 10px;

        }

        .footer h3 span {

            color: #0877ed;

        }

        .footer h4 {

            font-size: 11px;

            margin-bottom: 10px;

        }

        .footer p,

        .footer a {

            color: #a9b9ca;

            font-size: 9px;

            line-height: 1.7;

        }

        .footer a {

            display: block;

        }

        .copyright {

            width: 1120px;

            max-width: calc(100% - 40px);

            margin: 25px auto 0;

            padding-top: 15px;

            border-top: 1px solid rgba(255,255,255,.1);

            text-align: center;

            color: #71879e;

            font-size: 8px;

        }

        /* =========================

           RESPONSIVE

        ========================= */

        @media(max-width: 900px) {

            .nav-links {

                gap: 12px;

            }

            .nav-links a {

                font-size: 11px;

            }

            .detail-layout {

                grid-template-columns: 1fr;

            }

            .sidebar {

                position: static;

            }

            .steps {

                grid-template-columns: 1fr;

            }

        }

        @media(max-width: 700px) {

            .navbar {

                height: auto;

                padding: 14px 0;

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

                font-size: 28px;

            }

            .business-image {

                height: 230px;

            }

            .detail-content {

                padding: 20px;

            }

            .info-grid {

                grid-template-columns: 1fr;

            }

            .footer-inner {

                grid-template-columns: 1fr 1fr;

            }

        }

    </style>

</head>

<body>

<!-- =========================================================

     NAVBAR

========================================================= -->


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


<!-- =========================================================

     HERO

========================================================= -->

<section class="hero">

    <div class="hero-inner">

        <a href="{{ route('businesses') }}" class="back-link">

            <i class="fa-solid fa-arrow-left"></i>

            Back to Business Ideas

        </a>

        <h1>

            {{ $business->name ?? 'Business Idea' }}

        </h1>

        <p class="hero-description">

         {{ $business->description ?? 'Explore this business idea and understand its investment and profit potential.' }}

        </p>

    </div>

</section>

<!-- =========================================================

     MAIN

========================================================= -->

<main class="main">

    <div class="detail-layout">

        <!-- =================================================

             LEFT

        ================================================== -->

        <div>

            <!-- BUSINESS CARD -->

            <div class="detail-card">

                <!-- IMAGE -->

<!-- Business Image Helper -->



<!-- Business Image Helper -->
{{-- @php
    $name = strtolower(trim($business->name ?? ''));
    $category = strtolower(trim($business->category ?? ''));

    /*
    |--------------------------------------------------------------------------
    | BUSINESS NAME -> IMAGE PREFIX
    |--------------------------------------------------------------------------
    */

    $imageMap = [

        // Food
        'home tiffin' => 'home-tiffin-service',
        'tiffin' => 'home-tiffin-service',
        'cloud kitchen' => 'cloud-kitchen',
        'cloudkitchen' => 'cloud-kitchen',
        'fast food' => 'fast-food',
        'bakery' => 'bakery',
        'cake' => 'bakery',

        // Retail
        'grocery' => 'grocery',
        'general store' => 'general',
        'clothing' => 'clothing',
        'mobile accessories' => 'mobile',
        'mobile shop' => 'mobile',

        // Online
        'digital marketing' => 'digital',
        'online product' => 'online',
        'online store' => 'online',
        'website development' => 'website',
        'web development' => 'web-development',
        'youtube' => 'youtube',
        'content creator' => 'youtube',

        // Service
        'cleaning' => 'cleaning',
        'electrician' => 'electrician',
        'plumbing' => 'plumbing',
        'plumber' => 'plumbing',
        'virtual assistant' => 'virtual',
        'photography' => 'photography',
        'consultancy' => 'consultancy-service',
        'consulting' => 'consultancy-service',
        'event management' => 'event-management',

        // Agriculture
        'organic farming' => 'organic',
        'mushroom farming' => 'mushroom',
        'mushroom' => 'mushroom',
        'dairy farming' => 'dairy',
        'dairy' => 'dairy',
        'vegetable farming' => 'vegetable',

        // Manufacturing
        'paper product' => 'paper',
        'food processing' => 'food-processing',
        'furniture' => 'furniture',
        'garment' => 'garment',

        // Health
        'fitness' => 'fitness',
        'wellness' => 'wellness',
        'yoga' => 'yoga',
        'health food' => 'health-food',

        // Real Estate
        'property consulting' => 'property-consulting',
        'property management' => 'property-management',
        'rental property' => 'rental-property',
        'real estate' => 'real-estate',
        'property' => 'real-estate',

        // Education
        'home tuition' => 'home-tuition',
        'tuition' => 'home-tuition',
        'computer training' => 'computer-training',
        'coaching center' => 'coaching-center',
        'coaching' => 'coaching-center',
        'online education' => 'online-education',

        // Technology
        'software development' => 'software-development',
        'software' => 'software-development',
        'mobile app' => 'mobile-app',
        'app development' => 'mobile-app',
        'it support' => 'it-support',

        // Franchise
        'food franchise' => 'retail-franchise',
        'retail franchise' => 'retail-franchise',
        'education franchise' => 'education-franchise',
        'service franchise' => 'service-franchise',

        // Home Business
        'home bakery' => 'home-bakery',
        'handmade products' => 'handmade-products',
        'handmade' => 'handmade-products',
        'candle making' => 'candle-making',
        'candle' => 'candle-making',
        'home craft' => 'home-craft',
        'craft' => 'home-craft',

        // Beauty
        'beauty salon' => 'beauty-salon',
        'home beauty' => 'home-beauty',
        'hair salon' => 'hair-salon',
        'makeup artist' => 'makeup-artist',
        'makeup' => 'makeup-artist',

        // Others
        'travel agency' => 'travel-agency',
        'travel' => 'travel-agency',
    ];

    $imagePrefix = null;

    foreach ($imageMap as $keyword => $prefix) {
        if (str_contains($name, $keyword)) {
            $imagePrefix = $prefix;
            break;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | CATEGORY FALLBACK
    |--------------------------------------------------------------------------
    */

    if (!$imagePrefix) {

        if (str_contains($category, 'food')) {
            $imagePrefix = 'fast-food';

        } elseif (str_contains($category, 'retail')) {
            $imagePrefix = 'general';

        } elseif (str_contains($category, 'online')) {
            $imagePrefix = 'online';

        } elseif (str_contains($category, 'service')) {
            $imagePrefix = 'consultancy-service';

        } elseif (str_contains($category, 'agriculture')) {
            $imagePrefix = 'organic';

        } elseif (str_contains($category, 'manufacturing')) {
            $imagePrefix = 'furniture';

        } elseif (str_contains($category, 'health')) {
            $imagePrefix = 'wellness';

        } elseif (str_contains($category, 'real estate')) {
            $imagePrefix = 'real-estate';

        } elseif (str_contains($category, 'education')) {
            $imagePrefix = 'coaching-center';

        } elseif (str_contains($category, 'technology')) {
            $imagePrefix = 'software-development';

        } else {
            $imagePrefix = 'general';
        }
    }

    /*
    |--------------------------------------------------------------------------
    | INVESTMENT -> IMAGE LETTER
    |--------------------------------------------------------------------------
    */

    $investmentMax = (int) ($business->investment_max ?? 0);

    if ($investmentMax <= 10000) {
        $imageLetter = 'a';
    } elseif ($investmentMax <= 50000) {
        $imageLetter = 'b';
    } elseif ($investmentMax <= 100000) {
        $imageLetter = 'c';
    } elseif ($investmentMax <= 500000) {
        $imageLetter = 'd';
    } elseif ($investmentMax <= 1000000) {
        $imageLetter = 'e';
    } elseif ($investmentMax <= 5000000) {
        $imageLetter = 'f';
    } else {
        $imageLetter = 'g';
    }

    /*
    |--------------------------------------------------------------------------
    | FINAL IMAGE
    |--------------------------------------------------------------------------
    */

    $imageFile = $imagePrefix . $imageLetter . '.jpg';

    $imageUrl = asset('storage/businesses/' . $imageFile);

    /*
    |--------------------------------------------------------------------------
    | FALLBACK IMAGE
    |--------------------------------------------------------------------------
    */

    $fallbackImage = asset(
        'storage/businesses/general' . $imageLetter . '.jpg'
    );
@endphp

<div class="business-image">

    <img
        src="{{ $imageUrl }}"
        alt="{{ $business->name }}"
        loading="eager"
        style="width:100%; height:100%; object-fit:cover; display:block;"
        onerror="this.onerror=null; this.src='{{ $fallbackImage }}';"
    >

</div> --}}



{{-- EXACT DATABASE IMAGE --}}

@php
    $imageFile = trim((string) ($business->image ?? ''));

    if ($imageFile !== '') {
        $imageUrl = asset('storage/businesses/' . $imageFile);
    } else {
        $imageUrl = asset('storage/businesses/general.jpg');
    }

    $fallbackUrl = asset('storage/businesses/general.jpg');
@endphp

<div class="business-image">
    <img
        src="{{ $imageUrl }}"
        alt="{{ $business->name }}"
        loading="eager"
        class="main-business-image"
        onerror="this.onerror=null; this.src='{{ $fallbackUrl }}';"
    >
</div>





                <!-- CONTENT -->

                <div class="detail-content">

                    <!-- BUSINESS TYPE -->

                    <span class="type-badge">

                        {{ ucfirst(

                            str_replace(

                                ['-', '_'],

                                ' ',

                                $business->business_type ?? 'Business'

                            )

                        ) }}

                    </span>

                    <h2>

                        {{ $business->name ?? 'Business Idea' }}

                    </h2>

                    <p class="description">

                        {{ $business->description

                            ?? 'No description available for this business idea.'

                        }}

                    </p>

                    <!-- INFO GRID -->

                    <div class="info-grid">

                        <!-- CATEGORY -->

                        <div class="info-box">

                            <div class="info-icon">

                                <i class="fa-solid fa-layer-group"></i>

                            </div>

                            <span class="info-label">

                                Category

                            </span>

                            <span class="info-value">

                                {{ $business->category ?? 'Business' }}

                            </span>

                        </div>

                        <!-- BUSINESS TYPE -->

                        <div class="info-box">

                            <div class="info-icon">

                                <i class="fa-solid fa-briefcase"></i>

                            </div>

                            <span class="info-label">

                                Business Type

                            </span>

                            <span class="info-value">

                                {{ ucfirst(

                                    str_replace(

                                        ['-', '_'],

                                        ' ',

                                        $business->business_type ?? 'Business'

                                    )

                                ) }}

                            </span>

                        </div>

                        <!-- INVESTMENT -->

                        <div class="info-box">

                            <div class="info-icon">

                                <i class="fa-solid fa-indian-rupee-sign"></i>

                            </div>

                            <span class="info-label">

                                Investment

                            </span>

                            <span class="info-value">

                                ₹{{ number_format($business->investment_min ?? 0) }}

                                -

                                ₹{{ number_format($business->investment_max ?? 0) }}

                            </span>

                        </div>

                        <!-- PROFIT -->

                        <div class="info-box">

                            <div class="info-icon">

                                <i class="fa-solid fa-chart-line"></i>

                            </div>

                            <span class="info-label">

                                Expected Profit

                            </span>

                            <span class="info-value">

                                {{ $business->profit ?? '₹25K+' }}

                            </span>

                        </div>

                    </div>

                </div>

            </div>

            <!-- HOW TO START -->

<!-- =================================================

     HOW TO START - 6 STEPS

================================================= -->

<div class="section-card">

    <h2>

        How to Start This Business

    </h2>

    <div class="steps">

        <!-- STEP 1 -->

        <div class="step">

            <div class="step-number">

                1

            </div>

            <h4>

                Plan Your Business

            </h4>

            <p>

                Understand your target customers, business

                model, investment requirements and market

                demand before starting.

            </p>

        </div>

        <!-- STEP 2 -->

        <div class="step">

            <div class="step-number">

                2

            </div>

            <h4>

                Choose Location

            </h4>

            <p>

                Select a suitable location according to your

                target customers, competition and business

                requirements.

            </p>

        </div>

        <!-- STEP 3 -->

        <div class="step">

            <div class="step-number">

                3

            </div>

            <h4>

                Arrange Investment

            </h4>

            <p>

                Arrange the required capital for equipment,

                materials, rent, marketing and other startup

                expenses.

            </p>

        </div>

        <!-- STEP 4 -->

        <div class="step">

            <div class="step-number">

                4

            </div>

            <h4>

                Get Required Things

            </h4>

            <p>

                Arrange the necessary tools, equipment,

                licenses, suppliers and other resources

                required to start the business.

            </p>

        </div>

        <!-- STEP 5 -->

        <div class="step">

            <div class="step-number">

                5

            </div>

            <h4>

                Start Your Business

            </h4>

            <p>

                Launch your business, offer your products or

                services and start attracting your first

                customers.

            </p>

        </div>

        <!-- STEP 6 -->

        <div class="step">

            <div class="step-number">

                6

            </div>

            <h4>

                Promote & Grow

            </h4>

            <p>

                Promote your business through online and

                offline marketing, improve customer service

                and grow your sales.

            </p>

        </div>

    </div>

</div>

        </div>

        <!-- =================================================

             RIGHT SIDEBAR

        ================================================== -->

        <aside class="sidebar">

            <!-- INVESTMENT CARD -->

            <div class="price-card">

                <h3>

                    Business Overview

                </h3>

                <div class="price-row">

                    <span class="price-label">

                        Minimum Investment

                    </span>

                    <span class="price-value">

                        ₹{{ number_format($business->investment_min ?? 0) }}

                    </span>

                </div>

                <div class="price-row">

                    <span class="price-label">

                        Maximum Investment

                    </span>

                    <span class="price-value">

                        ₹{{ number_format($business->investment_max ?? 0) }}

                    </span>

                </div>

                <div class="price-row">

                    <span class="price-label">

                        Expected Profit

                    </span>

                    <span class="price-value profit-value">

                        {{ $business->profit ?? '₹25K+' }}

                    </span>

                </div>

                <div class="price-row">

                    <span class="price-label">

                        Category

                    </span>

                    <span class="price-value">

                        {{ $business->category ?? 'Business' }}

                    </span>

                </div>

                <a

                    href="{{ url('/find-business') }}"

                    class="start-btn"

                >

                    <i class="fa-solid fa-rocket"></i>

                    Start This Business

                </a>

            </div>

            <!-- QUICK INFO -->

            <div class="quick-card">

                <h3>

                    Quick Information

                </h3>

                <div class="quick-item">

                    <i class="fa-solid fa-store"></i>

                    <div>

                        <strong>

                            Business Type

                        </strong>

                        <span>

                            {{ ucfirst(

                                str_replace(

                                    ['-', '_'],

                                    ' ',

                                    $business->business_type ?? 'Business'

                                )

                            ) }}

                        </span>

                    </div>

                </div>

                <div class="quick-item">

                    <i class="fa-solid fa-layer-group"></i>

                    <div>

                        <strong>

                            Category

                        </strong>

                        <span>

                            {{ $business->category ?? 'Business' }}

                        </span>

                    </div>

                </div>

                <div class="quick-item">

                    <i class="fa-solid fa-indian-rupee-sign"></i>

                    <div>

                        <strong>

                            Investment Range

                        </strong>

                        <span>

                            ₹{{ number_format($business->investment_min ?? 0) }}

                            -

                            ₹{{ number_format($business->investment_max ?? 0) }}

                        </span>

                    </div>

                </div>

                <div class="quick-item">

                    <i class="fa-solid fa-chart-line"></i>

                    <div>

                        <strong>

                            Profit Potential

                        </strong>

                        <span>

                            {{ $business->profit ?? '₹25K+' }}

                        </span>

                    </div>

                </div>

            </div>

        </aside>

    </div>

</main>

<!-- =========================================================

     FOOTER

========================================================= -->




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
