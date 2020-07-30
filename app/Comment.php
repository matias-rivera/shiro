<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $dates = ['date'];

    protected $fillable = [
        'content', 'post_id', 'parent'
    ];
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function replies() {
        return $this->hasMany('App\Comment','parent');
    }
    public function parent() {
        return $this->belongsTo('App\Comment','parent');
    }
}
