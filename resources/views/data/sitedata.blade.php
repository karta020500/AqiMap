@if($aqis != null && $aqis->count() != 0)
    <div>
      @foreach ($aqis as $aqi)
            <div class="test">
                <div class="col-md-12" style="text-align:center;">
                    {{ $aqi->AQI }}
                </div>
            </div>
      @endforeach
    </div>
@endif
