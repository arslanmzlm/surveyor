<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Filter
{
    /**
     * Model instance for filtering.
     *
     * @var Model
     */
    private Model $model;

    /**
     * Items per page for pagination.
     *
     * @var integer
     */
    private int $per_page;

    /**
     * Adding models for response.
     *
     * @var array
     */
    private array $with = [];

    /**
     * Sorting column.
     *
     * @var string
     */
    private string $sort;

    /**
     * Sort order type.
     *
     * @var string asc, desc
     */
    private string $sort_type;

    /**
     * Is query user only filtering.
     *
     * @var bool
     */
    private bool $user_only = false;

    /**
     * Is query user only filtering.
     *
     * @var string|null
     */
    private ?string $user_related = null;

    /**
     * @param string $model
     * @param int $per_page
     */
    public function __construct(string $model, int $per_page = 10)
    {
        $this->model = new $model;
        $this->per_page = (int)request()->query('limit', $per_page);
        $this->sort = Str::lower(request()->query('sort', 'id'));
        $this->sort_type = Str::lower(request()->query('sort_type', 'desc'));
    }

    /**
     * Add relationship parameters to query.
     *
     * @param array $data
     * @return $this
     */
    public function with(array $data = []): Filter
    {
        $this->with = $data;

        return $this;
    }

    /**
     * Active user filter for query.
     *
     * @return Filter
     */
    public function userOnly(): Filter
    {
        $this->user_only = true;

        return $this;
    }

    /**
     * Active user filter for query.
     *
     * @param string $relationship
     * @return Filter
     */
    public function userRelated(string $relationship): Filter
    {
        $this->user_related = $relationship;

        return $this;
    }

    /**
     * Get items and paginator.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function get(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $query = $this->generateQuery();

        return $query->paginate($this->per_page);
    }

    /**
     * Get only items.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getData(): \Illuminate\Database\Eloquent\Collection
    {
        $query = $this->generateQuery();

        return $query->get();
    }

    /**
     * Generate filters for query.
     *
     * @return \Illuminate\Support\Collection
     */
    private function generateFilters(): \Illuminate\Support\Collection
    {
        $filterable = $this->model->filterable;
        $queries = array_filter(request()->query->all());
        $filters = [];

        foreach ($filterable as $column => $type) {
            if (in_array($column, array_keys($queries))) {
                $filters[] = [
                    'column' => $column,
                    'type' => $type,
                    'value' => is_numeric($queries[$column]) ? (int)$queries[$column] : $queries[$column],
                ];
            } else if ($type === 'search' && in_array('search', array_keys($queries))) {
                $filters[] = [
                    'column' => $column,
                    'type' => $type,
                    'value' => $queries['search'],
                ];
            }
        }

        return collect($filters);
    }

    /**
     * Generate query for response.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function generateQuery(): \Illuminate\Database\Eloquent\Builder
    {
        if (in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($this->model))) {
            $query = $this->model->withTrashed()->newQuery();
        } else {
            $query = $this->model->newQuery();
        }
        $filters = $this->generateFilters();

        $searches = $filters->where("type", "=", "search");

        $query->where(function ($query) use ($searches) {
            foreach ($searches as $filter) {
                $column = $filter['column'];
                $value = $filter['value'];
                $query->orWhere($column, 'LIKE', "%{$value}%");
            }
        });

        foreach ($filters as $filter) {
            $column = $filter['column'];
            $type = $filter['type'];
            $value = $filter['value'];

            if ($type === 'related') {
                $query->where($column, '=', $value);
            } else if ($type === 'equal') {
                $query->where($column, '=', $value);
            }
        }

        if ($this->user_only && request()->user()) {
            $query->where('user_id', request()->user()->id);
        }

        if ($this->user_related && request()->user()) {
            $query->whereRelation($this->user_related, 'user_id', '=', request()->user()->id);
        }

        if (in_array($this->sort, $this->model->sortable) && in_array($this->sort_type, ['asc', 'desc'])) {
            $query->orderBy($this->sort, $this->sort_type);
        }

        if (!empty($this->with)) {
            $query->with($this->with);
        }

        return $query;
    }
}
