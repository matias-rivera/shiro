<?php

namespace App;
use App\Comment;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $dates = ['created_at','date'];

    protected $fillable = [
        'content', 'post_id', 'parent','user_id'
    ];
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    

    public function parent() {
        return $this->belongsTo('App\Comment','parent');
    }

    public function replies() {
        return $this->hasMany('App\Comment','parent');
    }


}
