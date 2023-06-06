<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionTypeRequest;
use App\Models\QuestionType;
use App\Repository\QuestionRepository;

class QuestionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        return response(QuestionRepository::getTypes());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreQuestionTypeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionTypeRequest $request): \Illuminate\Http\Response
    {
        $question_type = new QuestionType();
        $question_type->user_id = $request->user()->id;
        $question_type->main_type_id = $request->input('main_type_id') ?? $request->input('question_type_id');
        $question_type->component = $request->input('component');
        $question_type->label = $request->input('component_name');
        $question_type->description = $request->input('component_description');
        $question_type->required = $request->input('required', false);
        $question_type->values = !empty($request->input('values')) ? $request->input('values') : null;
        $question_type->options = !empty($request->input('options')) ? $request->input('options') : null;
        $question_type->save();

        return response($question_type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\QuestionType $question_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionType $question_type): \Illuminate\Http\Response
    {
        return response(['success' => (bool)$question_type->delete()]);
    }
}
