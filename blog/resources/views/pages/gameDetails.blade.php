@extends('layouts.app')
@section('content')
<style>
    #container{


        width :100%;
        text-align:center;
        margin-bottom: 60px;


    }
    #left
    {   float:left;
        margin-left: 100px;
        width:100px;
        height: 128px;
        margin-bottom: 20px;



    }
    #center{
        display: inline-block;
        margin:0 auto;
        width:400px;
        height: 128px;
        margin-bottom: 20px;

    }
    #right{
        margin-right: 100px;
        margin-bottom: 20px;
        float:right;
        width:100px;
        height: 128px;

    }
    #bottom{
        margin-top: 2px;
        margin-left: 20px;
    }
    .nav-tabs > li, .nav-pills > li {
        float:none;
        display:inline-block;
        *display:inline;
        zoom:1;
    }

    .nav nav-tab, .nav-pills {
        text-align:center;
    }

    #myTab{
        text-align: center;
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

        <div  class="table">
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


        <p style="font-size: 45px;" align="center">


        </p>

    </div>

    <div class="well">
        <div id="tabs">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{$games->visitor}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">{{$games->home}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                qweqweqwew
                </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>
        </div>

    </div>

    <div  id="bottom" >
        <div   class="-bottom-left-">
            <h4 >Stadium: {{$games->park}}</h4>
            <h4 >Duration: {{$games->game_minutes}} minutes</h4>
        </div>
    </div>
@endif



@include('includes.footer')

@endsection