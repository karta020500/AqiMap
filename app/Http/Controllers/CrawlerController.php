<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\aqi;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\DB;


class CrawlerController extends Controller
{
    public function index(aqi $aqi)
    {
        $url = 'https://opendata.epa.gov.tw/api/v1/AQI?%24skip=0&%24top=1000&%24format=json';
        $client = new Client();
        $response = $client->request('GET', $url);

        $datas = $response->getBody();
        $datas = json_decode($datas, true);
        
        foreach ($datas as $data) {
        $allowed  = ['SiteName', 'County', 'AQI', 'Status', 'SO2', 'CO', 'PM25_AVG', 'PM10_AVG', 'WindSpeed', 'WindDirec', 'SiteId', 'Latitude', 'Longitude', 'PublishTime'];
        $filtered = array_filter(
        $data, function ($key) use ($allowed) {
            return in_array($key, $allowed);
        },
        ARRAY_FILTER_USE_KEY
        );
        $aqi::insert($filtered);
    }
    }
}
