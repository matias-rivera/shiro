<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username','email', 'password','bio','twitter','facebook','instagram','website'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function postsPublished()
    {
        return $this->hasMany('App\Post')->published();
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


    public function servers()
    {
        return $this->belongsToMany('App\Server');
    }

    public function alreadySubscribed($id){
        if($this->servers->find($id)){
            return true;
        }
        return false;
    }

    public function postFavorite($id){
        if($this->postsFavorites->find($id)){
            return true;
        }
        return false;
    }

    public function postLiked($id){
        if($this->postsLikes->find($id)){
            return true;
        }
        return false;
    }

    public function commentLiked($id){
        if($this->commentsLikes->find($id)){
            return true;
        }
        return false;
    }
    
    public function socialIcon(){
        if ($this->socialnetwork == 'twitter') {
            return 'fa-twitter';
        } elseif($this->socialnetwork == 'instagram') {
            return 'fa-instagram';
        } elseif($this->socialnetwork == 'facebook'){
            return 'fa-facebook';
        }
        else{
            return 'fa-globe';
        }
        
    }
  

    public function getRouteKeyName(){
        return 'username';
    } 


    public function postsLikes()
    {
        return $this->belongsToMany('App\Post', 'post_likes', 'user_id');
    }

    public function postsFavorites()
    {
        return $this->belongsToMany('App\Post', 'post_favorites', 'user_id');
    }

    public function commentsLikes()
    {
        return $this->belongsToMany('App\Comment', 'comment_likes', 'user_id');
    }




}


