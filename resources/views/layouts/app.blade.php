<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div id="app">
        @include('partials.navbar')
        <main class="container py-4">
            <div class="row">
                <div class="col-12 col-lg-9 ">
                
                    @yield('content')
               
                </div>

                <div class="col-12 col-lg-3">
                    @if (isset($servers))
                    <div class="card mb-2">
                        <div class="card-header">Top Servers</div>
                        <div class="card-body">

                            <ul class="list-group">

                                
                                    
                                @forelse ($servers as $server)
                                <a href="{{route('servers.show',$server->url)}}">
                                    <li class="list-group-item ">{{$server->name}}</li>
                                </a>
                                @empty
                                    Nada
                                @endforelse
                              
                                    
                                
                               
                            </ul>

                        </div>
                    </div>
                    @endif

                    @if (isset($posts))
                    <div class="card">
                        <div class="card-header">Top Posts</div>
                        <div class="card-body">

                            <ul class="list-group">

                                
                                    
                                @forelse ($posts as $post)
                                <a class="text-dark" href="{{route('posts.show',[$post->server->url,$post->slug])}}">
                                    <li class="list-group-item ">{{$post->title}}</li>
                                </a>
                                @empty
                                    Nada
                                @endforelse
                               
                               
                            </ul>

                        </div>
                    </div>

                    @endif

                </div>
            </div>
        </main>
        
    </div>
</body>
</html>
