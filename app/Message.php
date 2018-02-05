<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function toUser(){
        return $this->hasOne('App\User', 'id', 'reciver');
    }
}
