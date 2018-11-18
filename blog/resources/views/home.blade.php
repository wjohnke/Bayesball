@extends('layouts.app')

@section('content')

    @php
        //dd($favGames)
        if(Auth::check()){
                    $userId = Auth::id();
                    $userEmail= Auth::user()->email;


                }
    @endphp

    {{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">Greeting {{ Auth::user()->name }} !!</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--Welcome to BayesBall--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<div class="container">

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Profile</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Your Favorite Game</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" style="text-align: center" role="tabpanel" aria-labelledby="nav-home-tab">
           <h1>Greeting {{ Auth::user()->name }} !!</h1>

            <h2>Welcome to BayesBall</h2>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            {{--user's fav game--}}
            @if(count($favGames)>0)

                @foreach($favGames as $game)
            <div class="well">
                <p> {{$game->visitor}} vs {{$game->home}}</p>
            </div>
                @endforeach



            @endif

            @if(count($favGames)==0)
                <div class="well">
                    <h3 style="font-size:3vw;" align="center">You don't have a favorite game</h3>
                </div>
            @endif


        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
    </div>

</div>

@endsection
