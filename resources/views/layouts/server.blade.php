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
                        <div class="card-header text-center font-weight-bold">{{$server->name}}</div>
                        <div class="card-body">
                            <img class="rounded-circle mx-auto d-block mb-2" style="max-width:100px" src="https://cdn.auth0.com/blog/illustrations/laravel.png" alt="">
                            <a href="{{route('servers.show',$server->url)}}"><h6 class="text-center">s/{{$server->url}}</h6></a>
                            <div class="text-center">
                                <p>{{$server->description}}</p>

                            </div>
                             <div class="text-center">
                                 @auth
                                     
                                    @if (auth()->user()->alreadySubscribed($server->id))
                                        <a href="{{route('servers.subscribe',$server->url)}}" class="btn btn-danger">Unsubscribe Server</a>
                                    @else
                                        <a href="{{route('servers.subscribe',$server->url)}}" class="btn btn-success">Subscribe Server</a>
                                    @endif

                                 @endauth
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                 <i class="fa fa-users" aria-hidden="true"></i> {{$server->users->count()}} Subscribed 
                                <i class="fa fa-sticky-note-o" aria-hidden="true"></i> {{$server->posts->count()}} Posts</div>
                            </div>
                    
                        </div>
                    </div>
                </div>


            </div>
        </main>
        
    </div>

    <!-- Scripts -->


    <script src="{{ asset('js/app.js') }}" ></script>
    @yield('js')
</body>
</html>
