@foreach ($comments as $comment)
       

<div class="card my-2 {{bestCommentBorder($post,$comment)}}">
    
    <div class="card-header">
        <a href="{{route('users.show',$comment->user->username)}}">{{$comment->user->username}}</a>
        
        <span class="">{{$comment->created_at->format('d/m/Y')}}</span>
            @auth
                @if (auth()->user()->id == $post->user->id && auth()->user()->id != $comment->user->id)
                    @if (!$post->comment_id || $post->comment_id != $comment->id)
                        <a href="{{route('posts.best-comment',['post' => $post->slug, 'comment' => $comment->id])}}" class="btn btn-success float-right ml-2">Mark as best Comment</a>
                    @endif
                @endif
            @endauth
        <a href="{{route('comments.reply',[$comment->post->server->url,$comment->post->slug,$comment->id])}}" class="btn btn-info float-right">Reply</a>

        
    </div>
    <div class="card-body">
        {!!$comment->content!!}
       
        @include('partials.replies', ['comments' => $comment->replies])
    
    </div>

</div>



{{-- <div class="card my-2">
    <h2 style="color:red">{{$comment->id}}</h2>
    <div class="card-header"><a href="{{route('users.show',$comment->user->username)}}">{{$comment->user->username}}</a>   <span class="float-right">{{$comment->created_at->format('d/m/Y')}}</span></div>
    <div class="card-body">
        {!!$comment->content!!}
       
        
    
    </div>
</div> --}}
    

    

        
        
 @endforeach