<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $dates = ['date'];

    protected $fillable = [
        'title', 'content', 'forum_id','slug'
    ];
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

    public function scopeOrderByVisits($query){
        return $query->orderBy('visits','desc');
    }
    
}
