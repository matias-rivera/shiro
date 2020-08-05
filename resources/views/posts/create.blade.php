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

            @if (isset($post) && $post->state == 'drafted')
                <div class="form-group">
                    <select name="state" class="browser-default custom-select">
                        <option {{isset($post) && $post->state == 'published' ? 'selected': ''}} value="published">Publish</option>
                        <option  {{isset($post) && $post->state == 'drafted' ? 'selected': ''}} value="drafted">Draft</option>
                    </select>
                </div>           
            @endif

            <button type="submit" class="btn btn-success">{{isset($post) ? 'Edit Post' : 'Create Post'}}</button>

        </form>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
@endsection