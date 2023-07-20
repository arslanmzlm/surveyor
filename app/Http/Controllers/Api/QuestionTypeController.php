<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionTypeRequest;
use App\Http\Requests\UpdateQuestionTypeRequest;
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
        $question_type = QuestionRepository::storeType();

        return response($question_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateQuestionTypeRequest $request
     * @param \App\Models\QuestionType $question_type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionTypeRequest $request, QuestionType $question_type): \Illuminate\Http\Response
    {
        $question_type = QuestionRepository::updateType($question_type);

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
        return response(['success' => QuestionRepository::deleteType($question_type)]);
    }
}
