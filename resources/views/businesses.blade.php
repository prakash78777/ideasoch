<!DOCTYPE html>

<html lang="en">



<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="csrf-token" content="{{ csrf_token() }}">


  <title>Business Ideas - IdeaSoch</title>


    <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

      {{-- <link rel="stylesheet" href="{{ asset('css/home.css') }}"> --}}




{{-- <link rel="stylesheet" href="{{ asset('css/home.css') }}"> --}}



  <style>



    * {

      box-sizing: border-box;

      margin: 0;

      padding: 0;

    }



    html {

      scroll-behavior: smooth;

    }



    body {

      font-family: Arial, Helvetica, sans-serif;

      background: #f4f8fc;

      color: #062b55;

    }



    a {

      text-decoration: none;

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


/* ========================================================== */





    .business-action {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}

.save-idea-btn {
    border: 1px solid #d9e3f0;
    background: #ffffff;
    color: #3574e8;
    padding: 8px 12px;
    border-radius: 7px;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
}

.save-idea-btn:hover {
    background: #edf4ff;
    border-color: #3574e8;
}

.save-idea-btn.saved {
    background: #e9f9f1;
    border-color: #28a66a;
    color: #19945a;
}



    /* =========================================================
   COMPARE FEATURE
========================================================= */

.compare-check {
    position: absolute;
    top: 12px;
    right: 12px;
    z-index: 20;
}

.compare-check label {
    display: flex;
    align-items: center;
    gap: 6px;
    background: #ffffff;
    border: 1px solid #d7e2ef;
    border-radius: 7px;
    padding: 6px 9px;
    font-size: 11px;
    font-weight: 700;
    color: #17427d;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(0,0,0,.10);
}

.compare-check input {
    width: 15px;
    height: 15px;
    accent-color: #0869e8;
    cursor: pointer;
}


/* Selected business card */

.business-card.compare-selected,
.business-item.compare-selected,
article.compare-selected {
    border: 2px solid #0869e8 !important;
    box-shadow: 0 0 0 3px rgba(8,105,232,.10);
}


/* Floating compare bar */

.compare-bar {
    position: fixed;
    left: 50%;
    bottom: 22px;
    transform: translateX(-50%);

    width: min(600px, calc(100% - 30px));

    background: #ffffff;

    border: 1px solid #d6e2ef;

    border-radius: 12px;

    padding: 12px 15px;

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 15px;

    box-shadow: 0 8px 30px rgba(0,0,0,.18);

    z-index: 9999;

    opacity: 0;

    visibility: hidden;

    transform:
        translateX(-50%)
        translateY(20px);

    transition: .25s ease;
}


.compare-bar.show {
    opacity: 1;

    visibility: visible;

    transform:
        translateX(-50%)
        translateY(0);
}


.compare-count {
    font-size: 13px;

    font-weight: 700;

    color: #173c70;
}


.compare-count span {
    color: #0869e8;
}


.compare-now-btn {
    border: none;

    background: #0869e8;

    color: #ffffff;

    padding: 10px 20px;

    border-radius: 7px;

    font-size: 12px;

    font-weight: 700;

    cursor: pointer;
}


.compare-now-btn:hover {
    background: #0058ca;
}


.compare-clear-btn {
    border: none;

    background: transparent;

    color: #e53935;

    font-size: 12px;

    font-weight: 700;

    cursor: pointer;
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




@media(max-width: 600px) {

    .compare-bar {
        flex-wrap: wrap;
        justify-content: center;
    }

}







    /* =====================================================

     NAVBAR

    ===================================================== */


    /* =====================================================

     HERO

    ===================================================== */



    .hero {

      background:

        linear-gradient(

          100deg,

          #063a78,

          #0868e8

        );



      padding: 32px 0;

    }



    .hero-inner {

      width: 1180px;

      max-width: calc(100% - 40px);



      margin: auto;

    }



    .hero h1 {

      color: #ffffff;



      font-size: 34px;

      font-weight: 800;



      margin-bottom: 8px;

    }



    .hero p {

      color: #eaf4ff;



      font-size: 14px;

    }



    /* =====================================================

     MAIN

    ===================================================== */



    .main-container {

      width: 1180px;

      max-width: calc(100% - 40px);



      margin: 30px auto 60px;

    }



    .content-layout {

      display: grid;



      grid-template-columns: 245px 1fr;



      gap: 24px;



      align-items: start;

    }



    /* =====================================================

     FILTER SIDEBAR

    ===================================================== */



    .filters {

      background: #ffffff;



      border: 1px solid #dce7f2;



      border-radius: 10px;



      padding: 20px;



      position: sticky;

      top: 90px;



      align-self: start;



      max-height: calc(100vh - 105px);



      overflow-y: auto;



      scrollbar-width: thin;

      scrollbar-color: #cbd9e8 transparent;

    }



    .filters::-webkit-scrollbar {

      width: 5px;

    }



    .filters::-webkit-scrollbar-thumb {

      background: #cbd9e8;

      border-radius: 10px;

    }



    .filter-title {

      display: flex;

      align-items: center;



      gap: 10px;



      font-size: 18px;

      font-weight: 800;



      padding-bottom: 16px;



      border-bottom: 1px solid #e2eaf2;



      margin-bottom: 17px;

    }



    .filter-title i {

      color: #063a78;

    }



    .filter-group {

      margin-bottom: 22px;

    }



    .filter-group h4 {

      font-size: 13px;



      margin-bottom: 10px;



      color: #063a78;

    }



    .search-small {

      width: 100%;

      height: 38px;



      border: 1px solid #cbd9e8;



      border-radius: 6px;



      padding: 0 11px;



      font-size: 12px;



      outline: none;

    }



    .search-small:focus {

      border-color: #0868e8;

    }



    .radio-item {

      display: flex;

      align-items: center;



      gap: 8px;



      margin: 9px 0;



      font-size: 12px;



      color: #385572;



      cursor: pointer;

    }



    .radio-item input {

      accent-color: #0868e8;

    }



    .category-select,

    .location-select,

    .sort-select {

      width: 100%;

      height: 38px;



      border: 1px solid #cbd9e8;



      border-radius: 6px;



      background: #ffffff;



      padding: 0 10px;



      font-size: 12px;



      color: #385572;

    }



    .apply-btn {

      width: 100%;

      height: 38px;



      border: 0;



      border-radius: 6px;



      background: #0868e8;



      color: #ffffff;



      font-size: 12px;

      font-weight: 700;



      cursor: pointer;

    }



    .apply-btn:hover {

      background: #0757c5;

    }



    .reset-btn {

      width: 100%;

      height: 35px;



      margin-top: 8px;



      background: white;



      border: 1px solid #cbd9e8;



      border-radius: 6px;



      color: #0868e8;



      font-size: 12px;



      cursor: pointer;

    }



    .reset-btn:hover {

      background: #f4f8ff;

    }



    /* =====================================================

     LISTING AREA

    ===================================================== */



    .listing-area {

      min-width: 0;

    }



    .search-panel {

      background: #ffffff;



      border: 1px solid #dce7f2;



      border-radius: 10px;



      padding: 15px;



      margin-bottom: 18px;

    }



    .search-row {

      display: grid;



      grid-template-columns: 1fr 220px;



      gap: 10px;

    }



    .search-box {

      position: relative;

    }



    .search-box i {

      position: absolute;



      left: 13px;

      top: 50%;



      transform: translateY(-50%);



      color: #7690aa;

    }



    .search-box input {

      width: 100%;

      height: 42px;



      border: 1px solid #cbd9e8;



      border-radius: 6px;



      padding: 0 15px 0 38px;



      outline: none;



      font-size: 13px;

    }



    .search-box input:focus {

      border-color: #0868e8;

    }



    .search-row .sort-select {

      height: 42px;

    }



    .result-count {

      margin-top: 12px;



      color: #52708f;



      font-size: 12px;

    }



    /* =====================================================

     BUSINESS LIST

    ===================================================== */



    .business-list {

      display: flex;



      flex-direction: column;



      gap: 10px;

    }



    .business-card {

      background: #ffffff;



      border: 1px solid #dce7f2;



      border-radius: 8px;



      padding: 10px;



      display: grid;



      grid-template-columns: 105px 1fr auto;



      gap: 14px;



      min-height: 115px;



      transition: 0.2s;

    }



    .business-card:hover {

      border-color: #9fc5ef;



      box-shadow:

        0 5px 18px rgba(0, 55, 110, 0.08);



      transform: translateY(-1px);

    }



    /* =====================================================

     ONLINE BUSINESS IMAGE

    ===================================================== */



    .business-image {

      width: 105px;

      height: 92px;



      border-radius: 7px;



      overflow: hidden;



      background: #e5eef7;



      display: flex;



      align-items: center;



      justify-content: center;



      position: relative;

    }



    .business-image img {

      width: 100%;

      height: 100%;



      object-fit: cover;



      display: block;



      transition: transform 0.3s ease;

    }



    .business-card:hover .business-image img {

      transform: scale(1.05);

    }



    .business-image i {

      font-size: 32px;



      color: #6e8ba7;

    }



    /* image overlay */



    .image-overlay {

      position: absolute;



      left: 0;

      right: 0;

      bottom: 0;



      height: 35%;



      background:

        linear-gradient(

          transparent,

          rgba(0,0,0,0.35)

        );



      pointer-events: none;

    }



    /* =====================================================

     BUSINESS CONTENT

    ===================================================== */



    .business-content {

      min-width: 0;

    }



    .business-category {

      display: inline-block;



      background: #e8f3ff;



      color: #0868e8;



      border-radius: 20px;



      padding: 4px 8px;



      font-size: 9px;



      font-weight: 700;



      margin-bottom: 5px;

    }



    .business-name {

      font-size: 14px;



      font-weight: 800;



      color: #063a78;



      margin-bottom: 4px;



      line-height: 1.3;

    }



    .business-description {

      font-size: 10px;



      line-height: 1.5;



      color: #607b96;



      max-width: 600px;



      margin-bottom: 7px;

    }



    .business-meta {

      display: flex;



      flex-wrap: wrap;



      gap: 14px;



      font-size: 10px;



      color: #55718d;

    }



    .business-meta span {

      display: flex;



      align-items: center;



      gap: 4px;

    }



    .business-meta i {

      color: #19a974;

    }



    .business-investment {

      font-weight: 700;



      color: #063a78 !important;

    }



    /* =====================================================

     ACTION

    ===================================================== */



    .business-action {

      display: flex;



      align-items: center;



      justify-content: center;



      padding-right: 3px;

    }



    .view-btn {

      display: inline-flex;



      align-items: center;



      justify-content: center;



      gap: 5px;



      min-width: 92px;



      height: 32px;



      background: #0868e8;



      color: #ffffff;



      border-radius: 5px;



      font-size: 10px;



      font-weight: 700;



      padding: 0 10px;



      transition: 0.2s;

    }



    .view-btn:hover {

      background: #0757c5;



      transform: translateX(2px);

    }



    /* =====================================================

     EMPTY

    ===================================================== */



    .empty-box {

      background: #ffffff;



      border-radius: 8px;



      border: 1px solid #dce7f2;



      padding: 70px 20px;



      text-align: center;

    }



    .empty-box i {

      font-size: 40px;



      color: #91a8bd;



      margin-bottom: 15px;

    }



    .empty-box h2 {

      font-size: 22px;



      color: #173d65;



      margin-bottom: 8px;

    }



    .empty-box p {

      color: #6e849b;



      font-size: 13px;

    }



    /* =====================================================

     PAGINATION

    ===================================================== */



    .pagination-wrapper {

      display: flex;



      justify-content: center;



      margin-top: 25px;

    }



    .pagination {

      display: flex;



      align-items: center;



      gap: 5px;



      list-style: none;

    }



    .pagination li a,

    .pagination li span {

      min-width: 32px;



      height: 32px;



      padding: 0 8px;



      display: flex;



      align-items: center;



      justify-content: center;



      border: 1px solid #d5e1ed;



      border-radius: 5px;



      background: white;



      color: #0868e8;



      font-size: 11px;

    }



    .pagination li.active span {

      background: #0868e8;



      color: white;



      border-color: #0868e8;

    }



    /* =====================================================

     FOOTER

    ===================================================== */



  

/* ================= FOOTER ================= */



footer {
    background: linear-gradient(90deg, rgb(0 0 0 / 84%), rgb(0 0 0 / 84%)), url(/storage/businesses/video-posters.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    color: #fff;
    padding: 40px 20px;
}



.footer-container {



    max-width: 1180px;



    margin: auto;



}







.footer-grid {



    display: grid;



    grid-template-columns: 2fr 1fr 1fr 1fr 1fr;



    gap: 30px;



}







footer h5 {



    font-size: 15px;



    margin-bottom: 15px;



}







footer p,



footer a {

    font-size: 13px;
    line-height: 38px;
    /* padding-top: 15px; */
    color: #fff;
    font-family: myriad-pro, Arial;
}







footer a {
    display: block;
}







.footer-bottom {



    /* border-top: 1px solid #182136; */



    /* margin-top: 35px;



            padding-top: 18px; */



    text-align: center;



    color: #718096;



    font-size: 10px;

    background-color: #000000;

    padding: 10px 0px;

}





.social-icons {
    display: flex;
}




.fb-icon {
    background-color: #081ee5;
    padding: 9px 12px;
    color: #fff;
    margin: 0px;
    border-radius: 5px;
    margin: 0px 5px !important;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.tr-icon {
    background: linear-gradient(45deg, #F58529, #DD2A7B, #8134AF, #515BD4);
    padding: 9px 12px;
    color: #fff;
    margin: 0px 5px !important;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}

.yt-icon {
    background-color: #ff0000;
    padding: 9px 12px;
    color: #fff;
    border-radius: 5px;
    margin: 0px 5px !important;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}






    .copyright {

      width: 1180px;



      max-width: calc(100% - 40px);



      margin: 25px auto 0;



      padding-top: 15px;



      border-top: 1px solid #19314c;



      text-align: center;



      color: #71869d;



      font-size: 9px;

    }



    /* =====================================================

     RESPONSIVE

    ===================================================== */



    @media (max-width: 1023px) {



      .nav-links {

        gap: 12px;

      }



      .nav-links a:nth-child(4),

      .nav-links a:nth-child(5),

      .nav-links a:nth-child(6),

      .nav-links a:nth-child(7) {

        display: none;

      }

    }



    @media (max-width: 991px) {



      .content-layout {

        grid-template-columns: 210px 1fr;

      }



      .search-row {

        grid-template-columns: 1fr;

      }



      .business-card {

        grid-template-columns: 85px 1fr;

      }



      .business-image {

        width: 85px;

        height: 80px;

      }



      .business-action {

        grid-column: 2;



        justify-content: flex-start;

      }



      .footer-inner {

        grid-template-columns: 1fr 1fr;

      }


      ul.navbar-nav.ms-auto.mb-2.mb-lg-0.align-items-lg-center {
    gap: 0px !important;
}


.compare-check {
    position: absolute;
    top: 0px;
    right: 0px;
    z-index: 20;
}



  .mobile-bottom {
        display: flex;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background: #fff;
        justify-content: space-around;
        align-items: center;
        padding: 0px 0px;
        z-index: 9999;
        border-top: 1px solid #e5e5e5;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .mobile-item img {
        width: 34px;
        height: 34px;
        display: block;
        margin: auto;
        color: #000;
    }


    .mobile-bottom p {
        justify-content: center;
        font-size: 14px;
        font-weight: 700;
    }

    .shops {
        width: 50%;
        margin-bottom: 20px;
    }

    .tablinks {
        margin: 6px 0px;
    }



    }



    @media (max-width: 767px) {



      .navbar {

        height: auto;
        padding: 15px 0;

      }



      .navbar-inner {
        flex-direction: column;
        gap: 14px;

      }



      .nav-links {
        width: 100%;
        justify-content: center;
        flex-wrap: wrap;
      }



      .nav-links a {
        font-size: 11px;

      }



      .hero h1 {

        font-size: 26px;

      }



      .content-layout {

        grid-template-columns: 1fr;

      }



      .filters {

        position: static;



        max-height: none;



        overflow: visible;

      }



      .business-card {

        grid-template-columns: 75px 1fr;

      }



      .business-image {

        width: 75px;

        height: 75px;

      }



      .business-name {

        font-size: 12px;

      }



      .business-description {

        font-size: 9px;

      }



      .footer-inner {

        grid-template-columns: 1fr;

      }

          .compare-check {
        position: absolute;
        top: -3px;
        right: 0px;
        z-index: 20;
        left: -7px;
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



    <h1>

      Business Ideas

    </h1>



    <p>

      Explore profitable business ideas based on your budget,

      location and interests.

    </p>



  </div>



</section>







<!-- =========================================================

  MAIN

========================================================= -->



<main class="main-container">



  <div class="content-layout">





    <!-- =================================================

      FILTERS

    ================================================== -->



    <aside class="filters">



      <div class="filter-title">



        <i class="fa-solid fa-filter"></i>



        Filters



      </div>





      <!-- SEARCH -->



      <div class="filter-group">



        <h4>

          Search

        </h4>



        <input

          type="text"

          class="search-small"

          placeholder="Business name..."

          id="sideSearch"

          value="{{ request('search') }}"

        >



      </div>







      <!-- BUDGET -->



      <div class="filter-group">



        <h4>

          Budget Range

        </h4>



        <label class="radio-item">



          <input

            type="radio"

            name="budget"

            value="all"

            {{ !request()->filled('budget') || request('budget') == 'all' ? 'checked' : '' }}

          >



          All Budgets



        </label>





        <label class="radio-item">



          <input

            type="radio"

            name="budget"

            value="10000"

            {{ request('budget') == '10000' ? 'checked' : '' }}

          >



          Under ₹10K



        </label>





        <label class="radio-item">



          <input

            type="radio"

            name="budget"

            value="50000"

            {{ request('budget') == '50000' ? 'checked' : '' }}

          >



          ₹10K - ₹50K



        </label>





        <label class="radio-item">



          <input

            type="radio"

            name="budget"

            value="100000"

            {{ request('budget') == '100000' ? 'checked' : '' }}

          >



          ₹50K - ₹1L



        </label>





        <label class="radio-item">



          <input

            type="radio"

            name="budget"

            value="500000"

            {{ request('budget') == '500000' ? 'checked' : '' }}

          >



          ₹1L - ₹5L



        </label>





        <label class="radio-item">



          <input

            type="radio"

            name="budget"

            value="1000000"

            {{ request('budget') == '1000000' ? 'checked' : '' }}

          >



          ₹5L - ₹10L



        </label>





        <label class="radio-item">



          <input

            type="radio"

            name="budget"

            value="5000000"

            {{ request('budget') == '5000000' ? 'checked' : '' }}

          >



          ₹10L - ₹50L



        </label>





        <label class="radio-item">



          <input

            type="radio"

            name="budget"

            value="10000000"

            {{ request('budget') == '10000000' ? 'checked' : '' }}

          >



          ₹50L - ₹1Cr



        </label>



      </div>







      <!-- CATEGORY -->



      <div class="filter-group">



        <h4>

          Category

        </h4>



        <select

          class="category-select"

          id="categoryFilter"

        >



          <option

            value="all"

            {{ !request()->filled('type') ? 'selected' : '' }}

          >

            All Categories

          </option>





          <option

            value="food-restaurant"

            {{ request('type') == 'food-restaurant' ? 'selected' : '' }}

          >

            Food & Restaurant

          </option>





          <option

            value="retail"

            {{ request('type') == 'retail' ? 'selected' : '' }}

          >

            Retail Business

          </option>





          <option

            value="online"

            {{ request('type') == 'online' ? 'selected' : '' }}

          >

            Online Business

          </option>





          <option

            value="service"

            {{ request('type') == 'service' ? 'selected' : '' }}

          >

            Service Business

          </option>





          <option

            value="agriculture"

            {{ request('type') == 'agriculture' ? 'selected' : '' }}

          >

            Agriculture

          </option>





          <option

            value="manufacturing"

            {{ request('type') == 'manufacturing' ? 'selected' : '' }}

          >

            Manufacturing

          </option>





          <option

            value="health-wellness"

            {{ request('type') == 'health-wellness' ? 'selected' : '' }}

          >

            Health & Wellness

          </option>





          <option

            value="real-estate"

            {{ request('type') == 'real-estate' ? 'selected' : '' }}

          >

            Real Estate

          </option>





          <option

            value="education"

            {{ request('type') == 'education' ? 'selected' : '' }}

          >

            Education

          </option>





          <option

            value="technology"

            {{ request('type') == 'technology' ? 'selected' : '' }}

          >

            Technology

          </option>





          <option

            value="franchise"

            {{ request('type') == 'franchise' ? 'selected' : '' }}

          >

            Franchise

          </option>





          <option

            value="home-business"

            {{ request('type') == 'home-business' ? 'selected' : '' }}

          >

            Home Business

          </option>





          <option

            value="beauty-salon"

            {{ request('type') == 'beauty-salon' ? 'selected' : '' }}

          >

            Beauty & Salon

          </option>





          <option

            value="others"

            {{ request('type') == 'others' ? 'selected' : '' }}

          >

            Others

          </option>



        </select>



      </div>







      <!-- LOCATION -->



      <div class="filter-group">



        <h4>

          Location

        </h4>


<select class="location-select" id="locationFilter">

  <option value="all">All India</option>

  <!-- States -->
  <option value="andhra-pradesh">Andhra Pradesh</option>
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







      <!-- SORT -->



      <div class="filter-group">



        <h4>

          Sort By

        </h4>



        <select

          class="sort-select"

          id="sideSort"

        >



          <option

            value="latest"

            {{ request('sort') == 'latest' || !request('sort') ? 'selected' : '' }}

          >

            Most Recent

          </option>



          <option

            value="name"

            {{ request('sort') == 'name' ? 'selected' : '' }}

          >

            Name A-Z

          </option>



          <option

            value="investment_low"

            {{ request('sort') == 'investment_low' ? 'selected' : '' }}

          >

            Investment: Low to High

          </option>



          <option

            value="investment_high"

            {{ request('sort') == 'investment_high' ? 'selected' : '' }}

          >

            Investment: High to Low

          </option>



          <option

            value="oldest"

            {{ request('sort') == 'oldest' ? 'selected' : '' }}

          >

            Oldest

          </option>



        </select>



      </div>







      <button

        type="button"

        class="apply-btn"

        onclick="applyFilters()"

      >



        <i class="fa-solid fa-filter"></i>



        &nbsp;



        Apply Filters



      </button>





      <button

        type="button"

        class="reset-btn"

        onclick="resetFilters()"

      >



        Reset Filters



      </button>



    </aside>







    <!-- =================================================

      LISTING

    ================================================== -->



    <section class="listing-area">





      <!-- SEARCH PANEL -->



      <div class="search-panel">



        <div class="search-row">



          <div class="search-box">



            <i class="fa-solid fa-magnifying-glass"></i>



            <input

              type="text"

              id="mainSearch"

              value="{{ request('search') }}"

              placeholder="Search business ideas..."

            >



          </div>





          <select

            class="sort-select"

            id="sortSelect"

          >



            <option

              value="latest"

              {{ request('sort') == 'latest' || !request('sort') ? 'selected' : '' }}

            >

              Most Recent

            </option>



            <option

              value="name"

              {{ request('sort') == 'name' ? 'selected' : '' }}

            >

              Name A-Z

            </option>



            <option

              value="investment_low"

              {{ request('sort') == 'investment_low' ? 'selected' : '' }}

            >

              Investment: Low to High

            </option>



            <option

              value="investment_high"

              {{ request('sort') == 'investment_high' ? 'selected' : '' }}

            >

              Investment: High to Low

            </option>



            <option

              value="oldest"

              {{ request('sort') == 'oldest' ? 'selected' : '' }}

            >

              Oldest

            </option>



          </select>



        </div>





        <div class="result-count">



          Showing



          <strong>

            {{ $businesses->total() }}

          </strong>



          business ideas



        </div>



      </div>







      <!-- =================================================

        BUSINESS CARDS

      ================================================== -->



      @if($businesses->count() > 0)



        <div class="business-list">



          @foreach($businesses as $business)

                        @php

                            /*
                            |--------------------------------------------------------------------------
                            | AUTOMATIC BUSINESS IMAGE MAPPING
                            |--------------------------------------------------------------------------
                            | Images are stored in:
                            | public/business-images/
                            |
                            | Each business has 7 images:
                            | a = Under 10K
                            | b = 10K - 50K
                            | c = 50K - 1L
                            | d = 1L - 5L
                            | e = 5L - 10L
                            | f = 10L - 50L
                            | g = 50L - 1Cr
                            |--------------------------------------------------------------------------
                            */

                            $name = strtolower(trim($business->name ?? ''));
                            $category = strtolower(trim($business->category ?? ''));
                            $type = strtolower(trim($business->business_type ?? ''));

                            /* Default prefix */
                            $imagePrefix = null;

                            /*
                            |--------------------------------------------------------------------------
                            | BUSINESS NAME -> IMAGE PREFIX
                            |--------------------------------------------------------------------------
                            */

                            $imageMap = [

                                // Food & Restaurant
                                'home tiffin'          => 'home-tiffin-service',
                                'tiffin'               => 'home-tiffin-service',
                                'cloud kitchen'        => 'cloud-kitchen',
                                'cloudkitchen'         => 'cloud-kitchen',
                                'fast food'            => 'fast-food',
                                'bakery'              => 'bakery',
                                'cake'                => 'bakery',

                                // Retail
                                'grocery'             => 'grocery',
                                'general store'       => 'general',
                                'general business'    => 'general',
                                'clothing'            => 'clothing',
                                'mobile accessories'  => 'mobile',
                                'mobile shop'         => 'mobile',
                                'mobile store'        => 'mobile',

                                // Online Business
                                'digital marketing'   => 'digital',
                                'online product'      => 'online',
                                'online store'        => 'online',
                                'online business'     => 'online',
                                'website development' => 'website',
                                'website'             => 'website',
                                'web development'     => 'web-development',
                                'youtube'             => 'youtube',
                                'content creator'     => 'youtube',

                                // Service Business
                                'cleaning'            => 'cleaning',
                                'electrician'         => 'electrician',
                                'plumbing'            => 'plumbing',
                                'plumber'             => 'plumbing',
                                'virtual assistant'   => 'virtual',
                                'photography'         => 'photography',
                                'consultancy'         => 'consultancy-service',
                                'consulting'          => 'consultancy-service',
                                'event management'    => 'event-management',
                                'event'               => 'event-management',

                                // Agriculture
                                'organic farming'     => 'organic',
                                'organic'             => 'organic',
                                'mushroom farming'    => 'mushroom',
                                'mushroom'            => 'mushroom',
                                'dairy farming'       => 'dairy',
                                'dairy'               => 'dairy',
                                'vegetable farming'   => 'vegetable',
                                'vegetable'           => 'vegetable',

                                // Manufacturing
                                'paper product'       => 'paper',
                                'paper manufacturing' => 'paper',
                                'food processing'     => 'food-processing',
                                'furniture'           => 'furniture',
                                'garment'             => 'garment',

                                // Health & Wellness
                                'fitness'             => 'fitness',
                                'fitness training'    => 'fitness',
                                'wellness'            => 'wellness',
                                'yoga'                => 'yoga',
                                'health food'         => 'health-food',

                                // Real Estate
                                'property consulting' => 'property-consulting',
                                'property management' => 'property-management',
                                'rental property'     => 'rental-property',
                                'real estate'         => 'real-estate',
                                'property'            => 'real-estate',

                                // Education
                                'home tuition'        => 'home-tuition',
                                'tuition'             => 'home-tuition',
                                'computer training'   => 'computer-training',
                                'coaching center'     => 'coaching-center',
                                'coaching'            => 'coaching-center',
                                'online education'    => 'online-education',

                                // Technology
                                'software development' => 'software-development',
                                'software'             => 'software-development',
                                'mobile app development' => 'mobile-app',
                                'mobile app'           => 'mobile-app',
                                'app development'      => 'mobile-app',
                                'it support'           => 'it-support',

                                // Franchise
                                'food franchise'       => 'retail-franchise',
                                'retail franchise'     => 'retail-franchise',
                                'education franchise'  => 'education-franchise',
                                'service franchise'    => 'service-franchise',

                                // Home Business
                                'home bakery'          => 'home-bakery',
                                'handmade products'    => 'handmade-products',
                                'handmade'             => 'handmade-products',
                                'candle making'        => 'candle-making',
                                'candle'               => 'candle-making',
                                'home craft'           => 'home-craft',
                                'craft'                => 'home-craft',

                                // Beauty & Salon
                                'beauty salon'         => 'beauty-salon',
                                'home beauty'          => 'home-beauty',
                                'hair salon'           => 'hair-salon',
                                'makeup artist'        => 'makeup-artist',
                                'makeup'               => 'makeup-artist',
                                'salon'                => 'beauty-salon',
                                'beauty'               => 'beauty-salon',

                                // Others
                                'travel agency'        => 'travel-agency',
                                'travel'               => 'travel-agency',
                            ];

                            /* Find the first matching business name */
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
                                } elseif (str_contains($category, 'franchise')) {
                                    $imagePrefix = 'service-franchise';
                                } elseif (str_contains($category, 'home')) {
                                    $imagePrefix = 'home-craft';
                                } elseif (str_contains($category, 'beauty')) {
                                    $imagePrefix = 'beauty-salon';
                                } else {
                                    $imagePrefix = 'general';
                                }

                            }

                            /*
                            |--------------------------------------------------------------------------
                            | INVESTMENT -> a/b/c/d/e/f/g
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

                            /* Final filename */
                            $imageFile = $imagePrefix . $imageLetter . '.jpg';

                            /*
                            |--------------------------------------------------------------------------
                            | VERIFY FILE EXISTS
                            |--------------------------------------------------------------------------
                            */

                            $imagePath = public_path('business-images/' . $imageFile);

                            if (!file_exists($imagePath)) {

                                /* Try the same prefix without investment letter */
                                $plainImage = $imagePrefix . '.jpg';

                                if (file_exists(public_path('business-images/' . $plainImage))) {
                                    $imageFile = $plainImage;
                                } else {
                                    /* Final fallback */
                                    $imageFile = 'general' . $imageLetter . '.jpg';
                                }
                            }

                            $imageUrl = asset('business-images/' . $imageFile);

                        @endphp




            <article class="business-card">





              <!-- =================================================

                IMAGE

              ================================================== -->




              <div class="business-image">

    <img
        src="{{ asset('storage/businesses/' . $business->image) }}"
        alt="{{ $business->name }}"
        class="business-image"
        loading="lazy"
        onerror="this.onerror=null; this.src='{{ asset('storage/businesses/general.jpg') }}';"
    >

    <div class="image-overlay"></div>


    <!-- COMPARE CHECKBOX -->
    <div class="compare-check">

        <label>

            <input
                type="checkbox"
                class="compare-checkbox"
                value="{{ $business->id }}"
            >

            Compare

        </label>

    </div>

</div>



              <!-- =================================================

                CONTENT

              ================================================== -->



              <div class="business-content">





             <span class="business-category">
    {{ ucfirst(str_replace('-', ' ', $business->business_type ?? 'Business')) }}
</span>




                <h3 class="business-name">



                  {{ $business->name }}



                </h3>





                <p class="business-description">



                  {{ \Illuminate\Support\Str::limit(

                    $business->description

                    ??

                    'Start this business and provide practical services to customers and local businesses.',

                    125

                  ) }}



                </p>





                <div class="business-meta">





                  <!-- INVESTMENT -->



                  <span class="business-investment">



                    <i class="fa-solid fa-indian-rupee-sign"></i>



                    ₹{{ number_format(

                      $business->investment_min ?? 0

                    ) }}



                    -



                    ₹{{ number_format(

                      $business->investment_max ?? 0

                    ) }}



                  </span>







                  <!-- LOCATION -->



                  <span>



                    <i class="fa-solid fa-location-dot"></i>



                    India



                  </span>







                  <!-- PROFIT -->



                  @if(!empty($business->profit))



                    <span>



                      <i class="fa-solid fa-chart-line"></i>



                      {{ $business->profit }}



                    </span>



                  @endif





                </div>



              </div>







              <!-- =================================================

                BUTTON

              ================================================== -->

<div class="business-action">

    <button
        type="button"
        class="save-idea-btn"
        onclick="toggleSaveIdea(this)"
        data-id="{{ $business->id }}"
        data-name="{{ $business->name }}"
        data-category="{{ $business->category ?? $business->business_type ?? 'Business' }}"
        data-investment="₹{{ number_format($business->investment_min ?? 0) }} - ₹{{ number_format($business->investment_max ?? 0) }}"
        data-image="{{ $imageUrl }}"
        data-save-url="{{ route('saved-ideas.store', $business->id) }}"
    >
        <i class="fa-regular fa-bookmark"></i>
        <span>Save</span>
    </button>

    <a
        href="{{ route('business.show', $business->id) }}"
        class="view-btn"
    >
        View Details
        <i class="fa-solid fa-arrow-right"></i>
    </a>

</div>



            </article>



          @endforeach



        </div>







        <!-- =================================================

          PAGINATION

        ================================================== -->



        <div class="pagination-wrapper">



          {{ $businesses

            ->onEachSide(2)

            ->links('pagination::simple-bootstrap-5')

          }}



        </div>





      @else





        <!-- =================================================

          EMPTY

        ================================================== -->



        <div class="empty-box">



          <i class="fa-solid fa-box-open"></i>



          <h2>

            No Business Ideas Found

          </h2>



          <p>

            Try different filters.

          </p>



        </div>



      @endif





    </section>



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




<!-- =========================================================
     COMPARE BAR
========================================================= -->

<div id="compareBar" class="compare-bar">

    <div class="compare-count">

        <span id="compareCount">0</span>

        business ideas selected

    </div>


    <button
        type="button"
        class="compare-clear-btn"
        id="clearCompare"
    >
        Clear
    </button>


    <button
        type="button"
        class="compare-now-btn"
        id="compareNow"
    >
        Compare Now →
    </button>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const checkboxes =
        document.querySelectorAll('.compare-checkbox');

    const compareBar =
        document.getElementById('compareBar');

    const compareCount =
        document.getElementById('compareCount');

    const compareNow =
        document.getElementById('compareNow');

    const clearCompare =
        document.getElementById('clearCompare');


    /*
    |--------------------------------------------------------------------------
    | Get selected IDs
    |--------------------------------------------------------------------------
    */

    function getSelected() {

        return Array.from(checkboxes)

            .filter(function (checkbox) {
                return checkbox.checked;
            })

            .map(function (checkbox) {
                return checkbox.value;
            });

    }


    /*
    |--------------------------------------------------------------------------
    | Update UI
    |--------------------------------------------------------------------------
    */

    function updateCompareUI() {

        const selected = getSelected();

        compareCount.textContent =
            selected.length;


        if (selected.length > 0) {

            compareBar.classList.add('show');

        } else {

            compareBar.classList.remove('show');

        }


        checkboxes.forEach(function (checkbox) {

            const card =
                checkbox.closest(
                    '.business-card, .business-item, article'
                );

            if (!card) {
                return;
            }


            if (checkbox.checked) {

                card.classList.add(
                    'compare-selected'
                );

            } else {

                card.classList.remove(
                    'compare-selected'
                );

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Checkbox Change
    |--------------------------------------------------------------------------
    */

    checkboxes.forEach(function (checkbox) {

        checkbox.addEventListener(
            'change',
            function () {

                let selected =
                    getSelected();


                /*
                | Maximum 3 ideas
                */

                if (selected.length > 3) {

                    checkbox.checked = false;

                    alert(
                        'आप maximum 3 business ideas compare कर सकते हैं।'
                    );

                    return;

                }


                updateCompareUI();

            }
        );

    });


    /*
    |--------------------------------------------------------------------------
    | Compare Now
    |--------------------------------------------------------------------------
    */

    compareNow.addEventListener(
        'click',
        function () {

            const selected =
                getSelected();


            if (selected.length < 2) {

                alert(
                    'Compare करने के लिए कम से कम 2 business ideas select करें।'
                );

                return;

            }


            if (selected.length > 3) {

                alert(
                    'आप maximum 3 business ideas compare कर सकते हैं।'
                );

                return;

            }


            const params =
                selected
                    .map(function (id) {
                        return 'ids[]=' +
                            encodeURIComponent(id);
                    })
                    .join('&');


            window.location.href =
                "{{ route('compare') }}" +
                '?' +
                params;

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Clear
    |--------------------------------------------------------------------------
    */

    clearCompare.addEventListener(
        'click',
        function () {

            checkboxes.forEach(function (checkbox) {

                checkbox.checked = false;

            });


            updateCompareUI();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Initial State
    |--------------------------------------------------------------------------
    */

    updateCompareUI();

});

</script>


<script>
   async function toggleSaveIdea(button) {
    if (button.dataset.loading === 'true') return;

    const csrfToken = document.querySelector(
        'meta[name="csrf-token"]'
    )?.content;

    if (!csrfToken) {
        alert('CSRF token नहीं मिला। Page refresh करके कोशिश करें।');
        return;
    }

    button.dataset.loading = 'true';
    button.disabled = true;

    try {
        const response = await fetch(button.dataset.saveUrl, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

   if (response.status === 401 || response.redirected) {
    window.location.href = '/login-to-save';
    return;
}

        const data = await response.json();

        if (!response.ok || !data.success) {
            alert(data.message || 'Idea save नहीं हो पाया।');
            return;
        }

        updateSaveButton(button, data.saved);

    } catch (error) {
        console.error('Save Idea Error:', error);
        alert('Server से connection नहीं हो पाया।');
    } finally {
        button.dataset.loading = 'false';
        button.disabled = false;
    }
}

function updateSaveButton(button, saved) {
    const icon = button.querySelector('i');
    const text = button.querySelector('span');

    button.classList.toggle('saved', saved);

    icon.className = saved
        ? 'fa-solid fa-bookmark'
        : 'fa-regular fa-bookmark';

    text.textContent = saved ? 'Saved' : 'Save';
}
</script>


<!-- =========================================================

  JAVASCRIPT

========================================================= -->



<script>



  /*

  |--------------------------------------------------------------------------

  | APPLY FILTERS

  |--------------------------------------------------------------------------

  */



  function applyFilters() {



    const budget =

      document.querySelector(

        'input[name="budget"]:checked'

      )?.value || '';





    const type =

      document.getElementById(

        'categoryFilter'

      )?.value || 'all';





    const location =

      document.getElementById(

        'locationFilter'

      )?.value || 'all';





    const search =

      document.getElementById(

        'mainSearch'

      )?.value.trim() || '';





    const sort =

      document.getElementById(

        'sortSelect'

      )?.value || 'latest';





    const params =

      new URLSearchParams();





    /*

    |--------------------------------------------------------------------------

    | SEARCH

    |--------------------------------------------------------------------------

    */



    if (search) {



      params.set(

        'search',

        search

      );



    }





    /*

    |--------------------------------------------------------------------------

    | BUDGET

    |--------------------------------------------------------------------------

    */



    if (

      budget &&

      budget !== 'all'

    ) {



      params.set(

        'budget',

        budget

      );



    }





    /*

    |--------------------------------------------------------------------------

    | CATEGORY

    |--------------------------------------------------------------------------

    */



    if (

      type &&

      type !== 'all'

    ) {



      params.set(

        'type',

        type

      );



    }





    /*

    |--------------------------------------------------------------------------

    | LOCATION

    |--------------------------------------------------------------------------

    |

    | Location URL me jayegi.

    | Current HomeController location ko filter nahi karta.

    |

    */



    if (

      location &&

      location !== 'all'

    ) {



      params.set(

        'location',

        location

      );



    }





    /*

    |--------------------------------------------------------------------------

    | SORT

    |--------------------------------------------------------------------------

    */



    if (

      sort &&

      sort !== 'latest'

    ) {



      params.set(

        'sort',

        sort

      );



    }





    /*

    |--------------------------------------------------------------------------

    | REDIRECT

    |--------------------------------------------------------------------------

    */



    window.location.href =

      "{{ route('businesses') }}"

      +

      (

        params.toString()

          ? '?' + params.toString()

          : ''

      );



  }







  /*

  |--------------------------------------------------------------------------

  | RESET

  |--------------------------------------------------------------------------

  */



  function resetFilters() {



    window.location.href =

      "{{ route('businesses') }}";



  }







  /*

  |--------------------------------------------------------------------------

  | SIDEBAR SEARCH → MAIN SEARCH

  |--------------------------------------------------------------------------

  */



  const sideSearch =

    document.getElementById(

      'sideSearch'

    );





  const mainSearch =

    document.getElementById(

      'mainSearch'

    );





  if (

    sideSearch &&

    mainSearch

  ) {



    sideSearch.addEventListener(

      'input',

      function () {



        mainSearch.value =

          this.value;



      }

    );



  }







  /*

  |--------------------------------------------------------------------------

  | SORT SYNC

  |--------------------------------------------------------------------------

  */



  const sideSort =

    document.getElementById(

      'sideSort'

    );





  const sortSelect =

    document.getElementById(

      'sortSelect'

    );





  if (

    sideSort &&

    sortSelect

  ) {



    sideSort.addEventListener(

      'change',

      function () {



        sortSelect.value =

          this.value;



      }

    );





    sortSelect.addEventListener(

      'change',

      function () {



        sideSort.value =

          this.value;



      }

    );



  }







  /*

  |--------------------------------------------------------------------------

  | ENTER KEY SEARCH

  |--------------------------------------------------------------------------

  */



  if (mainSearch) {



    mainSearch.addEventListener(

      'keydown',

      function (event) {



        if (

          event.key === 'Enter'

        ) {



          applyFilters();



        }



      }

    );



  }







  /*

  |--------------------------------------------------------------------------

  | SIDEBAR SEARCH ENTER

  |--------------------------------------------------------------------------

  */



  if (sideSearch) {



    sideSearch.addEventListener(

      'keydown',

      function (event) {



        if (

          event.key === 'Enter'

        ) {



          applyFilters();



        }



      }

    );



  }



</script>




 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



</body>



</html>