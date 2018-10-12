@extends('layouts.app')
@section('content')

    <div class="footer">
        <!-- container-wrap -->
        <div class="container-wrap">
            <div class="footer-top">

                    <div class="col-md-6 f-address f-contact">
                        <h5 >Choose a Date</h5>
                        <form>
                            <input type="text" class='datepicker-here' placeholder="00/00/00"  data-language='en' required="">
                            <input type="submit" name="date" value="Submit">
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