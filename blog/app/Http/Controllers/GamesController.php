<?php

namespace BayesBall\Http\Controllers;

use BayesBall\FavoriteGame;
use Illuminate\Http\Request;
use BayesBall\Game;
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


            return view('pages.gameDetails')->with('games',$games);
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


//        $command = escapeshellcmd("python /../../../python/sklearnBayesball.py $team1 $team2");
//        $output = shell_exec($command);

        $path= public_path().'/python/sklearnBayesball.py';
        $testpath= public_path().'/python/test.py';
        //echo "Path is $testpath \n";

//        if(!File::exists($path)) {
//            // path does not exist
//            echo "py not exist";
//        }
//        else{
//            echo "$path \n";
//        }

        //$process = new Process("python $path $team1 $team2 ");
        $process = new Process("python $testpath ");

        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        //echo $process->getOutput();



//        $command = escapeshellcmd("python $path $team1 $team2");
//        $output = shell_exec($command);
//        echo 'py path is '.$path;
//        echo $output;

//        $shit = "123";
//        echo $shit;
        return $process->getOutput();
    }
}
