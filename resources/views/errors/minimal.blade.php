<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="description">
        <meta content="" name="keywords">

        <link href="{{ asset("uploads/nice-admin/favicon.png") }}" rel="icon">
        <link href="{{ asset("uploads/nice-admin/apple-touch-icon.png") }}" rel="apple-touch-icon">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <link href="{{ env('APP_FAVICON') }}" >

        <link href="{{ asset("fonts/nunito.css") }}" rel="stylesheet">
        <link href="{{ asset("fonts/poppins.css") }}" rel="stylesheet">
        <link href="{{ asset("fonts/open-sans.css") }}" rel="stylesheet">

        <link href="{{ asset("vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
        <link href="{{ asset("assets/css/auth-user/layout.css") }}" rel="stylesheet">
        <link href="{{ asset("vendor/nice-admin/css/style.css") }}" rel="stylesheet">
        <link href="{{ asset("vendor/nice-admin/css/error style.css") }}" rel="stylesheet">

        <link href="{{ asset("vendor/font-awesome/css/all.min.css") }}" rel="stylesheet"/>
    </head>

    <body>
        <main>
            <div class="container">
                <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
                    <h1>@yield('code')</h1>
                    @yield('message')
                    <div class="credits">
                        Designed by <a href="https://www.facebook.com/tahmid.farzan007/">Tahmid Farzan</a>
                    </div>
                </section>
            </div>
        </main>

        <button class="back-to-top d-flex align-items-center justify-content-center"><i class="fa-solid fa-arrow-up"></i></button>

        <script src="{{ asset("vendor/jquery/jquery.min.js") }}" ></script>
        <script src="{{ asset("vendor/bootstrap/js/bootstrap.bundle.min.js") }}" ></script>
        <script href="{{ asset("vendor/font-awesome/js/all.min.js") }}" rel="stylesheet"></script>

        <script src="{{ asset("vendor/nice-admin/js/main.js") }}" ></script>
    </body>
</html>
