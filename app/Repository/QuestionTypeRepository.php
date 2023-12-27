<?php

namespace App\Repository;

use App\Models\Question;
use App\Models\QuestionType;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class QuestionTypeRepository
{
    /**
     * Get question types.
     *
     * @return Collection|QuestionType[]
     */
    public static function getForTemplate(): Collection
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
    public static function store(): QuestionType
    {
        $question_type = new QuestionType();
        $question_type->user_id = request()->user()->id;

        return self::assignAttributes($question_type);
    }

    /**
     * Update question type.
     *
     * @param QuestionType $question_type
     * @return QuestionType
     */
    public static function update(QuestionType $question_type): QuestionType
    {
        if ($question_type->user_id === null || request()->user()->id !== $question_type->user_id) {
            throw new UnprocessableEntityHttpException();
        }

        return self::assignAttributes($question_type);
    }

    /**
     * Delete question type and update related questions.
     *
     * @param QuestionType $question_type
     * @return boolean
     */
    public static function delete(QuestionType $question_type): bool
    {
        Question::where('question_type_id', $question_type->id)
            ->update([
                'question_type_id' => $question_type->main_question_type_id
            ]);

        return (bool)$question_type->delete();
    }

    private static function assignAttributes(QuestionType $question_type): QuestionType
    {
        $question_type->label = request()->input('label');
        $question_type->description = request()->input('description');
        $question_type->required = request()->input('required', false);
        $question_type->value = is_string(request()->input('value')) ? request()->input('value') : null;
        $question_type->values = is_array(request()->input('values')) && !empty(array_filter(request()->input('values'))) ? array_filter(request()->input('values')) : null;
        $question_type->options = is_array(request()->input('options')) && !empty(array_filter(request()->input('options'))) ? array_filter(request()->input('options')) : null;

        $question_type->save();

        return $question_type->fresh();
    }
}
