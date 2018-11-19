@extends('layouts.test')

@section('content')
    <style>

        #bottomright {
            position: absolute;
            bottom: 8px;
            right: 16px;
            font-size: 18px;
        }
        #container {
            position: relative;
        }


        .position {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            margin-top: 15%;
        }

        #workarea {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #1e1a3e;
            font-family: Raleway;
        }

        #personal {
            color:white;
            text-decoration:none;
            position:absolute;
            bottom:15px;
            right:2%;
        }
        /*    start code for the actual button:         */


        /*
            Spot is the span on the inside of the href that
            fills the parent and makes the hover and link work
            for the entire div
        */

        .spot {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }
        /*
            This is the outer svg wrapper that the SVG itself will
            fill. Multiple svg-wrapper classes can be put side by side.
        */

        .svg-wrapper {
            margin-top: 0;
            position: relative;
            width: 150px;
            /*make sure to use same height/width as in the html*/
            height: 40px;
            display: inline-block;
            border-radius: 3px;
            margin-left: 5px;
            margin-right: 5px
        }
        /*
          This is where we define the fill, color, thickness,
          and stroke pattern of the SVG when there is no hover.
          The dasharray and offset together define the line position
          under the words. Here's also where the transition speed is set.
        */

        #shape {
            stroke-width: 6px;
            fill: transparent;
            stroke: #009FFD;
            stroke-dasharray: 85 400;
            stroke-dashoffset: -220;
            transition: 1s all ease;
        }
        /*
            Pushing the text up into the SVG. Without this the
            text would be below the div's.
        */

        #text {
            margin-top: -35px;
            text-align: center;
        }

        #text a {
            color: white;
            text-decoration: none;
            font-weight: 100;
            font-size: 1.1em;
        }
        /*
            Changing the shape on hover. I change the color of the stroke,
        make it thinner, then set it to again wrap around the entire parent element.
        */

        .svg-wrapper:hover #shape {
            stroke-dasharray: 50 0;
            stroke-width: 3px;
            stroke-dashoffset: 0;
            stroke: #06D6A0;
        }

    </style>

    <form action="" method="post">
        <div class="main-content">
        Choose Date:<br>
        <input type='text' class='datepicker-here' data-language='en' />
        </div>
        
    </form>

    {{--<div style="width: 500px; height: 500px; border: 1px solid red; position: relative">--}}
        {{--<div style="position: absolute; right: 0; bottom: 0; width: 200px; height: 100px; border: 1px solid green;">--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="well" id="container" >
        {{csrf_field()}}

        <div class="heart" id="bottomright"></div>


    </div>
    <div class="stage">
    </div>
    <button id="la">la</button>

    <div class="row">
        <div class="col-md-3">
            <button class="example-the-1">Modern</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-info btn-block example-the-3">Material</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-info btn-block example-the-4">Bootstrap</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-info btn-block example-the-2">Supervan</button>
        </div>
    </div>

    <div id="workarea">
        <div class="position">

            <!--start button, nothing above this is necessary -->

            <!--Next button -->
            <div class="svg-wrapper">
                <svg height="40" width="150" xmlns="http://www.w3.org/2000/svg">
                    <rect id="shape" height="40" width="150" />
                    <div id="text">
                        <a href=""><span class="spot"></span>Button 2</a>
                    </div>
                </svg>
            </div>
            <!--Next button -->
            <div class="svg-wrapper">
                <svg height="40" width="150" xmlns="http://www.w3.org/2000/svg">
                    <rect id="shape" height="40" width="150" />
                    <div id="text">
                        <a href=""><span class="spot"></span>Button 3</a>
                    </div>
                </svg>
            </div>
            <!--End button -->

        </div>
        <a id="personal" href="http://www.tylermarkpeterson.com">www.tylermarkpeterson.com</a>
    </div>

{{--<div class="container">--}}

    {{--<section>--}}
        {{--<div class="tabs tabs-style-iconfall">--}}
            {{--<nav>--}}
                {{--<ul>--}}
                    {{--<li><a href="#section-iconfall-1" class="icon icon-home"><span>Home</span></a></li>--}}
                    {{--<li><a href="#section-iconfall-2" class="icon icon-gift"><span>Deals</span></a></li>--}}
                    {{--<li><a href="#section-iconfall-3" class="icon icon-upload"><span>Upload</span></a></li>--}}
                    {{--<li><a href="#section-iconfall-4" class="icon icon-coffee"><span>Work</span></a></li>--}}
                    {{--<li><a href="#section-iconfall-5" class="icon icon-config"><span>Settings</span></a></li>--}}
                {{--</ul>--}}
            {{--</nav>--}}
            {{--<div class="content-wrap">--}}
                {{--<section id="section-iconfall-1">--}}
                    {{--<div class="well">--}}
                        {{--<h1>hhhh</h1>--}}
                    {{--</div>--}}
                    {{--<p>111</p></section>--}}
                {{--<section id="section-iconfall-2"><p>2</p></section>--}}
                {{--<section id="section-iconfall-3"><p>3</p></section>--}}
                {{--<section id="section-iconfall-4"><p>4</p></section>--}}
                {{--<section id="section-iconfall-5"><p>5</p></section>--}}
            {{--</div><!-- /content -->--}}
        {{--</div><!-- /tabs -->--}}
        {{--<p>Re-created from <a href="http://vintageproductions.eu/grid/interactivity/">Vintage Productions</a></p>--}}
    {{--</section>--}}

{{--</div>--}}
@endsection

@section('script')
    <script type="text/javascript">

        $(document).ready(function() {
            $('#la').on('click', function () {

                console.log("heart is clicked ");
                var count = 0;

            })
        });
        </script>


    <script type="text/javascript">

        $('.example-the-1').on('click', function () {
            $.confirm({
                icon: 'fa fa-smile-o',
                theme: 'modern',
                closeIcon: true,
                animation: 'scale',
                type: 'blue',
            });
            console.log("jfjfjfj");
        });
        $('.example-the-2').on('click', function () {
            $.confirm({
                icon: 'fa fa-question-circle-o',
                theme: 'supervan',
                closeIcon: true,
                animation: 'scale',
                type: 'orange',
            });
        });
        $('.example-the-3').on('click', function () {
            $.confirm({
                icon: 'fa fa-question',
                theme: 'material',
                closeIcon: true,
                animation: 'scale',
                type: 'orange',
            });
        });
        $('.example-the-4').on('click', function () {
            $.confirm({
                icon: 'fa fa-question',
                theme: 'bootstrap',
                closeIcon: true,
                animation: 'scale',
                type: 'orange',
            });
        });

        // alert
        $('.example-p-1').on('click', function () {
            $.alert({
                title: 'Alert alert!',
                content: 'This is a simple alert. <br> with some <strong>HTML</strong> <em>contents</em>',
                icon: 'fa fa-rocket',
                animation: 'scale',
                closeAnimation: 'scale',
                buttons: {
                    okay: {
                        text: 'Okay',
                        btnClass: 'btn-blue'
                    }
                }
            });
        });

    </script>

    <script src="{{asset('js/cbpFWTabs.js')}}"></script>
    <script>
        (function() {

            [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                new CBPFWTabs( el );
            });

        })();
    </script>
    @endsection