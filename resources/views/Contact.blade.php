<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - IdeaSoch</title>
    <meta name="description" content="Contact IdeaSoch for business ideas, support and enquiries.">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />


    <link rel="stylesheet" href="{{ asset('css/home.css') }}" />


    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f3f7fc;
            color: #12315b;
        }

        a {
            text-decoration: none;
        }

        .navbar-light .navbar-nav .nav-link {
     color: #092d55;
}
         

   
        .hero {
            padding: 65px 7%;
            color: white;
            background: linear-gradient(110deg, #284d91, #3867ed);
        }

        .hero small {
            font-size: 14px;
        }

        .hero h1 {
            font-size: 44px;
            margin: 18px 0 12px;
        }

        .hero p {
            line-height: 1.8;
            max-width: 650px;
        }

        .container {
            max-width: 1150px;
            margin: 55px auto;
            padding: 0 22px 65px;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 35px;
        }

        .section-heading h2 {
            font-size: 30px;
            margin-bottom: 12px;
        }

        .section-heading p {
            color: #64748b;
            line-height: 1.8;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 0.85fr 1.4fr;
            gap: 28px;
            align-items: start;
        }

        .contact-info,
        .contact-form {
            background: white;
            border: 1px solid #dbe5f1;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(20, 50, 90, .04);
        }

        .contact-info h3,
        .contact-form h3 {
            font-size: 22px;
            margin-bottom: 12px;
        }

        .description {
            color: #64748b;
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .info-item {
            display: flex;
            gap: 15px;
            padding: 17px 0;
            border-bottom: 1px solid #edf1f7;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-icon {
            min-width: 44px;
            height: 44px;
            border-radius: 11px;
            background: #edf4ff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 21px;
        }

        .info-item h4 {
            margin-bottom: 7px;
            font-size: 14px;
        }

        .info-item p,
        .info-item a {
            color: #64748b;
            font-size: 13px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .field {
            margin-bottom: 18px;
        }

        .field label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 9px;
        }

        .field input,
        .field select,
        .field textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font: inherit;
            font-size: 14px;
            color: #12315b;
            outline: none;
            background: #fff;
        }

        .field textarea {
            min-height: 140px;
            resize: vertical;
        }

        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            border-color: #3867ed;
            box-shadow: 0 0 0 3px rgba(56, 103, 237, .1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .submit-btn {
            width: 100%;
            padding: 14px 20px;
            border: none;
            border-radius: 9px;
            background: #3867ed;
            color: white;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .submit-btn:hover {
            background: #2453d4;
            transform: translateY(-1px);
        }

        .alert {
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.7;
        }

        .success {
            color: #166534;
            background: #dcfce7;
        }

        .error {
            color: #991b1b;
            background: #fee2e2;
        }

        .footer {
            background: #091c36;
            color: #d5deeb;
            padding: 35px 7%;
            text-align: center;
            font-size: 13px;
        }

        .footer strong {
            font-size: 18px;
        }

        .footer p {
            margin-top: 12px;
            line-height: 1.8;
        }

        @media (max-width: 850px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 16px 5%;
            }

            .nav-links {
                gap: 14px;
            }
        }

        @media (max-width: 550px) {
            .hero {
                padding: 42px 6%;
            }

            .hero h1 {
                font-size: 34px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .contact-info,
            .contact-form {
                padding: 22px;
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





<section class="hero">
    <small>✉️ IdeaSoch Support</small>
    <h1>Contact Us</h1>
    <p>
        Have a question or need help finding the right business idea?
        Send us a message. We would love to hear from you.
    </p>
</section>

<main class="container">
    <div class="section-heading">
        <h2>Get In Touch</h2>
        <p>
            अपने सवाल, सुझाव या business enquiry के लिए हमें message भेजें।
        </p>
    </div>

    <div class="contact-grid">

        <section class="contact-info">
            <h3>Contact Information</h3>
            <p class="description">
                Contact करें और IdeaSoch की team से जुड़ें।
            </p>

            <div class="info-item">
                <div class="info-icon">✉️</div>
                <div>
                    <h4>Email Address</h4>
                    <p>narwani1975@gmail.com</p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">📞</div>
                <div>
                    <h4>Phone Number</h4>
                    <p> +91 98290 66382</p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">📍</div>
                <div>
                    <h4>Our Location</h4>
                    <p>Jaipur, Rajasthan, India</p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">🕒</div>
                <div>
                    <h4>Working Hours</h4>
                    <p>Monday – Saturday</p>
                </div>
            </div>
        </section>

        <section class="contact-form">
            <h3>Send Us a Message</h3>
            {{-- <p class="description">
                नीचे form भरें। सभी required fields भरना जरूरी है।
            </p> --}}

            @if(session('success'))
                <div class="alert success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert error">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert error">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

<form
    id="contactForm"
    action="{{ route('contact.submit') }}"
    method="POST"
>
    @csrf


                <div id="contactSuccess"
     class="alert success"
     style="display:none;">
</div>

                <div class="form-row">
                    <div class="field">
                        <label for="name">Full Name *</label>
                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            maxlength="100"
                            placeholder="Enter your name"
                            required
                        >
                    </div>

                    <div class="field">
                        <label for="email">Email Address *</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            maxlength="255"
                            placeholder="you@example.com"
                            required
                        >
                    </div>
                </div>

                <div class="form-row">
                    <div class="field">
                        <label for="phone">Phone Number</label>
                        <input
                            id="phone"
                            type="tel"
                            name="phone"
                            value="{{ old('phone') }}"
                            maxlength="20"
                            placeholder="Enter phone number"
                        >
                    </div>

                    <div class="field">
                        <label for="subject">Subject *</label>
                        <select id="subject" name="subject" required>
                            <option value="">Select subject</option>
                            <option value="Business Enquiry" @selected(old('subject') == 'Business Enquiry')>Business Enquiry</option>
                            <option value="Website Support" @selected(old('subject') == 'Website Support')>Website Support</option>
                            <option value="Suggestion" @selected(old('subject') == 'Suggestion')>Suggestion</option>
                            <option value="Other" @selected(old('subject') == 'Other')>Other</option>
                        </select>
                    </div>
                </div>

                <div class="field">
                    <label for="message">Your Message *</label>
                    <textarea
                        id="message"
                        name="message"
                        maxlength="5000"
                        placeholder="Write your message here..."
                        required
                    >{{ old('message') }}</textarea>
                </div>

               <button type="submit" id="contactSubmitBtn" class="submit-btn">
    Send Message →
</button>
            </form>
        </section>

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




<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contactForm");
    const btn = document.getElementById("contactSubmitBtn");

    if (!form) return;

    form.addEventListener("submit", function () {
        if (btn) {
            btn.disabled = true;
            btn.innerText = "Submitting...";
        }
    });
});
</script>



 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



</body>
</html>