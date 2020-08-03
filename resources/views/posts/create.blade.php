@extends('layouts.server')

@section('content')

<div class="card">
    <div class="card-header"> {{isset($post) ? 'Edit Post' : 'Create Post'}}</div>

    <div class="card-body">

     
        <form action="
        {{isset($post) ?  
        route('posts.update',['server' => $server->url,'post'=>$post->slug])
        : 
        route('posts.store',$server->url) 
        }}
        " method="POST" enctype="multipart/form-data">
   
            @csrf

            @if (isset($post))
                @method('PUT')
            @endif

         
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" {{isset($post) ? 'readonly' : ''}} value="{{isset($post) ? $post->title : ''}}">
            </div>
        
            <div class="form-group">
                <label for="content">Content</label>
                <input id="content" type="hidden" name="content" value="{{isset($post) ? $post->content : ''}}">
                <trix-editor input="content"></trix-editor>
            </div>

            <button type="submit" class="btn btn-success">{{isset($post) ? 'Edit Post' : 'Create Post'}}</button>

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