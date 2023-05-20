<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Filter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClinicRequest;
use App\Http\Requests\UpdateClinicRequest;
use App\Models\Clinic;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        $clinics = new Filter(Clinic::class);

        return response($clinics->get());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(): \Illuminate\Http\Response
    {
        return response(Clinic::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreClinicRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClinicRequest $request): \Illuminate\Http\Response
    {
        $clinic = new Clinic();
        $clinic->name = $request->input('name');
        $clinic->save();

        return response($clinic);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Clinic $clinic
     * @return \Illuminate\Http\Response
     */
    public function show(Clinic $clinic): \Illuminate\Http\Response
    {
        return response($clinic);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateClinicRequest $request
     * @param \App\Models\Clinic $clinic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClinicRequest $request, Clinic $clinic): \Illuminate\Http\Response
    {
        $clinic->name = $request->input('name');
        $clinic->save();

        return response($clinic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Clinic $clinic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic $clinic): \Illuminate\Http\Response
    {
        return response(['success' => (bool)$clinic->delete()]);
    }
}
