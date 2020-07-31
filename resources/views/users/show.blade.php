@extends('layouts.app')


@section('content')

<div class="card">
    
    
    <div class="card-body">
        <div class="d-flex justify-content-start">
            <img width="100px" height="100px" class="mr-2 border" src="https://cdn.auth0.com/blog/illustrations/laravel.png" alt="">
            <div>

                <h2> {{$user->name}}</h2>
                <h4><a href="{{route('users.show',$user->username)}}">{{$user->username}}</a></h4>
            </div>
            
                
        </div>
        <span class="float-right">
            <i class="fa fa-sticky-note-o" aria-hidden="true"></i> {{$user->posts->count()}} Posts
            <i class="fa fa-commenting-o" aria-hidden="true"></i> {{$user->comments->count()}} Comments
        </span>
    </div>
</div>



<!-- Nav tabs -->
<ul class="nav nav-tabs bg-white border" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" href="#posts" role="tab" data-toggle="tab">Posts</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#comments" role="tab" data-toggle="tab">Comments</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#servers" role="tab" data-toggle="tab">Servers</a>
    </li>
  </ul>
  

  <!-- Tab panels -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="posts">
        @foreach ($user->posts as $post)

        <style>
         
        </style>
            <div class="card my-2">
          
                <div class="card-body pt-0">
                    <div class="text-right">{{ $post->created_at->format('d/m/Y') }}</div>
                    <a href="{{route('posts.show',[$post->server->url,$post->slug])}}"><p class="h4 text-dark" > {{$post->title}}</p></a>
                </div>
                <div class="card-footer py-1">
                <span class="float-left">
                    <a class="font-weight-bold" href="{{route('servers.show',$post->server->url)}}">s/{{$post->server->url}}</a> 
                    Posted by <a href="{{route('users.show',$post->user->username)}}" class="text-dark font-weight-bold">{{$post->user->username}}</a> 
                </span>
                <span class="float-right">
                <i class="fa fa-eye" aria-hidden="true"></i> {{$post->visits}} Visits
                <i class="fa fa-commenting-o" aria-hidden="true"></i> {{$post->comments->count()}} Comments</span>
                </div>
            </div>
        
        @endforeach

    </div>
    <div role="tabpanel" class="tab-pane "id="comments">
        @foreach ($user->comments as $comment)

        <style>
         
        </style>
            <div class="card my-2">
                <div class="card-header">
                    <a href="{{route('posts.show',[$comment->post->server->url,$comment->post->slug])}}"><p class="h4 text-dark" > {{$comment->post->title}}</p></a>
                </div>
                <div class="card-body pt-0">
                    <div class="text-right">{{ $comment->created_at->format('d/m/Y') }}</div>
                   <p class="text-dark" > {!!$comment->content!!}</p>
                </div>
                <div class="card-footer py-1">
                <span class="float-left">
                    <a class="font-weight-bold" href="{{route('servers.show',$comment->post->server->url)}}">s/{{$comment->post->server->url}}</a> 
                    Posted by <a href="{{route('users.show',$comment->user->username)}}" class="text-dark font-weight-bold">{{$comment->post->user->username}}</a> 
                </span>
                </div>
            </div>
        
        @endforeach
    </div>
    <div role="tabpanel" class="tab-pane " id="servers">
        Not found
    </div>
  </div>



    
@endsection
