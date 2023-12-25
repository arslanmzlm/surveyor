<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Hospital
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 * @property int $county_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City $city
 * @property-read \App\Models\County $county
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereCountyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Hospital extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that are filterable.
     *
     * @var array
     */
    public array $filterable = [
        'name' => 'search',
        'city_id' => 'related',
        'county_id' => 'related',
    ];

    /**
     * The attributes that are sortable.
     *
     * @var array
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
