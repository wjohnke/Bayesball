<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BayesBall') }}</title>

    <!-- Scripts -->
    <script src="{{ URL::asset('js/app.js') }}" defer></script>

    <!-- Fonts-->
    {{--<link rel="dns-prefetch" href="https://fonts.gstatic.com">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}


    <!-- bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ URL::asset('css/datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/heart.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/button.css') }}" rel="stylesheet">

    {{--<link rel="stylesheet" href="{{mix('css/app.css')}}">--}}

    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link href=    "{{URL::asset('css/bootstrap.css')}}"
            rel="stylesheet" type="text/css" media="all" />
    <!--// bootstrap-css -->
    <!-- css -->
    <link rel="stylesheet" href="    {{URL::asset("css/style.css")}}
            " type="text/css" media="all" />
    <link href="{{URL::asset('css/styles.css?v=1.6')}}" rel="stylesheet">

    <!--// css -->
    {{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}

    <script src={{URL::asset("js/jquery-1.11.1.min.js")}}></script>
    <script src={{URL::asset("js/scripts.js?v=1.7")}}
    ></script>
    <script src="{{asset('../resources/js/bootstrap.js')}}"></script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}


    {{--<link rel="stylesheet" href="{{asset('dist/bundled.css')}}">--}}
    {{--<script src="{{asset('dist/bundled.js')}}"></script>--}}


    <script type="text/javascript" src={{URL::asset("js/move-top.js")}}
    ></script>

    <script type="text/javascript" src={{URL::asset("js/easing.js")}}
    ></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>

    <script src="{{ asset('js/heart.js') }}"></script>
    <script src="{{ asset('js/datepicker.min.js') }}"></script>
    <script src="{{ asset('js/i18n/datepicker.en.js') }}"></script>


    <script
            src="http://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <script
            src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"
            integrity="sha256-DI6NdAhhFRnO2k51mumYeDShet3I8AKCQf/tf7ARNhI="
            crossorigin="anonymous"></script>


    <link rel="stylesheet"
          type="text/css"
          href="{{asset('css/jquery-confirm.css')}}"/>

    <script type="text/javascript"
            src="{{asset('js/jquery-confirm.js')}}"></script>



    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>


    <link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/demo.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/tabs.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/tabstyles.css')}}" />
    <script src="{{asset('js/modernizr.custom.js')}}"></script>


    <script>
        $( "li a.menu1" ).click(function() {
            $( "ul.nav-sub" ).slideToggle( 300, function() {
                // Animation complete.
            });
        });
    </script>

</head>

<style>

    .chart-container {
        /*border: 1px dotted red;*/
        position: relative;
        margin: auto;
        height: 40vh;
        width: 40vw;
    }

</style>
<body>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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

                            <li><a href="{{url('/games')}}" >Games</a></li>
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
            <h1><a href="{{url('/')}}">BayesBall</a></h1>
        </div>
        <div class="top-nav">
            <div class="hero fa-navicon fa-2x nav_slide_button" id="hero">
                <a href="#"><img src={{URL::asset("images/menu.png")}} alt=""></a>
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
                                <a class="dropdown-item" href="{{route('home')}}">Dashboard</a>
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
