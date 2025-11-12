<nav class="navbar">
    <div class="col-12">
        <div class="navbar-header" style="padding: 27px 0;background-color: white;">
            <img src="/clientAssets/images/logo/logoo.jpg"
                alt="Banner Logo"
                style="
                    max-width: 140px; 
                    height: 55px;
                    margin-left: 50px;
                    margin-top: -21px;
                    margin-bottom: -25px;
                    border-radius: 20px; 
                    box-shadow: 2px 4px 12px #445244;
                    transition: all 0.4s ease;
                "
                onmouseover="this.style.transform='rotate(-3deg) scale(1.07)'; this.style.boxShadow='6px 10px 20px rgba(68,82,68,0.6)';"
                onmouseout="this.style.transform='rotate(0deg) scale(1)'; this.style.boxShadow='2px 4px 12px #445244';">
        </div>

        {{-- Judul Halaman --}}
        <ul class="nav navbar-nav navbar-left align-items-center"
            style="margin-top: 10px; margin-left: -20px;">
            <li class="d-flex align-items-center">
                <a href="javascript:void(0);" class="ls-toggle-btn swap-glow" data-close="true">
                    <i class="zmdi zmdi-swap"></i>
                </a>

                <span style="
                    font-size: 25px; 
                    font-weight: 800; 
                    color: black; 
                    pointer-events: none;
                    letter-spacing: 0.5px; 
                    margin-left: 5px;
                ">
                    {{ $title }}
                </span>
            </li>
        </ul>

        {{-- Kanan: Notifikasi dan User --}}
        <ul class="nav navbar-nav navbar-right align-items-center">

            {{-- Notifikasi --}}
            <li class="dropdown me-3">
                <a href="javascript:void(0);" class="dropdown-toggle xs-hide" data-toggle="dropdown" role="button">
                    <i class="zmdi zmdi-notifications notif-shake" style="font-size: 22px;margin-top: 10px;"></i>
                    <div class="notify">
                        <span class="heartbit"></span>
                        <span class="point"></span>
                    </div>
                </a>
                <ul class="dropdown-menu slideDown">
                    <li class="header">NOTIFICATIONS</li>
                    <li class="body">
                        <ul class="menu list-unstyled">
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="icon-circle l-coral">
                                        <i class="material-icons">person_add</i>
                                    </div>
                                    <div class="menu-info">
                                        <h4>12 new members joined</h4>
                                        <p><i class="material-icons">access_time</i> 14 mins ago</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer"><a href="javascript:void(0);">View All Notifications</a></li>
                </ul>
            </li>

            {{-- Dropdown User --}}
            <li class="dropdown me-3">
                <a href="javascript:void(0);"
                    class="dropdown-toggle d-flex align-items-center user-dropdown"
                    data-toggle="dropdown" role="button" style="text-decoration: none;">

                    @auth
                    <div class="d-flex align-items-center me-2" style="justify-content: flex-end;">
                        <div class="info-container" style="text-align: right;margin-right: 10px;">
                            <div class="name fw-bold">
                                {{ Auth::user()->username ?? Auth::user()->name ?? 'User' }}
                            </div>
                            <div class="email text-muted small">
                                {{ Auth::user()->email }}
                            </div>
                        </div>

                        <img src="{{ Str::startsWith(Auth::user()->avatar, ['http://', 'https://']) ? Auth::user()->avatar : asset('storage/profile/' . Auth::user()->avatar) }}"
                            alt="User"
                            class="rounded-circle border border-light"
                            style="width: 40px; height: 40px; object-fit: cover;">

                    </div>
                    @else
                    {{-- Jika belum login --}}
                    <div class="d-flex align-items-center me-2">
                        <div class="info-container" style="text-align: right;margin-right: 10px;">
                            <div class="name fw-bold">Guest</div>
                            <div class="email text-muted small">-</div>
                        </div>
                        <img src="/clientAssets/images/profile/default.png"
                            alt="User"
                            class="rounded-circle border border-light"
                            style="width: 40px; height: 40px;">
                    </div>
                    @endauth
                </a>

                <ul class="dropdown-menu slideUp" style="margin-right: 20px;margin-top: -8px;">
                    @auth
                    <li><a href="{{ route('profileAdmin') }}"><i class="material-icons">person</i>Profile</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logoutt') }}">
                            <i class="material-icons">input</i>Sign Out
                        </a>
                    </li>

                    @else
                    <li><a href="{{ route('login') }}"><i class="material-icons">input</i>Login</a></li>
                    @endauth
                </ul>
            </li>

        </ul>
    </div>
</nav>