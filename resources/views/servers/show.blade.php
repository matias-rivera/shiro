@extends('layouts.server')


@section('content')

@auth
    
<div>
    <a href="{{route('posts.create',$server->url)}}" class="btn btn-success">New Post</a>
</div>
@endauth

    @foreach ($server->posts as $post)
        @include('partials.post', ['post' => $post])
    @endforeach

@endsection