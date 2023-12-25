<?php

namespace App\Repository;

use App\Models\Answer;
use App\Models\Patient;
use App\Models\Survey;
use App\Models\SurveyItem;

class SurveyItemRepository
{
    public static function find(Survey $survey, Patient $patient)
    {
        $surveyItem = SurveyItem::firstOrCreate([
            'survey_id' => $survey->id,
            'patient_id' => $patient->id,
        ]);

        $survey = SurveyRepository::init($survey);

        $questionsCount = $survey->getInputCount();
        $answersCount = $surveyItem->answers()->count();

        if (!$answersCount || $questionsCount !== $answersCount) {
            $questions = $survey->getInputs();

            if ($questionsCount !== $answersCount) {
                $surveyItem->answers()
                    ->where('survey_item_id', $surveyItem->id)
                    ->whereNotIn('question_id', $questions->pluck('id'))
                    ->delete();
            }

            foreach ($questions as $question) {
                Answer::firstOrCreate([
                    'survey_item_id' => $surveyItem->id,
                    'question_id' => $question->id
                ]);
            }
        }

        return $surveyItem;
    }
}
