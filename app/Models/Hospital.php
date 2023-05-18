<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Hospital
 *
 * @property integer $id
 * @property string $name
 * @property integer $city_id
 * @property integer $county_id
 */
class Hospital extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that are filterable.
     *
     * @var array<string, string>
     */
    public array $filterable = [
        'name' => 'search',
        'city_id' => 'related',
        'county_id' => 'related',
    ];

    /**
     * The attributes that are sortable.
     *
     * @var array<integer, string>
     */
    public array $sortable = ['id', 'name'];

    /**
     * Get the city that owns the hospital.
     */
    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get the county that owns the hospital.
     */
    public function county(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(County::class);
    }
}
