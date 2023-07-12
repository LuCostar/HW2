
<html>

    <script>
        const BASE_URL = "{{ url('/')}}/"
        const csrf_token = '{{ csrf_token() }}'
    </script>
    
    <head>
        @section('head')
        <title>Gamefrog</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="{{ url('assets/favicon.png') }}">
        <link rel="stylesheet" href="{{ url('stylesheets/main.css') }}">
        <link rel="stylesheet" href="{{ url('stylesheets/nav_bar.css') }}">
        @show
        
    </head>
    <body>
        <header>
            <nav>
                <div>
                    <a href="{{ url('home') }}" id= "home_btn" class="icons">
                        
                    @if(Request::is('home'))<img src="{{ url('assets/site_logo.png') }}">
                    @else <img src="{{ url('assets/home-button.png') }}">
                    @endif
                    </a>
                    <a href="{{ url('news') }}" class="icons"><img src="{{ url('assets/newspaper.png') }}"></a>
                </div>
                <div>
                    <div>Ciao, {{ $username }}</div>
                    <a href="{{ url('profile') }}" id= "profile" class="icons"><img src="{{ url('assets/profile.png') }}"></a>
                    <a href="{{ url('logout') }}" class="icons"><img src="{{ url('assets/logout.png') }}"></a>
                </div>
            </nav>
        </header>
        <div class="logo">
            <img src="{{ url('assets/site_logo.png') }}">
            <h1>Gamefrog</h1>
        </div>

        @yield('content')
    </body>
</html>