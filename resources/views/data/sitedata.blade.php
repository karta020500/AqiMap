@if($aqis != null && $aqis->count() != 0)
          <div id="search_satellite_result" class="search_satellite_result">
              <div class="result_title">
              <span style="float:left;position:relative;left:38%;font-size:22px;">{{$aqis[0]->SiteName}}測站</span>
              </div>
              <div class="site_result_content">
                      <canvas id="chart" width="800" height="600"></canvas>
                      @foreach ($aqis as $aqi)
                      <script>
                        datas.push(parseFloat('{{ $aqi->AQI }}'));
                        labels.push('{{ $aqi->SiteId }}');
                        </script>
                      @endforeach
                        <script>
                        var ctx = document.getElementById('chart').getContext('2d');
                        var chart = new Chart(ctx, {
                          type: 'line',
                          data: {
                              labels: labels,
                              datasets: [{
                                  label: 'AQI',
                                  data: datas,             
                              }]
                          },
                          options: { 
                          legend:{ 
                            display:false 
                          }, 
                          scales: { 
                          yAxes: [{ 
                            ticks: { 
                            beginAtZero: true 
                            } 
                          }] 
                          } 
                          } 
                      });
                      datas = [];
                      labels= [];
                      </script>
                      
                      
                       
                  </div>
                </div>
          </div>
         
          
@endif
