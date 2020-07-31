@extends('layouts.userpanel')

@section('content')
<ul class="list-group">
       @forelse ($notifications as $notification)
      
      
       <li class="list-group-item">

    

            @if ($notification->type == 'App\Notifications\NewCommentAdded')

            
           <p>
               
                    A new comment was added on your post 
                    <a href="
                    {{route('posts.show',['server'=>$notification->data['comment']['post']['server']['url'],'post'=>$notification->data['comment']['post']['slug']])}}
                    ">
                    {{$notification->data['comment']['post']['title']}}
                    </a>

                    <button class="btn btn-primary float-right " type="button" data-toggle="collapse" data-target="#comment{{$notification->data['comment']['id']}}" aria-expanded="false" aria-controls="comment{{$notification->data['comment']['id']}}">
                     <i class="fa fa-angle-down"></i>
                    </button>

              
            </p>
            <div class="collapse" id="comment{{$notification->data['comment']['id']}}">
            
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('users.show',$notification->data['comment']['user']['username'])}}">
                        {{$notification->data['comment']['user']['username']}}
                        </a>
                        <span class="float-right">{{dateFormatted($notification->data['comment']['created_at'])}}</span>
                    </div>

                    <div class="card-body">
                        {!!$notification->data['comment']['content']!!}
                    </div>
                </div>
            </div>

      
   
     
                
            @endif

            @if ($notification->type == 'App\Notifications\NewReplyAdded')

            <p>
               
                One of your comments on <a href="{{route('posts.show',['server' => $notification->data['reply']['post']['server']['url'],'post'=>$notification->data['reply']['post']['slug']])}}">
                {{$notification->data['reply']['post']['title']}}</a> has been replied.

                <button class="btn btn-primary float-right " type="button" data-toggle="collapse" data-target="#reply{{$notification->data['reply']['id']}}" aria-expanded="false" aria-controls="reply{{$notification->data['reply']['id']}}">
                 <i class="fa fa-angle-down"></i>
                </button>

          
            </p>
            <div class="collapse" id="reply{{$notification->data['reply']['id']}}">
            
                <div class="card my-2">
                    <div class="card-header">
                        
                        Your comment 
                        
                        <span class="float-right">{{dateFormatted($notification->data['comment']['created_at'])}}</span>
                    </div>

                    <div class="card-body">
                        {!!$notification->data['comment']['content']!!}
                    </div>
                </div>

                <div class="card my-2">
                    <div class="card-header">
                        <a href="{{route('users.show',$notification->data['reply']['user']['username'])}}">
                        Replied by {{$notification->data['reply']['user']['username']}}
                        </a>
                        <span class="float-right">{{dateFormatted($notification->data['reply']['created_at'])}}</span>
                    </div>

                    <div class="card-body">
                        {!!$notification->data['reply']['content']!!}
                    </div>
                </div>
            </div>
                
            @endif
      


    </li>
        @empty
      
        <li class="list-group-item">No notifications to show.</li>
        @endforelse
    </ul>
           

@endsection