<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link href="{{ asset("fonts/nunito.css") }}" rel="stylesheet">
    <link href="{{ asset("vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/layout.css") }}" rel="stylesheet">
    @stack('onPageCSS')

    <link href="{{ asset("vendor/font-awesome/css/all.min.css") }}" rel="stylesheet">
    <script src="{{ asset("vendor/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script href="{{ asset("vendor/font-awesome/js/all.min.js") }}"></script>
    @stack('onPageJS')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#manNavBar" aria-controls="manNavBar" aria-expanded="false" aria-label="Main nav bar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="manNavBar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ ( (Request::is('home') || Request::is('home/*')) ) ? "active" : null }}" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
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
                </div>
            </div>
        </nav>

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

        <main class="main-container">
            @hasSection('content')
                @yield('content')
            @endif
        </main>

        <footer class="footer">
            <div class="container">
                <div class="border-top my-3"></div>
                <div class="row p-3">
                    <div class="col-md-10 mb-2">
                        <div class="message">
                            <div class="text-muted p-2">
                                Copy@ {{ env('APP_NAME') }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 mb-2 privacy-policy">
                        <div class="text-muted p-2">
                            <a href="">Privacy policy</a>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="credits">
                            <div class="text-muted p-2">
                                <div class=" d-flex justify-content-center">
                                    <p>
                                        {{ __('Develop and Design by') }} <span>{{ __('Seikh Md Tahmid Farzan') }}</span>
                                        <a href="https://www.facebook.com/tahmid.farzan007/" class="text-decoration-none"><i class="fa-brands fa-facebook"></i></a>
                                        <a href="https://www.linkedin.com/in/sk-md-tahmid-farzan/" class="text-decoration-none"><i class="fa-brands fa-linkedin"></i></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div id="preloader">
            <div class="container">
                <div class="ring"></div>
                <div class="ring"></div>
                <div class="ring"></div>
            </div>
        </div>

        @stack('onPageHTML')

        <button id="backToTop" class="back-to-top d-flex align-items-center justify-content-center"><i class="fa-solid fa-arrow-up"></i></button>
    </div>

    <script src="{{ asset("assets/js/layout.js") }}"></script>
</body>
</html>
