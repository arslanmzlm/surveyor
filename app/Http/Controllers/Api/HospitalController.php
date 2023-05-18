<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Filter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHospitalRequest;
use App\Http\Requests\UpdateHospitalRequest;
use App\Models\Hospital;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        $hospitals = new Filter(Hospital::class, ['city', 'county']);

        return response($hospitals->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreHospitalRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHospitalRequest $request): \Illuminate\Http\Response
    {
        $hospital = new Hospital();
        $hospital->name = $request->input('name');
        $hospital->city_id = (int)$request->input('city_id');
        $hospital->county_id = (int)$request->input('county_id');
        $hospital->save();

        return response($hospital);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Hospital $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital): \Illuminate\Http\Response
    {
        return response($hospital);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateHospitalRequest $request
     * @param \App\Models\Hospital $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHospitalRequest $request, Hospital $hospital): \Illuminate\Http\Response
    {
        $hospital->name = $request->input('name');
        $hospital->city_id = (int)$request->input('city_id');
        $hospital->county_id = (int)$request->input('county_id');
        $hospital->save();

        return response($hospital);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Hospital $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital): \Illuminate\Http\Response
    {
        return response(['success' => (bool)$hospital->delete()]);
    }
}
