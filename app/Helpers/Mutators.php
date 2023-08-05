<?php

namespace App\Helpers;

class Mutators
{
    /**
     * Mutate telephone numbers to clean type.
     *
     * @param string|null $str
     *
     * @return string|null
     */
    public static function cleanPhone(?string $str): ?string
    {
        if (strlen($str) >= 10) {
            $data = preg_replace('/\D/', '', $str);
            return preg_replace('/[90|0]*(0[1-9][0-9]{9})/', '$1', $data);
        }

        return $str;
    }
}
