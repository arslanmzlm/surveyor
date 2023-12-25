<?php

namespace App\Http\Controllers\Api\App;

use App\Helpers\Filter;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Survey;
use App\Models\SurveyItem;
use App\Repository\SurveyItemRepository;

class SurveyItemController extends Controller
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

    /**
     * Display the specified resource.
     *
     * @param \App\Models\SurveyItem $surveyItem
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyItem $surveyItem): \Illuminate\Http\Response
    {
        return response($surveyItem->load(['survey', 'patient', 'survey.questions', 'survey.questions.answer']));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Survey $survey
     * @param \App\Models\Patient $patient
     * @return \Illuminate\Http\Response
     */
    public function find(Survey $survey, Patient $patient): \Illuminate\Http\Response
    {
        $surveyItem = SurveyItemRepository::find($survey, $patient);

        return response($surveyItem);
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
