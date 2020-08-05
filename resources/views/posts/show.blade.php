
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
                {{$post->visits}} <i class="fa fa-eye" aria-hidden="true"></i> 
                {{$post->comments->count()}}  <i class="fa fa-commenting-o" aria-hidden="true"></i> 
                {{$post->likes()->count()}}  <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 
                {{$post->likes()->count()}} <i class="fa fa-heart-o" aria-hidden="true"></i>
            
            
            
            </span>
        </div>

    </div>
    {{-- New comment button --}}
    @auth
    <div>
        <a href="{{route('comments.create',[$server->url,$post->slug])}}" class="btn btn-success">New Comment</a>
        <div class="float-right">
            <a href="" class="btn btn-danger">
                <i class="fa fa-heart-o" aria-hidden="true"></i>
            </a>
            {{-- if auth user is not the post author --}}
            @if (auth()->user()->id != $post->user->id)
                @if (auth()->user()->postLiked($post->id))
                <a href="{{route('posts.like',$post->id)}}" class="btn btn-primary">
                    <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                </a>
                @else
                    <a href="{{route('posts.like',$post->id)}}" class="btn btn-primary">
                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                    </a>      
                @endif
            @endif
            

        </div>
    </div>
    @endauth

    {{-- Best comment --}}

    @if ($post->bestComment)

    @include('partials.comment', ['comment' => $post->bestComment])
    
    @endif

    

    {{-- Comments --}}
    @foreach ($post->comments as $comment)
        {{-- Only comments and no replies --}}
        @if (!$comment->parent)
            @include('partials.comment', ['comment' => $comment])
        @endif
        
    @endforeach
    


@endsection