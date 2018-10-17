@extends('layouts.app')
@section('content')
<style>
    #container{

        text-align: center;
        display:flex;
    }
    #bloc1, #bloc2
    {


    }
    p.title{
        color:black;
    }
</style>
@if($games)
    <div class="well" >
        <h3 align="left">{{$games->game_date}} {{$games->day}}</h3>
        <div id="container">
        <div id="bloc1">
            <img src="{{URL::asset("images/teamLogos/{$games->visitor}.png")}}" height="128" alt="" />

        </div>
        <div id="bloc2">
            <p class="title" style="font-size:50px;" align="center">


                {{$games->visitor_score}}   ---       {{$games->home_score}}

            </p>
        </div>

        <div id="bloc3">
            <img src="{{URL::asset("images/teamLogos/{$games->home}.png")}}" height="128"  alt="" />

        </div>
        </div>




        <p style="font-size: 45px;" align="center">
            Visitor Score: {{$games->visitor_score}} vs Home Score: {{$games->home_score}}


        </p>

    </div>
@endif



@include('includes.footer')

@endsection