<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>মাগুরা-১ আসনের ভোটার তথ্য অনুসন্ধান</title>

    <link href="{{ asset("upload/site-info/favicon.png") }}" rel="icon">
    <link href="{{ asset("upload/site-info/apple-touch-icon.png") }}" rel="apple-touch-icon">

	<link href="{{ asset("fonts/solaimanlipi.css") }}" rel="stylesheet">

    <link href="{{ asset("vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">

	<link href="{{ asset("vendor/bootstrap-icons/bootstrap-icons.css") }}" rel="stylesheet">

    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset("vendor/swiper/swiper-bundle.min.css") }}" rel="stylesheet">
    <link href="{{ asset("vendor/aos/aos.css") }}" rel="stylesheet"> --}}
    <link href="{{ asset("assets/css/main.css") }}" rel="stylesheet">
    @stack('onPageCSS')

    <script src="{{ asset("vendor/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    @stack('onPageJS')

</head>
<body>
    <div id="app" class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

        <header id="header" class="header fixed-top d-flex align-items-center">
            <div class="container-fluid d-flex align-items-center justify-content-between">

                <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                    <h1>
                        <img src="{{ asset("upload/site-info/magura-1-logo.png") }}" class="img-fluid" alt="">
                    </h1>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="{{ route('home').'#hero' }}" class="active">হোম</a></li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link {{ ( (Request::is('login') || Request::is('login/*')) ) ? "active" : null }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{ ( (Request::is('register') || Request::is('register/*')) ) ? "active" : null }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endguest

                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-item" href="">{{ __('Setting') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <button type="button" class="nav-link dropdown-item btn btn-danger" data-bs-toggle="modal" data-bs-target="#logOutConfirmationModal">
                                            {{ __('Logout') }}
                                        </button>
                                    </li>
                                </ul>
                            </li>
                        @endauth
                    </ul>

                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
            </div>
        </header>

        @auth()
            <div class="modal fade" id="logOutConfirmationModal" tabindex="-1" aria-labelledby="logOutConfirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="logOutConfirmationModalLabel">Log out confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Are you sure that you want to log out?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">{{ __('No') }}</button>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="form-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger">{{ __('Yes') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endauth

        <main id="main" class="main-container">
            @hasSection('content')
                @yield('content')
            @endif
        </main>

        <footer id="footer" class="footer">

            <div class="container copyright text-center mt-4">
                <p>&copy; <span>Copyright</span> <strong class="px-1">Magura-1</strong> <span>All Rights Reserved</span></p>
                <div class="credits">
                    Designed by <a href="https://www.live2web.studio/">LIVE2WEB R&D</a>
                </div>
            </div>

        </footer>

        <div id="preloader">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>

        @stack('onPageHTML')
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="fa-solid fa-arrow-up"></i></a>
    </div>

    <script src="{{ asset("vendor/glightbox/js/glightbox.min.js") }}"></script>
    <script src="{{ asset("vendor/isotope-layout/isotope.pkgd.min.js") }}"></script>
    {{-- <script src="{{ asset("vendor/swiper/swiper-bundle.min.js") }}"></script>
    <script src="{{ asset("vendor/aos/aos.js") }}"></script> --}}

    <script src="{{ asset("assets/js/main.js") }}"></script>

</body>
</html>
