@extends('layouts.forum')


@section('content')

@auth
    
<div>
    <a href="{{route('posts.create',$forum->url)}}" class="btn btn-success">New Post</a>
</div>
@endauth

    @foreach ($forum->posts as $post)

    <style>
    
    </style>
        <div class="card my-2">
    
            <div class="card-body pt-0">
                <div class="text-right">{{$post->date->format('d/m/Y')}}</div>
                <a class="text-dark" href="{{route('posts.show',[$post->forum->url,$post->slug])}}"><p class="h4" > {{$post->title}}</p></a>
            </div>
            <div class="card-footer py-1">
            <span class="float-left">
                Posted by <a href="{{route('users.show',$post->user->username)}}" class="text-dark font-weight-bold">{{$post->user->username}}</a> 

            </span>
            <span class="float-right">
            <i class="fa fa-eye" aria-hidden="true"></i> {{$post->visits}} Visits
            <i class="fa fa-commenting-o" aria-hidden="true"></i> {{$post->comments->count()}} Comments</span>
            </div>
        </div>





        
        
    @endforeach

@endsection