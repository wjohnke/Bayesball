@extends('layouts.app')

@section('content')
    <style>
        form{

        }
        img{

        }
        #bottomright {
            position: absolute;
            bottom: 0px;
            right: 0px;
        }
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


        #bodymovin{
            width:640px;
            height:360px;
            background-color:#000;
            display:block;
            overflow: hidden;
            transform: translate3d(0,0,0);
            margin: auto;
            cursor:pointer;
        }


    </style>
    @php
        //dd($favGames)
        if(Auth::check()){
                    $userId = Auth::id();
                    $userEmail= Auth::user()->email;


                }
    @endphp


    <div class="container">
        <section>
            <div class="tabs tabs-style-iconfall">
                <nav>
                    <ul>
                        <li><a href="#section-iconfall-1" class="icon icon-home"><span>Profile</span></a></li>
                        <li><a href="#section-iconfall-2" class="icon icon-coffee"><span>Your Favorite Game</span></a></li>
                        <li><a href="#section-iconfall-3" class="icon icon-config"><span>Contact</span></a></li>
                        {{--<li><a href="#section-iconfall-4" class="icon icon-coffee"><span>Work</span></a></li>--}}
                        {{--<li><a href="#section-iconfall-5" class="icon icon-config"><span>Settings</span></a></li>--}}
                    </ul>
                </nav>
                <div class="content-wrap">
                    <section id="section-iconfall-1">
                        <h1>Greeting {{ Auth::user()->name }} !!</h1>

                        <h2>Welcome to BayesBall</h2>
                       </section>
                    <section id="section-iconfall-2">
                        @if(count($favGames)>0)

                            @foreach($favGames as $game)
                                <div  class="well" style="position: relative">

                                    <h1 align="center"><a href="{{route('games.date',['date'=>$game->game_date])}}">{{$game->game_date}}</a></h1>

                                    <div  id="container">

                                <div id="visitor-{{$game->id}}">
                                    <img src="{{URL::asset("images/teamLogos/{$game->visitor}.png")}}" height="128" alt="" />
                                </div>
                                <div >
                                    <p class="title" style="font-size:2vw;" align="center">
                                        <a href="{{route('games.show', ['id' => $game->id])}}"   >



                                            {{\BayesBall\Enums\TeamName::getDescription($game->visitor)}} vs {{\BayesBall\Enums\TeamName::getDescription($game->home)}}
                                        </a>
                                    </p>
                                </div>

                                <div id="home-{{$game->id}}">
                                    <img src="{{URL::asset("images/teamLogos/{$game->home}.png")}}" height="128"  alt="" />

                                </div >

                                </div>
                                </div>

                            @endforeach



                        @endif

                        @if(count($favGames)==0)
                            <div class="well">
                                <h3 style="font-size:3vw;" align="center">You don't have a favorite game</h3>
                            </div>
                        @endif

                    </section>
                    <section id="section-iconfall-3">

                        <div class="mail-grids">
                            <div class="col-md-6 mail-grid-left">
                                <h3>Han Song </h3>
                                <h5>Website Engineer</h5>


                                <h6>Telephone: +1 234 567 9871

                                </h6>
                                <h6>
                                    E-mail: <a href="mailto:info@example.com">sh6666@mail.missouri.edu</a>
                                </h6>
                            </div>
                            <div class="col-md-6 contact-form">
                                <form>
                                    <input type="text" placeholder="Name" required="">
                                    <input type="text" placeholder="Email" required="">
                                    <input type="text" placeholder="Subject" required="">
                                    <textarea placeholder="Message" required=""></textarea>
                                    <button type="submit" value="SEND">Get In Touch </button>
                                </form>
                            </div>
                            <div class="clearfix"> </div>
                        </div>

                    </section>
                    {{--<section id="section-iconfall-4"><p>4</p></section>--}}
                    {{--<section id="section-iconfall-5"><p>5</p></section>--}}
                </div><!-- /content -->
            </div><!-- /tabs -->
        </section>
    </div>
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
    @endsection