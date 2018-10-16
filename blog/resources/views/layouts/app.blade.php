<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BayesBall') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts-->
    {{--<link rel="dns-prefetch" href="https://fonts.gstatic.com">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}

    <!-- Styles -->
    <link href="{{ asset('css/datepicker.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!--// bootstrap-css -->
    <!-- css -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link href="css/styles.css?v=1.6" rel="stylesheet">
    <!--// css -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/scripts.js?v=1.7"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>

    <script src="{{ asset('js/datepicker.min.js') }}"></script>
    <script src="{{ asset('js/i18n/datepicker.en.js') }}"></script>

</head>
<body>
<div class="main-content">
    <div id="app">
        <div class="navigation">
            <div class="container-wrap-fluid">
                <nav class="pull">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="hvr-bounce-to-bottom"><a href="{{url('/')}}"class="active">Home</a></li>

                            <li class="hvr-bounce-to-bottom"><a href="{{url('/about')}}">About</a></li>


                            <!-- script-for-menu -->
                            <script>
                                $( "li a.menu1" ).click(function() {
                                    $( "ul.nav-sub" ).slideToggle( 300, function() {
                                        // Animation complete.
                                    });
                                });
                            </script>
                            <li><a href="#news" class="scroll">News</a></li>
                            <li><a href="{{url('/contact')}}">Contact</a></li>
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="header-top">
        <div class="head-logo">
            <h1><a href="{{url('/')}}">Bayes Ball</a></h1>
        </div>
        <div class="top-nav">
            <div class="hero fa-navicon fa-2x nav_slide_button" id="hero">
                <a href="#"><img src="images/menu.png" alt=""></a>
            </div>
        </div>
        <div class="header-right">
            <div class="social">
                <ul>
                    <li><a href="#" class="facebook"> </a></li>
                    <li><a href="#" class="facebook twitter"> </a></li>
                    <li><a href="#" class="facebook chrome"> </a></li>
                    <li><a href="#" class="facebook dribbble"> </a></li>
                    <ul>
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                            <a id="navbarDropdown" role="button" data-toggle="dropdown">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    </ul>
                </ul>
                <!--
                <ul class="navbar-nav ml-auto">

            <!--
                </ul>
                -->
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
    </div>



        <main class="py-4">
            @yield('content')
        </main>
    </div>
        @yield('script')
</body>
</html>
