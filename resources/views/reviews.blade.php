<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Reviews | IdeaSoch</title>


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

       <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #12345a;
            background: #f7faff;
        }

        .reviews-hero {
            /* padding: 55px 20px 35px; */
            padding: 150px 0px;
            text-align: center;
            /* background: linear-gradient(135deg, #073768, #0877e9); */
            color: white;
        }

        .reviews-hero h1 {
            margin: 0 0 12px;
            font-size: clamp(28px, 4vw, 32px);
        }

        .reviews-hero p {
            margin: 0;
            font-size: 16px;
            line-height: 30px;
        }

        .reviews-container {
            max-width: 1250px;
            width: 92%;
            margin: 40px auto 65px;
        }

        .section-heading {
            margin-bottom: 25px;
            text-align: center;
        }

        .section-heading h2 {
            margin: 0 0 10px;
            font-size: 30px;
        }

        .section-heading p {
            margin: 0;
            color: #64748b;
            line-height: 1.6;
        }

        .review-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .review-card {
            display: flex;
            flex-direction: column;
            min-width: 0;
            padding: 24px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 5px 18px rgba(15, 45, 80, .09);
        }

        .review-user {
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 0;
        }

        .review-photo {
            width: 60px;
            height: 60px;
            flex-shrink: 0;
            border-radius: 50%;
            object-fit: cover;
            background: #e2e8f0;
        }

        .review-user-info {
            min-width: 0;
        }

        .review-user-info h3 {
            margin: 0 0 6px;
            color: #102d4e;
            font-size: 17px;
            overflow-wrap: anywhere;
        }

        .review-city {
            color: #64748b;
            font-size: 14px;
            overflow-wrap: anywhere;
        }

        .stars {
            margin: 18px 0 12px;
            color: #ffa500;
            font-size: 23px;
            letter-spacing: 2px;
        }

        .review-text {
            margin: 0;
            color: #536b86;
            font-size: 15px;
            line-height: 1.8;
            white-space: pre-wrap;
            overflow-wrap: anywhere;
        }

        .empty-reviews {
            grid-column: 1 / -1;
            padding: 35px 20px;
            text-align: center;
            background: white;
            border: 1px dashed #cbd5e1;
            border-radius: 14px;
            color: #64748b;
        }

        .review-form-section {
            max-width: 850px;
            margin: 60px auto 0;
        }

        .review-form {
            padding: 32px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 5px 22px rgba(15, 45, 80, .10);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
            color: #17385e;
        }

        .form-control {
            display: block;
            width: 100%;
            min-height: 46px;
            padding: 12px;
            border: 1px solid #b9c7d8;
            border-radius: 8px;
            background: white;
            color: #12345a;
            font-family: inherit;
            font-size: 15px;
        }

        textarea.form-control {
            min-height: 145px;
            resize: vertical;
        }

        .form-control:focus {
            outline: none;
            border-color: #0877e9;
            box-shadow: 0 0 0 3px rgba(8, 119, 233, .12);
        }

        .form-note {
            margin-top: 7px;
            color: #64748b;
            font-size: 12px;
        }

        .error-list {
            margin-bottom: 22px;
            padding: 14px 18px;
            border-radius: 8px;
            background: #fee2e2;
            color: #b91c1c;
        }

        .success-message {
            margin-bottom: 22px;
            padding: 14px 18px;
            border-radius: 8px;
            background: #dcfce7;
            color: #166534;
        }

        .submit-review {
            display: block;
            margin: 5px auto 0;
            padding: 14px 28px;
            border: none;
            border-radius: 9px;
            background: #ff5b0a;
            color: white;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: background .2s, transform .2s;
        }

        .submit-review:hover {
            background: #e64a00;
            transform: translateY(-2px);
        }

        .approval-note {
            margin-top: 18px;
            text-align: center;
            color: #64748b;
            font-size: 13px;
            line-height: 1.7;
        }

    .reviews-hero{
       background: linear-gradient(90deg, rgb(0 0 0 / 53%), rgb(0 0 0 / 51%)), url(/storage/businesses/istockpdshot.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: #fff;
    /* padding: 40px 20px; */
    /* height: 400px; */
}

        @media (max-width: 900px) {
            .review-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 600px) {
            .review-grid {
                grid-template-columns: 1fr;
            }

            .review-form {
                padding: 22px 16px;
            }

            .reviews-container {
                width: 94%;
            }

            .section-heading h2 {
                font-size: 25px;
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



    
   


    {{-- Website navbar, if your project has a shared navbar --}}
    @includeIf('partials.navbar')

    <header class="reviews-hero">
        <h1>Customer Reviews</h1>
        <p>Real experiences from people exploring business opportunities with IdeaSoch.</p>
    </header>



    <main class="reviews-container">

        <section>
            <div class="section-heading">
                <h2>What Our Visitors Say</h2>
                <p>Read reviews approved by our team.</p>
            </div>

            <div class="review-grid">

                @forelse ($reviews as $review)
                    <article class="review-card">

                        <div class="review-user">

                            @if ($review->photo)
                                <img
                                    class="review-photo"
                                    src="{{ asset('storage/' . $review->photo) }}"
                                    alt="{{ $review->name }}"
                                    loading="lazy"
                                >
                            @else
                                <div
                                    class="review-photo"
                                    style="display:flex;align-items:center;justify-content:center;font-size:22px;font-weight:bold;color:#0877e9;"
                                    aria-label="Default profile image"
                                >
                                    {{ strtoupper(substr($review->name, 0, 1)) }}
                                </div>
                            @endif

                            <div class="review-user-info">
                                <h3>{{ $review->name }}</h3>
                                <div class="review-city">{{ $review->city }}</div>
                            </div>

                        </div>

                        <div
                            class="stars"
                            aria-label="{{ $review->rating }} out of 5 stars"
                        >
                            @for ($i = 1; $i <= 5; $i++)
                                {{ $i <= $review->rating ? '★' : '☆' }}
                            @endfor
                        </div>

                        <p class="review-text">{{ $review->review }}</p>

                    </article>
                @empty
                    <div class="empty-reviews">
                        <h3>No approved reviews yet</h3>
                        <p>Be the first to share your experience with IdeaSoch!</p>
                    </div>
                @endforelse

            </div>
        </section>

        <section class="review-form-section">

            <div class="section-heading">
                <h2>Write a Review</h2>
                <p>Tell us about your experience with IdeaSoch.</p>
            </div>

            <div class="review-form">

                @if (session('success'))
                    <div class="success-message" role="status">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="error-list" role="alert">
                        <strong>Please correct the following:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form
                    action="{{ route('reviews.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf

                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input
                            class="form-control"
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            maxlength="100"
                            placeholder="Enter your name"
                            autocomplete="name"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="city">City *</label>
                        <input
                            class="form-control"
                            type="text"
                            id="city"
                            name="city"
                            value="{{ old('city') }}"
                            maxlength="100"
                            placeholder="Enter your city"
                            autocomplete="address-level2"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="photo">Profile Photo (optional)</label>
                        <input
                            class="form-control"
                            type="file"
                            id="photo"
                            name="photo"
                            accept=".jpg,.jpeg,.png,.webp"
                        >
                        <div class="form-note">
                            JPG, JPEG, PNG or WEBP. Maximum size: 2 MB.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rating">Star Rating *</label>
                        <select
                            class="form-control"
                            id="rating"
                            name="rating"
                            required
                        >
                            <option value="">Select a rating</option>
                            <option value="5" @selected(old('rating') == '5')>
                                ★★★★★ - Excellent
                            </option>
                            <option value="4" @selected(old('rating') == '4')>
                                ★★★★☆ - Very Good
                            </option>
                            <option value="3" @selected(old('rating') == '3')>
                                ★★★☆☆ - Good
                            </option>
                            <option value="2" @selected(old('rating') == '2')>
                                ★★☆☆☆ - Fair
                            </option>
                            <option value="1" @selected(old('rating') == '1')>
                                ★☆☆☆☆ - Poor
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="review">Your Review *</label>
                        <textarea
                            class="form-control"
                            id="review"
                            name="review"
                            rows="5"
                            maxlength="2000"
                            placeholder="Write your review..."
                            required
                        >{{ old('review') }}</textarea>
                    </div>

                    <button class="submit-review" type="submit">
                        Submit Review
                    </button>

                    <p class="approval-note">
                        Thank you for your feedback! Your review will appear
                        publicly after it has been reviewed and approved by our team.
                    </p>

                </form>
            </div>
        </section>

    </main>

    
    {{-- Website footer, if your project has a shared footer --}}
    @includeIf('partials.footer')


    
 



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

    

</body>
</html>
