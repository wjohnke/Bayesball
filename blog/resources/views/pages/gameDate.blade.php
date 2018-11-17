@extends('layouts.app')
@section('content')
    <style>
        #container{


            display: flex;                  /* establish flex container */
            /*flex-direction: row;            !* default value; can be omitted *!*/
            flex-wrap: nowrap;              /* default value; can be omitted */
            justify-content: space-between; /* switched from default (flex-start, see below) */
            /*background-color: lightyellow;*/



        }
        #container > div {
            width: 100%;
            height: 100%;
            /*border: 2px dashed red;*/
            margin-left: 1%;
            margin-right: 1%;

        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            max-width: 100%;
            max-height: 100%;
        }
        #bottomright {
            position: absolute;
            bottom: 0px;
            right: 0px;
        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
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
                <div  class="well" style="position: relative;">


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
                        <div id="visitor-{{$date->id}}">
                            <img src="{{URL::asset("images/teamLogos/{$date->visitor}.png")}}" height="128" alt="" />
                        </div>
                        <div id="center">
                            <p class="title" style="font-size:2vw;" align="center">
                                <a href="{{route('games.show', ['id' => $date->id])}}"   >



                                    {{\BayesBall\Enums\TeamName::getDescription($date->visitor)}} vs {{\BayesBall\Enums\TeamName::getDescription($date->home)}}
                                </a>
                            </p>
                        </div>
                        <div id="home-{{$date->id}}">
                            <img src="{{URL::asset("images/teamLogos/{$date->home}.png")}}" height="128"  alt="" />
                        </div >

                    </div>
                    @if(Auth::check())

                        <div class="heart" id="bottomright" onclick="likeTheGame()"></div>

                        <div class="predict" align="center">
                            <button id="predictButtonid-{{$date->id}}"> predict</button>
                        </div>
                        {{--<p>  {{$userId}} {{$userEmail}}</p>--}}
                        <input type="hidden" class="gameId"  id="gameId-{{$date->id}}"value="{{$date->id}}"/>
                        <input type="hidden" class="visitor" id="visitor-{{$date->id}}" value="{{$date->visitor}}">
                        <input type="hidden" class="home" id="home-{{$date->id}}" value="{{$date->home}}">
                        <div id="output-{{$date->id}}"> </div>

                        <div class="chart-container" id="chart-containerId-{{$date->id}}" style="display:none">
                            <canvas id="myChart-{{$date->id}}"></canvas>
                        </div>
                    @endif

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

@section('script')

    <script type="text/javascript">
        var data;
        $(".heart").click(function() {
            data=$(this).nextAll("#gameId").val();
            //console.log("game Id is " + data);
        });

        function likeTheGame(){

            // $('.heart').on('click',function () {
            // var value = $(this).nextAll("input[type=text]").first().val();
            var isbn = $('.gameId').val();
            var value= $(this).find("input:text").val();

            $(document).ready(function () {
                console.log("heart is clicked \n" + "userId: " + userId + "\nUser Email: " + userEmail + "\nName: " + userName);

                console.log("game Id is " + data);

                var count = 0;

                //});
            });

        }


        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


        var gameIdData;
        var gameHome;
        var gameVisitor;
        $(".heart").click(function() {
            console.log("click");
            gameIdData=$(this).nextAll(".gameId").val();
            gameHome=$(this).nextAll(".visitor").val();
            gameVisitor=$(this).nextAll(".home").val();
            console.log("game Id is " + gameIdData +"game home is " + gameHome+" gameVisitor is " + gameVisitor);

        });


        $(".predict").click(function() {
            console.log("predict click");
            gameIdData=$(this).nextAll(".gameId").val();
            gameHome=$(this).nextAll(".visitor").val();
            gameVisitor=$(this).nextAll(".home").val();
            console.log("game Id is " + gameIdData +"game home is " + gameHome+" gameVisitor is " + gameVisitor);

            if(!$.active){
                //By making sure $.active is zero
                $.ajax({
                    type: 'GET',
                    url: '{{route('predict')}}',
                    data: {'home_team':gameHome,'away_team':gameVisitor,_token: CSRF_TOKEN},
                    success: function (data) {

                        //do when ajax success
                        console.log(data);
                        var predictionData = jQuery.parseJSON(data);
                        if(predictionData.Prediction==1){
                            $("#visitor-"+gameIdData).css("background-color","#ddffb6");
                            $("#home-"+gameIdData).css("background-color","#fa9a8b");

                        }
                        else {
                            $("#home-"+gameIdData).css("background-color","#ddffb6");
                            $("#visitor-"+gameIdData).css("background-color","#fa9a8b");


                        }
                        //$("#output-"+gameIdData).html(data);

                        $("#chart-containerId-"+gameIdData).show();
                        var ctx = document.getElementById("myChart-"+gameIdData);


                        lineChartData = {
                            datasets: [{
                                label:"Prediction Curve",
                                data: [0,50,predictionData.Percentage,50,0],
                                fill: false,
                                borderColor: [
                                    '#10F7E6'


                                ]
                            }],

                            // These labels appear in the legend and in the tooltips when hovering different arcs
                            labels: [
                                "","half","Our Confidence","half",""
                            ]
                        };
                        // new Chart(document.getElementById("chartjs-0"),
                        //     {"type":"line",
                        //         "data":{"labels":["January","February","March","April","May","June","July"],
                        //             "datasets":[{"label":"My First Dataset","data":[65,59,80,81,56,55,40],"fill":false,"borderColor":"rgb(75, 192, 192)","lineTension":0.1}]},"options":{}});
                        //
                        var myPieChart = new Chart(ctx,{
                            type: 'line',
                            data: lineChartData,

                            options: {
                                scales: {
                                    yAxes: [{
                                        stacked: true
                                    }]
                                }
                            }

                        });

                        //$("#predictButtonid-"+gameIdData).hide();



                    },
                    error: function(){
                        alert("Nope");
                    }
                });

            }




        });

        </script>
    @endsection