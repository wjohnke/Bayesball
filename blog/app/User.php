<?php

namespace BayesBall;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //gets the identifier that will be stored in the subject claim of the JWT
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    //allow us to add any custom claims we want added to the JWT.
    public function getJWTCustomClaims()
    {
        return [];
    }

}
