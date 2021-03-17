<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Fenn LCC">

    <title>{{ config('app.name', 'Fenn\'sLook') }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/components.min.css') }}">
    <style>
        .navbar {
            width: 100% !important;
            left: 0 !important;
        }

    </style>
</head>

<body class="layout-4">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Start app top navbar -->
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                   Fenn's Look
                </form>
                <ul class="navbar-nav navbar-right">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <img alt="image" src="{{ asset('/dashboard') }}/assets/img/avatar/avatar-1.png"
                                    class="rounded-circle mr-1">
                                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-title">Logged in 5 min ago</div>
                                <a href="features-profile.html" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Profile
                                </a>
                                <a href="features-activities.html" class="dropdown-item has-icon">
                                    <i class="fas fa-bolt"></i> Activities
                                </a>
                                <a href="features-settings.html" class="dropdown-item has-icon">
                                    <i class="fas fa-cog"></i> Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </div>
                        </li>
                    @endguest

                </ul>
            </nav>

            <!-- Start main left sidebar menu -->
            <!-- Start app main Content -->
            <div class="container py-5">
                <div class="py-5">
                <section class="section">
                    @yield('content')
                </section>
            </div>
            </div>
            
        </div>
    </div>


    <!-- General JS Scripts -->
    <script src="{{ asset('dashboard/assets/bundles/lib.vendor.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/js/CodiePie.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('dashboard/js/scripts.js') }}"></script>
    <script src="{{ asset('dashboard/js/custom.js') }}"></script>
</body>

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->

</html>
