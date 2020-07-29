<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Services\AqiService;
use App\aqi;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $aqiService;

    public function __construct(AqiService $aqiService)
    {
        $this->aqiService = $aqiService;
    }

    public function index(Request $request)
    {
        $limit = $request->limit==null ? 10:$request->limit;
        $query = aqi::query();
        $query = $this->aqiService->filterAqis($request->filters, $query);
        $query = $this->aqiService->sortAqis($request->sorts, $query);

        $aqi = $query->paginate($limit);
        return response($aqi, Response::HTTP_OK);
    }

    public function filter(Request $request)
    {
        $query = aqi::query();
        $filtersArray = $request->all();
        foreach ($filtersArray as $key => $filter) {
            $query->where($key, $filter);
        }
        $aqi = $query->get();

        return response($aqi, Response::HTTP_OK);
    }
}
