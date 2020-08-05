@extends('layouts.app')

@section('content')
Popular posts
@foreach ($posts as $post)

    @include('partials.post', ['post' => $post])

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
