
<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Saved Ideas - IdeaSoch</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

           <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f8fc;
            color: #102d57;
        }

        a { text-decoration: none; }

        
        .navbar-light .navbar-nav .nav-link {
       color: #092d55;
}



.footerb a:hover {
    color: #fff;
}


        .hero {
            background: linear-gradient(115deg, #244d8f, #386ee0);
            color: white;
            padding: 48px 0;
        }

        .hero-inner, .main, .footer-inner {
            width: 1180px;
            max-width: calc(100% - 40px);
            margin-left: auto;
            margin-right: auto;
        }

        .hero-badge { font-size: 14px; margin-bottom: 20px; }

        .hero h1 {
            font-size: 30px;
            line-height: 1.15;
            margin-bottom: 16px;
        }

        .hero p { font-size: 17px; line-height: 1.7; }

        .main { margin-top: 48px; margin-bottom: 70px; }

        .page-heading { margin-bottom: 24px; }

        .page-heading h2 {
            font-size: 29px;
            margin-bottom: 8px;
        }

        .page-heading p { color: #71809a; line-height: 1.6; }

        .tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 22px;
        }

        .tab {
            border: 1px solid #d7e0ed;
            background: white;
            padding: 11px 20px;
            border-radius: 8px;
            color: #193a68;
            font-weight: 700;
            cursor: pointer;
        }

        .tab.active {
            background: #3574e8;
            color: white;
            border-color: #3574e8;
        }

        .saved-list {
            display: flex;
            flex-direction: column;
            gap: 13px;
        }

        .saved-card {
            background: white;
            border: 1px solid #dce5f0;
            border-radius: 10px;
            padding: 14px;
            display: flex;
            align-items: center;
            gap: 17px;
            box-shadow: 0 2px 8px rgba(20, 50, 90, .04);
        }

        .saved-image {
            width: 90px;
            height: 72px;
            flex-shrink: 0;
            border-radius: 8px;
            overflow: hidden;
            background: #edf3fa;
        }

        .saved-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .saved-content { flex: 1; min-width: 0; }

        .saved-category {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            color: #3574e8;
            background: #edf4ff;
            border-radius: 20px;
            padding: 4px 9px;
            margin-bottom: 7px;
        }

        .saved-content h3 {
            font-size: 17px;
            margin-bottom: 7px;
            color: #102d57;
            overflow-wrap: anywhere;
        }

        .saved-investment { font-size: 13px; color: #66758c; }

        .saved-actions {
            display: flex;
            align-items: center;
            gap: 9px;
            flex-shrink: 0;
        }

        .view-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #edf5ff;
            color: #3574e8;
            padding: 10px 15px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 700;
        }

        .view-btn:hover { background: #dceaff; }

        .remove-btn {
            width: 38px;
            height: 38px;
            border: 0;
            border-radius: 7px;
            background: #fff1f1;
            color: #ef4444;
            cursor: pointer;
            font-size: 15px;
        }

        .remove-btn:hover { background: #ffe0e0; }

        .empty-box {
            background: white;
            border: 1px solid #dce5f0;
            border-radius: 12px;
            min-height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 35px 20px;
        }

        .empty-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: #eef5ff;
            color: #3574e8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            margin-bottom: 18px;
        }

        .empty-box h3 { font-size: 22px; margin-bottom: 10px; }
        .empty-box p { color: #71809a; line-height: 1.7; margin-bottom: 20px; }

        .browse-btn {
            display: inline-block;
            background: #3574e8;
            color: white;
            padding: 12px 22px;
            border-radius: 7px;
            font-weight: 700;
        }

        .smart-box {
            margin-top: 25px;
            padding: 22px;
            border-radius: 10px;
            background: linear-gradient(90deg, #eafff8, #eefaff);
            border: 1px solid #ccefe5;
            text-align: center;
        }

        .smart-box h3 { margin-bottom: 7px; font-size: 17px; }
        .smart-box p { color: #61758e; font-size: 14px; line-height: 1.7; }

        .alert-success {
            background: #e9fff2;
            border: 1px solid #a7e9c0;
            color: #176b3a;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
        }

        .alert-error {
            background: #fff1f1;
            border: 1px solid #ffcaca;
            color: #b42318;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
        }

        .footer {
            background: #071b36;
            color: white;
            padding: 50px 0 20px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 35px;
        }

        .footer h3 { font-size: 23px; margin-bottom: 12px; }
        .footer h3 span { color: #3574e8; }
        .footer h4 { margin-bottom: 14px; }
        .footer p { color: #b8c5d8; line-height: 1.7; max-width: 350px; }

        .footer a {
            display: block;
            color: #b8c5d8;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .footer a:hover { color: white; }

        .copyright {
            border-top: 1px solid #243852;
            margin-top: 32px;
            padding-top: 20px;
            text-align: center;
            color: #8293ab;
            font-size: 13px;
        }

        @media (max-width: 900px) {
            .navbar { padding: 14px 0; }
            .navbar-inner { align-items: flex-start; flex-direction: column; }
            .nav-links { gap: 14px; }
            .hero h1 { font-size: 38px; }
            .saved-card { align-items: flex-start; }
            .footer-grid { grid-template-columns: 1fr 1fr; }
        }

        @media (max-width: 600px) {
            .nav-links { gap: 12px; }
            .nav-links a { font-size: 12px; }
            .hero { padding: 36px 0; }
            .hero h1 { font-size: 32px; }
            .hero p { font-size: 15px; }
            .main { margin-top: 32px; }
            .saved-card { flex-wrap: wrap; }
            .saved-image { width: 76px; height: 68px; }
            .saved-content { flex: 1; width: calc(100% - 100px); }
            .saved-content h3 { font-size: 15px; }
            .saved-actions { width: 100%; }
            .view-btn { flex: 1; }
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 24px; }
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





<section class="hero">
    <div class="hero-inner">
        <div class="hero-badge">
            <i class="fa-solid fa-bookmark"></i> IdeaSoch Saved Ideas
        </div>
        <h1>My Saved Ideas</h1>
        <p>अपने पसंदीदा Business Ideas को Save करें और बाद में आसानी से वापस देखें।</p>
    </div>
</section>

<main class="main">

    @if(session('success'))
        <div class="alert-success">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert-error">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert-error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="page-heading">
        <h2>My Saved Ideas</h2>
        <p>आपके द्वारा Save किए गए business ideas यहाँ दिखाई देंगे।</p>
    </div>

    <div class="tabs">
        <button type="button" class="tab active" id="savedTab"
                onclick="showSavedIdeas()">Saved Ideas</button>
        <button type="button" class="tab" id="compareTab"
                onclick="showCompareList()">Compare List</button>
    </div>

    <section id="savedSection">
        @if(isset($savedIdeas) && $savedIdeas->count())
            <div class="saved-list">
                @foreach($savedIdeas as $saved)
                    @php
                        $business = $saved->business;

                        $imagePath = $business->image ?? '';

                        if ($imagePath && !str_starts_with($imagePath, 'businesses/')) {
                            $imagePath = 'businesses/' . $imagePath;
                        }

                        $imageUrl = $imagePath
                            ? asset('storage/' . $imagePath)
                            : 'https://placehold.co/300x200?text=Business+Idea';
                    @endphp

                    @if($business)
                        <article class="saved-card">
                            <div class="saved-image">
                                <img
                                    src="{{ $imageUrl }}"
                                    alt="{{ $business->name }}"
                                    loading="lazy"
                                    onerror="this.onerror=null;this.src='https://placehold.co/300x200?text=Business+Idea';"
                                >
                            </div>

                            <div class="saved-content">
                                <span class="saved-category">
                                    {{ $business->category ?: ($business->business_type ?: 'Business') }}
                                </span>

                                <h3>{{ $business->name }}</h3>

                                <div class="saved-investment">
                                    <i class="fa-solid fa-indian-rupee-sign"></i>
                                    {{ number_format($business->investment_min ?? 0) }}
                                    –
                                    ₹{{ number_format($business->investment_max ?? 0) }}
                                </div>
                            </div>

                            <div class="saved-actions">
                                <a href="{{ route('business.show', $business->id) }}"
                                   class="view-btn">
                                    View Details <i class="fa-solid fa-arrow-right"></i>
                                </a>

                                <form action="{{ route('saved-ideas.remove', $business->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('क्या आप इस saved idea को हटाना चाहते हैं?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="remove-btn" title="Remove saved idea">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </article>
                    @endif
                @endforeach
            </div>
        @else
            <div class="empty-box">
                <div class="empty-icon">
                    <i class="fa-regular fa-bookmark"></i>
                </div>
                <h3>No Saved Ideas Yet</h3>
                <p>Business Ideas page से अपनी पसंद की ideas को Save करें।</p>
                <a href="{{ route('businesses') }}" class="browse-btn">
                    Browse Business Ideas
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        @endif
    </section>

    <section id="compareSection" style="display:none">
        <div class="empty-box">
            <div class="empty-icon">
                <i class="fa-solid fa-scale-balanced"></i>
            </div>
            <h3>Compare Business Ideas</h3>
            <p>Business Ideas page पर जाकर ideas को Compare में जोड़ें।</p>
            <a href="{{ route('businesses') }}" class="browse-btn">
                Browse Business Ideas
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <div class="smart-box">
        <h3>💡 Smart Business Ideas</h3>
        <p>यहाँ आप अपनी पसंदीदा business ideas को Save कर सकते हैं और बाद में उनकी details देख सकते हैं।</p>
    </div>

</main>




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
    function showSavedIdeas() {
        document.getElementById('savedSection').style.display = 'block';
        document.getElementById('compareSection').style.display = 'none';
        document.getElementById('savedTab').classList.add('active');
        document.getElementById('compareTab').classList.remove('active');
    }

    function showCompareList() {
        document.getElementById('savedSection').style.display = 'none';
        document.getElementById('compareSection').style.display = 'block';
        document.getElementById('savedTab').classList.remove('active');
        document.getElementById('compareTab').classList.add('active');
    }
</script>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>
