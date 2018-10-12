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
                        <form action="{{url('/games/date')}}" method="post" >
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                            <input  type="text" name="date" placeholder="MM/DD/YYYY" class='datepicker-here'   data-language='en' required="">

                            <input type="submit"  value="Submit">
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




    <div class="about-grids about-top-grids">
        @if(count($games)>0)
            @foreach($games as $game)
            <div class="well">

                <h1 align="center">{{$game->game_date}}</h1>

                <p  style="font-size:50px;" align="center"><img src="images/teamLogos/{{$game->visitor}}.png"  
                        height="128" alt="" />
                    {{$game->visitor}} vs {{$game->home}}
                    <img src="images/teamLogos/{{$game->home}}.png"
                         height="128"  alt="" />
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