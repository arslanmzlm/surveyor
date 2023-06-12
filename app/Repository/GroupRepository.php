<?php

namespace App\Repository;

use App\Models\Group;
use App\Models\Patient;

class GroupRepository
{
    /**
     * Update group data.
     *
     * @param \App\Models\Group $group
     * @return \App\Models\Group
     */
    public static function updateGroup(Group $group): \App\Models\Group
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
}
