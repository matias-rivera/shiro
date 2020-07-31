<?php
use App\Post;
use App\Server;
use App\Comment;


function dateFormatted($date){
    return date('d/m/Y',strtotime($date));
}

?>