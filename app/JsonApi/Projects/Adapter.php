<?php

namespace App\JsonApi\Projects;

use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
use CloudCreativity\LaravelJsonApi\Eloquent\Concerns\SoftDeletesModels;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class Adapter extends AbstractAdapter
{
    use SoftDeletesModels;

    protected $includePaths = [
        'checkpoints', 'forms'
    ];

    /**
     * Mapping of JSON API attribute field names to model keys.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Mapping of JSON API filter names to model scopes.
     *
     * @var array
     */
    protected $filterScopes = [];

    /**
     * Adapter constructor.
     *
     * @param StandardStrategy $paging
     */
    public function __construct(StandardStrategy $paging)
    {
        parent::__construct(new \App\Project(), $paging);
    }

    /**
     * @param Builder $query
     * @param Collection $filters
     * @return void
     */
    protected function filter($query, Collection $filters)
    {
        if ($filters->get('trashed') === 'include') {
            $query->withTrashed();
        }

        if ($filters->get('trashed') === 'only') {
            $query->onlyTrashed();
        }

        // Fetch only projects that belong to auth user
        $query
            ->join('project_user', 'projects.id', '=', 'project_user.project_id')
            ->where('user_id', auth()->user()->id);
    }

    protected function memberships()
    {
        return $this->hasMany();
    }

    protected function forms()
    {
        return $this->hasMany();
    }

    protected function checkpoints()
    {
        return $this->hasMany();
    }

    protected function designs()
    {
        return $this->hasMany();
    }
}
