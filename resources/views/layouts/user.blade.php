<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Cron</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('assets/css_user/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css_user/login.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css_user/register.css')}}">
    <!-- Icon Links -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="//unpkg.com/alpinejs" defer></script>

</head>
<!-- body -->
<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a href="{{route('home')}}"><img src="{{asset('images/logo.png')}}"></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('home')}}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about')}}">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('services')}}">SERVICES</a>
                        </li>
                        <li class="#" href="#">
                            <a class="nav-link" href="{{route('blog')}}">BLOG</a>
                        </li>
                        <li class="nav-item" href="#">
                            <a class="nav-link" href="{{route('contact')}}">CONTACT</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar">
                    @if(Route::has('login'))
                        @auth
                        <div class="d-flex align-items-center justify-content-center gap-5">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('create_post')}}">Create Post</a>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <span class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </span>
                                <ul class="dropdown-menu">
                                    <span><a class="dropdown-item" href="{{route('profile')}}">Profile</a></span>
                                    <span><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></span>
                                </ul>
                            </div>
                        </div>
                        @else
                        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                            <li class="nav-item" href="#">
                                <a class="nav-link" href="{{route('login')}}">LOGIN</a>
                            </li>
                            <li class="nav-item" href="#">
                                <a class="nav-link" href="{{route('register')}}">REGISTER</a>
                            </li>
                        </ul>
                        @endif
                        @endauth
                </div>
            </div>
        </nav>
    </header>
        @yield('content')
    <!--Contact section and footer start -->
    <div class="contact_main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="touch_text">Contact Us</h1>
                </div>
            </div>
        </div>
        <div class="contact_section_2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="map_icon">
                            <img src="{{asset('images/map-icon.png')}}" style="max-width: 100%;padding-left: 30px; ">
                            <p class="email-text"><a href="#">Gb road 123 londo<br>Uk</a></p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="map_icon">
                            <img src="{{asset('images/call-icon.png')}}" style="max-width: 100%;padding-left: 30px;">
                            <p class="email-text"><a href="#">+7123654897</a></p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="map_icon">
                            <img src="{{asset('images/email-icon.png')}}" style="max-width: 100%; padding-left: 30px;">
                            <p class="email-text"><a href="#">demo@gmail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Contact_section end -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    <p class="copyright_text">© 2025 All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Contact section and footer end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>