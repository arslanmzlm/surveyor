<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * Get the counties belonged to the city.
     */
    public function counties(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(County::class);
    }
}
