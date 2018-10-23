@extends('layouts.app')
@section('content')
    <style>
        #container{


            width :100%;
            text-align:center;
            margin-bottom: 60px;


        }
        #left
        {   float:left;
            margin-left: 100px;
            width:80px;
            height: 128px;
            margin-bottom: 20px;



        }
        #center{
            display: inline-block;
            margin:0 auto;
            width:600px;
            height: 128px;
            margin-bottom: 20px;

        }
        #right{
            margin-right: 100px;
            margin-bottom: 20px;
            float:right;
            width:80px;
            height: 128px;

        }
    </style>

    <div class="footer">
        <!-- container-wrap -->
        <div class="container-wrap">
            <div class="footer-top">

                <div align="center" style="margin:0 auto" class="col-md-6 f-address f-contact">


                    <h5 >Choose a Date</h5>
                    @php
                        $date= date('Y-m-d');
                        $count=0;
                        //$date= '2017-04-02';
                        //echo $date;

                    @endphp
                    <form autocomplete="off" action=" {{route('goToDate')}}" method="get">

                        {{--<div>--}}

                        <input  type="text" id="datePicker" name="date" placeholder="YYYY-MM-DD" class='datepicker-here'   data-language='en' required="">

                        <input type="submit" id="read-data" value="Submit">
                        {{--</div>--}}
                    </form>
                </div>
                <div class="clearfix"> </div>

            </div>
        </div>
        <!-- //container-wrap -->
    </div>
    <!-- //footer -->

    <div  class="about-grids about-top-grids">
        @if(count($dates)>0)
            @foreach($dates as $date)
                <div  class="well">


                    <h1 align="center">{{$date->game_date}}</h1>

                    {{--<p  style="font-size:50px;" align="center">--}}

                        {{--<a href="{{route('games.show', ['id' => $date->id])}}"   >--}}
                            {{--<img src={{URL::asset("images/teamLogos/{$date->visitor}.png")}}--}}
                                 {{--height="128" alt="" />--}}
                            {{--{{$date->visitor}} vs {{$date->home}}--}}
                            {{--<img src={{URL::asset("images/teamLogos/{$date->home}.png")}}--}}

                                 {{--height="128"  alt="" />--}}
                        {{--</a>--}}
                    {{--</p>--}}

                    <div id="container">
                        <div id="left">
                            <img src="{{URL::asset("images/teamLogos/{$date->visitor}.png")}}" height="128" alt="" />
                        </div>
                        <div id="center">
                            <p class="title" style="font-size:30px;" align="center">
                                <a href="{{route('games.show', ['id' => $date->id])}}"   >



                                    {{\BayesBall\Enums\TeamName::getDescription($date->visitor)}} vs {{\BayesBall\Enums\TeamName::getDescription($date->home)}}
                                </a>
                            </p>
                        </div>
                        <div id="right">
                            <img src="{{URL::asset("images/teamLogos/{$date->home}.png")}}" height="128"  alt="" />




                        </div >

                    </div>
                </div>
            @endforeach

            @else
            <div class="well">
                <h3 align="center">There is no game on {{$specifiedDate}}</h3>
            </div>

        @endif
        {{--{{$dates->links()}}--}}
    </div>
    @include('includes.footer')

@endsection