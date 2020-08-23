<?php

namespace App\Http\Controllers;

use App\Events\SendLocationEvent;
use Illuminate\Http\Request;

class GoogleMapController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('map');
    }

    /**
     * @param Request $request
     */
    public function sendLocation(Request $request)
    {
        event(new SendLocationEvent($request->id, $request->lat, $request->lon));
    }
}
