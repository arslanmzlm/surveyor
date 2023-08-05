<?php

namespace App\Repository;

use App\Models\Question;
use App\Models\QuestionType;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class QuestionRepository
{
    /**
     * Store question data.
     *
     * @param array|null $data
     * @return Question|null
     */
    public static function store(array $data = null): ?Question
    {
        $data = $data === null ? self::getDataFromRequest() : $data;

        if (self::validateQuestionData($data)) {
            return null;
        }

        $data = self::mutateRequest($data);

        $question = new Question();
        $question->template_id = $data['template_id'];
        $question->question_type_id = $data['main_question_type_id'] ?? $data['question_type_id'];
        $question->label = $data['label'];
        $question->description = $data['description'];
        $question->required = $data['required'];
        $question->order = $data['order'];
        $question->value = $data['value'];
        $question->score = $data['score'];
        $question->values = $data['values'];
        $question->options = $data['options'];

        self::storeFiles($question, $data);

        $question->save();

        return $question;
    }

    /**
     * Store question data.
     *
     * @param Question $question
     * @param array|null $data
     * @return Question|null
     */
    public static function update(Question $question, array $data = null): ?Question
    {
        $data = $data === null ? self::getDataFromRequest() : $data;

        if (self::validateQuestionData($data)) {
            return null;
        }

        $data = self::mutateRequest($data);

        $question->label = $data['label'];
        $question->description = $data['description'];
        $question->required = $data['required'];
        $question->order = $data['order'];
        $question->value = $data['value'];
        $question->score = $data['score'];
        $question->values = $data['values'];
        $question->options = $data['options'];

        self::storeFiles($question, $data);

        $question->save();

        return $question;
    }

    /**
     * Validate data of the question.
     *
     * @param array $data
     * @return bool
     */
    private static function validateQuestionData(array $data): bool
    {
        if (
            $data['component'] === QuestionType::COMPONENT_IMAGE
            && (!isset($data['id']) && (!isset($data['value']) || !($data['value'] instanceof UploadedFile)))
        ) {
            return true;
        }

        if (
            $data['component'] === QuestionType::COMPONENT_DESCRIPTION
            && !isset($data['value'])
        ) {
            return true;
        }

        if (
            in_array($data['component'], QuestionType::COMPONENTS_HAS_VALUES)
            && (!isset($data['values']) || empty(array_filter($data['values'])))
        ) {
            return true;
        }

        return false;
    }

    /**
     * Mutate data of the question.
     *
     * @param array $question
     * @return array
     */
    private static function mutateRequest(array $question): array
    {
        if (!isset($question['value'])) {
            $question['value'] = null;
        }

        if (!isset($question['values']) || !is_array($question['values']) || empty(array_filter($question['values']))) {
            $question['values'] = null;
        } else {
            $question['values'] = self::mutateValuesInRequest($question['values']);
        }

        if (!isset($question['options']) || !is_array($question['options']) || empty(array_filter($question['options']))) {
            $question['options'] = null;
        } else {
            $question['options'] = self::mutateOptionsInRequest($question['options']);
        }

        $question['score'] = isset($question['score']) && is_numeric($question['score']) ? (int)$question['score'] : null;
        $question['values'] = is_array($question['values']) && !empty(array_filter($question['values'])) ? array_filter($question['values']) : null;
        $question['options'] = is_array($question['options']) && !empty(array_filter($question['options'])) ? array_filter($question['options']) : null;

        return $question;
    }

    /**
     * Mutate the values of the question.
     *
     * @param array $values
     * @return array
     */
    private static function mutateValuesInRequest(array $values): array
    {
        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $value = array_filter($value);
            }

            if (is_array($value) && array_key_exists('score', $value)) {
                if (is_numeric($value['score'])) {
                    $values[$key]['score'] = (float)$value['score'];
                } else if (empty($value['score'])) {
                    unset($value[$key]['score']);
                }
            }
        }

        return $values;
    }

    /**
     * Mutate the options of the question.
     *
     * @param array $options
     * @return array
     */
    private static function mutateOptionsInRequest(array $options): array
    {
        foreach ($options as $key => $value) {
            if (is_array($value)) {
                $value = array_filter($value);
            }

            if (in_array($key, ["related_id", "related_to", "min", "max"])) {
                if (is_numeric($value)) {
                    $options[$key] = (int)$value;
                } else if (empty($value)) {
                    unset($value[$key]);
                }
            }
        }

        return $options;
    }

    /**
     * Store files.
     *
     * @param Question $question
     * @param array $data
     * @return void
     */
    private static function storeFiles(Question $question, array $data): void
    {
        if ($data['value'] instanceof UploadedFile) {
            $file = $data['value'];
            $fileName = Str::slug($question->template->name) . '-' . rand(10000, 99999) . '.' . $file->extension();
            $file->storeAs('/public/images/templates/value', $fileName);
            $question->value = $fileName;
        }

        if (is_array($data['options']) && !empty(array_filter($data['options']))) {
            foreach ($data['options'] as $key => $option) {
                if ($option instanceof UploadedFile) {
                    $fileName = Str::slug($question->template->name) . '-option-' . $key . '-' . rand(10000, 99999) . '.' . $option->extension();
                    $option->storeAs('/public/images/templates/options', $fileName);
                    $data['options'][$key] = $fileName;
                }
            }

            $question->options = $data['options'];
        }
    }

    /**
     * @return array
     */
    private static function getDataFromRequest(): array
    {
        return [
            'template_id' => request()->input('template_id'),
            'question_type_id' => request()->input('main_question_type_id', request()->input('question_type_id')),
            'label' => request()->input('label'),
            'description' => request()->input('description'),
            'required' => request()->input('required'),
            'order' => request()->input('order'),
            'value' => request()->input('value'),
            'score' => request()->input('score'),
            'values' => request()->input('values'),
            'options' => request()->input('options'),
        ];
    }
}
