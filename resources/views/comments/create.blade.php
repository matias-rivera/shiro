@extends('layouts.server')

@section('content')

<div class="card">
    <div class="card-header">New Comment</div>

    <div class="card-body">

        <form action="{{route('comments.store',[$post->server->url,$post->slug])}}" method="POST">
        
            @csrf

            <div class="form-group">
                <label for="content">Content</label>
                <input id="content" type="hidden" name="content">
                <trix-editor input="content"></trix-editor>
            </div>


            <button type="submit" class="btn btn-success">Comment</button>

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