<div class="card my-2 {{bestCommentBorder($comment->post,$comment)}}">
                
    <div class="card-header">
        <img width="35px" height="35px" class="mr-2 border" src="{{asset("storage/".$comment->user->avatar)}}" alt="">

        <a href="{{route('users.show',$comment->user->username)}}">{{$comment->user->username}}</a>   


        

        <div class="float-right">
            


            @auth
                
        
                
                <a href="{{route('comments.like',$comment->id)}}" class="btn btn-light {{auth()->user()->commentLiked($comment->id) ? 'border border-success' : ''}} ">
                    {{$comment->likes->count()}} <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                </a>
            
        
                
            

                {{-- Edit comment, if auth user is equal to comment author --}}
                
                    @if (auth()->user()->id == $comment->user->id)
                    
                            <a class="btn btn-light "href="{{route('comments.edit',['server'=>$comment->post->server->url,'post'=>$comment->post->slug,'comment' => $comment->id])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    
                    @endif
            
                
                {{-- Reply button, Need auth for reply --}}
            
                <a href="{{route('comments.reply',[$comment->post->server->url,$comment->post->slug,$comment->id])}}" class="btn btn-light "><i class="fa fa-comments-o" aria-hidden="true"></i></a>
            
                {{-- Mark as best comment button, if auth user is equal to post author --}}
                
                @if (auth()->user()->id == $comment->post->user->id && auth()->user()->id != $comment->user->id)
                    @if (!$comment->post->comment_id || $comment->post->comment_id != $comment->id)
                        <a href="{{route('posts.best-comment',['post' => $comment->post->slug, 'comment' => $comment->id])}}" class="btn btn-light"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                    @endif
                @endif

            @endauth
            @guest
                <a href="{{route('register')}}" class="btn btn-light">{{$comment->likes->count()}} <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                
            @endguest
        </div>
        


    </div>
    <div class="card-body">
        {!!$comment->content!!}
        @if ($comment->created_at != $comment->updated_at)
            <p class="h6 text-secondary">Last update {{$comment->updated_at->format('g:i a \o\n l jS F Y')}}</p>
        @endif
        {{-- Replies  Loop --}}
        @foreach ($comment->replies as $reply)
            @include('partials.comment', ['comment' => $reply])
        @endforeach
    </div>

    <div class="card-footer py-0">
        <span class="float-right text-secondary">{{$comment->created_at->format('F j, Y, g:i a')}}</span>
    </div>
    
</div>