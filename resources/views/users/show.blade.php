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
       {{-- Posts panel --}}
    <div role="tabpanel" class="tab-pane active" id="posts">
        @forelse ($user->postsPublished as $post)

            @include('partials.post', ['post' => $post])
        
        @empty

        <div class="card">
            <div class="card-body">
                No posts to show.
            </div>
        </div>

        @endforelse

    </div>

    {{-- Comment panel --}}
    <div role="tabpanel" class="tab-pane "id="comments">


{{-- Comments from user --}}
@forelse ($user->comments as $comment)

{{-- Comment  --}}
        @if (!$comment->parent)

        <div class="card my-2">
        
            <div class="card-header">  
                <a href="{{route('posts.show',[$comment->post->server->url,$comment->post->slug])}}"><p class="h4 text-dark" > {{$comment->post->title}}</p></a>
            </div>
            <div class="card-body pt-0">
                <div class="text-right">{{ $comment->created_at->format('d/m/Y') }}</div>
                <p class="text-dark">
                    {!!$comment->content!!}
                </p>
                    
            </div>
            <div class="card-footer py-1">
                <span class="float-left">
                    <a class="font-weight-bold" href="{{route('servers.show',$comment->post->server->url)}}">s/{{$comment->post->server->url}}</a> 
                </span>
            </div>
        </div>
            
        @else

{{-- Reply --}}
            <div class="card my-2" >
        
                <div class="card-header">  
                    <a href="{{route('posts.show',[$comment->post->server->url,$comment->post->slug])}}"><p class="h4 text-dark" > {{$comment->post->title}}</p></a>
                </div>
                    <div class="card-body pt-0" id="">
                    <div class="text-right">{{ $comment->created_at->format('d/m/Y') }}</div>
                    <p class="text-dark">
                        {!!$comment->content!!}
                    </p>
                    <h2 class="mb-0">
                    <button class="btn btn-info mb-2 " data-toggle="collapse" data-target="#comment{{$comment->id}}" aria-expanded="false" aria-controls="comment{{$comment->id}}">
                    Replied to
                    </button>
                    </h2>


                    <div id="comment{{$comment->id}}" class="collapse" >
                        <div class="card">
                            <div class="card-header">
                                <a href="{{route('users.show',$comment->getParent()->user->username)}}" class="">{{$comment->getParent()->user->username}}</a>
                                <span class="float-right">{{$comment->getParent()->created_at->format('d/m/Y')}}</span>
                            </div>
                            <div class="card-body">
                                {!!$comment->getParent()->content!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer py-1">
                    <span class="float-left">
                        <a class="font-weight-bold" href="{{route('servers.show',$comment->post->server->url)}}">s/{{$comment->post->server->url}}</a> 
                    </span>
                </div>
            </div>

        @endif

    @empty
    
    <div class="card">
        <div class="card-body">
            No comments to show.
        </div>
    </div>

    @endforelse 

    </div>

    {{-- Servers panel --}}
    <div role="tabpanel" class="tab-pane " id="servers">
        @php
         
        @endphp
        @forelse ($user->servers as $server)
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-start">
                    <img width="100px" height="100px" class="mr-2 border" src="https://cdn.auth0.com/blog/illustrations/laravel.png" alt="">
                    <div>
        
                        <h2>  {{$server->name}}</h2>
                        <h4><a href="{{route('servers.show',$server->url)}}">s/{{$server->url}}</a></h4>
                    </div>
                    
                        
                </div>
               
            </div>
        </div>        
        @empty
        <div class="card">
            <div class="card-body">
                No servers to show.
            </div>
        </div>
    
        @endforelse
    </div>
  </div>



    
@endsection
