
@extends('layouts.server')

@section('content')
    <div class="card mb-4">
        <div class="card-header">By <a href="{{route('users.show',$post->user->username)}}">{{$post->user->username}}</a>   
            <span class="float-right">{{ $post->created_at->format('d/m/Y') }}</span></div>
        
        <div class="card-body">
            <h2>{{$post->title}}</h2>
            <p>{!!$post->content !!}</p>

            
        </div>

        <div class="card-footer">
            <span class="float-left">
               
    
            </span>
            <span class="float-right">
            <i class="fa fa-eye" aria-hidden="true"></i> {{$post->visits}} Visits
            <i class="fa fa-commenting-o" aria-hidden="true"></i> {{$post->comments->count()}} Comments</span>
        </div>

    </div>

    @auth
    <div>
        <a href="{{route('comments.create',[$server->url,$post->slug])}}" class="btn btn-success">New Comment</a>
    </div>
        
    @endauth

    @foreach ($post->comments as $comment)
        @if (!$comment->parent)
            <div class="card my-2">
            
                <div class="card-header">
                    <a href="{{route('users.show',$comment->user->username)}}">{{$comment->user->username}}</a>   
                    <span class="">{{$comment->created_at->format('d/m/Y')}}</span>
                    <a href="{{route('comments.reply',[$comment->post->server->url,$comment->post->slug,$comment->id])}}" class="btn btn-info float-right">Reply</a>
                </div>
                <div class="card-body">
                    {!!$comment->content!!}
                    
                        @include('partials.replies', ['comments' => $comment->replies])
                </div>
                
            </div>
        @endif
    @endforeach
    


@endsection