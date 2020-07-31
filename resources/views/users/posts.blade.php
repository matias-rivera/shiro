@extends('layouts.userpanel')


@section('content')


{{-- Posts from user --}}
    @forelse (auth()->user()->posts as $post)

        <style>
        
        </style>
            <div class="card my-2">
        
                <div class="card-body pt-0">
                    <div class="text-right">{{$post->created_at->format('d/m/Y')}}</div>
                    <a class="text-dark" href="{{route('posts.show',[$post->server->url,$post->slug])}}"><p class="h4" > {{$post->title}}</p></a>
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

    @empty
            <div class="card">
                <div class="card-body">
                    No posts to show.
                </div>
            </div>
    @endforelse
@endsection