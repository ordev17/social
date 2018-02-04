<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','dbt'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $dates=[
        'dbt'
    ];
    
    public function posts(){
        return $this->hasMany('App\Post');
    }
     public function interests(){
        return $this->hasMany('App\Interest');
    }
    
    public function followers(){
        return $this->hasMany('App\Follower');
    }
}
