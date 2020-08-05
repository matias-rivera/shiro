@extends('layouts.userpanel')


@section('content')


{{-- Posts from user --}}
    @forelse (auth()->user()->posts as $post)

        @include('partials.user_posts', ['post' => $post])

    @empty
            <div class="card">
                <div class="card-body">
                    No posts to show.
                </div>
            </div>
    @endforelse
@endsection