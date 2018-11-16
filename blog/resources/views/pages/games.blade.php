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



                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All Games</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Today's Game</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        {{--<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">--}}
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">


                            @if(count($games)>0)

                                @foreach($games as $todayGame)
                                    @if($todayGame->game_date===$date)
                                        @php
                                            $count++;
                                        @endphp
                                    <div class="well" style="position: relative;">

                                        <h1 style="font-size:1vw;"  align="center"><a href="{{route('games.date',['date'=>$todayGame->game_date])}}">{{$todayGame->game_date}}</a></h1>

                                        <div id="container">
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


                        </div>
                        {{--<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">--}}
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                            @if(count($games)>0)
                                @foreach($games as $game)
                            <div  class="well" style="position: relative">

                                <h1 align="center"><a href="{{route('games.date',['date'=>$game->game_date])}}">{{$game->game_date}}</a></h1>

                                {{--<p  style="font-size:50px;" align="center">--}}

                                {{--<a href="{{route('games.show', ['id' => $game->id])}}"   >--}}
                                {{--<img src="images/teamLogos/{{$game->visitor}}.png"--}}
                                {{--height="128" alt="" />--}}
                                {{--{{\BayesBall\Enums\TeamName::getDescription($game->visitor)}} vs {{\BayesBall\Enums\TeamName::getDescription($game->home)}}--}}
                                {{--<img src="images/teamLogos/{{$game->home}}.png"--}}
                                {{--height="128"  alt="" />--}}
                                {{--</a>--}}
                                {{--</p>--}}



                                <div  id="container">
                                    <div >
                                        <img src="{{URL::asset("images/teamLogos/{$game->visitor}.png")}}" height="128" alt="" />
                                    </div>
                                    <div >
                                        <p class="title" style="font-size:2vw;" align="center">
                                            <a href="{{route('games.show', ['id' => $game->id])}}"   >



                                                {{\BayesBall\Enums\TeamName::getDescription($game->visitor)}} vs {{\BayesBall\Enums\TeamName::getDescription($game->home)}}
                                            </a>
                                        </p>
                                    </div>

                                    <div >
                                        <img src="{{URL::asset("images/teamLogos/{$game->home}.png")}}" height="128"  alt="" />




                                    </div >


                                </div>
                                @if(Auth::check())

                                <div class="heart" id="bottomright" onclick="likeTheGame()"></div>

                                    {{--<p>  {{$userId}} {{$userEmail}}</p>--}}
                                    <input type="hidden"  id="gameId"value="{{$game->id}}"/>
                                @endif

                            </div>
                                @endforeach

                                {{$games->links()}}

                            @else
                                <p>nothing found</p>

                            @endif
                    </div>

            </div>



    </div>

    @include('includes.footer')

    @endsection

    @section('script')
        {{--<script type="text/javascript">--}}
            {{--$('.heart').on('click', function () {--}}
                {{--$.confirm({--}}
                    {{--icon: 'fa fa-smile-o',--}}
                    {{--theme: 'modern',--}}
                    {{--closeIcon: true,--}}
                    {{--animation: 'scale',--}}
                    {{--type: 'blue',--}}
                {{--});--}}
            {{--});--}}

        {{--</script>--}}

        <script type="text/javascript">



            var data;
            $(".heart").click(function() {
                console.log("click");
                 data=$(this).nextAll("#gameId").val();

                console.log("game Id is " + data);

            });

           // $('.heart').on('click', function () {
           //     console.log("before");
           //
           // });





        function likeTheGame(){

            // $('.heart').on('click',function () {
           // var value = $(this).nextAll("input[type=text]").first().val();
             var isbn = $('.gameId').val();
            var value= $(this).find("input:text").val();

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