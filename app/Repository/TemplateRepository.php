<?php

namespace App\Repository;

use App\Helpers\Mutators;
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

        return $template->fresh();
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

        return $template->fresh();
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
            $item = Mutators::questionRequest($item);

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
            $question->value = $item['value'];
            $question->values = $item['values'];
            $question->options = $item['options'];

            self::storeFiles($question, $item);

            $question->save();
        }
    }

    /**
     * Delete questions that are no longer used.
     *
     * @param \App\Models\Template $template
     * @return void
     */
    private static function deleteQuestions(Template $template): void
    {
        $groups = collect(request()->input('questions'));

        if ($groups) {
            $template->questions()->whereNotIn('id', $groups->pluck('id'))->delete();
        }

        return;
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
            $file->storeAs('/public/images/templates/value', $fileName);
            $question->value = $fileName;
        }

        if (is_array($item['options']) && !empty(array_filter($item['options']))) {
            foreach ($item['options'] as $key => $option) {
                if ($option instanceof UploadedFile) {
                    $fileName = Str::slug($question->template->name) . '-option-' . $key . '-' . rand(10000, 99999) . '.' . $option->extension();
                    $option->storeAs('/public/images/templates/options', $fileName);
                    $item['options'][$key] = $fileName;
                }
            }

            $question->options = $item['options'];
        }
    }
}
