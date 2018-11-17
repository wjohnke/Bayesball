<?php
/**
 * Created by PhpStorm.
 * User: 44255
 * Date: 9/19/2018
 * Time: 5:32 PM
 */
namespace BayesBall\Http\Controllers;
use DB;
class AboutController extends Controller{

    public function info(){
        return view('about');
    }

    public function test(){
        if(DB::connection()->getDatabaseName())
        {
            echo "conncted sucessfully to database ".DB::connection()->getDatabaseName();
        }
        $games = DB::select('select * from games');
        //var_dump($games);
        dd($games);

    }
}