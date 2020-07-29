<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getRouteKeyName(){
        return 'slug';
    } 

    
    public function forum(){
        
            return $this->belongsTo('App\Forum');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
}
