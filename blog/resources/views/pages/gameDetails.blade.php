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
    .table{
        align-content: center;
        font-size: calc(8px + 1vw);
    }
    td{
        align: right;
        text-align: left;
    }
</style>
@if($games)
    <div class="well" >
        <h3 align="left">{{$games->game_date}} {{$games->day}}</h3>
        <div id="container">
        <div id="left">
            <img class="teamImg" src="{{URL::asset("images/teamLogos/{$games->visitor}.png")}}" height="128" alt="" />
            <div > <h2 style="text-align: center">{{BayesBall\Enums\TeamName::getDescription($games->visitor)}}</h2></div>
        </div>
            <div id="center">
                <p class="title"style="font-size:3vw;" align="center">


                    {{$games->visitor_score}} ― {{$games->home_score}}

                </p>
            </div>
        <div id="right">
                <img class="teamImg"src="{{URL::asset("images/teamLogos/{$games->home}.png")}}" height="128"  alt="" />
            <div>
              <h2 style="text-align: center">{{BayesBall\Enums\TeamName::getDescription($games->home)}}</h2>
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

    <div class="container">


        <section>
            <div class="tabs tabs-style-iconfall">
                <nav>
                    <ul>
                        <li><a href="#section-iconfall-1"><span>{{BayesBall\Enums\TeamName::getDescription($games->visitor)}}</span></a></li>
                        <li><a href="#section-iconfall-2"><span>{{BayesBall\Enums\TeamName::getDescription($games->home)}}</span></a></li>

                    </ul>
                </nav>
                <div class="content-wrap">
                    <section id="section-iconfall-1">

                        <div class="table">
                            <table  align="center">
                                <h2 align="center">Lineup</h2>

                                <tr>
                                    <th width=""><h3>Player</h3></th>
                                    <th width=""><h3>Position</h3></th>
                                    <td width=""><h3>R</h3></td>
                                    <td width=""><h3>H</h3></td>
                                    <td width=""><h3>RBI</h3></td>
                                    <td width=""><h3>BA</h3></td>



                                </tr>

                                @for($vcount=1;$vcount<10;$vcount++)

                                    @php
                                        $vfullName ='full_name_'.$vcount;
                                        $vpos='homeBattingPos_'.$vcount;
                                        $vR='R_'.$vcount;
                                         $vH='H_'.$vcount;
                                         $vRBI='RBI_'.$vcount;
                                         $vBA='BA_'.$vcount;




                                    @endphp
                                        @if(!$visitBatStats==null)
                                    <tr>
                                        <th width="">{{$visitBatStats->$vfullName}}</th>

                                        <th width="50%"> • {{\BayesBall\Enums\BattingPos::getDescription($visitBatStats->$vpos)}}</th>
                                        <td width="">  {{$visitBatStats->$vR}}</td>
                                        <td width="">  {{$visitBatStats->$vH}}</td>
                                        <td width="">  {{$visitBatStats->$vRBI}}</td>
                                        <td width="">  {{$visitBatStats->$vBA}}</td>

                                    </tr>
                                    @endif
                                @endfor
                                {{--<tr>--}}
                                    {{--<th width="600vw"><h3>Player</h3></th>--}}
                                    {{--<td width="23%"><h3>Position</h3></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}

                                    {{--<th width="600vw">{{$games->visitor_batter_1_name}}</th>--}}
                                    {{--<td width="600vw" > • {{\BayesBall\Enums\BattingPos::getDescription($games->visitor_batter_1_pos)}}</td>--}}


                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th width="" >{{$games->visitor_batter_2_name}}</th>--}}

                                    {{--<td width="">         •   {{\BayesBall\Enums\BattingPos::getDescription($games->visitor_batter_2_pos)}}</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th width="">{{$games->visitor_batter_3_name}}</th>--}}
                                    {{--<td width="">         •   {{\BayesBall\Enums\BattingPos::getDescription($games->visitor_batter_3_pos)}}</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th width="">{{$games->visitor_batter_4_name}}</th>--}}
                                    {{--<td width="">         •   {{\BayesBall\Enums\BattingPos::getDescription($games->visitor_batter_4_pos)}}</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th width="">{{$games->visitor_batter_5_name}}</th>--}}
                                    {{--<td width="">         •   {{\BayesBall\Enums\BattingPos::getDescription($games->visitor_batter_5_pos)}}</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th width="">{{$games->visitor_batter_6_name}}</th>--}}
                                    {{--<td width="">         •   {{\BayesBall\Enums\BattingPos::getDescription($games->visitor_batter_6_pos)}}</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th width="">{{$games->visitor_batter_7_name}}</th>--}}
                                    {{--<td width="">         •   {{\BayesBall\Enums\BattingPos::getDescription($games->visitor_batter_7_pos)}}</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th width="">{{$games->visitor_batter_8_name}}</th>--}}
                                    {{--<td width="">         •   {{\BayesBall\Enums\BattingPos::getDescription($games->visitor_batter_8_pos)}}</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th width="">{{$games->visitor_batter_9_name}}</th>--}}
                                    {{--<td width="">         •   {{\BayesBall\Enums\BattingPos::getDescription($games->visitor_batter_9_pos)}}</td>--}}
                                {{--</tr>--}}

                            </table>
                        </div>
                    </section>
                    <section id="section-iconfall-2">
                        <div class="table">
                            <table >
                                <h2 align="center">Lineup</h2>
                                {{--<tr>--}}
                                    {{--<th>--}}
                                        {{--Player--}}
                                    {{--</th>--}}
                                    {{--<td>--}}
                                        {{--R</td>--}}
                                    {{--<td>--}}
                                        {{--H </td>--}}
                                    {{--<td>--}}
                                        {{--2B </td>--}}
                                    {{--<td> RBI</td>--}}
                                {{--</tr>--}}

                                <tr>
                                    <th width=""><h3>Player</h3></th>
                                    <th width=""><h3>Position</h3></th>
                                    <td width=""><h3>R</h3></td>
                                    <td width=""><h3>H</h3></td>
                                    <td width=""><h3>RBI</h3></td>
                                    <td width=""><h3>BA</h3></td>



                                </tr>



                                @for($count=1;$count<10;$count++)

                                    @php
                                       $fullName ='full_name_'.$count;
                                       $pos='homeBattingPos_'.$count;
                                       $R='R_'.$count;
                                        $H='H_'.$count;
                                        $RBI='RBI_'.$count;
                                        $BA='BA_'.$count;




                                    @endphp
                                    <tr>
                                        <th width="">{{$homeBatStats->$fullName}}</th>

                                        {{--<td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_1_pos)}}</td>--}}
                                        <th width="50%"> • {{\BayesBall\Enums\BattingPos::getDescription($homeBatStats->$pos)}}</th>
                                            <td width="">  {{$homeBatStats->$R}}</td>
                                            <td width="">  {{$homeBatStats->$H}}</td>
                                            <td width="">  {{$homeBatStats->$RBI}}</td>
                                            <td width="">  {{$homeBatStats->$BA}}</td>

                                    </tr>
                                @endfor

                                {{--<tr>--}}

                                    {{--<th width="">{{$games->home_batter_1_name}}</th>--}}
                                    {{--<th width="">{{$homeBatStats->full_name_1}}</th>--}}

                                    {{--<td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_1_pos)}}</td>--}}
                                    {{--<th width=""> • {{\BayesBall\Enums\BattingPos::getDescription($homeBatStats->homeBattingPos_1)}}</th>--}}
                                    {{--<td width=""> • {{$homeBatStats->R_1}}</td>--}}


                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th width="">{{$games->home_batter_2_name}}</th>--}}
                                    {{--<th width="">{{$homeBatStats->full_name_2}}</th>--}}

                                    {{--<td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_2_pos)}}</td>--}}
                                    {{--<th width=""> • {{\BayesBall\Enums\BattingPos::getDescription($homeBatStats->homeBattingPos_2)}}</th>--}}
                                    {{--<td width=""> • {{$homeBatStats->R_2}}</td>--}}


                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th width="">{{$games->home_batter_3_name}}</th>--}}
                                    {{--<th width="">{{$homeBatStats->full_name_3}}</th>--}}

                                    {{--<td width="">• {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_3_pos)}}</td>--}}
                                    {{--<th width=""> • {{\BayesBall\Enums\BattingPos::getDescription($homeBatStats->homeBattingPos_3)}}</th>--}}
                                    {{--<td width=""> • {{$homeBatStats->R_3}}</td>--}}


                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th width="">{{$games->home_batter_4_name}}</th>--}}
                                    {{--<th width="">{{$homeBatStats->full_name_4}}</th>--}}

                                    {{--<td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_4_pos)}}</td>--}}
                                    {{--<th width=""> • {{\BayesBall\Enums\BattingPos::getDescription($homeBatStats->homeBattingPos_4)}}</th>--}}
                                    {{--<td width=""> • {{$homeBatStats->R_4}}</td>--}}


                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th width="">{{$games->home_batter_5_name}}</th>--}}
                                    {{--<th width="">{{$homeBatStats->full_name_5}}</th>--}}

                                    {{--<td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_5_pos)}}</td>--}}
                                    {{--<th width=""> • {{\BayesBall\Enums\BattingPos::getDescription($homeBatStats->homeBattingPos_5)}}</th>--}}
                                    {{--<td width=""> • {{$homeBatStats->R_5}}</td>--}}


                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th width="">{{$games->home_batter_6_name}}</th>--}}
                                    {{--<th width="">{{$homeBatStats->full_name_6}}</th>--}}

                                    {{--<td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_6_pos)}}</td>--}}
                                    {{--<th width=""> • {{\BayesBall\Enums\BattingPos::getDescription($homeBatStats->homeBattingPos_6)}}</th>--}}
                                    {{--<td width=""> • {{$homeBatStats->R_6}}</td>--}}


                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th width="">{{$games->home_batter_7_name}}</th>--}}
                                    {{--<th width="">{{$homeBatStats->full_name_7}}</th>--}}

                                    {{--<td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_7_pos)}}</td>--}}
                                    {{--<th width=""> • {{\BayesBall\Enums\BattingPos::getDescription($homeBatStats->homeBattingPos_7)}}</th>--}}
                                    {{--<td width=""> • {{$homeBatStats->R_7}}</td>--}}


                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th width="">{{$games->home_batter_8_name}}</th>--}}
                                    {{--<th width="">{{$homeBatStats->full_name_8}}</th>--}}

                                    {{--<td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_8_pos)}}</td>--}}
                                    {{--<th width=""> • {{\BayesBall\Enums\BattingPos::getDescription($homeBatStats->homeBattingPos_8)}}</th>--}}
                                    {{--<td width=""> • {{$homeBatStats->R_8}}</td>--}}


                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th width="">{{$games->home_batter_9_name}}</th>--}}
                                    {{--<th width="">{{$homeBatStats->full_name_9}}</th>--}}

                                    {{--<td width=""> • {{\BayesBall\Enums\BattingPos::getDescription($games->home_batter_9_pos)}}</td>--}}
                                    {{--<th width=""> • {{\BayesBall\Enums\BattingPos::getDescription($homeBatStats->homeBattingPos_9)}}</th>--}}
                                    {{--<td width=""> • {{$homeBatStats->R_9}}</td>--}}


                                {{--</tr>--}}

                            </table>
                        </div>
                    </section>

                </div><!-- /content -->
            </div><!-- /tabs -->
        </section>
    </div>


    <div  id="bottom" >
        <div   class="-bottom-left-">
            <h4 >Stadium: {{$games->park}}</h4>
            <h4 >Duration: {{$games->game_minutes}} minutes</h4>
        </div>
@php
//dd($homeBatStats)
@endphp
    </div>

    <div>


        @php
            //$array = json_decode( $homeBatStats, true );
            //foreach ($homeBatStats as $item){
                 //echo $item;
            //}

                //dd($visitBatStats);
                //dd($homeBatStats);

                //$key = array_search($home->full_name, $json);
                //echo $key;
        @endphp


    </div>
@endif



@include('includes.footer')

@endsection

@section('script')
    <script src="{{asset('js/cbpFWTabs.js')}}"></script>
    <script>
        (function() {

            [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                new CBPFWTabs( el );
            });

        })();
    </script>
    <script>
        $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script>
    @endsection