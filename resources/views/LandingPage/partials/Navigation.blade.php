<header>
    <div class="header-area header-transparent">
        <div class="main-header ">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            @if($logoImage = Settings::HasLogoImage())
                            <div class="logo">
                                <a href="{{ url('/') }}"><img src="{{ asset('images/'.$logoImage) }}" alt=""></a>
                            </div>
                            @elseif($TextLogo = Settings::HasTextLogo())
                            <div class="logo">
                                <a href="{{ url('/') }}">{{ $TextLogo }}</a>
                            </div>
                            @else
                            @endif
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li class="active"><a href="{{ route('home') }}">Home</a></li>
                                            <li><a href="{{ route('Winners') }}">Winners</a></li>
                                            <li><a href="{{ route('about') }}">About</a></li>
                                            <li><a href="{{ route('Pricing') }}">Pricing</a></li>
                                            <li><a href="{{ route('contact') }}">Contact</a></li>
                                            @if(Auth::user())
                                            <li class="button-header margin-left "><a href="{{ route('login') }}" class="btn">Dashboard</a></li>
                                            @else
                                            <li class="button-header margin-left "><a href="{{ route('JoinUs') }}" class="btn">Join</a></li>
                                            <li class="button-header"><a href="{{ route('login') }}" class="btn btn3">Log in</a></li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
