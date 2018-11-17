@extends('layouts.app')
@section('content')
<style>
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
    #bottom{
        margin-top: 2px;
        margin-left: 20px;
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
            <div > <h2>{{BayesBall\Enums\TeamName::getDescription($games->visitor)}}</h2></div>
        </div>
            <div id="center">
                <p class="title"style="font-size:3vw;" align="center">


                    {{$games->visitor_score}} ― {{$games->home_score}}

                </p>
            </div>
        <div id="right">
                <img src="{{URL::asset("images/teamLogos/{$games->home}.png")}}" height="128"  alt="" />
            <div>
              <h2>{{BayesBall\Enums\TeamName::getDescription($games->home)}}</h2>
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
                    <th>{{BayesBall\Enums\TeamName::getDescription($games->visitor)}}</th>


                    <td margin-right="0" align="right">{{$games->visitor_ab}}</td>
                    <td margin-right="0" align="right">{{$games->visitor_h}}</td>
                    <td margin-right="0" align="right">{{$games->visitor_2b}}</td>
                    <td margin-right="0" align="right">{{$games->visitor_3b}}</td>
                    <td margin-right="0" align="right">{{$games->visitor_hr}}</td>
                    <td margin-right="0" align="right">{{$games->visitor_sh}}</td>




                </tr>
                <tr>
                    <th>{{BayesBall\Enums\TeamName::getDescription($games->home)}}</th>
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
            <div class="nav nav-tabs" id="nav-tab" role="tablist">

                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{BayesBall\Enums\TeamName::getDescription($games->visitor)}}</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">{{BayesBall\Enums\TeamName::getDescription($games->home)}}</a>

            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="table">
                    <table >
                        <h2 align="center">Lineup</h2>
                        <tr>
                            <th><h3>Player</h3></th>
                        </tr>
                        <tr>

                            <th width="">{{$games->visitor_batter_1_name}}</th>
                            <td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->visitor_batter_1_pos)}}</td>
                            {{--@if($games->visitor_batter_1_pos===\BayesBall\Enums\BattingPos::LeftFielder)--}}
                                {{--<p> find one</p>--}}
                            {{--@else--}}
                                {{--<p>nothing same</p>--}}
                            {{--@endif--}}

                        </tr>
                        <tr>
                            <th width="">{{$games->visitor_batter_2_name}}</th>
                            <td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->visitor_batter_2_pos)}}</td>
                        </tr>
                        <tr>
                            <th width="">{{$games->visitor_batter_3_name}}</th>
                            <td width="">• {{\BayesBall\Enums\BattingPos::getDescription($games->visitor_batter_3_pos)}}</td>
                        </tr>
                        <tr>
                            <th width="">{{$games->visitor_batter_4_name}}</th>
                            <td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->visitor_batter_4_pos)}}</td>
                        </tr>
                        <tr>
                            <th width="">{{$games->visitor_batter_5_name}}</th>
                            <td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->visitor_batter_5_pos)}}</td>
                        </tr>
                        <tr>
                            <th width="">{{$games->visitor_batter_6_name}}</th>
                            <td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->visitor_batter_6_pos)}}</td>
                        </tr>
                        <tr>
                            <th width="">{{$games->visitor_batter_7_name}}</th>
                            <td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->visitor_batter_7_pos)}}</td>
                        </tr>
                        <tr>
                            <th width="">{{$games->visitor_batter_8_name}}</th>
                            <td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->visitor_batter_8_pos)}}</td>
                        </tr>
                        <tr>
                            <th width="">{{$games->visitor_batter_9_name}}</th>
                            <td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->visitor_batter_9_pos)}}</td>
                        </tr>

                    </table>
                </div>

            </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="table">
                    <table >
                        <h2 align="center">Lineup</h2>
                        <tr>
                            <th><h3>Player</h3></th>
                        </tr>
                        <tr>

                            <th width="">{{$games->home_batter_1_name}}</th>
                            <td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_1_pos)}}</td>


                        </tr>
                        <tr>
                            <th width="">{{$games->home_batter_2_name}}</th>
                            <td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_2_pos)}}</td>
                        </tr>
                        <tr>
                            <th width="">{{$games->home_batter_3_name}}</th>
                            <td width="">• {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_3_pos)}}</td>
                        </tr>
                        <tr>
                            <th width="">{{$games->home_batter_4_name}}</th>
                            <td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_4_pos)}}</td>
                        </tr>
                        <tr>
                            <th width="">{{$games->home_batter_5_name}}</th>
                            <td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_5_pos)}}</td>
                        </tr>
                        <tr>
                            <th width="">{{$games->home_batter_6_name}}</th>
                            <td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_6_pos)}}</td>
                        </tr>
                        <tr>
                            <th width="">{{$games->home_batter_7_name}}</th>
                            <td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_7_pos)}}</td>
                        </tr>
                        <tr>
                            <th width="">{{$games->home_batter_8_name}}</th>
                            <td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_8_pos)}}</td>
                        </tr>
                        <tr>
                            <th width="">{{$games->home_batter_9_name}}</th>
                            <td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_9_pos)}}</td>
                        </tr>

                    </table>
                </div>
            </div>

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

@section('script')
    <script>
        $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script>
    @endsection