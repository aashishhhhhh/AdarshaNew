<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Adarsha Namuna Vidhyalaya</title>
    <!-- Style Include  -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('date-picker/css/nepali.datepicker.v3.7.min.css') }}" />

    @yield('styles')
</head>
<body>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0&appId=221070085156503&autoLogAppEvents=1"
        nonce="AbbG250h"></script>
    <!-- Header -->
    {{-- Notice --}}
    <div class="top_notice">
        <p>
            This website is under construction.We're working on the Updates of this site
        </p>
    </div>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-9 brand">
                    <a href="{{ url('/') }}">
                        <img class="brand-logo" src="{{ asset('assets/images/logo.jpg') }}" alt="" />
                    </a>
                    <div class="brand-name">
                        <h1>Adarsha Secondary School</h1>
                        <h2>आदर्श माध्यमिक विधालय</h2>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="login-menu">
                        <ul>
                            <li><a href="#" target="_blank"> Login </a></li> |

                            <li><a href="#" target="_blank"> Registration </a></li>
                        </ul>
                    </div>
                    <div class="search_box">
                        <input class="search__input" type="text" placeholder="Search..." />
                    </div>
                </div>
            </div>
        </div>
    </header>
