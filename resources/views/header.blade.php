<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark"
        style="background-color: {{ $headerColor }}; box-shadow: 0 2px 12px rgba(0,0,0,0.12); z-index: 1025;">

    <div class="d-flex align-items-center w-100 px-3">

        <div class="align-items-center gap-3">

            @if(!empty($appLogo))
                <a class="d-flex align-items-center text-decoration-none" href="{{ route('users.dashboard') }}">
                    <img src="{{ $appLogo }}" alt="App Logo" class="header-logo-img">
                </a>
            @endif
        </div>
        <a class="mobile-menu on" id="mobile-collapse" href="#!">
            <span></span>
        </a>
    </div>
</header>

<style>
    .header-logo-img {
        max-height: 40px;
        width: auto;
        height: auto;
        object-fit: contain;
        display: block;
        transition: transform 0.2s ease;
    }
    .header-logo-img:hover {
        transform: scale(1.03);
    }
    .pcoded-header .dropdown-menu .dropdown-item:active {
        background-color: #f0f0f0;
    }
</style>
