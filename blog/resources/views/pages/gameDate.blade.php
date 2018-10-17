@extends('layouts.app')
@section('content')

    <div  class="about-grids about-top-grids">
        @if(count($dates)>0)
            @foreach($dates as $date)
                <div  class="well">


                    <h1 align="center">{{$date->game_date}}</h1>

                    <p  style="font-size:50px;" align="center">

                        <a href="{{route('games.show', ['id' => $date->id])}}"   >
                            <img src={{URL::asset("images/teamLogos/{$date->visitor}.png")}}
                                 height="128" alt="" />
                            {{$date->visitor}} vs {{$date->home}}
                            <img src={{URL::asset("images/teamLogos/{$date->home}.png")}}

                                 height="128"  alt="" />
                        </a>
                    </p>
                </div>
            @endforeach

            @else

        @endif
        {{--{{$dates->links()}}--}}
    </div>
    @include('includes.footer')

@endsection