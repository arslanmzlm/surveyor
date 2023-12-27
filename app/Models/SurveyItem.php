<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SurveyItem
 *
 * @property int $id
 * @property int $survey_id
 * @property int $patient_id
 * @property string|null $token
 * @property \Illuminate\Support\Carbon|null $sent_at
 * @property \Illuminate\Support\Carbon|null $completed_at
 * @property bool $filled_by_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Answer> $answers
 * @property-read int|null $answers_count
 * @property-read \App\Models\Patient $patient
 * @property-read \App\Models\Survey $survey
 * @method static \Illuminate\Database\Eloquent\Builder|SurveyItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SurveyItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SurveyItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|SurveyItem whereCompletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SurveyItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SurveyItem whereFilledByUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SurveyItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SurveyItem wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SurveyItem whereSentAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SurveyItem whereSurveyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SurveyItem whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SurveyItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SurveyItem extends Model
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
        'filled_by_user' => 'boolean',
        'sent_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    /**
     * Get the survey that owns the item.
     */
    public function survey(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    /**
     * Get the patient that owns the item.
     */
    public function patient(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Get all the answers for the survey item.
     */
    public function answers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
