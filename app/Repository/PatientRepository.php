<?php

namespace App\Repository;

use App\Models\Patient;
use Illuminate\Support\Collection;

class PatientRepository
{
    public static function store(?array $data = null): ?Patient
    {
        $data = $data === null ? self::getDataFromRequest() : $data;

        if (empty($data['phone'])) {
            return null;
        }

        $patient = new Patient();
        $patient->group_id = $data['group_id'];

        return self::assignAttributes($patient, $data);
    }

    public static function update(Patient $patient, ?array $data = null): ?Patient
    {
        $data = $data === null ? self::getDataFromRequest() : $data;

        if (empty($data['phone'])) {
            $patient->delete();

            return null;
        }

        return self::assignAttributes($patient, $data);
    }

    /**
     * @return array
     */
    private static function getDataFromRequest(): array
    {
        return [
            'group_id' => request()->input('group_id'),
            'name' => request()->input('name'),
            'phone' => request()->input('phone'),
            'contact_phone' => request()->input('contact_phone'),
        ];
    }

    /**
     * @param Patient $patient
     * @param array $data
     * @return Patient|null
     */
    private static function assignAttributes(Patient $patient, array $data): Patient
    {
        $patient->name = !empty($data['name']) ? $data['name'] : null;
        $patient->phone = $data['phone'];
        $patient->contact_phone = !empty($data['contact_phone']) ? $data['contact_phone'] : null;
        $patient->save();

        return $patient->fresh();
    }

    public static function storeOrUpdateMany(Collection $patients): void
    {
        foreach ($patients as $item) {
            if ($item['id']) {
                PatientRepository::update(Patient::find($item['id']), $item);
            } else {
                PatientRepository::store($item);
            }
        }
    }
}
