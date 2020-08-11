<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('css')
</head>
<body>
    <div id="app">

        @include('partials.navbar')

        <main class="container py-4">
            <div class="row">
                <div class="col-md-9">
                
                    @yield('content')
               
                </div>

                <div class="col-md-3">

                    <div class="card">
                        <div class="card-header text-center font-weight-bold">{{auth()->user()->name}}</div>
                        <div class="card-body">
                            <img class="rounded-circle mx-auto d-block mb-2" style="max-width:100px" src="{{asset("storage/".auth()->user()->avatar)}}" alt="">
                             <a href="{{route('users.show',auth()->user()->username)}}"><h6 class="text-center">{{auth()->user()->username}}</h6></a> 
                            <div class="text-center">

                            </div>
                            <div class="text-center">

                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <i class="fa fa-sticky-note-o" aria-hidden="true"></i> {{auth()->user()->posts->count()}} Posts
                                <i class="fa fa-commenting-o" aria-hidden="true"></i> {{auth()->user()->comments->count()}} Comments</div> 
                        </div>
                    </div>

                    <ul class="list-group">
                        <a href="{{route('users.profile')}}">
                            <li class="list-group-item">
                                Profile
                            </li>
                        </a>
                        <a href="{{route('users.posts')}}">
                            <li class="list-group-item">
                                My Posts
                            </li>
                        </a>
                        <a href="{{route('users.comments')}}">
                            <li class="list-group-item">
                                My Comments
                            </li>
                        </a>

                    </ul>

                </div>


            </div>
        </main>
        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    @yield('js')
</body>
</html>
