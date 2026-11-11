
<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AI Chat - IdeaSoch</title>

 <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">






<link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f8fc;
            color: #082b5c;
        }

        a { text-decoration: none; }

.navbar-light .navbar-nav .nav-link {
       color: #092d55 !important;
    font-size: 14px;
    font-weight: 600;
}

        .hero {
            background: linear-gradient(115deg, #123e80, #176ce7);
            color: white;
            padding: 55px 6%;
        }

        .hero-inner { max-width: 1200px; margin: auto; }
        .hero small { font-size: 14px; }

        .hero h1 {
            font-size: 42px;
            margin: 18px 0 10px;
            font-weight: 800;
        }

        .hero p {
            font-size: 17px;
            max-width: 760px;
            line-height: 1.7;
        }

        .chat-wrapper {
            max-width: 1150px;
            margin: 40px auto 70px;
            padding: 0 20px;
        }

        .chat-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 300px;
            gap: 25px;
            align-items: start;
        }

        .chat-card, .side-card {
            background: #fff;
            border: 1px solid #dce7f3;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(20, 65, 110, .07);
        }

        .chat-header {
            padding: 20px 24px;
            border-bottom: 1px solid #e5edf6;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .ai-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #e9f3ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            flex-shrink: 0;
        }

        .chat-header h2 { font-size: 20px; margin-bottom: 4px; }
        .online { color: #16a05d; font-size: 13px; }

        .messages {
            height: 540px;
            overflow-y: auto;
            padding: 25px;
            background: #fbfdff;
        }

        .message {
            display: flex;
            margin-bottom: 22px;
        }

        .message.user { justify-content: flex-end; }
        .message.ai { justify-content: flex-start; }

        .message-box {
            max-width: 88%;
            padding: 16px 18px;
            border-radius: 13px;
            line-height: 1.65;
            font-size: 14px;
            overflow-wrap: anywhere;
        }

        .message.user .message-box {
            background: #096de5;
            color: #fff;
            border-bottom-right-radius: 3px;
        }

        .message.ai .message-box {
            background: #fff;
            color: #17385e;
            border: 1px solid #dce7f3;
            border-bottom-left-radius: 3px;
        }

        .message-box ol, .message-box ul { margin: 10px 0 0 22px; }
        .message-box li { margin-bottom: 12px; }
        .message-box strong { color: #07376f; }
        .message.user .message-box strong { color: white; }

        .suggestions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 15px;
        }

        .suggestion {
            border: 1px solid #bcd5f2;
            background: #f4f9ff;
            color: #1168d5;
            border-radius: 20px;
            padding: 8px 13px;
            cursor: pointer;
            font-size: 12px;
            line-height: 1.5;
            transition: .2s;
        }

        .suggestion:hover {
            background: #e5f1ff;
            border-color: #3782e8;
        }

        .chat-input-area {
            padding: 17px;
            border-top: 1px solid #e4ebf3;
            background: white;
        }

        .chat-form { display: flex; gap: 10px; }

        .chat-form input {
            min-width: 0;
            flex: 1;
            border: 1px solid #cbd9e8;
            border-radius: 9px;
            padding: 14px 16px;
            outline: none;
            font-size: 14px;
        }

        .chat-form input:focus {
            border-color: #2878e8;
            box-shadow: 0 0 0 3px rgba(40, 120, 232, .08);
        }

        .send-btn {
            border: 0;
            background: #086fe7;
            color: white;
            padding: 0 25px;
            border-radius: 9px;
            font-weight: 700;
            cursor: pointer;
            font-size: 14px;
        }

        .send-btn:disabled { opacity: .6; cursor: not-allowed; }

        .side-card { padding: 22px; }
        .side-card h3 { font-size: 18px; margin-bottom: 17px; }

        .side-item {
            border: 1px solid #e0eaf4;
            border-radius: 9px;
            padding: 14px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: .2s;
        }

        .side-item:hover {
            border-color: #4d8ced;
            background: #f5f9ff;
        }

        .side-item strong {
            display: block;
            color: #0a3970;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .side-item span {
            font-size: 12px;
            color: #71839a;
            line-height: 1.5;
        }

        .info-section {
            margin-top: 25px;
            background: linear-gradient(120deg, #eaf6ff, #eefbf5);
            border: 1px solid #d4e9ef;
            border-radius: 12px;
            padding: 22px;
        }

        .info-section h3 { margin-bottom: 10px; font-size: 19px; }

        .info-section p {
            color: #45637f;
            line-height: 1.7;
            font-size: 14px;
        }

      .footerb a:hover {
    color: #ffffff !important;
}




/* Find Business Hero Section */


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
 object-position: center center;

}






   
        @media (max-width: 900px) {
            .navbar {  flex-wrap: wrap; }
            .nav-links { gap: 12px; }
            .chat-layout { grid-template-columns: 1fr; }
            .hero h1 { font-size: 34px; }
            .footer-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }


        @media (max-width: 768px) {
    .findbiz-hero-content h1 {
        font-size: 30px;
    }

    .findbiz-hero-content p {
        font-size: 15px;
    }
}



        @media (max-width: 600px) {
            .navbar { flex-direction: column; }
            .logo { font-size: 25px; }
            .nav-links { gap: 12px; }
            .nav-links a { font-size: 12px; }
            .hero { padding: 35px 20px; }
            .hero h1 { font-size: 28px; }
            .hero p { font-size: 14px; }
            .chat-wrapper { padding: 0 10px; margin-top: 20px; }
            .messages { height: 450px; padding: 15px; }
            .message-box { max-width: 95%; }
            .chat-form { flex-direction: column; }
            .chat-form input { width: 100%; }
            .send-btn { min-height: 45px; }
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 22px; }

            .findbiz-hero{
    min-height: auto;
  }
      .findbiz-hero-content h1 {
        font-size: 19px;
    }


    .findbiz-hero-content p {
        font-size: 13px;
        line-height: 35px;
    }



    .chat-header h2 {
    font-size: 16px;
    margin-bottom: 4px;
    font-weight: 600;
}


.message-box {
    max-width: 88%;
    padding: 16px 18px;
    border-radius: 13px;
    line-height: 32px;
    font-size: 12px;
    overflow-wrap: anywhere;
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



<section class="findbiz-hero">
    <div class="findbiz-video-bg">
        <video autoplay muted loop playsinline preload="auto"
            poster="{{ asset('storage/businesses/video-poster.png') }}">
            <source src="{{ asset('storage/businesses/ai-driven-apps-right.mp4') }}" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
    </div>

    <div class="findbiz-hero-content">
        <div class="hero-inner">
        <small>💡 IdeaSoch AI Assistant</small>
        <h1>AI Business Assistant</h1>
        <p>
            Find the right business idea based on your budget, location,
            and interests. Ask a question and explore business ideas from IdeaSoch.
        </p>
    </div>
    </div>
</section>




<main class="chat-wrapper">
    <div class="chat-layout">

        <div class="chat-card">
            <div class="chat-header">
                <div class="ai-icon">🤖</div>
                <div>
                    <h2>IdeaSoch AI Assistant</h2>
                    <div class="online">● Online</div>
                </div>
            </div>

            <div class="messages" id="messages">

                <div class="message ai">
                    <div class="message-box">
                        <strong>नमस्ते! 👋 IdeaSoch AI में आपका स्वागत है।</strong>
                        <br><br>
                        आप अपने budget, business category या investment के बारे में पूछ सकते हैं।
                        नीचे दिए गए Active Questions में से किसी पर click करें या अपना सवाल लिखें।
                    </div>
                </div>

                <div class="message ai">
                    <div class="message-box">
                        <strong>आप मुझसे यह भी पूछ सकते हैं:</strong>

                        <div class="suggestions">
                            @forelse($aiQuestions as $aiQuestion)
                                <button
                                    type="button"
                                    class="suggestion"
                                    data-ai-question="{{ $aiQuestion->question }}"
                                    onclick="askQuestion(this.dataset.aiQuestion)"
                                >
                                    {{ $aiQuestion->question }}
                                </button>
                            @empty
                                <p>अभी कोई Active Question उपलब्ध नहीं है। कृपया बाद में देखें।</p>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>

            <div class="chat-input-area">
                <form class="chat-form" id="chatForm">
                    <input
                        type="text"
                        id="messageInput"
                        placeholder="अपना सवाल लिखें..."
                        autocomplete="off"
                        maxlength="2000"
                        required
                    >
                    <button type="submit" class="send-btn" id="sendBtn">
                        Send ➤
                    </button>
                </form>
            </div>
        </div>

        <aside>
            <div class="side-card">
                <h3>💡 आप क्या पूछ सकते हैं?</h3>

                <div class="side-item"
                     onclick="askQuestion('₹1 लाख में business ideas बताओ')">
                    <strong>💰 Budget Based Ideas</strong>
                    <span>अपने budget के अनुसार business ideas खोजें।</span>
                </div>

                <div class="side-item"
                     onclick="askQuestion('Jaipur में business ideas बताओ')">
                    <strong>📍 Location Based</strong>
                    <span>अपने शहर में शुरू किए जा सकने वाले ideas पूछें।</span>
                </div>

                <div class="side-item"
                     onclick="askQuestion('Online business ideas बताओ')">
                    <strong>💻 Online Business</strong>
                    <span>घर से शुरू किए जा सकने वाले online businesses।</span>
                </div>

                <div class="side-item"
                     onclick="askQuestion('Low investment business बताओ')">
                    <strong>📊 Low Investment</strong>
                    <span>कम investment वाले business ideas खोजें।</span>
                </div>
            </div>

            <div class="info-section">
                <h3>💡 IdeaSoch AI</h3>
                <p>
                    Business ideas खोजने के लिए budget, category और
                    investment से संबंधित सवाल पूछें।
                </p>
            </div>
        </aside>

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
    const form = document.getElementById('chatForm');
    const input = document.getElementById('messageInput');
    const messages = document.getElementById('messages');
    const sendBtn = document.getElementById('sendBtn');

    function escapeHtml(value) {
        const div = document.createElement('div');
        div.textContent = value ?? '';
        return div.innerHTML;
    }

    function askQuestion(question) {
        input.value = question;
        input.focus();
    }

    function appendMessage(html, type = 'ai') {
        const wrapper = document.createElement('div');
        wrapper.className = 'message ' + type;

        const box = document.createElement('div');
        box.className = 'message-box';
        box.innerHTML = html;

        wrapper.appendChild(box);
        messages.appendChild(wrapper);
        messages.scrollTop = messages.scrollHeight;

        return wrapper;
    }

    form.addEventListener('submit', async function (event) {
        event.preventDefault();

        const question = input.value.trim();

        if (!question || sendBtn.disabled) {
            return;
        }

        appendMessage(escapeHtml(question), 'user');
        input.value = '';
        sendBtn.disabled = true;
        sendBtn.textContent = 'Please wait...';

        const loading = appendMessage(
            '<strong>IdeaSoch AI 🤖</strong><br><br>आपके लिए business ideas खोज रहा हूँ...',
            'ai'
        );

        try {
            const response = await fetch(
                @json(route('ai.chat.message')),
                {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content
                    },
                    body: JSON.stringify({ message: question })
                }
            );

            const data = await response.json();
            loading.remove();

            if (!response.ok || !data.success) {
                throw new Error(
                    data.message || 'सवाल भेजने में समस्या आई। कृपया दोबारा कोशिश करें।'
                );
            }

            let html = '<strong>IdeaSoch AI 🤖</strong><br><br>';
            html += escapeHtml(data.message || '');

            if (Array.isArray(data.ideas) && data.ideas.length > 0) {
                html += '<br><br><strong>आपके लिए Business Ideas:</strong><ol>';

                data.ideas.forEach(function (idea) {
                    const min = Number(idea.investment_min || 0)
                        .toLocaleString('en-IN');

                    const max = Number(idea.investment_max || 0)
                        .toLocaleString('en-IN');

                    html += '<li>';
                    html += '<strong>' + escapeHtml(idea.name) + '</strong><br>';
                    html += '<span>' + escapeHtml(idea.category || 'Business') + '</span><br>';
                    html += '💰 Investment: ₹' + min + ' - ₹' + max;

                    if (idea.profit) {
                        html += '<br>📈 Expected Profit: ' +
                            escapeHtml(String(idea.profit));
                    }

                    if (idea.url) {
                        html += '<br><a href="' + escapeHtml(idea.url) +
                            '" style="display:inline-block;margin-top:7px;color:#176ce7;font-weight:700;">' +
                            'View Details →</a>';
                    }

                    html += '</li>';
                });

                html += '</ol>';
            } else {
                html += '<br><br>अभी इस सवाल के लिए कोई business idea नहीं मिला। दूसरे budget या category के साथ पूछें।';
            }

            appendMessage(html, 'ai');

        } catch (error) {
            loading.remove();

            appendMessage(
                '<strong>IdeaSoch AI 🤖</strong><br><br>❌ ' +
                escapeHtml(error.message || 'कुछ समस्या आ गई। कृपया फिर से कोशिश करें।'),
                'ai'
            );
        } finally {
            sendBtn.disabled = false;
            sendBtn.textContent = 'Send ➤';
            input.focus();
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
