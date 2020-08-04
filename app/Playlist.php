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

    public function updateScenarios(array $scenarioIds)
    {
        $data = [];
        for ($i = 0; $i < count($scenarioIds); $i++) {
            $data[$scenarioIds[$i]] = [
                'playlist_id' => $this->id,
                'project_id' => $this->project->id,
                'list_position' => $i
            ];
        }
        // dd($data);
        $this->scenarios()->sync($data);
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
