<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Question
 *
 * @property int $id
 * @property int $template_id
 * @property int $question_type_id
 * @property string $label
 * @property string|null $description
 * @property bool|null $required
 * @property int $order
 * @property string|null $value
 * @property int|null $score
 * @property array|null $values
 * @property array|null $options
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $component
 * @property-read int|null $main_question_type_id
 * @property-read \App\Models\QuestionType $questionType
 * @property-read \App\Models\Template $template
 * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestionTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereTemplateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereValues($value)
 * @mixin \Eloquent
 */
class Question extends Model
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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['component'];

    /**
     * Get the question type the question is belonged to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function questionType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(QuestionType::class);
    }

    /**
     * Get the template the question is belonged to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function template(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Template::class);
    }

    /**
     * Get component for question.
     *
     * @return string
     */
    public function getComponentAttribute(): string
    {
        return $this->questionType->component;
    }

    /**
     * Get main question type id for question.
     *
     * @return int|null
     */
    public function getMainQuestionTypeIdAttribute(): ?int
    {
        return $this->questionType->main_question_type_id;
    }
}
