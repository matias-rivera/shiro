@extends('layouts.app')

@section('content')
Popular posts

@foreach ($posts as $post)

<style>
 
</style>
    <div class="card my-2">
  
        <div class="card-body pt-0">
            <div class="text-right">24/20/2071</div>
            <a href="{{route('posts.show',[$post->forum->url,$post->slug])}}"><p class="h4" > {{$post->title}}</p></a>
        </div>
        <div class="card-footer py-1">
        <span class="float-left">
            by John Doe  {{$post->forum->url}}

        </span>
        <span class="float-right">
        <i class="fa fa-eye" aria-hidden="true"></i> {{$post->visits}} Visits
        <i class="fa fa-commenting-o" aria-hidden="true"></i> {{$post->comments->count()}} Comments</span>
        </div>
    </div>





    
    
@endforeach


            
@endsection


{{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}
