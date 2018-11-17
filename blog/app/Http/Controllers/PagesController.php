<?php

namespace BayesBall\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        return view('pages.index');
    }

    public function about(){
        return view('pages.about');
    }
    public function contact(){
        return view('pages.contact');
    }

    public function testPage(){
        return view('pages.test');
    }
    public function testDB(){
        if(DB::connection()->getDatabaseName())
        {
            echo "conncted sucessfully to database ".DB::connection()->getDatabaseName();
        }
        $games = DB::select('select * from games');
        //var_dump($games);
        dd($games);

    }
}
