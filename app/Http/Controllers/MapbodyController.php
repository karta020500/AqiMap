<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\aqi;

class MapbodyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coordinates = aqi::select('Longitude', 'Latitude', 'SiteId')->distinct()->get();
        $aqis = null;
        return view('map.mapbody', ['coordinates' => $coordinates, 'aqis' => $aqis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sitesearch(Request $request)
    {
        
        if (empty($request->input('SiteId')) == false){
            $aqis = aqi::select('SiteId', 'AQI')->Where('SiteId', $request->input('SiteId'))->get();
            $coordinates = null;
            
        }
        if ($request->ajax()) {
            //return response()->json(['success'=> $aqis]);
            return view('map.mapbody', compact('coordinates', 'aqis'));
        }
        return view('map.mapbody', ['corrdinates' => $coordinates,'aqis' => $aqis]);
    }

    public function create()
    {
        if (empty($request->input('SiteId')) == false){
            $aqis = aqi::select('SiteId', 'AQI')->Where('SiteId', $request->input('SiteId'))->get();
            $coordinates = aqi::select('Longitude', 'Latitude')->distinct()->get();
        }
        if ($request->ajax()) {
            return view('data.sitedata', compact('coordinates', 'aqis'));
        }
        return view('data.sitedata', ['corrdinates' => $coordinates,'aqis' => $aqis]);
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
