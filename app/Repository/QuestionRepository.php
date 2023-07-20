<?php

namespace App\Repository;

use App\Models\Question;
use App\Models\QuestionType;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class QuestionRepository
{
    /**
     * Get question types.
     *
     * @return Collection|QuestionType[]
     */
    public static function getTypes(): ?\Illuminate\Database\Eloquent\Collection
    {
        return QuestionType::query()
            ->where('user_id', request()->user()->id)
            ->orWhereNull('user_id')
            ->orderByRaw('-`order` desc')
            ->get();
    }

    /**
     * Store question type.
     *
     * @return QuestionType
     */
    public static function storeType(): QuestionType
    {
        $question_type = new QuestionType();
        $question_type->user_id = request()->user()->id;
        $question_type->main_question_type_id = request()->input('main_question_type_id') ?? request()->input('question_type_id');
        $question_type->component = request()->input('component');
        $question_type->label = request()->input('component_name');
        $question_type->description = request()->input('component_description');
        $question_type->required = request()->input('required', false);
        $question_type->value = is_string(request()->input('value')) ? request()->input('value') : null;
        $question_type->values = is_array(request()->input('values')) && !empty(array_filter(request()->input('values'))) ? array_filter(request()->input('values')) : null;
        $question_type->options = is_array(request()->input('options')) && !empty(array_filter(request()->input('options'))) ? array_filter(request()->input('options')) : null;

        $question_type->save();
        $question_type->refresh();

        return $question_type;
    }

    /**
     * Update question type.
     *
     * @param QuestionType $question_type
     * @return QuestionType
     */
    public static function updateType(QuestionType $question_type): QuestionType
    {
        if ($question_type->user_id === null || request()->user()->id !== $question_type->user_id) {
            throw new UnprocessableEntityHttpException();
        }

        $question_type->label = request()->input('component_name');
        $question_type->description = request()->input('component_description');
        $question_type->required = request()->input('required', false);
        $question_type->value = is_string(request()->input('value')) ? request()->input('value') : null;
        $question_type->values = is_array(request()->input('values')) && !empty(array_filter(request()->input('values'))) ? array_filter(request()->input('values')) : null;
        $question_type->options = is_array(request()->input('options')) && !empty(array_filter(request()->input('options'))) ? array_filter(request()->input('options')) : null;

        $question_type->save();
        $question_type->refresh();

        return $question_type;
    }

    /**
     * Delete question type and update related questions.
     *
     * @param QuestionType $question_type
     * @return boolean
     */
    public static function deleteType(QuestionType $question_type): bool
    {
        Question::where('question_type_id', $question_type->id)
            ->update([
                'question_type_id' => $question_type->main_question_type_id
            ]);

        return (bool)$question_type->delete();
    }
}
