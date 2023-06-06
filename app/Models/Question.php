<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
     * @return string|null
     */
    public function getComponentAttribute(): ?string
    {
        return $this->questionType->component;
    }
}
