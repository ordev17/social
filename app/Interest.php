<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $table = 'interests';
    protected $guarded = [];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function ads(){
        return $this->hasMany('App\Ads', 'category_id', 'category_id');
    }
}
