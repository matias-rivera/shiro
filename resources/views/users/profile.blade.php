@extends('layouts.userpanel')

@section('content')

<div class="card">
    <div class="card-header">Profile</div>
    <div class="card-body">
        <form action="{{route('users.update',auth()->user()->username)}}" method="POST" enctype="multipart/form-data">>
            @csrf
            @method("PUT")

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{auth()->user()->name}}">
            </div>
        
            <div class="form-group">
                <label for="bio">Bio</label>
                <input id="bio" type="hidden" name="bio" value="{{auth()->user()->bio}}">
                <trix-editor input="bio"></trix-editor>
            </div>

            <div class="form-group">
                <label for="avatar">Image</label>
                <input type="file" class="form-control" name="avatar" id="avatar">
            </div>

            <div class="form-group">
                <label for="twitter">Twitter</label>
                <input type="text" name="twitter" class="form-control" id="twitter" value="{{auth()->user()->twitter}}">
            </div>

            <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" name="instagram" class="form-control" id="instagram" value="{{auth()->user()->instagram}}">
            </div>

            <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" name="facebook" class="form-control" id="facebook" value="{{auth()->user()->facebook}}">
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" name="website" class="form-control" id="website" value="{{auth()->user()->website}}">
            </div>

            
        
            <button type="submit" class="btn btn-primary">Submit</button>
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