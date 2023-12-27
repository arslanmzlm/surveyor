<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Survey
 *
 * @property int $id
 * @property int $group_id
 * @property int $template_id
 * @property string $name
 * @property string $state
 * @property \Illuminate\Support\Carbon $survey_at
 * @property string|null $questions_generated_at
 * @property \Illuminate\Support\Carbon|null $send_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Group $group
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SurveyItem> $items
 * @property-read int|null $items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Question> $questions
 * @property-read int|null $questions_count
 * @property-read \App\Models\Template $template
 * @method static \Illuminate\Database\Eloquent\Builder|Survey newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Survey newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Survey query()
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereQuestionsGeneratedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereSendAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereSurveyAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereTemplateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Survey extends Model
{
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
        'survey_at' => 'date:Y-m-d',
        'initialized_at' => 'datetime',
        'send_at' => 'datetime',
    ];

    /**
     * The attributes that are filterable.
     *
     * @var array
     */
    public array $filterable = [
        'name' => 'search',
    ];

    /**
     * The attributes that are sortable.
     *
     * @var array
     */
    public array $sortable = ['id', 'name', 'state', 'group_id', 'template_id', 'survey_at'];

    const STATE_CREATED = "created";

    const STATE_INITIALIZED = "initialized";

    const STATE_SENT = "sent";

    const STATE_COMPLETED = "completed";

    /**
     * Get the workspace that owns the group.
     */
    public function group(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * Get the template that owns the survey.
     */
    public function template(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Template::class);
    }

    /**
     * Get the questions belonged to the survey.
     */
    public function questions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Question::class)->orderBy('order');
    }

    /**
     * Get all the items for the survey.
     */
    public function items(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SurveyItem::class);
    }

    public function getInputCount(): int
    {
        return $this->questions()->whereRelation('questionType', 'type', '=', QuestionType::COMPONENT_TYPE_INPUT)->count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|Question[]
     */
    public function getInputs()
    {
        return $this->questions()->whereRelation('questionType', 'type', '=', QuestionType::COMPONENT_TYPE_INPUT)->get();
    }
}
