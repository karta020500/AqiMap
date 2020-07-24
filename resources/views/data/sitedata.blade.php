@if($aqis != null && $aqis->count() != 0)
          <div id="AQI_result" class="AQI_result">
              <div class="result_title">
             <a href="javascript:$('#sitedata').hide();" id="close" style="text-decoration:none; float: left;">
                <img src="./images/close.png" style="width: 30px; height: 30px;" title="Close window">
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <span style="float:left;position:relative;left:31%;font-size:22px;">{{$aqis[0]->SiteName}}測站</span>
              </div>
              <div class="site_result_content">
                      <canvas id="chart" width="800" height="600"></canvas>
                      @foreach ($aqis as $aqi)
                      <script>
                        datas.push(parseFloat('{{ $aqi->AQI }}'));
                        var str = '{{ $aqi->PublishTime }}';
                        str = str.replace('2020-', '');
                        str = str.replace(':00:00', '');
                        console.log(str);
                        labels.push(str);
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
