<div class="card my-2 {{$post->state == 'drafted' ? 'border border-primary' : ''}}">
  
    <div class="card-header py-0 bg-white">
        @if (auth()->user()->id == $post->user->id)
            @if ($post->state == 'drafted')
                <span class="float-left"> 
                    <a class="btn btn-info py-0"href="{{route('posts.edit',['server'=>$post->server->url,'post'=>$post->slug])}}">Drafted</a>
                   
                </span>
            @endif
        @endif
        <span class="float-right">{{ $post->created_at->format('F j, Y, g:i a') }}</span>
    </div>

    <div class="card-body ">
        <a href="{{route('posts.show',[$post->server->url,$post->slug])}}"><p class="h4 text-dark" > {{$post->title}}</p></a>
    </div>
    <div class="card-footer py-1">
    <span class="float-left">
        <a class="font-weight-bold" href="{{route('servers.show',$post->server->url)}}">s/{{$post->server->url}}</a> 
        Posted by <a href="{{route('users.show',$post->user->username)}}" class="text-dark font-weight-bold">{{$post->user->username}}</a> 
    </span>



    <span class="float-right">
        <div class="btn btn-light py-0">
            {{$post->visits}} <i class="fa fa-eye" aria-hidden="true"></i> 
        </div>
        <a href="{{route('posts.show',[$post->server->url,$post->slug])}}" class="btn btn-light py-0">
            {{$post->comments->count()}}  <i class="fa fa-commenting-o" aria-hidden="true"></i> 
        </a>
        @auth
            <a href="{{route('posts.like',$post->id)}}" class="btn btn-light py-0 {{auth()->user()->postLiked($post->id) ? 'border border-success' : ''}}">
                {{$post->likes()->count()}} <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 
            </a>
            
            <a href="{{route('posts.favorite',$post->id)}}" class="btn btn-light py-0 {{auth()->user()->postFavorite($post->id) ? 'border border-danger' : ''}}">
                {{$post->favorites()->count()}} <i class="fa fa-heart-o" aria-hidden="true"></i>
            </a>
        @endauth

        @guest
            <a href="{{route('register')}}" class="btn btn-light py-0 ">
                {{$post->likes()->count()}} <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 
            </a>
            
            <a href="{{route('register')}}" class="btn btn-light py-0 ">
                {{$post->favorites()->count()}} <i class="fa fa-heart-o" aria-hidden="true"></i>
            </a>
        @endguest
        
        
    </span>

    
    </div>
</div>