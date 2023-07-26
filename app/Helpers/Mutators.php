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

    /**
     * Mutate the data ​​of the question.
     *
     * @param array $question
     * @return array
     */
    public static function questionRequest(array $question): array
    {
        if (!array_key_exists('value', $question)) {
            $question['value'] = null;
        }

        if (!array_key_exists('values', $question) || !is_array($question['values']) || empty(array_filter($question['values']))) {
            $question['values'] = null;
        } else {
            $question['values'] = self::questionValues($question['values']);
        }

        if (!array_key_exists('options', $question) || !is_array($question['options']) || empty(array_filter($question['options']))) {
            $question['options'] = null;
        } else {
            $question['options'] = self::questionOptions($question['options']);
        }

        $question['values'] = is_array($question['values']) && !empty(array_filter($question['values'])) ? array_filter($question['values']) : null;
        $question['options'] = is_array($question['options']) && !empty(array_filter($question['options'])) ? array_filter($question['options']) : null;

        return $question;
    }

    /**
     * Mutate the values ​​of the question.
     *
     * @param array $values
     * @return array
     */
    private static function questionValues(array $values): array
    {
        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $value = array_filter($value);
            }

            if (is_array($value) && array_key_exists('score', $value)) {
                if (is_numeric($value['score'])) {
                    $values[$key]['score'] = (float)$value['score'];
                } else if (empty($value['score'])) {
                    unset($value[$key]['score']);
                }
            }
        }

        return $values;
    }

    /**
     * Mutate the opitons ​​of the question.
     *
     * @param array $options
     * @return array
     */
    private static function questionOptions(array $options): array
    {
        foreach ($options as $key => $value) {
            if (is_array($value)) {
                $value = array_filter($value);
            }

            if (in_array($key, ["related_id", "related_to", "min", "max"])) {
                if (is_numeric($value)) {
                    $options[$key] = (int)$value;
                } else if (empty($value)) {
                    unset($value[$key]);
                }
            }
        }

        return $options;
    }
}
