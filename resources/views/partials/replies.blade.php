@foreach ($comments as $comment)
       

<div class="card my-2">
    
    <div class="card-header">
        <a href="{{route('users.show',$comment->user->username)}}">{{$comment->user->username}}</a>
        
        <span class="">{{$comment->date->format('d/m/Y')}}</span>
        <a href="{{route('comments.reply',[$comment->post->forum->url,$comment->post->slug,$comment->id])}}" class="btn btn-info float-right">Reply</a>

        
    </div>
    <div class="card-body">
        {!!$comment->content!!}
       
        @include('partials.replies', ['comments' => $comment->replies])
    
    </div>

</div>



{{-- <div class="card my-2">
    <h2 style="color:red">{{$comment->id}}</h2>
    <div class="card-header"><a href="{{route('users.show',$comment->user->username)}}">{{$comment->user->username}}</a>   <span class="float-right">{{$comment->date->format('d/m/Y')}}</span></div>
    <div class="card-body">
        {!!$comment->content!!}
       
        
    
    </div>
</div> --}}
    

    

        
        
 @endforeach