@extends('layouts.forum')


@section('content')

<div>
    <button class="btn btn-success">New Post</button>
</div>

    @foreach ($forum->posts as $post)

    <style>
    
    </style>
        <div class="card my-2">
    
            <div class="card-body pt-0">
                <div class="text-right">24/20/2071</div>
                <a href="{{route('posts.show',[$post->forum->url,$post->slug])}}"><p class="h4" > {{$post->title}}</p></a>
            </div>
            <div class="card-footer py-1">
            <span class="float-left">
                by John Doe  {{$post->forum->url}}

            </span>
            <span class="float-right">
            <i class="fa fa-eye" aria-hidden="true"></i> 5000 Visits
            <i class="fa fa-commenting-o" aria-hidden="true"></i> 124 Comments</span>
            </div>
        </div>





        
        
    @endforeach

@endsection