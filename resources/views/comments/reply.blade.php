@extends('layouts.forum')

@section('content')



<div class="card my-2">
            
    <div class="card-header">
        <a href="{{route('users.show',$comment->user->username)}}">{{$comment->user->username}}</a>   
        <span class="">{{$comment->date->format('d/m/Y')}}</span>
    </div>
    <div class="card-body">
        {!!$comment->content!!}
    </div>
    
</div>


<div class="card">
    <div class="card-header">New Reply</div>

    <div class="card-body">

        <form action="{{route('comments.store',[$comment->post->forum->url,$comment->post->slug])}}" method="POST">
        
            @csrf

            <div class="form-group">
                <label for="content">Content</label>
                <input type="hidden" name="comment" value="{{$comment->id}}">
                <input id="content" type="hidden" name="content">
                <trix-editor input="content"></trix-editor>
            </div>

            <button type="submit" class="btn btn-success">Reply</button>

        </form>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" crossorigin="anonymous" />
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"  crossorigin="anonymous"></script>
@endsection