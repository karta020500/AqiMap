@if($aqis != null && $aqis->count() != 0)
    @foreach ($aqis as $aqi)
      <script>
          addPointByCoord('{{ $aqi->Latitude }}', '{{ $aqi->Longitude }}');
      </script>
    @endforeach
@endif
