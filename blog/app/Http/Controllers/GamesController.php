<?php

namespace BayesBall\Http\Controllers;

use Illuminate\Http\Request;
use BayesBall\Game;
use Illuminate\Http\Response;


class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $games = Game::orderBy('game_date','asc')->paginate(10);
        return view('pages.games')->with('games',$games);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function someAction($date){

//       $date=$request->input('date');
//       echo 'Date: '.$date;
//
//         $dates= Game::where('game_date','=','2017-04-03')
        $dates= Game::where('game_date','=',$date)

                          ->get();

        return $dates;

    }
    public function goToDate(){

        $games= Game::all();
        //$dates= Game::where('game_date','=',$date)
               //         ->get();
//
//        return $gamesTheDate;

//        return response()->json(['data'=>$dates]);

        return response($games);

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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
            return Game::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
