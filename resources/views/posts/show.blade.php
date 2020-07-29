
@extends('layouts.forum')

@section('content')
    <div class="card mb-4">
        <div class="card-header"> By {{$post->user->name}}  <span class="float-right">{{$post->date}}</span></div>
        
        <div class="card-body">
            <h2>{{$post->title}}</h2>
            <p>{{$post->content}}</p>
        </div>

        <div class="card-footer">
            <span class="float-left">
               
    
            </span>
            <span class="float-right">
            <i class="fa fa-eye" aria-hidden="true"></i> {{$post->visits}} Visits
            <i class="fa fa-commenting-o" aria-hidden="true"></i> {{$post->comments->count()}} Comments</span>
        </div>

    </div>

    <div>
        <button class="btn btn-success">New Comment</button>
    </div>

    @foreach ($post->comments as $comment)
        <div class="card my-2">
            <div class="card-header">By {{$comment->user->name}}  <span class="float-right">{{$comment->date}}</span></div>
            <div class="card-body">
                {{$comment->content}}
                
            </div>
        </div>
    @endforeach


@endsection