@extends('layouts.app')

@section('content')
Popular posts


@foreach ($posts as $post)

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


            
@endsection


{{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}
