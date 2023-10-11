<?php

namespace App\Repository;

use App\Models\Template;
use Illuminate\Support\Collection;

class TemplateRepository
{
    /**
     * Store template data.
     *
     * @return \App\Models\Template
     */
    public static function store(): Template
    {
        $template = new Template();
        $template->user_id = request()->user()->id;

        return self::assignAttributes($template);
    }

    /**
     * Update template data.
     *
     * @param \App\Models\Template $template
     * @return \App\Models\Template
     */
    public static function update(Template $template): Template
    {
        return self::assignAttributes($template);
    }

    private static function assignAttributes(Template $template): Template
    {
        $template->name = request()->input('name');
        $template->description = request()->input('description');
        $template->save();

        if (request()->has('questions')) {
            $questions = collect(request()->input('questions'));
            $questions->transform(function ($item) use ($template) {
                $item['template_id'] = $template->id;
                return $item;
            });

            self::deleteQuestions($template, $questions);
            QuestionRepository::storeOrUpdateMany($questions);
        }


        return $template->fresh();
    }

    private static function deleteQuestions(Template $template, Collection $questions): void
    {
        if ($template->questions()->exists()) {
            $ids = $questions->whereNotNull('id')->pluck('id');
            $template->questions()->whereNotIn('id', $ids)->delete();
        }
    }
}
