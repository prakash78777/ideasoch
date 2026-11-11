<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Business Calculator - IdeaSoch</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

        <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f8fc;
            color: #0b1736;
        }

        a {
            text-decoration: none;
        }

        /* ================= NAVBAR ================= */

        .navbar-custom {
            height: 76px;
            background: #ffffff;
            border-bottom: 1px solid #e5eaf2;
            display: flex;
            align-items: center;
        }

        .navbar-inner {
            max-width: 1180px;
            width: 100%;
            margin: auto;
            padding: 0 20px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 28px;
            font-weight: 800;
            color: #0b1736;
        }

        .logo i {
            color: #ffc928;
            margin-right: 8px;
        }

        .logo span {
            color: #1264e8;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-links a {
            color: #18233f;
            font-size: 14px;
            font-weight: 600;
        }

        .nav-links a:hover {
            color: #1264e8;
        }

        .nav-login {
            border: 1px solid #1264e8;
            color: #0b1736 !important;
            padding: 10px 20px;
            border-radius: 7px;
        }

        .nav-signup {
            background: #1264e8;
            color: white !important;
            padding: 11px 20px;
            border-radius: 7px;
        }

        /* ================= HERO ================= */

        .hero {
            background: linear-gradient(
                110deg,
                #234985,
                #386ee8
            );

            color: white;
            padding: 58px 20px 65px;
        }

        .hero-inner {
            max-width: 1180px;
            margin: auto;
        }

        .hero-label {
            font-size: 14px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .hero-label i {
            color: #ffd21c;
            margin-right: 7px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 800;
            margin: 0 0 15px;
        }

        .hero p {
            max-width: 720px;
            font-size: 18px;
            line-height: 1.7;
            margin: 0;
        }

        /* ================= MAIN ================= */

        .calculator-section {
            padding: 55px 20px 75px;
        }

        .calculator-container {
            max-width: 1100px;
            margin: auto;
        }

        .section-title {
            margin-bottom: 25px;
        }

        .section-title h2 {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .section-title p {
            color: #64748b;
            margin: 0;
            font-size: 15px;
        }

        /* ================= CALCULATOR CARD ================= */

        .calculator-card {
            background: #ffffff;
            border: 1px solid #dce5f0;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.04);
        }

        .calculator-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .form-side {
            padding-right: 15px;
        }

        .result-side {
            padding-left: 15px;
            border-left: 1px solid #e2e8f0;
        }

        .form-title {
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 22px;
        }

        .input-group-custom {
            margin-bottom: 18px;
        }

        .input-group-custom label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 7px;
            color: #334155;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper .rupee {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-weight: 600;
        }

        .input-wrapper input {
            width: 100%;
            height: 48px;
            border: 1px solid #d7e0eb;
            border-radius: 7px;
            padding: 0 14px 0 34px;
            outline: none;
            font-size: 15px;
            color: #0b1736;
        }

        .input-wrapper input:focus {
            border-color: #1264e8;
            box-shadow: 0 0 0 3px rgba(18, 100, 232, 0.08);
        }

        .calculate-btn {
            width: 100%;
            border: none;
            background: #1264e8;
            color: white;
            height: 48px;
            border-radius: 7px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 5px;
        }

        .calculate-btn:hover {
            background: #0958d6;
        }

        /* ================= RESULTS ================= */

        .result-box {
            border-radius: 10px;
            padding: 17px 20px;
            margin-bottom: 13px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }

        .result-box.highlight {
            background: #ecfdf5;
            border-color: #d1fae5;
        }

        .result-label {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 5px;
        }

        .result-value {
            font-size: 22px;
            font-weight: 800;
            color: #0b1736;
        }

        .result-box.highlight .result-value {
            color: #059669;
        }

        .break-even {
            color: #059669;
        }

        /* ================= INFO ================= */

        .calculator-info {
            margin-top: 22px;
            background: #e9fbf5;
            border: 1px solid #c8f0e3;
            border-radius: 10px;
            padding: 20px 25px;
            text-align: center;
        }

        .calculator-info h4 {
            margin: 0 0 8px;
            font-size: 17px;
            font-weight: 800;
        }

        .calculator-info h4 i {
            color: #f5c400;
            margin-right: 5px;
        }

        .calculator-info p {
            margin: 0;
            color: #547080;
            font-size: 14px;
        }

        /* ================= FOOTER ================= */

        /* ================= RESPONSIVE ================= */

        @media (max-width: 900px) {

            .nav-links {
                gap: 12px;
            }

            .nav-links a {
                font-size: 12px;
            }

            .calculator-grid {
                grid-template-columns: 1fr;
            }

            .form-side {
                padding-right: 0;
            }

            .result-side {
                padding-left: 0;
                border-left: none;
                border-top: 1px solid #e2e8f0;
                padding-top: 25px;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }

        }

        @media (max-width: 600px) {

            .navbar-custom {
                height: auto;
                padding: 15px 0;
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
                font-size: 34px;
            }

            .hero p {
                font-size: 15px;
            }

            .calculator-card {
                padding: 20px;
            }

            .section-title h2 {
                font-size: 27px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 25px;
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


<!-- ================= HERO ================= -->

<section class="hero">

    <div class="hero-inner">

        <div class="hero-label">

            <i class="fa-solid fa-calculator"></i>

            IdeaSoch Business Calculator

        </div>


        <h1>
            Business Profit Calculator
        </h1>


        <p>

            अपना investment, monthly expense, product price और
            customers डालें और अपने estimated revenue और profit
            को आसानी से calculate करें।

        </p>

    </div>

</section>


<!-- ================= MAIN ================= -->

<section class="calculator-section">

    <div class="calculator-container">


        <div class="section-title">

            <h2>
                Business Profit Calculator
            </h2>

            <p>
                अपने business की अनुमानित monthly income और profit calculate करें।
            </p>

        </div>


        <div class="calculator-card">

            <div class="calculator-grid">


                <!-- ================= FORM ================= -->

                <div class="form-side">

                    <h3 class="form-title">
                        Enter Business Details
                    </h3>


                    <form id="calculatorForm">


                        <div class="input-group-custom">

                            <label>
                                Investment Amount
                            </label>

                            <div class="input-wrapper">

                                <span class="rupee">
                                    ₹
                                </span>

                                <input
                                    type="number"
                                    id="investment"
                                    value="100000"
                                    min="0"
                                    placeholder="100000"
                                    required
                                >

                            </div>

                        </div>


                        <div class="input-group-custom">

                            <label>
                                Monthly Expense
                            </label>

                            <div class="input-wrapper">

                                <span class="rupee">
                                    ₹
                                </span>

                                <input
                                    type="number"
                                    id="expense"
                                    value="30000"
                                    min="0"
                                    placeholder="30000"
                                    required
                                >

                            </div>

                        </div>


                        <div class="input-group-custom">

                            <label>
                                Product / Service Price
                            </label>

                            <div class="input-wrapper">

                                <span class="rupee">
                                    ₹
                                </span>

                                <input
                                    type="number"
                                    id="price"
                                    value="200"
                                    min="0"
                                    placeholder="200"
                                    required
                                >

                            </div>

                        </div>


                        <div class="input-group-custom">

                            <label>
                                Customers Per Month
                            </label>

                            <div class="input-wrapper">

                                <input
                                    type="number"
                                    id="customers"
                                    value="500"
                                    min="0"
                                    placeholder="500"
                                    style="padding-left:14px;"
                                    required
                                >

                            </div>

                        </div>


                        <button
                            type="submit"
                            class="calculate-btn">

                            <i class="fa-solid fa-calculator"></i>

                            Calculate

                        </button>


                    </form>

                </div>


                <!-- ================= RESULTS ================= -->

                <div class="result-side">

                    <h3 class="form-title">
                        Estimated Results
                    </h3>


                    <div class="result-box highlight">

                        <div class="result-label">
                            Estimated Monthly Revenue
                        </div>

                        <div
                            class="result-value"
                            id="revenueResult">

                            ₹1,00,000

                        </div>

                    </div>


                    <div class="result-box">

                        <div class="result-label">
                            Total Monthly Expense
                        </div>

                        <div
                            class="result-value"
                            id="expenseResult">

                            ₹30,000

                        </div>

                    </div>


                    <div class="result-box highlight">

                        <div class="result-label">
                            Estimated Profit
                        </div>

                        <div
                            class="result-value"
                            id="profitResult">

                            ₹70,000

                        </div>

                    </div>


                    <div class="result-box">

                        <div class="result-label">
                            Break-even Point
                        </div>

                        <div
                            class="result-value break-even"
                            id="breakEvenResult">

                            2 - 3 Months

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- ================= INFO BOX ================= -->

        <div class="calculator-info">

            <h4>

                <i class="fa-regular fa-lightbulb"></i>

                Smart Business Calculator

            </h4>

            <p>

                यह कैलकुलेटर आपको अनुमानित लाभ और
                ब्रेक-ईवन पॉइंट बताएगा।

            </p>

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





<!-- ================= JAVASCRIPT ================= -->

<script>

    const form = document.getElementById('calculatorForm');

    const revenueResult =
        document.getElementById('revenueResult');

    const expenseResult =
        document.getElementById('expenseResult');

    const profitResult =
        document.getElementById('profitResult');

    const breakEvenResult =
        document.getElementById('breakEvenResult');


    function formatRupee(number) {

        return '₹' + Number(number).toLocaleString('en-IN');

    }


    function calculateBusiness() {

        const investment =
            Number(document.getElementById('investment').value) || 0;

        const expense =
            Number(document.getElementById('expense').value) || 0;

        const price =
            Number(document.getElementById('price').value) || 0;

        const customers =
            Number(document.getElementById('customers').value) || 0;


        const revenue =
            price * customers;

        const profit =
            revenue - expense;


        let breakEven = 'Not Profitable';


        if (profit > 0) {

            const months =
                Math.ceil(investment / profit);


            if (months <= 1) {

                breakEven = '1 Month';

            } else if (months <= 3) {

                breakEven = '2 - 3 Months';

            } else if (months <= 6) {

                breakEven = '3 - 6 Months';

            } else if (months <= 12) {

                breakEven = '6 - 12 Months';

            } else {

                breakEven = months + ' Months';

            }

        }


        revenueResult.textContent =
            formatRupee(revenue);

        expenseResult.textContent =
            formatRupee(expense);

        profitResult.textContent =
            formatRupee(profit);

        breakEvenResult.textContent =
            breakEven;


        if (profit < 0) {

            profitResult.style.color = '#dc2626';

        } else {

            profitResult.style.color = '#059669';

        }

    }


    form.addEventListener('submit', function(event) {

        event.preventDefault();

        calculateBusiness();

    });


    calculateBusiness();

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>