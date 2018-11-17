<?php

namespace BayesBall;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //Table Name
    protected $table ='games';

    //primary Key
    public $primaryKey='id';

    //TimeStamps
    public  $timestamps=false;
}
