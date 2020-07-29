<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
 
 
    public function getRouteKeyName(){
        return 'url';
    }   
}
