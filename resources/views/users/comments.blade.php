@extends('layouts.userpanel')


@section('content')

{{-- Comments from user --}}
  @forelse (auth()->user()->comments as $comment)

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


@endsection