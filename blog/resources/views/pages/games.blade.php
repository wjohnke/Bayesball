@extends('layouts.app')
@section('content')
<style>
    form{

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
                <h2>{{$game->game_date}}</h2>
                <h4>
                    {{$game->visitor}} vs {{$game->home}}
                </h4><h1></h1>

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