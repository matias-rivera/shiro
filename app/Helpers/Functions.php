<?php
use App\Post;
use App\Server;
use App\Comment;


function dateFormatted($date){
    return date('d/m/Y',strtotime($date));
}

//This will mark with a green border the best post comment if its exist
function bestCommentBorder(Post $post,Comment $comment){
    if ($post->comment_id == $comment->id) {
        return "comment-green";
    }else{
        return "";
    }
}

?>