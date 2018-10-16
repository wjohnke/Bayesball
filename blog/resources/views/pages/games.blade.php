@extends('layouts.app')
@section('content')

<style>
    form{

    }
    img{

    }
</style>

    <div class="footer">
        <!-- container-wrap -->
        <div class="container-wrap">
            <div class="footer-top">

                    <div align="center" style="margin:0 auto" class="col-md-6 f-address f-contact">

                        <h5 >Choose a Date</h5>
                        {{--<form action="{{url('/games/date')}}" method="post" >--}}
                        <div>



                            <input  type="text" id="datePicker" name="date" placeholder="MM/DD/YYYY" class='datepicker-here'   data-language='en' required="">

                            <input type="submit" id="read-data" value="Submit">
                        </div>
                    </div>
                <button >load data</button>
                    <div class="clearfix"> </div>

            </div>
        </div>
        <!-- //container-wrap -->
    </div>
    <!-- //footer -->




    <br>
    <br>




    <div class="about-grids about-top-grids">
        @if(count($games)>0)
            @foreach($games as $game)

            <div class="well">

                <h1 align="center"><a href="{{route('games.date',['date'=>$game->game_date])}}">{{$game->game_date}}</a></h1>

                <p  style="font-size:50px;" align="center">

                    <a href="{{route('games.show', ['id' => $game->id])}}"   >
                    <img src="images/teamLogos/{{$game->visitor}}.png"
                        height="128" alt="" />
                    {{$game->visitor}} vs {{$game->home}}
                    <img src="images/teamLogos/{{$game->home}}.png"
                         height="128"  alt="" />
                    </a>
                </p>



                <h1></h1>

                <h4></h4>
            </div>
            @endforeach

                {{$games->links()}}

            @else
        <p>nothing found</p>

        @endif


    </div>
    </div>
    @include('includes.footer')

    @endsection

    @section('script')

        <script type="text/javascript">


            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            {{--$.ajax({--}}
                {{--url: "{{route('games.goToDate')}}",--}}
                {{--type: 'GET',--}}
                {{--data: {_token: CSRF_TOKEN},--}}
                {{--dataType: 'JSON',--}}
                {{--success: function (data) {--}}
                    {{--console.log(data);--}}
                {{--}--}}
            {{--});--}}
            $('#read-data').on('click',function () {
                var date = document.getElementById('datePicker').value;
                console.log("datePicker value: "+document.getElementById('datePicker').value);

               $.get("{{route('games.goToDate')}}",function (data,status) {
                    //alert("mammama"+"  status:"+status);


                     $.each(data,function (i,value) {
                         if(date===value.game_date)
                         {
                             console.log(date +" equals "+ value.game_date);
                         }
                         else
                            console.log("not equal");

                    });

                 });
                });

        </script>
        @endsection