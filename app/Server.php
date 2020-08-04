<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
 
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
 
    public function getRouteKeyName(){
        return 'url';
    }   

    public function scopeOrderByVisits($query){
        return $query->orderBy('visits','desc');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
