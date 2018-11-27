<?php

namespace BayesBall\Http\Controllers;

use BayesBall\FavoriteGame;
use Illuminate\Http\Request;
use BayesBall\Game;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use JavaScript;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


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

        if(Auth::check()){
            JavaScript::put([
                'userId' => Auth::id(),
                'userEmail'=> Auth::user()->email,
                'userName' => Auth::user()->name,

            ]);
        }

        $games = Game::orderBy('game_date','asc')->paginate(15);

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

        if(Auth::check()){
            JavaScript::put([
                'userId' => Auth::id(),
                'userEmail'=> Auth::user()->email,
                'userName' => Auth::user()->name
            ]);
        }
//       $date=$request->input('date');
//       echo 'Date: '.$date;
//
//         $dates= Game::where('game_date','=','2017-04-03')
        $dates= Game::where('game_date','=',$date)
                        ->paginate(15);
//                          ->get();

        //return $dates;
        return view('pages.gameDate',['dates'=>$dates],['specifiedDate'=>$date]);


    }
    public function goToDate(Request $request){

       // $games= Game::all();
        if(Auth::check()){
            JavaScript::put([
                'userId' => Auth::id(),
                'userEmail'=> Auth::user()->email,
                'userName' => Auth::user()->name
            ]);
        }


        if($request){
        $date = $request->input('date');
        $dates= Game::where('game_date','=',$date)

                       ->get();



        return view('pages.gameDate')->with('dates',$dates)->with('specifiedDate',$date);

        //return response($dates);
        }


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

        $request->validate([
            'userId' => 'required',
            'gameId' => 'required',
        ]);


        if($request->ajax()){
            echo "its ajax \n";
//            $favGame = new FavoriteGame();
//            $favGame->userId = $request->userId;
//            $favGame->gameId= $request->gameId;
//            $favGame->userName= $request->userName;

            $favGame= FavoriteGame::firstOrCreate([
                'userId'=>$request->userId,
                'gameId'=>$request->gameId

            ],[
                'userName'=>$request->userName

            ]);

            // Retrieve flight by name, or create it if it doesn't exist...
        echo "user id is ".$request->userId;
        echo "game Id is ".$request->gameId." user Name is ".$request->userName;


        }


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
        $games= Game::find($id);

//        if(count($games>0)) {
//            for ($games as $game)
//        }

        $homeBatStats = DB::table('BattingPos')
            ->select('*')
            ->where([
                ['team', '=', $games->home],
                ['game_date_9', '=', $games->game_date],
            ])
            ->first();

        $visitBatStats= DB::table('BattingPos')
            ->select('*')
            ->where([
                ['team', '=', $games->visitor],
                ['game_date_9', '=', $games->game_date],
            ])
            ->first();


//        $homeBatStats =DB::table('playerSTDBatting')
//            ->select('full_name','R','H','2B','RBI')
//            ->where('playerSTDBatting.full_name','=',$games->home_batter_1_name,'AND','playerSTDBatting.team','=',$games->home)
//            ->orWhere('playerSTDBatting.full_name','=',$games->home_batter_2_name,'AND','playerSTDBatting.team','=',$games->home)
//            ->orWhere('playerSTDBatting.full_name','=',$games->home_batter_3_name,'AND','playerSTDBatting.team','=',$games->home)
//            ->orWhere('playerSTDBatting.full_name','=',$games->home_batter_4_name,'AND','playerSTDBatting.team','=',$games->home)
//            ->orWhere('playerSTDBatting.full_name','=',$games->home_batter_5_name,'AND','playerSTDBatting.team','=',$games->home)
//            ->orWhere('playerSTDBatting.full_name','=',$games->home_batter_6_name,'AND','playerSTDBatting.team','=',$games->home)
//            ->orWhere('playerSTDBatting.full_name','=',$games->home_batter_7_name,'AND','playerSTDBatting.team','=',$games->home)
//            ->orWhere('playerSTDBatting.full_name','=',$games->home_batter_8_name,'AND','playerSTDBatting.team','=',$games->home)
//            ->orWhere('playerSTDBatting.full_name','=',$games->home_batter_9_name,'AND','playerSTDBatting.team','=',$games->home)
//
//            ->get();


            return view('pages.gameDetails')->with('games',$games)->with('homeBatStats',$homeBatStats)->with('visitBatStats',$visitBatStats);
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
    public function predict(){
        $team2 = empty($_GET['home_team']) ? "" : $_GET['home_team'];
        $team1 = empty($_GET['away_team']) ? "" : $_GET['away_team'];
        $date= empty($_GET['game_date']) ? "" : $_GET['game_date'];

//        $command = escapeshellcmd("python /../../../python/sklearnBayesball.py $team1 $team2");
//        $output = shell_exec($command);

        $path= public_path().'/python/sklearnBayesball.py';
        $testpath= public_path().'/python/test.py';
        $one ="1";
        //echo "Path is $testpath \n";

//        if(!File::exists($path)) {
//            // path does not exist
//            echo "py not exist";
//        }
//        else{
//            echo "$path \n";
//        }

        //$process = new Process("python $path $team1 $team2" );

        $process = new Process("python $path $team1 $team2 $one $date" );
        //$process = new Process("python $testpath ");

        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        //echo $process->getOutput();


       // echo "away team 1 is ".$team1." home team2 is $team2";
//        $command = escapeshellcmd("python $path $team1 $team2");
//        $output = shell_exec($command);
//        echo 'py path is '.$path;
//        echo $output;

//        $shit = "123";
//        echo $shit;
        return $process->getOutput();
    }
}
