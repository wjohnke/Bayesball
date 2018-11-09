@extends('layouts.app')

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
@endsection

@section('script')
    <script type="text/javascript">


        $('#bottomright').on('click',function () {

    console.log("heart is clicked ");
    var count=0;

    });
        </script>
    @endsection