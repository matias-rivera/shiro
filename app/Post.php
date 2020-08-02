<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $dates = ['created_at'];

    protected $fillable = [
        'title', 'content', 'server_id','slug','comment_id'
    ];
    public function getRouteKeyName(){
        return 'slug';
    } 

    
    public function server(){
        
            return $this->belongsTo('App\Server');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function bestComment()
    {
        return $this->belongsTo('App\Comment', 'comment_id');
    }

    public function scopeOrderByVisits($query){
        return $query->orderBy('visits','desc');
    }


    
}
