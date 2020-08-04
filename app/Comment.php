<?php

namespace App;
use App\Comment;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $dates = ['created_at'];

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

    public function getParent(){
        return $this->parent()->get()->first();
    }

    public function likes()
    {
        return $this->belongsToMany('App\User', 'comment_likes', 'comment_id');
    }


}
