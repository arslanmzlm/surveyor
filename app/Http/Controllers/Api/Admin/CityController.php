<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\County;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function all(): \Illuminate\Http\Response
    {
        return response(City::all());
    }

    /**
     * Display a listing of the resource.
     */
    public function allCounties(): \Illuminate\Http\Response
    {
        return response(County::all());
    }
}
