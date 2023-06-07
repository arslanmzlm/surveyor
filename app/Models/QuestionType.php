<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\QuestionType
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $main_type_id
 * @property string $component
 * @property string $label
 * @property string|null $description
 * @property bool $required
 * @property array|null $values
 * @property array|null $options
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereComponent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereMainTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereValues($value)
 * @mixin \Eloquent
 */
class QuestionType extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'required' => 'boolean',
        'values' => 'array',
        'options' => 'array',
    ];
}
