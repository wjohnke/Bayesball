@extends('layouts.app')
@section('content')
<style>
    #container{


        width :100%;
        text-align:center;

    }
    #left
    {   float:left;
        margin-left: 100px;
        width:100px;
        height: 128px;


    }
    #center{
        display: inline-block;
        margin:0 auto;
        width:400px;
        height: 128px;
    }
    #right{
        margin-right: 100px;
        float:right;
        width:100px;
        height: 128px;

    }


    p.title{
        color:black;
    }
</style>
@if($games)
    <div class="well" >
        <h3 align="left">{{$games->game_date}} {{$games->day}}</h3>
        <div id="container">
        <div id="left">
            <img src="{{URL::asset("images/teamLogos/{$games->visitor}.png")}}" height="128" alt="" />
            <div > <h2>{{$games->visitor}}</h2></div>
        </div>
            <div id="center">
                <p class="title" style="font-size:50px;" align="center">


                    {{$games->visitor_score}} - {{$games->home_score}}

                </p>
            </div>
        <div id="right">
                <img src="{{URL::asset("images/teamLogos/{$games->home}.png")}}" height="128"  alt="" />
            <div>
              <h2>{{$games->home}}</h2>
            </div>


        </div >




        </div>




        <p style="font-size: 45px;" align="center">


        </p>

    </div>
    <div class="well">
        <div class="table">
            <table width="100%">
                <tr>
                    <th>Team</th>
                    <td margin-right="0" width="5%" align="right">ab</td>
                    <td margin-right="0" width="5%" align="right">h</td>
                    <td margin-right="0" width="5%" align="right">2b</td>
                    <td margin-right="0" width="5%" align="right">3b</td>
                    <td margin-right="0" width="5%" align="right">hr</td>
                    <td margin-right="0" width="5%" align="right">sh</td>


                </tr>
                <tr>
                    <th>{{$games->visitor}}</th>


                    <td margin-right="0" align="right">{{$games->visitor_ab}}</td>
                    <td margin-right="0" align="right">{{$games->visitor_h}}</td>
                    <td margin-right="0" align="right">{{$games->visitor_2b}}</td>
                    <td margin-right="0" align="right">{{$games->visitor_3b}}</td>
                    <td margin-right="0" align="right">{{$games->visitor_hr}}</td>
                    <td margin-right="0" align="right">{{$games->visitor_sh}}</td>




                </tr>
                <tr>
                    <th>{{$games->home}}</th>
                    <td margin-right="0" align="right">{{$games->home_ab}}</td>
                    <td margin-right="0" align="right">{{$games->home_h}}</td>
                    <td margin-right="0" align="right">{{$games->home_2b}}</td>
                    <td margin-right="0" align="right">{{$games->home_3b}}</td>
                    <td margin-right="0" align="right">{{$games->home_hr}}</td>
                    <td margin-right="0" align="right">{{$games->home_sh}}</td>

                </tr>


            </table>
        </div>
    </div>
@endif



@include('includes.footer')

@endsection