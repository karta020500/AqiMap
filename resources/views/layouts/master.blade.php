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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
        <meta name="_token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div class="content">
            @yield('content')
        </div>
        <div class="aqi-labels">
            <div class="aqi-labels-inner">
                <table>
                    <tr>
                        <td class="aqi-label aqi-label-title"><div>空氣品質指標</div>
                    </td>
                    <td class="aqi-label aqi-label-1" data-balloon-pos="up">
                            <div>好</div>
                    </td>
                    <td class="aqi-label aqi-label-2" data-balloon-pos="up">
                            <div>中等</div>
                    </td>
                    <td class="aqi-label aqi-label-3" data-balloon-pos="up">
                            <div>對敏感族群不健康</div>
                    </td>
                    <td class="aqi-label aqi-label-4" data-balloon-pos="up">
                            <div>不健康</div>
                    </td>
                    <td class="aqi-label aqi-label-5" data-balloon-pos="up">
                            <div>非常不健康</div>
                    </td>
                    <td class="aqi-label aqi-label-6" data-balloon-pos="up">
                            <div>危險</div>
                    </td></tr>
                </table>
            </div>
        </div>
    </body>
</html>
