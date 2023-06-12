<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Workspace
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Group> $groups
 * @property-read int|null $groups_count
 * @method static \Illuminate\Database\Eloquent\Builder|Workspace newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Workspace newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Workspace query()
 * @method static \Illuminate\Database\Eloquent\Builder|Workspace whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workspace whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workspace whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workspace whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workspace whereUserId($value)
 * @mixin \Eloquent
 */
class Workspace extends Model
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
    protected $with = ['groups'];

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
    public array $sortable = ['id', 'name'];

    /**
     * Get all the groups for the workspace.
     */
    public function groups(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Group::class);
    }
}
