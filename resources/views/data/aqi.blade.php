@if($coordinates != null && $coordinates->count() != 0)
    @foreach ($coordinates as $coordinate)
      <script>
          addPointByCoord('{{ $coordinate->Latitude }}', '{{ $coordinate->Longitude }}', '{{ $coordinate->SiteId }}', '{{ $coordinate->AQI }}');
      </script>
    @endforeach
@endif
