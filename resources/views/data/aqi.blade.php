@if($aqis != null && $aqis->count() != 0)
    @foreach ($aqis as $aqi)
      <script>
        /*
        	var Feature = new ol.Feature({
		          geometry: new ol.geom.Point(ol.proj.fromLonLat(['{{ $aqi->Longitude }}', '{{ $aqi->Latitude }}']))
	        });

          var iconStyle = new ol.style.Style({
            image: new ol.style.Icon(({
              src: './images/mask.png'
            }))
          });

            var vectorSource = new ol.source.Vector({
            	features: [Feature]
            });
            //vectorSource.addFeature(Feature);
            var vectorLayer = new ol.layer.Vector({
            	source: vectorSource
            });
            center_map.addLayer(vectorLayer
          */
          addPointByCoord('{{ $aqi->Latitude }}', '{{ $aqi->Longitude }}');
      </script>
    @endforeach
@endif
