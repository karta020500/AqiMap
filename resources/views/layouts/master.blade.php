<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>BriandMap -- @yield('title')</title>        
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-select.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-glyphicons.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css')}}" type="text/css">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('css/standard.css')}}" type="text/css">
        <script type="text/javascript" src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=fetch,requestAnimationFrame,Element.prototype.classList,URL"></script>
        <meta name="_token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div class="content">
            @yield('content')
        </div>
    </body>
</html>
