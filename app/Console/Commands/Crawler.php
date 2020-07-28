<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use App\aqi;

class Crawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:aqi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update aqi database from crawler';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->crawler();
    }

    private function crawler()
    {
        $url = 'https://opendata.epa.gov.tw/api/v1/AQI?%24skip=0&%24top=1000&%24format=json';
        $client = new Client();
        $response = $client->request('GET', $url);
        $datas = $response->getBody();
        $datas = json_decode($datas, true);
        foreach ($datas as $data) {
            $allowed  = ['SiteName', 'County', 'AQI', 'Status', 'SO2', 'CO', 'PM10_AVG', 'WindSpeed', 'WindDirec', 'SiteId', 'Latitude', 'Longitude', 'PublishTime'];
            $filtered = array_filter(
                $data,
                function ($key) use ($allowed) {
                    return in_array($key, $allowed);
                },
                ARRAY_FILTER_USE_KEY
            );
            aqi::insert($filtered);
        }
    }
}
