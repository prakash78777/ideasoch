<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IdeaSoch - Business Ideas</title>







    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />







    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />


    <link rel="stylesheet" href="{{ asset('css/home.css') }}" />


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


    <!-- ================= HERO ================= -->







    <section class="hero">




        {{-- <div class="video-bg">
            <video autoplay muted loop playsinline preload="auto">
                <source src="{{ asset('storage/businesses/idea.mp4') }}" type="video/mp4">
            </video>
        </div> --}}

        <div class="video-bg">
            <video autoplay muted loop playsinline preload="auto"
                poster="{{ asset('storage/businesses/video-poster.png') }}">
                <source src="{{ asset('storage/businesses/idea.mp4') }}" type="video/mp4">
            </video>
        </div>

        <div class="hero-inner">







            <div class="hero-badge">



                <i class="fa-solid fa-lightbulb"></i>



                Smart Business Ideas for India



            </div>







            <h1>



                अपने सपनों का



                <span>Business</span>



                अब आसान है



            </h1>







            <p>



                सही Budget, Location और आपकी Skills के अनुसार सही



                Business Idea खोजें। IdeaSoch आपको business शुरू करने



                के लिए practical information और guidance देता है।



            </p>







            <div class="hero-buttons">







                <a href="/businesses" class="hero-btn primary">



                    Find My Business



                    <i class="fa-solid fa-arrow-right"></i>



                </a>







                <a href="#ideas" class="hero-btn secondary">



                    Explore Business Ideas



                </a>







            </div>







        </div>







    </section>











    <!-- ================= FINDER ================= -->







    <div class="finder-wrapper">







        <div class="finder">







            <div class="finder-title">



                <i class="fa-solid fa-magnifying-glass"></i>



                Find Your Business



            </div>







            <div class="finder-subtitle">



                अपनी जरूरत के अनुसार सही business idea खोजें



            </div>







            <form action="{{ route('businesses') }}" method="GET">



                <div class="finder-grid">







                    <div>



                        <label>Your Budget</label>







                        <select id="budget">



                            <option value="all">Any Budget</option>



                            <option value="10000">Under ₹10K</option>



                            <option value="50000">₹10K - ₹50K</option>



                            <option value="100000">₹50K - ₹1L</option>



                            <option value="500000">₹1L - ₹5L</option>



                            <option value="1000000">₹5L - ₹10L</option>



                            <option value="5000000">₹10L - ₹50L</option>



                        </select>



                    </div>







                    <div>



                        <label>Location</label>







                        <select id="location">



                            <option value="all">Select Location</option>



                            <option value="city">City</option>



                            <option value="village">Village / Rural</option>



                            <option value="online">Online</option>



                        </select>



                    </div>







                    <div>



                        <label>Business Type</label>







                        <select id="type">



                            <option value="all">Select Type</option>



                            <option value="service">Service</option>



                            <option value="online">Online</option>



                            <option value="retail">Retail</option>



                            <option value="food">Food</option>



                            <option value="manufacturing">Manufacturing</option>



                            <option value="agriculture">Agriculture</option>



                        </select>



                    </div>







                    <div>



                        <label>Time</label>







                        <select id="time">



                            <option value="all">Select Time</option>



                            <option value="full_time">Full Time</option>



                            <option value="part_time">Part Time</option>



                        </select>



                    </div>







                </div>







                <button type="submit" class="find-button">



                    <i class="fa-solid fa-magnifying-glass"></i>



                    Find Business Ideas



                </button>



            </form>







        </div>







    </div>











    <!-- ================= CATEGORIES ================= -->







    <section class="section" id="categories">







        <div class="categories">







            <div class="section-heading">







                <h2>



                    Popular Business Categories



                </h2>







                <p>



                    Explore business ideas by category



                </p>







            </div>







            <div class="category-grid">







                @php



                $categories = [



                ['Home Business','fa-house','घर से शुरू होने वाले business'],



                ['Online Business','fa-laptop','Online और digital business'],



                ['Food Business','fa-utensils','Food और restaurant ideas'],



                ['Manufacturing','fa-industry','Small scale manufacturing'],



                ['Village Business','fa-tree','Village और rural business'],



                ['Service Business','fa-briefcase','Low investment services'],



                ['Retail Business','fa-store','Shop और retail ideas'],



                ['Low Investment','fa-indian-rupee','कम investment वाले ideas'],



                ['Real Estate','fa-building','Property और real estate'],



                ['Education','fa-graduation-cap','Education business ideas'],



                ['Technology','fa-microchip','Technology based ideas'],



                ['Agriculture','fa-seedling','Agriculture business']



                ];



                @endphp







                @foreach($categories as $category)







                <a href="/businesses" class="category-card">







                    <div class="category-icon">



                        <i class="fa-solid {{ $category[1] }}"></i>



                    </div>







                    <h5>



                        {{ $category[0] }}



                    </h5>







                    <p>



                        {{ $category[2] }}



                    </p>







                </a>







                @endforeach







            </div>







        </div>







    </section>











    <!-- ================= 100 BUSINESS IDEAS ================= -->







    <section class="section ideas-section" id="ideas">







        <div class="ideas-container">







            <div class="section-heading">







                <h2>



                    Popular Business Ideas



                </h2>







                <p>



                    आपके लिए {{ $businesses->count() }} business ideas



                </p>







            </div>











            <div class="business-grid" id="businessResults">







                @forelse($businesses->shuffle() as $business)







                <div class="business-card">







                    <!-- BUSINESS IMAGE -->



                    {{-- =========================================================
                    BUSINESS IMAGE
                    USE EXACT IMAGE SAVED IN DATABASE
                    ========================================================= --}}

                    @php
                    $imageFile = trim((string) ($business->image ?? ''));

                    if ($imageFile !== '') {

                    // New uploaded images already contain "businesses/"
                    if (str_starts_with($imageFile, 'businesses/')) {
                    $imageUrl = asset('storage/' . $imageFile);
                    } else {
                    // Old images only contain filename
                    $imageUrl = asset('storage/businesses/' . $imageFile);
                    }

                    } else {
                    $imageUrl = asset('storage/businesses/general.jpg');
                    }

                    $fallbackUrl = asset('storage/businesses/general.jpg');
                    @endphp

                    <div class="business-image">
                        <img src="{{ $imageUrl }}" alt="{{ $business->name }}" loading="eager"
                            style="width:100%; height:100%; object-fit:cover; display:block;"
                            onerror="this.onerror=null; this.src='{{ $fallbackUrl }}';">
                    </div>




                    <!-- CONTENT -->







                    <div class="business-content">







                        <span class="business-type">







                            {{ ucfirst(str_replace('\_', ' ', $business->business_type ?? 'Business')) }}







                        </span>







                        <h5>



                            {{ $business->name }}



                        </h5>







                        <p class="business-description">



                            {{ $business->description }}



                        </p>











                        <div class="business-meta">







                            <div class="meta-item">







                                <span>



                                    Investment



                                </span>







                                <strong>



                                    ₹{{ number_format($business->investment_min) }}



                                    -



                                    ₹{{ number_format($business->investment_max) }}



                                </strong>







                            </div>











                            <div class="meta-item text-end">







                                <span>



                                    Profit



                                </span>







                                <strong>



                                    {{ $business->profit ?? '-' }}



                                </strong>







                            </div>







                        </div>









                        <div class="btns">

                            <a href="{{ route('business.show', $business->id) }}" class="details-link">
                                View Details
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                            <a href="{{ route('businesses') }}" class="details-link">
                                All Ideas
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>
                    </div>
                </div>

                @empty







                <div style="grid-column:1/-1;text-align:center;padding:60px;">







                    <i class="fa-solid fa-box-open" style="font-size:45px;color:#94a3b8;">



                    </i>







                    <h4 class="mt-3">



                        No Business Ideas Found



                    </h4>







                </div>







                @endforelse







            </div>







        </div>







    </section>











    <!-- ================= WHY IDEASOCH ================= -->







    <section class="section why-section">







        <div class="why-container">







            <div class="section-heading">







                <h2>



                    Why IdeaSoch?



                </h2>







                <p>



                    Not just business ideas, complete planning



                </p>







            </div>











            <div class="why-grid">







                <div class="why-card">







                    <div class="why-icon">



                        <i class="fa-solid fa-wallet"></i>



                    </div>







                    <h5>



                        Investment Details



                    </h5>







                    <p>



                        Understand how much investment you may need



                        to start a business.



                    </p>







                </div>











                <div class="why-card">







                    <div class="why-icon">



                        <i class="fa-solid fa-chart-line"></i>



                    </div>







                    <h5>



                        Profit Estimate



                    </h5>







                    <p>



                        Understand estimated monthly expenses,



                        revenue and profit.



                    </p>







                </div>











                <div class="why-card">







                    <div class="why-icon">



                        <i class="fa-solid fa-calculator"></i>



                    </div>







                    <h5>



                        Business Calculator



                    </h5>







                    <p>



                        Calculate investment and estimated profit



                        for your business.



                    </p>







                </div>











                <div class="why-card">







                    <div class="why-icon">



                        <i class="fa-solid fa-lightbulb"></i>



                    </div>







                    <h5>



                        Smart Suggestions



                    </h5>







                    <p>



                        Get business ideas based on your budget



                        and location.



                    </p>







                </div>







            </div>







        </div>







    </section>






    <!-- AI Business Assistant Section -->
    <section class="ai-assistant-section">
        <div class="ai-assistant-content">
            <div class="ai-assistant-text">
                <h3>Not sure what to start?</h3>
                <p>Use our AI Assistant to get personalized business ideas.</p>
            </div>

            <a href="{{ route('ai.chat') }}" class="ai-assistant-btn">
                Chat with AI
                <i class="fa-solid fa-arrow-right"></i>
            </a>

            <div class="ai-assistant-robot">
                <img src="{{ asset('storage/businesses/robot.jpg') }}" alt="AI Assistant Robot">
            </div>
        </div>
    </section>





    <!-- ================= CTA ================= -->







    <section class="cta-section" id="about">


        <div class="container">
            <div class="row">

                <div class="col-md-6">

                    <div class="cta">







                        <h2>



                            Find Your Business Today



                        </h2>







                        <p>



                            Choose your budget, location and business type



                            to find the right business idea with IdeaSoch.



                        </p>







                        <a href="/businesses">



                            Find My Business



                            <i class="fa-solid fa-arrow-right"></i>



                        </a>







                    </div>
                </div>



                <div class="col-md-6">

                    <div class="calculator">

                        <!-- Display -->
                        <div class="display" id="display">0</div>

                        <!-- Buttons -->
                        <div class="buttons">

                            <button class="function" onclick="clearDisplay()">CHECK</button>
                            <button class="function" onclick="deleteLast()">BACK</button>
                            <button class="function" onclick="autoRound()">AUTO<br>ROUND</button>
                            <button class="function" onclick="setPercent()">%</button>

                            <button class="function" onclick="memoryClear()">MRC</button>
                            <button class="function" onclick="memoryMinus()">M-</button>
                            <button class="function" onclick="memoryPlus()">M+</button>
                            <button class="operator" onclick="percentage()">%</button>

                            <button onclick="appendNumber('7')">7</button>
                            <button onclick="appendNumber('8')">8</button>
                            <button onclick="appendNumber('9')">9</button>
                            <button class="operator" onclick="appendOperator('×')">×</button>

                            <button onclick="appendNumber('4')">4</button>
                            <button onclick="appendNumber('5')">5</button>
                            <button onclick="appendNumber('6')">6</button>
                            <button class="operator" onclick="appendOperator('−')">−</button>

                            <button onclick="appendNumber('1')">1</button>
                            <button onclick="appendNumber('2')">2</button>
                            <button onclick="appendNumber('3')">3</button>
                            <button class="operator plus" onclick="appendOperator('+')">+</button>

                            <button onclick="appendNumber('0')">0</button>
                            <button onclick="appendNumber('.')">.</button>
                            <button class="equal" onclick="calculate()">=</button>

                        </div>
                    </div>
                </div>



            </div>


    </section>











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




    <div class="topHead leftHead d-flex gap-3 align-items-center">
        <a href="https://api.whatsapp.com/send?phone=919829066382&text=Hi-IdeaSoch." class="whatsappBtn" target="_blank"
            rel="noopener noreferrer" aria-label="Contact us on WhatsApp">

            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>


    <!-- ================= CHAT BUTTON ================= -->








    <script>
        let currentValue = "";
let previousValue = "";
let operator = "";
let memory = 0;

const display = document.getElementById("display");


function updateDisplay(value) {

    if (value === "") {
        display.innerText = "0";
    } else {
        display.innerText = value;
    }

}


/* Number */

function appendNumber(number) {

    if (number === ".") {

        let lastNumber =
            currentValue.split(/[+\-×÷]/).pop();

        if (lastNumber.includes(".")) {
            return;
        }
    }

    currentValue += number;

    updateDisplay(currentValue);
}


/* Operator */

function appendOperator(op) {

    if (currentValue === "") {
        return;
    }

    if (
        currentValue.endsWith("+") ||
        currentValue.endsWith("−") ||
        currentValue.endsWith("×") ||
        currentValue.endsWith("÷")
    ) {
        return;
    }

    currentValue += op;

    updateDisplay(currentValue);
}


/* Calculate */

function calculate() {

    if (currentValue === "") {
        return;
    }

    try {

        let expression =
            currentValue
                .replace(/×/g, "*")
                .replace(/÷/g, "/")
                .replace(/−/g, "-");

        let result =
            Function(
                '"use strict"; return (' +
                expression +
                ')'
            )();

        if (!Number.isFinite(result)) {
            throw new Error();
        }

        result =
            Math.round(
                result * 100000000
            ) / 100000000;

        currentValue =
            result.toString();

        updateDisplay(currentValue);

    } catch {

        display.innerText = "ERROR";

        currentValue = "";

    }
}


/* Clear */

function clearDisplay() {

    currentValue = "";

    previousValue = "";

    operator = "";

    updateDisplay("");

}


/* Delete */

function deleteLast() {

    currentValue =
        currentValue.slice(0, -1);

    updateDisplay(currentValue);

}


/* Percentage */

function percentage() {

    if (currentValue === "") {
        return;
    }

    let match =
        currentValue.match(
            /(\d+(?:\.\d+)?)$/
        );

    if (!match) {
        return;
    }

    let number =
        parseFloat(match[1]);

    let percent =
        number / 100;

    currentValue =
        currentValue.slice(
            0,
            -match[1].length
        ) + percent;

    updateDisplay(currentValue);
}


/* % Button */

function setPercent() {

    percentage();

}


/* Auto Round */

function autoRound() {

    if (currentValue === "") {
        return;
    }

    let number =
        parseFloat(currentValue);

    if (!isNaN(number)) {

        currentValue =
            Math.round(number).toString();

        updateDisplay(currentValue);
    }

}


/* Memory Clear / Recall */

function memoryClear() {

    memory = 0;

}


/* Memory Plus */

function memoryPlus() {

    let number =
        parseFloat(currentValue);

    if (!isNaN(number)) {

        memory += number;

    }

}


/* Memory Minus */

function memoryMinus() {

    let number =
        parseFloat(currentValue);

    if (!isNaN(number)) {

        memory -= number;

    }

}


/* Keyboard Support */

document.addEventListener(
    "keydown",
    function (event) {

        const key = event.key;

        if (
            key >= "0" &&
            key <= "9"
        ) {

            appendNumber(key);

        }

        else if (
            key === "+" ||
            key === "-" ||
            key === "*" ||
            key === "/"
        ) {

            let op = key;

            if (key === "*") op = "×";
            if (key === "/") op = "÷";
            if (key === "-") op = "−";

            appendOperator(op);

        }

        else if (key === ".") {

            appendNumber(".");

        }

        else if (key === "Enter" || key === "=") {

            calculate();

        }

        else if (key === "Backspace") {

            deleteLast();

        }

        else if (key === "Escape") {

            clearDisplay();

        }

        else if (key === "%") {

            percentage();

        }

    }
);
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>



</html>