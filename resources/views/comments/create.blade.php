@extends('layouts.server')

@section('content')

<div class="card">
    <div class="card-header">{{isset($comment) ? 'Edit Comment' : 'Create Comment'}}</div>

    <div class="card-body">

            <form action="
            {{isset($comment) ?  
            route('comments.update',[$server->url,$post->slug,$comment->id]) 
            : 
            route('comments.store',[$server->url,$post->slug]) 
            }}
            " method="POST" enctype="multipart/form-data">


            @csrf
            @if (isset($comment))
                @method('PUT')
            @endif


            <div class="form-group">
                <label for="content">Content</label>
                <input id="content" type="hidden" name="content" value="{{isset($comment) ?  $comment->content : ''}}">
                <trix-editor input="content"></trix-editor>
            </div>


            <button type="submit" class="btn btn-success">{{isset($comment) ? 'Edit Comment' : 'Create Comment'}}</button>

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