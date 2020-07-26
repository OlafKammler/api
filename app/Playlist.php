<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $fillable = ['project_id', 'name', 'description', 'data'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function scenarios()
    {
        return $this->belongsToMany(Scenario::class)
            ->using(PlaylistScenario::class)
            ->withPivot([
                'playlist_id',
                'scenario_id',
                'project_id',
                'list_position'
            ]);
    }

    public function orderedScenarioIds()
    {
        $pivot = [];
        foreach ($this->scenarios as $scenario) {
            $pivot[$scenario->pivot->list_position] = $scenario->pivot->scenario_id;
        }
        ksort($pivot);
        return $pivot;
    }
}
