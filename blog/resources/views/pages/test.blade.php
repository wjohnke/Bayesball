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
    @endsection