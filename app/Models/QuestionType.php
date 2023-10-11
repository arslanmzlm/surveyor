<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\QuestionType
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $main_question_type_id
 * @property string $component
 * @property string|null $type
 * @property string $label
 * @property string|null $description
 * @property bool|null $required
 * @property int|null $order
 * @property string|null $value
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
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereMainQuestionTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereValues($value)
 * @mixin \Eloquent
 */
class QuestionType extends Model
{
    use HasFactory;

    const COMPONENT_TYPE_INPUT = "input";
    const COMPONENT_TYPE_OUTPUT = "output";

    const COMPONENT_TEXT = "InputText";
    const COMPONENT_NUMBER = "InputNumber";
    const COMPONENT_RADIO_GROUP = "InputRadioGroup";
    const COMPONENT_CHECKBOX_GROUP = "InputCheckboxGroup";
    const COMPONENT_DATE = "InputDate";
    const COMPONENT_MULTIPLE_RADIO_GROUP = "InputMultipleRadioGroup";
    const COMPONENT_RANGE = "InputRange";

    const COMPONENT_DESCRIPTION = "OutputDescription";
    const COMPONENT_IMAGE = "OutputImage";
    const COMPONENT_LIST = "OutputList";

    const COMPONENTS_HAS_VALUES = [
        QuestionType::COMPONENT_RADIO_GROUP,
        QuestionType::COMPONENT_CHECKBOX_GROUP,
        QuestionType::COMPONENT_MULTIPLE_RADIO_GROUP,
        QuestionType::COMPONENT_LIST,
    ];

    const COMPONENTS_HAS_RELATION = [
        QuestionType::COMPONENT_MULTIPLE_RADIO_GROUP,
    ];

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
