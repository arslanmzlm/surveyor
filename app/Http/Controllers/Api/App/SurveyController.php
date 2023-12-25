<?php

namespace App\Http\Controllers\Api\App;

use App\Helpers\Filter;
use App\Http\Controllers\Controller;
use App\Models\Survey;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        $surveys = new Filter(Survey::class);

        return response($surveys->withOnly(['group', 'template'])->get());
    }

    public function patients(Survey $survey): \Illuminate\Http\Response
    {
        return response($survey->group->patients);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Survey $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey): \Illuminate\Http\Response
    {
        return response(['success' => (bool)$survey->delete()]);
    }
}
