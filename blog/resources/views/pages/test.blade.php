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

<div class="container">

    <section>
        <div class="tabs tabs-style-iconfall">
            <nav>
                <ul>
                    <li><a href="#section-iconfall-1" class="icon icon-home"><span>Home</span></a></li>
                    <li><a href="#section-iconfall-2" class="icon icon-gift"><span>Deals</span></a></li>
                    <li><a href="#section-iconfall-3" class="icon icon-upload"><span>Upload</span></a></li>
                    <li><a href="#section-iconfall-4" class="icon icon-coffee"><span>Work</span></a></li>
                    <li><a href="#section-iconfall-5" class="icon icon-config"><span>Settings</span></a></li>
                </ul>
            </nav>
            <div class="content-wrap">
                <section id="section-iconfall-1">
                    <div class="well">
                        <h1>hhhh</h1>
                    </div>
                    <p>111</p></section>
                <section id="section-iconfall-2"><p>2</p></section>
                <section id="section-iconfall-3"><p>3</p></section>
                <section id="section-iconfall-4"><p>4</p></section>
                <section id="section-iconfall-5"><p>5</p></section>
            </div><!-- /content -->
        </div><!-- /tabs -->
        <p>Re-created from <a href="http://vintageproductions.eu/grid/interactivity/">Vintage Productions</a></p>
    </section>

</div>
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