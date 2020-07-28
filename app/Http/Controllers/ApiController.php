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
        $County = $request->input('County');
        $Status = $request->input('Status');
        $response = response()->json(aqi::where([['County', $County], ['Status', $Status]])->get());

        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
