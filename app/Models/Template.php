<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['questions'];

    /**
     * The attributes that are filterable.
     *
     * @var array<string, string>
     */
    public array $filterable = [
        'name' => 'search',
    ];

    /**
     * The attributes that are sortable.
     *
     * @var array<integer, string>
     */
    public array $sortable = ['id', 'name'];

    /**
     * Get the questions belonged to the template.
     */
    public function questions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Question::class);
    }
}
