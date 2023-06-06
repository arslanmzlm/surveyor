<?php

namespace App\Repository;

use App\Models\QuestionType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class QuestionRepository
{
    /**
     * Get question types.
     *
     * @return Builder[]|Collection
     */
    public static function getTypes(): ?\Illuminate\Database\Eloquent\Collection
    {
        return QuestionType::query()
            ->where('user_id', request()->user()->id)
            ->orWhereNull('user_id')
            ->get();
    }
}
