<header class="navbar" id="main-nav">
    <div class="nav-inner">

        <!-- Logo -->
<<<<<<< HEAD
        <a href="#" class="logo-wrap">
=======
        <a href="{{ route('website') }}" class="logo-wrap">
>>>>>>> c57bb21 (subscription module)
            <div class="logo-mark">
                <i data-lucide="building-2" style="width:19px;height:19px;color:white;position:relative;z-index:1;"></i>
            </div>
            <span class="logo-text">Prop<em>Nest</em></span>
        </a>

        <!-- Center links -->
        <nav class="nav-center" id="desktopNav">
            <a href="#" class="nav-link active">Home</a>
<<<<<<< HEAD
            <a href="#plans-section" class="nav-link">Pricing</a>
=======
            <a href="{{ route('plans') }}" class="nav-link">Pricing</a>
>>>>>>> c57bb21 (subscription module)
            <a href="#features-section" class="nav-link">Features</a>
            <a href="#compare-section" class="nav-link">Compare</a>
            <a href="#faq-section" class="nav-link">
                FAQ
            </a>
            <a href="#" class="nav-link">
                Blog
                <span class="nav-badge-new">New</span>
            </a>
        </nav>

        <!-- Right actions -->
        <div class="nav-right">
<<<<<<< HEAD
            <button class="btn-login">Log in</button>
            <button class="btn-signup">
                Get started
                <i data-lucide="arrow-right" class="arrow" style="width:15px;height:15px;"></i>
            </button>
=======
            @auth
                <a href="{{ route('users.dashboard') }}">
                    <button class="btn-login">Dashboard</button>
                </a>
            @endauth

            @guest
                <a href="{{ route('login') }}">
                    <button class="btn-login">Login</button>
                </a>
            @endguest

            @guest
                <a href="{{ route('register') }}">
                    <button class="btn-login">Register</button>
                </a>
            @endguest
>>>>>>> c57bb21 (subscription module)
        </div>

        <!-- Hamburger -->
        <button class="hamburger" id="ham-btn" onclick="toggleMobileNav()" aria-label="Open menu">
            <i data-lucide="menu" id="ham-icon" style="width:20px;height:20px;"></i>
        </button>

    </div>
</header>

<div class="mobile-nav" id="mobileNav">
    <a href="#" class="nav-link active" onclick="closeMobileNav()">Home</a>
    <a href="#plans-section" class="nav-link" onclick="closeMobileNav()">Pricing</a>
    <a href="#features-section" class="nav-link" onclick="closeMobileNav()">Features</a>
    <a href="#compare-section" class="nav-link" onclick="closeMobileNav()">Compare</a>
    <a href="#faq-section" class="nav-link" onclick="closeMobileNav()">FAQ</a>
    <a href="#" class="nav-link" onclick="closeMobileNav()">Blog</a>
    <div class="mobile-nav-actions">
<<<<<<< HEAD
        <button class="btn-login" style="width:100%;padding:13px;font-size:14px;">Log in</button>
        <button class="btn-signup" style="width:100%;padding:14px;font-size:14px;justify-content:center;">Get started <i data-lucide="arrow-right" style="width:15px;height:15px;"></i></button>
=======
        @auth
            <a href="{{ route('users.dashboard') }}">
                <button class="btn-login">Dashboard</button>
            </a>
        @endauth

        @guest
            <a href="{{ route('login') }}">
                <button class="btn-login">Login</button>
            </a>
        @endguest
        @guest
            <a href="{{ route('register') }}">
                <button class="btn-login">Register</button>
            </a>
        @endguest
>>>>>>> c57bb21 (subscription module)
    </div>
</div>

