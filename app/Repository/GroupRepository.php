<?php

namespace App\Repository;

use App\Models\Group;
use App\Models\Patient;
use App\Models\Survey;

class GroupRepository
{
    /**
     * Update group data with patients.
     *
     * @param \App\Models\Group $group
     * @return \App\Models\Group
     */
    public static function updatePatients(Group $group): \App\Models\Group
    {
        $group->name = request()->input('name');
        $group->size = request()->input('size');
        $group->save();

        self::deletePatients($group);

        self::storePatients($group);

        return $group;
    }

    /**
     * Delete patients that are no longer used.
     *
     * @param \App\Models\Group $group
     * @return mixed
     */
    public static function deletePatients(Group $group)
    {
        $patients = collect(request()->input('patients'));

        if ($patients) {
            return $group->patients()->whereNotIn('id', $patients->pluck('id'))->delete();
        }

        return true;
    }

    /**
     * Store patient data.
     *
     * @param \App\Models\Group $group
     * @return void
     */
    public static function storePatients(Group $group): void
    {
        $patients = request()->input('patients');

        foreach ($patients as $item) {
            if (!empty($item['phone']) && strlen($item['phone']) == 10) {
                /**
                 * @var Patient $patient
                 */
                $patient = Patient::findOrNew($item['id'] ?? null);
                $patient->group_id = $group->id;
                $patient->name = !empty($item['name']) ? $item['name'] : null;
                $patient->phone = $item['phone'];
                $patient->contact_phone = !empty($item['contact_phone']) ? $item['contact_phone'] : null;
                $patient->save();
            }
        }
    }

    /**
     * Update group data with surveys.
     *
     * @param \App\Models\Group $group
     * @return \App\Models\Group
     */
    public static function updateSurveys(Group $group): \App\Models\Group
    {
        $group->name = request()->input('name');
        $group->save();

        self::deleteSurveys($group);

        self::storeSurveys($group);

        return $group;
    }

    /**
     * Delete surveys that are no longer used.
     *
     * @param \App\Models\Group $group
     * @return mixed
     */
    public static function deleteSurveys(Group $group)
    {
        $surveys = collect(request()->input('surveys'));

        if ($surveys) {
            return $group->surveys()->whereNotIn('id', $surveys->pluck('id'))->delete();
        }

        return true;
    }

    /**
     * Store survey data.
     *
     * @param \App\Models\Group $group
     * @return void
     */
    public static function storeSurveys(Group $group): void
    {
        $surveys = request()->input('surveys');

        foreach ($surveys as $item) {
            if (!empty($item['template_id']) && !empty($item['survey_at'])) {
                /**
                 * @var Survey $survey
                 */
                $survey = Survey::findOrNew($item['id'] ?? null);
                $survey->group_id = $group->id;
                $survey->name = !empty($item['name']) ? $item['name'] : null;
                $survey->template_id = $item['template_id'];
                $survey->survey_at = $item['survey_at'];
                $survey->save();
            }
        }
    }
}
