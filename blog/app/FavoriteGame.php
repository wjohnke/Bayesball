<?php

namespace BayesBall;

use Illuminate\Database\Eloquent\Model;

class FavoriteGame extends Model
{
    //Table Name
    protected $table ='favGames';

    //primary Key
    public $primaryKey='id';

    //TimeStamps
    public  $timestamps=true;

    //mass assignment
    protected $fillable = ['userName','userId','gameId'];

//    public function FavGames(){
//        return $this->hasManyThrough('APP\Game','APP\User');
//    }
}
