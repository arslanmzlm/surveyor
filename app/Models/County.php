<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\County
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 * @property-read \App\Models\City $city
 * @method static \Illuminate\Database\Eloquent\Builder|County newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|County newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|County query()
 * @method static \Illuminate\Database\Eloquent\Builder|County whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|County whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|County whereName($value)
 * @mixin \Eloquent
 */
class County extends Model
{
    /**
     * Get the city the county is belonged to.
     */
    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
