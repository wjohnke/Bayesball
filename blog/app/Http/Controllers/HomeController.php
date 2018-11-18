<?php

namespace BayesBall\Http\Controllers;

use BayesBall\FavoriteGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $userId = Auth::id();
            $userEmail= Auth::user()->email;

        }
        $favGames = DB::table('favGames')
                        ->join('games','favGames.gameId','=','games.id')
                        ->join('users','favGames.userId','=','users.id')
                        ->select('favGames.*','users.name','games.game_date','games.visitor','games.home')
                        ->where('favGames.userId','=',$userId)
                        ->orderBy('created_at','desc')
                        ->get();
        //$favGames= FavoriteGame::where()

        //$users = DB::table('users')->select('name', 'email as user_email')->get();
        return view('home')->with('favGames',$favGames);
    }
}
