<?php

namespace BayesBall\Http\Controllers;

use Illuminate\Http\Request;
use BayesBall\Game;
use BayesBall\Http\Resources\GameResource;

class GameApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return GameResource::collection(Game::orderBy('game_date','asc')->paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param Game $gamesApi   //wtf? the name must be "$gamesApi"
     * @return \Illuminate\Http\Response
     */
    public function show(Game $gamesApi)
    {
        //
        //$game= Game::where('game_date','=',$date)->where('visitor','=',$visitor)->where('home','=',$home)->get();

        return  new GameResource($gamesApi);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function gameDetail($date,$visitor,$home){
        //

        $test='sdfdf';

        $game= Game::where('game_date','=',$date)->where('visitor','=',$visitor)->where('home','=',$home)->get();
        return GameResource::collection($game);

    }

    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show','gameDetail']);
    }
}
