<?php

namespace App\Repository;

use App\Models\Question;
use App\Models\Template;

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

        $template->questions()->delete();

        self::storeQuestions($template);

        return $template;
    }

    /**
     * Store question data.
     *
     * @param \App\Models\Template $template
     * @return void
     */
    public static function storeQuestions(Template $template): void
    {
        $questions = request()->input('questions');

        foreach ($questions as $item) {
            $question = new Question();
            $question->template_id = $template->id;
            $question->question_type_id = $item['main_type_id'] ?? $item['question_type_id'];
            $question->label = $item['label'];
            $question->description = $item['description'];
            $question->required = $item['required'];
            $question->order = $item['order'];
            $question->values = !empty($item['values']) ? $item['values'] : null;
            $question->options = !empty($item['options']) ? $item['options'] : null;
            $question->save();
        }
    }
}
