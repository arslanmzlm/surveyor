<?php

namespace App\Repository;

use App\Models\Survey;

class SurveyRepository
{
    public static function store(?array $data = null): Survey
    {
        $data = $data === null ? self::getDataFromRequest() : $data;

        $survey = new Survey();
        $survey->group_id = $data['group_id'];

        return self::assignAttributes($survey, $data);
    }

    public static function update(Survey $survey, ?array $data = null): Survey
    {
        $data = $data === null ? self::getDataFromRequest() : $data;

        return self::assignAttributes($survey, $data);
    }

    public static function storeOrUpdateMany($surveys): void
    {
        foreach ($surveys as $item) {
            if ($item['id']) {
                self::update(Survey::find($item['id']), $item);
            } else {
                self::store($item);
            }
        }
    }

    /**
     * @return array
     */
    private static function getDataFromRequest(): array
    {
        return [
            'group_id' => request()->input('group_id'),
            'name' => request()->input('name'),
            'template_id' => request()->input('template_id'),
            'survey_at' => request()->input('survey_at'),
        ];
    }

    /**
     * @param Survey $survey
     * @param array $data
     * @return Survey|null
     */
    private static function assignAttributes(Survey $survey, array $data): ?Survey
    {
        $survey->name = !empty($data['name']) ? $data['name'] : null;
        $survey->template_id = $data['template_id'];
        $survey->survey_at = $data['survey_at'];
        $survey->save();

        return $survey->fresh();
    }
}
