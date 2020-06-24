@extends('layouts.master')

@section('title', 'Map Page')

@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/ol.css')}}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('css/ol-custom.css') }}" type="text/css">

<script type="text/javascript" src="{{ URL::asset('js/ol.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/standard.js') }}"></script>

<style>
#map {
	width: 100%;
    height:100%;
}
.ol-zoom {
    top: -50px;
    right: 0px;
    height: 0%;
    width: 0%;
}
.custom-zoom{
    bottom: 50px;
    right: .5em;
}
.custom-zoom button{
    background-color: rgba(255, 255, 255, 1.0);
    border-radius: 0%;
    color: #000000;
    height: 1em;
    width: 1em;
    font-size: 2em;
    font-weight:bold;
}
</style>
 @include('../data/aqi')

<div id="map" class="map">
    <div id="popup">
        <div id="sitedata" style= "width: 400px;">
            @include('../data/sitedata')
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(e) {
        init();
    });
</script>
@endsection
