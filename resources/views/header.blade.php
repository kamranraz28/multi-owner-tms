<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark" style="background-color: {{ $headerColor }};">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand">
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            @if (Auth::user()->image !== null)
                                <img class="img-fluid rounded-circle"
                                    src="{{ asset('storage/img/' . Auth::user()->image) }}" alt="User-Profile-Image"
                                    style="width: 40px; height: 40px;">
                            @else
                                <img class="img-fluid rounded-circle" src="{{ asset('assets/images/user/avatar-2.jpg') }}"
                                    alt="User-Profile-Image" style="width: 40px; height: 40px;">
                            @endif
                            <span>{{ Auth::user()->name }}</span>
                            <a href="{{ route('userLogout') }}" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a href="{{ route('viewProfie') }}" class="dropdown-item"><i
                                        class="feather icon-user"></i> Profile</a></li>
                            <li><a href="{{ route('userLogout') }}" class="dropdown-item"><i
                                        class="feather icon-lock"></i> Lock Screen</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
