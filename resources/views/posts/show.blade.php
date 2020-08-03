
@extends('layouts.server')

@section('content')
    {{-- Post --}}
    <div class="card mb-4">
        <div class="card-header">By <a href="{{route('users.show',$post->user->username)}}">{{$post->user->username}}</a>   
            <span class="float-right">{{ $post->created_at->format('d/m/Y') }}</span></div>
        
        <div class="card-body">
            <h2>{{$post->title}}</h2>
            <p>{!!$post->content !!}</p>

            @if ($post->created_at != $post->updated_at)
                <p class="h6 text-secondary">Last update {{$post->updated_at->format('g:i a \o\n l jS F Y')}}</p>
            @endif
        </div>

        <div class="card-footer">

            @auth
                @if (auth()->user()->id == $post->user->id)
                    <span class="float-left"> 
                    <a class="btn btn-info"href="{{route('posts.edit',['server'=>$post->server->url,'post'=>$post->slug])}}">Edit</a>
                    </span>
                @endif
            @endauth
                
            

            <span class="float-right">
            <i class="fa fa-eye" aria-hidden="true"></i> {{$post->visits}} Visits
            <i class="fa fa-commenting-o" aria-hidden="true"></i> {{$post->comments->count()}} Comments
            </span>
        </div>

    </div>
    {{-- New comment button --}}
    @auth
    <div>
        <a href="{{route('comments.create',[$server->url,$post->slug])}}" class="btn btn-success">New Comment</a>
    </div>
        
    @endauth

    {{-- Best comment --}}
    @if ($post->bestComment)
    <div class="card my-2 comment-green" >
            
        <div class="card-header">
            <a href="{{route('users.show',$post->bestComment->user->username)}}">{{$post->bestComment->user->username}}</a>   
            <span class="">{{$post->bestComment->created_at->format('d/m/Y')}}</span>
            
            {{-- Edit button --}}
            @auth
                @if (auth()->user()->id == $post->bestComment->user->id)
                    <span class="float-right"> 
                        <a class="btn btn-info ml-2"href="{{route('comments.edit',['server'=>$post->server->url,'post'=>$post->slug,'comment' => $post->bestComment->id])}}">Edit</a>
                    </span>
                @endif
            @endauth

            {{-- Reply button --}}
            @auth
                <a href="{{route('comments.reply',[$post->bestComment->post->server->url,$post->bestComment->post->slug,$post->bestComment->id])}}" class="btn btn-info float-right">Reply</a>
            @endauth
       
        </div>
        <div class="card-body">
            {!!$post->bestComment->content!!}
            @if ($post->bestComment->created_at != $post->bestComment->updated_at)
                <p class="h6 text-secondary">Last update {{$post->bestComment->updated_at->format('g:i a \o\n l jS F Y')}}</p>
            @endif
        </div>
        
    </div>

        
    @endif

    @foreach ($post->comments as $comment)
        {{-- Only commentsn and no replies --}}
        @if (!$comment->parent)

            <div class="card my-2 {{bestCommentBorder($post,$comment)}}">
            
                <div class="card-header">
                    <a href="{{route('users.show',$comment->user->username)}}">{{$comment->user->username}}</a>   
                    <span class="">{{$comment->created_at->format('d/m/Y')}}</span>

                    {{-- Mark as best comment button, if auth user is equal to post author --}}
                    @auth
                        @if (auth()->user()->id == $post->user->id && auth()->user()->id != $comment->user->id)
                            @if (!$post->comment_id || $post->comment_id != $comment->id)
                                <a href="{{route('posts.best-comment',['post' => $post->slug, 'comment' => $comment->id])}}" class="btn btn-success float-right ml-2">Mark as best Comment</a>
                            @endif
                        @endif
                    @endauth

                    {{-- Edit comment, if auth user is equal to comment author --}}
                    @auth
                        @if (auth()->user()->id == $comment->user->id)
                            <span class="float-right"> 
                                <a class="btn btn-info ml-2"href="{{route('comments.edit',['server'=>$post->server->url,'post'=>$post->slug,'comment' => $comment->id])}}">Edit</a>
                            </span>
                        @endif
                    @endauth
                    
                    {{-- Reply button, Need auth for reply --}}
                    @auth
                    <a href="{{route('comments.reply',[$comment->post->server->url,$comment->post->slug,$comment->id])}}" class="btn btn-info float-right">Reply</a>
                    @endauth


                </div>
                <div class="card-body">
                    {!!$comment->content!!}
                    @if ($comment->created_at != $comment->updated_at)
                        <p class="h6 text-secondary">Last update {{$comment->updated_at->format('g:i a \o\n l jS F Y')}}</p>
                    @endif
                    {{-- Replies  Loop --}}
                        @include('partials.replies', ['comments' => $comment->replies])
                </div>
                
            </div>
        @endif
    @endforeach
    


@endsection