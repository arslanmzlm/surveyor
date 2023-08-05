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
    public static function store(): \App\Models\Template
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
    public static function update(Template $template): \App\Models\Template
    {
        $template->name = request()->input('name');
        $template->description = request()->input('description');
        $template->save();

        self::deleteQuestions($template);
        self::updateQuestions($template);

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
            $item['template_id'] = $template->id;
            QuestionRepository::store($item);
        }
    }

    /**
     * Store question data.
     *
     * @param \App\Models\Template $template
     * @return void
     */
    private static function updateQuestions(Template $template): void
    {
        $questions = request()->input('questions');

        foreach ($questions as $item) {
            $item['template_id'] = $template->id;
            if (isset($item['id'])) {
                QuestionRepository::update(Question::find($item['id']), $item);
            } else {
                QuestionRepository::store($item);
            }
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
        $questions = collect(request()->input('questions'));

        if ($questions) {
            $template->questions()->whereNotIn('id', $questions->pluck('id'))->delete();
        }
    }
}
