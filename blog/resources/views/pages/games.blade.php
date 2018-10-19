@extends('layouts.app')
@section('content')

<style>
    form{

    }
    img{

    }
    #container{


        width :100%;
        text-align:center;
        margin-bottom: 60px;


    }
    #left
    {   float:left;
        margin-left: 100px;
        width:50px;
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
        width:50px;
        height: 128px;

    }
</style>

    <div class="footer">
        <!-- container-wrap -->
        <div class="container-wrap">
            <div class="footer-top">

                    <div align="center" style="margin:0 auto" class="col-md-6 f-address f-contact">


                        <h5 >Choose a Date</h5>
                        <form action=" {{route('goToDate')}}" method="get">

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
        @if(count($games)>0)
            @foreach($games as $game)

            <div  class="well">

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



                <div id="container">
                    <div id="left">
                        <img src="{{URL::asset("images/teamLogos/{$game->visitor}.png")}}" height="128" alt="" />
                    </div>
                    <div id="center">
                        <p class="title" style="font-size:30px;" align="center">
                            <a href="{{route('games.show', ['id' => $game->id])}}"   >



                                {{\BayesBall\Enums\TeamName::getDescription($game->visitor)}} vs {{\BayesBall\Enums\TeamName::getDescription($game->home)}}
                            </a>
                        </p>
                    </div>
                    <div id="right">
                        <img src="{{URL::asset("images/teamLogos/{$game->home}.png")}}" height="128"  alt="" />




                    </div >

                </div>
            </div>
            @endforeach

                {{$games->links()}}

            @else
        <p>nothing found</p>

        @endif


    </div>

    @include('includes.footer')

    @endsection

    @section('script')

        <script type="text/javascript">

            var date = document.getElementById('datePicker').value;
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('#read-data').on('click',function () {
                $.ajax({
                    url: '{{route('goToDate')}}',
                    type: 'GET',
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (data) {
                        console.log(data);
                    }
                });

            });


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