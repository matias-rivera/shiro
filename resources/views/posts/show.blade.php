
@extends('layouts.server')

@section('content')
    {{-- Post --}}
    <div class="card mb-4">
        <div class="card-header">
            <img width="35px" height="35px" class="mr-2 border" src="https://cdn.auth0.com/blog/illustrations/laravel.png" alt="">
            <a href="{{route('users.show',$post->user->username)}}">{{$post->user->username}}</a>   

            <span class="float-right">{{ $post->created_at->format('F j, Y, g:i a') }}</span>
        </div>
        
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
                <div class="btn btn-light">
                    {{$post->visits}} <i class="fa fa-eye" aria-hidden="true"></i> 
                </div>
                <div class="btn btn-light">
                    {{$post->comments->count()}}  <i class="fa fa-commenting-o" aria-hidden="true"></i> 
                </div>
                @auth
                    <a href="{{route('posts.like',$post->id)}}" class="btn btn-light {{auth()->user()->postLiked($post->id) ? 'border border-success' : ''}}">
                        {{$post->likes()->count()}} <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 
                    </a>
                    
                    <a href="{{route('posts.favorite',$post->id)}}" class="btn btn-light {{auth()->user()->postFavorite($post->id) ? 'border border-danger' : ''}}">
                        {{$post->favorites()->count()}} <i class="fa fa-heart-o" aria-hidden="true"></i>
                    </a>
                @endauth
                    <a href="{{route('register')}}" class="btn btn-light">
                        {{$post->likes()->count()}} <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 
                    </a>
                    
                    <a href="{{route('register')}}" class="btn btn-light">
                        {{$post->favorites()->count()}} <i class="fa fa-heart-o" aria-hidden="true"></i>
                    </a>
                @guest
                    
                @endguest
            </span>



        </div>

    </div>
    {{-- New comment button --}}
    @auth
        <div>
            <button class="btn btn-success  " type="button" data-toggle="collapse" data-target="#collapseComment" aria-expanded="false" aria-controls="collapseComment">
                New Comment
            </button>
            {{-- <a href="{{route('comments.create',[$server->url,$post->slug])}}" class="btn btn-success">New Comment</a> --}}
        </div>
    @endauth


    {{-- New comment collapse form --}}
    <div class="collapse" id="collapseComment">
            
        <div class="card mt-2">
            <div class="card-header">Create Comment</div>
        
            <div class="card-body">
        
                    <form action="
                    {{route('comments.store',[$server->url,$post->slug])}}
                    " method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="content">Content</label>
                        <input id="content" type="hidden" name="content">
                        <trix-editor input="content"></trix-editor>
                    </div>
        
        
                    <button type="submit" class="btn btn-success">Create Comment</button>
        
                </form>
            </div>
        </div>
    </div>

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

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" crossorigin="anonymous" />
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"  crossorigin="anonymous"></script>
@endsection