@extends('layouts.userpanel')

@section('content')
    @php
        $collapse = 1;
    @endphp
<ul class="list-group">
       @forelse ($notifications as $notification)
        
       <li class="list-group-item">

    
            {{-- New Comment Notification --}}
            @if ($notification->type == 'App\Notifications\NewCommentAdded')

            
           <p>
               
                    A new comment was added on your post 
                    <a href="
                    {{route('posts.show',['server'=>$notification->data['comment']['post']['server']['url'],'post'=>$notification->data['comment']['post']['slug']])}}
                    ">
                    {{$notification->data['comment']['post']['title']}}
                    </a>

                    <button class="btn btn-primary float-right " type="button" data-toggle="collapse" data-target="#collapse{{$collapse}}" aria-expanded="false" aria-controls="collapse{{$collapse}}">
                     <i class="fa fa-angle-down"></i>
                    </button>

              
            </p>
            <div class="collapse" id="collapse{{$collapse}}">
            
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

            {{-- New reply Notification --}}
            @if ($notification->type == 'App\Notifications\NewReplyAdded')

            <p>
               
                One of your comments on <a href="{{route('posts.show',['server' => $notification->data['reply']['post']['server']['url'],'post'=>$notification->data['reply']['post']['slug']])}}">
                {{$notification->data['reply']['post']['title']}}</a> has been replied.

                <button class="btn btn-primary float-right " type="button" data-toggle="collapse" data-target="#collapse{{$collapse}}" aria-expanded="false" aria-controls="collapse{{$collapse}}">
                    <i class="fa fa-angle-down"></i>
                </button>

          
            </p>
            <div class="collapse" id="collapse{{$collapse}}">
            
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

            {{-- Best Comment Notification --}}
            @if ($notification->type == 'App\Notifications\BestComment')

            <p>
               
                One of your comments on <a href="{{route('posts.show',['server' => $notification->data['comment']['post']['server']['url'],'post'=>$notification->data['comment']['post']['slug']])}}">
                {{$notification->data['comment']['post']['title']}}</a> has been marked as best comment. Congratulations!.

                <button class="btn btn-primary float-right " type="button" data-toggle="collapse" data-target="#collapse{{$collapse}}" aria-expanded="false" aria-controls="collapse{{$collapse}}">
                 <i class="fa fa-angle-down"></i>
                </button>

          
            </p>
            <div class="collapse" id="collapse{{$collapse}}">
            
                <div class="card my-2">
                    <div class="card-header">
                        
                        Your comment 
                        
                        <span class="float-right">{{dateFormatted($notification->data['comment']['created_at'])}}</span>
                    </div>

                    <div class="card-body">
                        {!!$notification->data['comment']['content']!!}
                    </div>
                </div>

                
            </div>
                
            @endif
      


    
        </li>

        @php
            $collapse++;
        @endphp

        @empty
      
        <li class="list-group-item">No notifications to show.</li>
        @endforelse
    </ul>
           
    {{ $notifications->links() }}
@endsection