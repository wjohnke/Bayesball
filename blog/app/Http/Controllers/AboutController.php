<?php
/**
 * Created by PhpStorm.
 * User: 44255
 * Date: 9/19/2018
 * Time: 5:32 PM
 */

namespace App\Http\Controllers;

class AboutController extends Controller{

    public function info(){
        return view('about');
    }
}