@extends('layouts.app')
@section('content')

<style>
    form{

    }
    img{

    }
    #bottomright {
        position: absolute;
        bottom: 0px;
        right: 0px;
    }
    .discontainer{

        /*z-index:0;*/
        display: flex;                  /* establish flex container */
        /*flex-direction: row;            !* default value; can be omitted *!*/
        flex-wrap: nowrap;              /* default value; can be omitted */
        justify-content: space-between; /* switched from default (flex-start, see below) */
        /*background-color: lightyellow;*/



    }
    .discontainer > div {
        width: 100%;
        height: 100%;
        /*border: 2px dashed red;*/
        margin-left: 1%;
        margin-right: 1%;

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
                        $i=1;
                        //$date= '2017-04-02';
                        //echo $date;
                        if(Auth::check()){
                            $userId = Auth::id();
                            $userEmail= Auth::user()->email;

                        }

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




    <br>
    <br>




    <div id="game-info" class="about-grids about-top-grids">

        <section>
            <div class="tabs tabs-style-iconfall">
                <nav>
                    <ul>
                        <li><a href="#section-iconfall-1" class="icon icon-display"><span>All Games</span></a></li>
                        <li><a href="#section-iconfall-2" class="icon icon-coffee"><span>Today's Game</span></a></li>

                    </ul>
                </nav>
                {{--all games--}}
                <div class="content-wrap">
                    <section id="section-iconfall-1">
                        @if(count($games)>0)
                            @foreach($games as $game)
                                <div  class="well" style="position: relative">

                                    <h1 align="center"><a href="{{route('games.date',['date'=>$game->game_date])}}">{{$game->game_date}}</a></h1>




                                    <div  class="discontainer">


                                        <div  id="visitor-{{$game->id}}">


                                            <div style="display:none" class="gameContent" id="visitorContent-{{$game->id}}">
                                                <img id="bg-text" class="teamImg" src="{{URL::asset("images/win.png")}}">

                                                {{--<p id="bg-text"> WIN &#9989</p>--}}

                                            </div>
                                            <img class="teamImg" src="{{URL::asset("images/teamLogos/{$game->visitor}.png")}}" height="128" alt="" />
                                            <div > <h2 style="text-align: center ;font-size:2vw;">{{\BayesBall\Enums\TeamName::getDescription($game->visitor)}}</h2></div>

                                        </div>
                                        <div >
                                            <p class="title" style="font-size:calc(10px+ 5vw);" align="center">
                                                <a href="{{route('games.show', ['id' => $game->id])}}"   >



                                                     vs
                                                </a>
                                            </p>
                                        </div>

                                        <div id="home-{{$game->id}}">
                                            <div style="display:none" class="gameContent" id="homeContent-{{$game->id}}">
                                                <img class="teamImg" id="bg-text" src="{{URL::asset("images/win.png")}}">

                                                {{--<p id="bg-text"> WIN &#9989</p>--}}

                                            </div>
                                            <img class="teamImg" src="{{URL::asset("images/teamLogos/{$game->home}.png")}}" height="128"  alt="" />
                                            <div > <h2 style="text-align: center;font-size:2vw;">{{\BayesBall\Enums\TeamName::getDescription($game->home)}} </h2></div>



                                        </div >


                                    </div>


                                    @if(Auth::check())

                                        <div class="heart" id="bottomright" onclick="likeTheGame()"></div>
                                        <div class="predict" align="center">
                                            <button class="grebutton" id="predictButtonid-{{$game->id}}"> PREDICT</button>
                                        </div>
                                        {{--<p>  {{$userId}} {{$userEmail}}</p>--}}
                                        <input type="hidden" class="gameDate" id="gameDate-{{$game->game_date}}" value="{{$game->game_date}}"/>
                                        <input type="hidden" class="gameId"  id="gameId-{{$game->id}}"value="{{$game->id}}"/>
                                        <input type="hidden" class="visitor" id="visitor-{{$game->id}}" value="{{$game->visitor}}">
                                        <input type="hidden" class="home" id="home-{{$game->id}}" value="{{$game->home}}">
                                        {{--<div id="output-{{$game->id}}"> </div>--}}

                                        <div class="chart-container" id="chart-containerId-{{$game->id}}" style="display:none">
                                            <canvas id="myChart-{{$game->id}}"></canvas>

                                        </div>
                                        <div  id="output-{{$game->id}}" style="display:none">
                                           <h3 id="outputP-{{$game->id}}">lala</h3>
                                        </div>
                                    @endif

                                </div>
                                @php
                                    $i++;
                                @endphp
                            @endforeach

                            {{$games->links()}}

                        @else
                            <p>nothing found</p>

                        @endif

                    </section>
                    <section id="section-iconfall-2">
                        @if(count($games)>0)

                            @foreach($games as $todayGame)
                                @if($todayGame->game_date===$date)
                                    @php
                                        $count++;
                                    @endphp
                                    <div class="well" style="position: relative;">

                                        <h1 style="font-size:1vw;"  align="center"><a href="{{route('games.date',['date'=>$todayGame->game_date])}}">{{$todayGame->game_date}}</a></h1>

                                        <div class="discontainer">
                                            <div  >

                                                <img src="{{URL::asset("images/teamLogos/{$todayGame->visitor}.png")}}" class="center" border="0" alt="" />

                                            </div>

                                            <div >
                                                <p style="font-size:2vw;" >
                                                    <a href="{{route('games.show', ['id' => $todayGame->id])}}"   >



                                                        {{\BayesBall\Enums\TeamName::getDescription($todayGame->visitor)}} vs {{\BayesBall\Enums\TeamName::getDescription($todayGame->home)}}
                                                    </a>
                                                </p>
                                            </div>
                                            <div >
                                                <img src="{{URL::asset("images/teamLogos/{$todayGame->home}.png")}}" class="center" border="0"  alt="" />


                                            </div >

                                            <div class="heart" id="bottomright"></div>


                                        </div>
                                    </div>
                                @endif
                            @endforeach



                        @endif

                        @if($count==0)
                            <div class="well">
                                <h3 style="font-size:3vw;" align="center">There is no game today</h3>
                            </div>
                        @endif


                    </section>

                </div><!-- /content -->
            </div><!-- /tabs -->
        </section>








    </div>

    @include('includes.footer')

    @endsection

    @section('script')
        <script src="{{asset('js/cbpFWTabs.js')}}"></script>
        <script>
            (function() {

                [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                    new CBPFWTabs( el );
                });

            })();
        </script>
        <script>
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });


            </script>



        <script type="text/javascript">

            //var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


            var gameIdData;
            var gameHome;
            var gameVisitor;
            var bar1;
            $(".heart").click(function() {
                console.log("click");
                gameIdData=$(this).nextAll(".gameId").val();
                gameHome=$(this).nextAll(".home").val();
                gameVisitor=$(this).nextAll(".visitor").val();
                console.log("userId is "+userId+" game Id is " + gameIdData +"game home is " + gameHome+" gameVisitor is " + gameVisitor);


                if(!$.active){
                    $.ajax({
                        type:'POST',
                        url:'{{route('games.store')}}',
                        data:{'userId':userId,'gameId':gameIdData,'userName':userName ,_token: '{{csrf_token()}}'},
                        success:function(data){
                            console.log(data);
                        },
                        error: function(){
                            alert("Nope");
                        }
                    });
                }

            });



            $(".predict").click(function() {
                console.log("predict click");
                gameDate=$(this).nextAll(".gameDate").val();
                gameIdData=$(this).nextAll(".gameId").val();
                gameHome=$(this).nextAll(".home").val();
                gameVisitor=$(this).nextAll(".visitor").val();
                console.log("game Id is " + gameIdData +"game home is " + gameHome+" gameVisitor is " + gameVisitor+" gameDate is "+gameDate);
                $(".spinner").show();

                if(!$.active){
                    //By making sure $.active is zero
                    $.ajax({
                        type: 'GET',
                        url: '{{route('predict')}}',
                        data: {'home_team':gameHome,'away_team':gameVisitor,'game_date':gameDate},
                        success: function (data) {
                            //do when ajax success
                            $("#predictButtonid-"+gameIdData).hide();

                            //console.log(data);
                            var predictionData = jQuery.parseJSON(data);
                            console.log('prediction 1 is '+predictionData[0].Prediction);
                            console.log('prediction 4 is '+predictionData[0].Prediction+ ' '+predictionData[0].Percentage);

                            barChartData = {

                                labels:["naive bayes","logistic regression","support vector machines","decision tree"],
                                datasets: [{
                                    label:["Winning Percentage"],
                                    data: [predictionData[0].Percentage,predictionData[1].Percentage,predictionData[2].Percentage,
                                        predictionData[3].Percentage],
                                    fill: false,
                                    backgroundColor:[
                                        //'#4cbb17',
                                        //'#9966FF'
                                        "rgba(255, 99, 132, 0.2)",
                                        "rgba(255, 159, 64, 0.2)",
                                        "rgba(255, 205, 86, 0.2)",
                                        "rgba(75, 192, 192, 0.2)"

                                    ],
                                    borderColor: [
                                        //'#4cbb17',
                                        //'#9966FF',
                                        "rgba(255, 99, 132, 0.2)",
                                        "rgba(255, 159, 64, 0.2)",
                                        "rgba(255, 205, 86, 0.2)",
                                        "rgba(75, 192, 192, 0.2)"


                                    ]
                                    ,
                                    borderWidth: 1
                                }],

                                // These labels appear in the legend and in the tooltips when hovering different arcs

                            };
                            if(predictionData[4].Prediction==1){
                                console.log(predictionData[4].Prediction+'means team1 '+gameVisitor+' win');
                                // $("#visitor-"+gameIdData).css("background-color","#ddffb6");
                                // $("#home-"+gameIdData).css("background-color","#fa9a8b");
                                $("#visitorContent-"+gameIdData).show();
                                $("#homeContent-"+gameIdData).hide();
                                $("#visitor-"+gameIdData).addClass('borderClass');
                                $("#home-"+gameIdData).removeClass('borderClass');
                                //barChartData.labels=[gameVisitor,gameHome];
                            }
                            else {
                                console.log(predictionData[4].Prediction+'means team1 '+gameVisitor+' lose');
                                // $("#home-"+gameIdData).css("background-color","#ddffb6");
                                // $("#visitor-"+gameIdData).css("background-color","#fa9a8b");
                                $("#visitorContent-"+gameIdData).hide();
                                $("#homeContent-"+gameIdData).show();
                                $("#home-"+gameIdData).addClass('borderClass');
                                $("#visitor-"+gameIdData).removeClass('borderClass');
                                //barChartData.labels=[gameHome,gameVisitor];


                            }
                            //$("#output-"+gameIdData).html(data);

                            $("#chart-containerId-"+gameIdData).show();
                            var ctx = document.getElementById("myChart-"+gameIdData);
                            $(".spinner").hide();


                            // if(predictionData.Percentage==1){
                            //
                            //     console.log('set')
                            //
                            // }else{
                            //     console.log('set')
                            //
                            //
                            // }

                            var myBarChart = new Chart(ctx,{
                                type: 'bar',
                                data:
                                barChartData,

                                options: {

                                    scales: {
                                        yAxes: [{
                                            barPercentage:0.9,
                                            //stacked: true,
                                            display:true,
                                            ticks:{
                                                suggestedMin: 55
                                                //beginAtZero:false
                                            }
                                        }],
                                        xAxes: [{
                                            stacked: true,
                                            ticks:{
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }

                            });

                            //$("#visitorContent-"+gameIdData).show();
                            document.getElementById("outputP-"+gameIdData).innerHTML ="Confidence: "+ predictionData[4].Percentage;
                            $("#output-"+gameIdData).show();

                            console.log("#output-"+gameIdData);

                            // new Chart(document.getElementById("chartjs-1"),
                            //     {"type":"bar",
                            //         "data":{"labels":["January","February","March","April","May","June","July"],
                            //             "datasets":[{
                            //                 "label":"My First Dataset","data":[65,59,80,81,56,55,40],
                            //                 "fill":false,
                            //                 "backgroundColor":["rgba(255, 99, 132, 0.2)",
                            //                     "rgba(255, 159, 64, 0.2)","rgba(255, 205, 86, 0.2)",
                            //                     "rgba(75, 192, 192, 0.2)","rgba(54, 162, 235, 0.2)",
                            //                     "rgba(153, 102, 255, 0.2)","rgba(201, 203, 207, 0.2)"],
                            //                     "borderColor":["rgb(255, 99, 132)","rgb(255, 159, 64)","rgb(255, 205, 86)",
                            //                         "rgb(75, 192, 192)","rgb(54, 162, 235)","rgb(153, 102, 255)",
                            //                         "rgb(201, 203, 207)"],"borderWidth":1}]},
                            //         "options":{"scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}}
                            //     }
                            //         );

                            //$("#predictButtonid-"+gameIdData).hide();



                        },
                        error: function(){

                            alert("Nope");
                            $(".spinner").hide();

                        }
                    });

                }




            });


            {{--success: function (data) {--}}
            {{--console.log(data);--}}

           // $('.heart').on('click', function () {
           //     console.log("before");
           //
           // });





        function likeTheGame(){

            // $('.heart').on('click',function () {
           // var value = $(this).nextAll("input[type=text]").first().val();

            $(document).ready(function () {
                console.log("heart is clicked \n" + "userId: " + userId + "\nUser Email: " + userEmail + "\nName: " + userName);

                //console.log("game Id is " + data);
                // confirm();

                var count = 0;

                //});
            });

        }



            {{--var date = document.getElementById('datePicker').value;--}}
            {{--var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}
            {{--$('#read-data').on('click',function () {--}}
                {{--$.ajax({--}}
                    {{--url: '{{route('goToDate')}}',--}}
                    {{--type: 'GET',--}}
                    {{--data: {_token: CSRF_TOKEN},--}}
                    {{--dataType: 'JSON',--}}
                    {{--success: function (data) {--}}
                        {{--console.log(data);--}}
                    {{--}--}}
                {{--});--}}

            {{--});--}}


            {{--$('#read-data').on('click',function () {--}}
                {{--var date = document.getElementById('datePicker').value;--}}
                {{--console.log("datePicker value: "+document.getElementById('datePicker').value);--}}
                {{--var count=0;--}}
               {{--$.get("{{route('games.goToDate')}}",function (data,status) {--}}
                    {{--//alert("mammama"+"  status:"+status);--}}
                    {{--$.each(data,function (i,value) {--}}
                        {{--if(date===value.game_date){--}}
                            {{--count ++;--}}
                            {{--$('#game-info').empty();--}}
                            {{--return false;--}}
                        {{--}--}}


                    {{--});--}}
                    {{--if(count==0){--}}
                        {{--$('#game-info').empty();--}}
                        {{--alert("Date: "+document.getElementById('datePicker').value +" is not valid!\nNo games played that day")--}}
                    {{--}--}}
                    {{--else {--}}

                     {{--$.each(data,function (i,value) {--}}
                         {{--if(date===value.game_date)--}}
                         {{--{--}}
                             {{--var div =$("<div  class=\"well\">");--}}
                                 {{--div.append($("<h1> <a href='#'></a></h1>",{--}}
                                     {{--text: value.game_date--}}
                                 {{--})).append($("<p>",{--}}
                                     {{--text: value.visitor--}}
                                 {{--}))--}}

                            {{--$('#game-info').append(div);--}}
                             {{--console.log(date +" equals "+ value.game_date);--}}
                         {{--}--}}
                         {{--else--}}
                            {{--console.log("not equal");--}}

                    {{--});--}}
                    {{--}--}}

                 {{--});--}}
                {{--});--}}

        </script>
        @endsection