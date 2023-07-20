<?php

namespace App\Repository;

use App\Models\Question;
use App\Models\Template;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class TemplateRepository
{
    /**
     * Store template data.
     *
     * @return \App\Models\Template
     */
    public static function storeTemplate(): \App\Models\Template
    {
        $template = new Template();
        $template->user_id = request()->user()->id;
        $template->name = request()->input('name');
        $template->description = request()->input('description');
        $template->save();

        self::storeQuestions($template);

        $template->refresh();

        return $template;
    }

    /**
     * Update template data.
     *
     * @param \App\Models\Template $template
     * @return \App\Models\Template
     */
    public static function updateTemplate(Template $template): \App\Models\Template
    {
        $template->name = request()->input('name');
        $template->description = request()->input('description');
        $template->save();

        self::deleteQuestions($template);

        self::storeQuestions($template);

        $template->refresh();

        return $template;
    }

    /**
     * Store question data.
     *
     * @param \App\Models\Template $template
     * @return void
     */
    private static function storeQuestions(Template $template): void
    {
        $questions = request()->input('questions');

        foreach ($questions as $item) {
            if (!array_key_exists('value', $item)) {
                $item['value'] = null;
            }

            if (!array_key_exists('values', $item)) {
                $item['values'] = null;
            }

            if (!array_key_exists('options', $item)) {
                $item['options'] = null;
            }

            /**
             * @var Question $question
             */
            $question = Question::findOrNew($item['id'] ?? null);
            $question->template_id = $template->id;
            $question->question_type_id = $item['main_question_type_id'] ?? $item['question_type_id'];
            $question->label = $item['label'];
            $question->description = $item['description'];
            $question->required = $item['required'];
            $question->order = $item['order'];
            $question->value = is_string($item['value']) ? $item['value'] : null;
            $question->values = is_array($item['values']) && !empty(array_filter($item['values'])) ? array_filter($item['values']) : null;
            $question->options = is_array($item['options']) && !empty(array_filter($item['options'])) ? array_filter($item['options']) : null;

            self::storeFiles($question, $item);

            $question->save();
        }
    }

        /**
     * Delete questions that are no longer used.
     *
     * @param \App\Models\Template $template
     * @return bool|mixed
     */
    private static function deleteQuestions(Template $template)
    {
        $groups = collect(request()->input('questions'));

        if ($groups) {
            return $template->questions()->whereNotIn('id', $groups->pluck('id'))->delete();
        }

        return true;
    }

    /**
     * Store files.
     *
     * @param Question $question
     * @param array $item
     * @return void
     */
    private static function storeFiles(Question $question, array $item): void
    {
        if ($item['value'] instanceof UploadedFile) {
            $file = $item['value'];
            $fileName = Str::slug($question->template->name) . '-' . rand(10000, 99999) . '.' . $file->extension();
            $file->storePubliclyAs('/images/templates/value', $fileName);
            $question->value = $fileName;
        }

        if (is_array($item['values']) && !empty(array_filter($item['values']))) {
            foreach ($item['values'] as $key => $value) {
                if ($value['label'] instanceof UploadedFile) {
                    $file = $value['value'];
                    $fileName = Str::slug($question->template->name) . '-value-' . $key . '-' . rand(10000, 99999) . '.' . $file->extension();
                    $file->storePubliclyAs('/images/templates/values', $fileName);
                    $item['values'][$key]['value'] = $fileName;
                }
            }

            $question->values = $item['values'];
        }

        if (is_array($item['options']) && !empty(array_filter($item['options']))) {
            foreach ($item['options'] as $key => $option) {
                if ($option instanceof UploadedFile) {
                    $fileName = Str::slug($question->template->name) . '-option-' . $key . '-' . rand(10000, 99999) . '.' . $option->extension();
                    $option->storePubliclyAs('/images/templates/options', $fileName);
                    $item['options'][$key] = $fileName;
                }
            }

            $question->options = $item['options'];
        }
    }
}
